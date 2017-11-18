<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/14
 * Time: 18:35
 */

namespace app\admin\controller;
use app\common\model\Admin as AdminModel;
use app\common\model\SystemMenu as SystemMenuModel;


class Index extends Base
{
    public function index()
    {
        $act_list = session('act_list');
        $menu_list = SystemMenuModel::getMenuList($act_list);
        $admin_info = AdminModel::getAdminInfo(session('admin_id'));

        $menu = SystemMenuModel::getMenuArr();
        $this->assign(compact('list', 'menu_list', 'admin_info', 'menu'));

        return view();
    }

    public function welcome()
    {
        echo 'hello word';
    }

}