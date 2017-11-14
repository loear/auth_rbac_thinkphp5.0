<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/13
 * Time: 17:39
 */

namespace app\admin\controller;
use app\common\model\Admin as AdminModel;


class Admin extends Base
{
    public function index()
    {
        $list = '';
        $admin_info = ['user_name'=>'','admin_id'=>1];

        $act_list = session('act_list');
        $menu_list = getMenuList($act_list);
        $admin_info = AdminModel::getAdminInfo(session('admin_id'));
        $menu = getMenuArr();

        $this->assign(compact('list', 'menu_list', 'admin_info', 'menu'));
        return view();
    }

}