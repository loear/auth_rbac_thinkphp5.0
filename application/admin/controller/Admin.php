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
use think\Request;

class Admin extends Base
{
    /**
     * 列表
     * @return \think\response\View
     */
    public function index()
    {
        $keywords = input('keywords');
        if (empty($keywords)) {
            $list = AdminModel::with('role')->select();
        }else{
            $list = AdminModel::where('user_name', 'like', "%$keywords%")->with('role')->order('id')->select();
        }
        $this->assign(compact('list'));
        return view();
    }

    /**
     * 编辑管理员
     * @param int $id
     * @return \think\response\View
     */
    public function adminInfo($id = 0)
    {
        if ($id)
            $info = AdminModel::field('password', true)->where(['id' => $id])->find()->toArray();
        $act = $id == 0 ? 'add' : 'edit';
        $role = RoleModel::all();
        $this->assign(compact('info', 'act', 'role'));
        return view('admin_info');
    }

    /**
     * 管理
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

    public function role()
    {
        $list = RoleModel::where([])->order('id desc')->select();
        $this->assign(compact('list'));
        return view();
    }

}