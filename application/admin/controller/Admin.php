<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/13
 * Time: 17:39
 */

namespace app\admin\controller;
use app\common\model\Admin as AdminModel;
use app\common\model\Role as RoleModel;
use app\common\model\SystemMenu as SystemMenuModel;
use app\common\model\AdminLog as AdminLogModel;
use think\Request;

class Admin extends Base
{
    /**
     * 列表
     *
     * @return \think\response\View
     */
    public function index()
    {
        $keywords = input('keywords');
        if (empty($keywords)) {
            $list = AdminModel::with('role')->paginate(20);
        }else{
            $list = AdminModel::where('user_name', 'like', "%$keywords%")->with('role')->order('id')->paginate(20);
        }
        $this->assign(compact('list'));
        return view();
    }

    /**
     * 编辑管理员
     *
     * @param int $id
     * @return \think\response\View
     */
    public function adminInfo($id = 0)
    {
        if ($id)
            $info = AdminModel::field('password', true)->where(['id' => $id])->find()->toArray();
        $info = isset($info) ? $info : 0;
        $act = $id == 0 ? 'add' : 'edit';
        $role = RoleModel::all();
        $this->assign(compact('info', 'act', 'role'));
        return view('admin_info');
    }

    /**
     * 管理员操作 添加 / 保存 / 删除
     *
     * @param Request $request
     */
    public function adminHandle(Request $request)
    {
        $data = $request->post();
        if (empty($data['password']) || $data['password'] == '******') {
            unset($data['password']);
        }

        if($data['act'] == 'add'){
            $admin_model = new AdminModel();
            if ($admin_model->where(['user_name'=>$data['user_name']])->count()) {
                $this->error("此用户名已被注册，请更换", url('amin/Admin/adminInfo'));
            } else {
                $admin_model->user_name = $data['user_name'];
                $admin_model->email     = $data['email'];
                $admin_model->password  = encrypt($data['password']);
                $admin_model->role_id   = $data['role_id'];
                $admin_model->save();
                $r = $admin_model->id;
            }
        }

        if ($data['act'] == 'edit'){
            $admin_model = AdminModel::find($data['id']);
            $admin_model->user_name = $data['user_name'];
            $admin_model->email     = $data['email'];
            $admin_model->role_id   = $data['role_id'];
            $admin_model->save();
            $r = $admin_model->id;
        }

        if ($data['act'] == 'del' && $data['id']>1) {
            AdminModel::destroy($data['id']);
            exit(json_encode(1));
        }

        if ($r) {
            $this->success("操作成功", url('admin/Admin/index'));
        } else {
            $this->error("操作失败", url('admin/Admin/index'));
        }

    }

    /**
     * 角色列表
     *
     * @return \think\response\View
     */
    public function role()
    {
        $list = RoleModel::where([])->order('id asc')->paginate(20);
        $this->assign(compact('list'));
        return view();
    }

    /**
     * 编辑角色信息
     *
     * @param $id
     * @return \think\response\View
     */
    public function roleInfo($id = 0){
        $detail = $modules = [];
        if ($id) {
            $detail = RoleModel::find($id);
            $detail['act_list'] = explode(',', $detail['act_list']);
        }
        $right = SystemMenuModel::where([])->order('id')->select()->toArray();
        foreach ($right as $val) {
            if ($id == 0) $val['enable'] = false;
            if (!empty($detail)) {
                $val['enable'] = in_array($val['id'], $detail['act_list']);
            }
            $modules[$val['group']][] = $val;
        }
        //权限组
        $group = config('ng_privilege');
        $this->assign(compact('detail', 'group', 'modules'));
        return view('role_info');
    }

    /**
     * 角色操作 添加 / 保存
     *
     * @param Request $request
     */
    public function roleSave(Request $request){
        $post_data = $request->post();
        $data = $post_data['data'];
        $data['act_list'] = is_array($post_data['right']) ? implode(',', $post_data['right']) : '';
        if (empty($data['act_list'])) $this->error("请选择权限!");
        if (empty($post_data['id'])) {
            $role_model = new RoleModel();
            $role_model->role_name = $data['role_name'];
            $role_model->act_list  = $data['act_list'];
            $role_model->role_desc = $data['role_desc'];
            $role_model->save();
            $r = $role_model->id;
        } else {
            $role_model = RoleModel::find($post_data['id']);
            $role_model->role_name = $data['role_name'];
            $role_model->act_list  = $data['act_list'];
            $role_model->role_desc = $data['role_desc'];
            $role_model->save();
            $r = $role_model->id;
        }
        if($r){
            (new AdminLogModel())->saveLog('管理角色', 0);
            $this->success("操作成功!", url('admin/Admin/roleInfo', ['id'=>$post_data['id']]));
        }else{
            $this->error("操作失败!", url('admin/Admin/role'));
        }
    }

    /**
     * 角色操作 删除
     *
     * @param Request $request
     */
    public function roleDel(Request $request){
        $id = $request->post('id');
        $admin = AdminModel::where(['role_id'=>$id])->find();
        if ($admin) {
            exit(json_encode("请先清空所属该角色的管理员"));
        }else{
            RoleModel::destroy($id);
            $d = RoleModel::onlyTrashed()->find($id);
            if($d){
                exit(json_encode(1));
            }else{
                exit(json_encode("删除失败"));
            }
        }
    }

    /**
     * 管理员日志列表
     *
     * @return \think\response\View
     */
    public function log()
    {
        $list = AdminLogModel::with('admin')->order('create_time')->paginate(20);
        $this->assign(compact('list'));
        return view();
    }


    public function login(Request $request)
    {
        if (session('?admin_id') && session('admin_id') > 0) {
            $this->error("您已登录", url('admin/Index/index'));
        }

        if ($request->isPost()) {
            if (!captcha_check($request->post('vertify'))) {
                exit(json_encode(['status'=>0, 'msg'=>'验证码错误']));
            };
            $condition['user_name'] = $request->post('username');
            $condition['password'] = $request->post('password');
            if (!empty($condition['user_name']) && !empty($condition['password'])) {
                $condition['password'] = encrypt($condition['password']);
                $admin_info = AdminModel::with('role')->where($condition)->find()->toArray();
                if (is_array($admin_info)) {
                    session('admin_id', $admin_info['id']);
                    session('act_list', $admin_info['role']['act_list']);
                    $model = AdminModel::find($admin_info['id']);
                    $model->last_login_time = time();
                    $model->last_login_ip = getIP();
                    $model->save();
                    session('last_login_time', $model->last_login_time);
                    session('last_login_ip', $model->last_login_ip);
                    adminLog('后台登录', 0);
                    $url = session('from_url') ? session('from_url') : url('admin/Index/index');
                    exit(json_encode(array('status'=>1, 'url'=>$url)));
                } else {
                    exit(json_encode(array('status'=>0, 'msg'=>'账号密码不正确')));
                }
            } else {
                exit(json_encode(array('status'=>0, 'msg'=>'请填写账号密码')));
            }
        }
        return view();
    }

    /**
     * 获取验证码
     *
     * @return string
     */
    public function vertify()
    {
        return captcha_src();
    }


}