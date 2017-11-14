<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/14
 * Time: 18:35
 */

namespace app\admin\controller;
use app\common\model\Admin as AdminModel;


class Index extends Base
{
    public function index()
    {
        $act_list = 'all';
        $menu_list = getMenuList($act_list);
        $admin_info = AdminModel::getAdminInfo(1);

        $menu = getMenuArr();
        $this->assign(compact('list', 'menu_list', 'admin_info', 'menu'));

        return view();
    }

}