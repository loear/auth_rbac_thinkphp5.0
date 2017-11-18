<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/13
 * Time: 17:39
 */

namespace app\admin\controller;

use app\common\model\SystemMenu;
use think\Controller;
use think\Request;
use think\Session;

class Base extends Controller
{
    function __construct(Request $request)
    {
        Session::start();
        header("Cache-control: private"); // history.back返回后输入框值丢失问题
        define('MODULE_NAME', $request->module());            // 当前模块名称是
        define('CONTROLLER_NAME', $request->controller());    // 当前控制器名称
        define('ACTION_NAME', $request->action());            // 当前操作名称是
        parent::__construct($request);
    }

    public function _initialize()
    {
        // $this->assign('action', ACTION_NAME);
        //过滤不需要登陆的行为
        if (in_array(ACTION_NAME, ['login', 'logout', 'vertify', 'forget_pwd']) || in_array(CONTROLLER_NAME,['Ueditor','Uploadify','Table'])) {
            //return;
        } else {
            if (session('admin_id') > 0 ){
                $this->check_priv(); //检查管理员菜单操作权限
            } else {
                $this->error('请先登陆', url('admin/Admin/login'),1);
            }
        }
    }

    public function check_priv()
    {
        $ctl = CONTROLLER_NAME;
        $act = ACTION_NAME;
        $act_list = session('act_list');
        // 无需验证的操作
        $uneed_check = [
            'login',
            'logout',
            'vertifyHandle',
            'vertify',
            'imageUp',
            'upload',
            'login_task',
            'forget_pwd'
        ];
        if ($ctl == 'Index' || $act_list == 'all') { // 后台首页控制器无需验证,超级管理员无需验证
            return true;
        } else if (strpos($act, 'ajax') || in_array($act, $uneed_check)) { // 所有ajax请求不需要验证权限
            return true;
        } else {
            $right = SystemMenu::where("id in ($act_list)")->field('right')->cache(true)->select();

            $role_right = '';
            foreach ($right as $val) {
                $role_right .= $val . ',';
            }
            $role_right = explode(',', $role_right);
            //检查是否拥有此操作权限
            if (!in_array($ctl . '@' . $act, $role_right)) {
                $this->error('您没有操作权限' . ($ctl . '@' . $act) . ',请联系超级管理员分配权限', url('admin/Index/welcome'));
            }
        }
    }

}