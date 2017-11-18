<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/16
 * Time: 9:29
 */

namespace app\common\model;


class SystemMenu extends Base
{
    protected $hidden = ['create_time', 'update_time', 'delete_time'];

    public static function getMenuList($act_list){
        //根据角色权限过滤菜单
        $menu_list = getAllMenu();
        if($act_list != 'all' && !empty($act_list)){
            $right = self::where("id in ($act_list)")->field('right')->cache(true)->select();
            $role_right = '';
            foreach ($right as $val){
                $role_right .= $val.',';
            }
            $role_right = explode(',', $role_right);
            foreach($menu_list as $k=>$mrr){
                foreach ($mrr['sub_menu'] as $j=>$v){
                    if(!in_array($v['control'].'@'.$v['act'], $role_right)){
                        unset($menu_list[$k]['sub_menu'][$j]);//过滤菜单
                    }
                }
            }

            foreach ($menu_list as $mk=>$mr){
                if(empty($mr['sub_menu'])){
                    unset($menu_list[$mk]);
                }
            }
        }
        return $menu_list;
    }

    public static function getMenuArr(){
        $menuArr = include APP_PATH.'admin/menu.php';
        $act_list = session('act_list');
        if($act_list != 'all' && !empty($act_list)){
            $right = self::where("id in ($act_list)")->field('right')->cache(true)->select();
            $role_right = '';
            foreach ($right as $val){
                $role_right .= $val.',';
            }

            foreach($menuArr as $k=>$val){
                foreach ($val['child'] as $j=>$v){
                    foreach ($v['child'] as $s=>$son){
                        if(!strpos($role_right,$son['op'].'@'.$son['act'])){
                            unset($menuArr[$k]['child'][$j]['child'][$s]);//过滤菜单
                        }
                    }
                }
            }

            foreach ($menuArr as $mk=>$mr){
                foreach ($mr['child'] as $nk=>$nrr){
                    if(empty($nrr['child'])){
                        unset($menuArr[$mk]['child'][$nk]);
                    }
                }
            }
        }
        return $menuArr;
    }
}