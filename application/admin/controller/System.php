<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/16
 * Time: 14:17
 */

namespace app\admin\controller;
use app\common\model\SystemMenu as SystemMenuModel;
use think\Request;

class System extends Base
{
    function rightList()
    {
        $group = config('ng_privilege');
        $name = input('name');
        $condition = [];
        if (!empty($name)) $condition['name|right'] = ['like', "%$name%"];
        $right_list = SystemMenuModel::where($condition)->order('id desc')->paginate(20);
        $this->assign(compact('right_list', 'group'));
        return view('right_list');
    }

    public function editRight($id, Request $request){
        if ($request->isPost()) {
            $data = $request->post();
            $data['right'] = implode(',', $data['right']);
            if (!empty($data['id'])) { // 修改
                $system_menu_model = SystemMenuModel::find($data['id']);
                $system_menu_model->name = $data['name'];
                $system_menu_model->group = $data['group'];
                $system_menu_model->right = $data['right'];
                $system_menu_model->save();
            } else { // 添加
                $system_menu_model = new SystemMenuModel();
                if (SystemMenuModel::where(['name'=>$data['name']])->count() > 0)
                    $this->error('该权限名称已添加，请检查', url('admin/System/rightList'));
                $system_menu_model->name  = $data['name'];
                $system_menu_model->group = $data['group'];
                $system_menu_model->right = $data['right'];
                $system_menu_model->save();
            }
            $this->success('操作成功', url('admin/System/rightList'));
            exit;
        }
        $info = '';
        if ($id) {
            $info = SystemMenuModel::find($id);
            $info->right = explode(',', $info->right);
        }
        $group = config('ng_privilege');
        $planPath = APP_PATH . 'admin/controller';
        $planList = [];
        $dirRes   = opendir($planPath);
        while($dir = readdir($dirRes))
        {
            if(!in_array($dir, array('.', '..', '.svn', 'index.html')))
            {
                $planList[] = basename($dir,'.php');
            }
        }
        $this->assign(compact('group', 'planList', 'info'));
        return view('edit_right');
    }

    public function ajaxGetAction()
    {
        $control = input('controller');

        $advContrl = get_class_methods("app\\admin\\controller\\" . $control);
        $baseContrl = get_class_methods('app\admin\controller\Base');


        $diffArray  = array_diff($advContrl, $baseContrl);
        $html = '';
        foreach ($diffArray as $val){
            $html .= "<li><label><input class='checkbox' name='act_list' value=" . $val . " type='checkbox'>" . $val . "</label></li>";
            if ($val && strlen($val) > 18) {
                $html .= "<li></li>";
            }
        }
        exit($html);
    }

}