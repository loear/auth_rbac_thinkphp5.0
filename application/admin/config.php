<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/13
 * Time: 17:48
 */
return [
    'template'               => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 模板路径
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'html',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',
    ],

    // 视图输出字符串内容替换
    'view_replace_str'       => [
        '__PUBLIC__'    =>  '',
        '__STATIC__'    =>  '/application/admin/view/static',
        '__ROOT__'      =>  '/'
    ],
    'auth_code' =>  'Ns3Kd',    // 密码;

    'ng_privilege' => [
        'system'        =>  '系统设置',
        'content'       =>  '内容管理',
        'goods'         =>  '商品中心',
        'member'        =>  '会员中心',
        'order'         =>  '订单中心',
        'marketing'     =>  '营销推广',
        'tools'         =>  '插件工具',
        'count'         =>  '统计报表',
        'weixin'        =>  '微信管理',
        'store'         =>  '店铺管理',
        'distribut'     =>  '分销管理',
        'maintenance'   =>  '运营'
    ],
];