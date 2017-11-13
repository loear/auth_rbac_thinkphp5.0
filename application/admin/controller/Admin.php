<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/13
 * Time: 17:39
 */

namespace app\admin\controller;


class Admin extends Base
{
    public function index()
    {
        $list = '';
        $admin_info = ['user_name'=>'','admin_id'=>1];
        $this->assign(compact('list', 'admin_info'));
        return view();
    }

}