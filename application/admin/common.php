<?php
/**
 * Created by PhpStorm.
 * User: Guo
 * Date: 2017/11/13
 * Time: 23:08
 */



function getAllMenu(){
    return	array(
        'system' => array('name'=>'系统设置','icon'=>'fa-cog','sub_menu'=>array(
            array('name'=>'网站设置','act'=>'index','control'=>'System'),
            array('name'=>'自定义导航','act'=>'navigationList','control'=>'System'),
            array('name'=>'区域管理','act'=>'region','control'=>'Tools'),
            array('name'=>'短信模板','act'=>'index','control'=>'SmsTemplate'),
        )),
        'access' => array('name' => '权限管理', 'icon'=>'fa-gears', 'sub_menu' => array(
            array('name'=>'权限资源列表','act'=>'right_list','control'=>'System'),
            array('name' => '管理员列表', 'act'=>'index', 'control'=>'Admin'),
            array('name' => '角色管理', 'act'=>'role', 'control'=>'Admin'),
            array('name' => '管理员日志', 'act'=>'log', 'control'=>'Admin'),
            array('name' => '供应商列表', 'act'=>'supplier', 'control'=>'Admin'),

        )),
        'member' => array('name'=>'会员管理','icon'=>'fa-user','sub_menu'=>array(
            array('name'=>'会员列表','act'=>'index','control'=>'User'),
            array('name'=>'会员等级','act'=>'levelList','control'=>'User'),
            array('name'=>'会员充值','act'=>'recharge','control'=>'User'),
            //array('name'=>'会员整合','act'=>'integrate','control'=>'User'),
        )),
        'goods' => array('name' => '商品管理', 'icon'=>'fa-tasks', 'sub_menu' => array(
            array('name' => '商品分类', 'act'=>'categoryList', 'control'=>'Goods'),
            array('name' => '商品列表', 'act'=>'goodsList', 'control'=>'Goods'),
            array('name' => '库存日志', 'act'=>'stock_list', 'control'=>'Goods'),
            array('name' => '商品模型', 'act'=>'goodsTypeList', 'control'=>'Goods'),
            array('name' => '商品规格', 'act' =>'specList', 'control' => 'Goods'),
            array('name' => '品牌列表', 'act'=>'brandList', 'control'=>'Goods'),
        )),
        'order' => array('name' => '订单管理', 'icon'=>'fa-money', 'sub_menu' => array(
            array('name' => '订单列表', 'act'=>'index', 'control'=>'Order'),
            //array('name' => '发货单', 'act'=>'delivery_list', 'control'=>'Order'),
            //array('name' => '快递单', 'act'=>'express_list', 'control'=>'Order'),
            array('name' => '退货单', 'act'=>'return_list', 'control'=>'Order'),
            //array('name' => '订单日志', 'act'=>'order_log', 'control'=>'Order'),
            array('name' => '商品评论','act'=>'index','control'=>'Comment'),
//					array('name' => '商品咨询','act'=>'ask_list','control'=>'Comment'),
            array('name' => '投诉管理','act'=>'complain_list', 'control'=>'Comment'),
        )),
        'Store' => array('name' => '店铺管理', 'icon'=>'fa-home', 'sub_menu' => array(
            array('name' => '店铺等级', 'act'=>'store_grade', 'control'=>'Store'),
            array('name' => '店铺分类', 'act'=>'store_class', 'control'=>'Store'),
            array('name' => '店铺列表', 'act'=>'store_list', 'control'=>'Store'),
            array('name' => '自营店铺', 'act'=>'store_own_list', 'control'=>'Store'),
            array('name' => '经营类目审核', 'act'=>'apply_class_list', 'control'=>'Store'),
        )),
        'Ad' => array('name' => '广告管理', 'icon'=>'fa-flag', 'sub_menu' => array(
            array('name' => '广告列表', 'act'=>'adList', 'control'=>'Ad'),
            array('name' => '广告位置', 'act'=>'positionList', 'control'=>'Ad'),
        )),
        'promotion' => array('name' => '活动管理', 'icon'=>'fa-bell', 'sub_menu' => array(
            array('name' => '抢购管理', 'act'=>'flash_sale', 'control'=>'Promotion'),
            array('name' => '团购管理', 'act'=>'group_buy_list', 'control'=>'Promotion'),
            array('name' => '优惠促销', 'act'=>'prom_goods_list', 'control'=>'Promotion'),
            array('name' => '订单促销', 'act'=>'prom_order_list', 'control'=>'Promotion'),
//					array('name' => '代金券','act'=>'index', 'control'=>'Coupon'),
        )),
        'content' => array('name' => '内容管理', 'icon'=>'fa-comments', 'sub_menu' => array(
            array('name' => '文章列表', 'act'=>'articleList', 'control'=>'Article'),
            array('name' => '文章分类', 'act'=>'categoryList', 'control'=>'Article'),
            //array('name' => '帮助管理', 'act'=>'help_list', 'control'=>'Article'),
            array('name'=>'友情链接','act'=>'linkList','control'=>'Article'),
            //array('name' => '公告管理', 'act'=>'notice_list', 'control'=>'Article'),
            array('name' => '专题列表', 'act'=>'topicList', 'control'=>'Topic'),
        )),
        'weixin' => array('name' => '微信管理', 'icon'=>'fa-weixin', 'sub_menu' => array(
            array('name' => '公众号管理', 'act'=>'index', 'control'=>'Wechat'),
            array('name' => '微信菜单管理', 'act'=>'menu', 'control'=>'Wechat'),
            array('name' => '文本回复', 'act'=>'text', 'control'=>'Wechat'),
            array('name' => '图文回复', 'act'=>'img', 'control'=>'Wechat'),
            //array('name' => '组合回复', 'act'=>'nes', 'control'=>'Wechat'),
            //array('name' => '抽奖活动', 'act'=>'nes', 'control'=>'Wechat'),
        )),
        'theme' => array('name' => '模板管理', 'icon'=>'fa-adjust', 'sub_menu' => array(
            array('name' => 'PC端模板', 'act'=>'templateList?t=pc', 'control'=>'Template'),
            array('name' => '手机端模板', 'act'=>'templateList?t=mobile', 'control'=>'Template'),
        )),
        /* * */
        'distribut' => array('name' => '分销管理', 'icon'=>'fa-cubes', 'sub_menu' => array(
            array('name' => '分销商品列表', 'act'=>'goods_list', 'control'=>'Distribut'),
            array('name' => '分销商列表', 'act'=>'distributor_list', 'control'=>'Distribut'),
            array('name' => '分销关系', 'act'=>'tree', 'control'=>'Distribut'),
            array('name' => '分销设置', 'act'=>'set', 'control'=>'Distribut'),
            array('name' => '分成日志', 'act'=>'rebate_log', 'control'=>'Distribut'),
        )),
//			'distribut' => array('name' => '分销管理', 'icon'=>'fa-cubes', 'sub_menu' => array(
//					array('name' => '分销商列表', 'act'=>'distributor_list', 'control'=>'Distribut'),
//					array('name' => '分销关系', 'act'=>'tree', 'control'=>'Distribut'),
//					array('name' => '提现申请', 'act'=>'withdrawals', 'control'=>'Distribut'),
//					array('name' => '分成日志', 'act'=>'rebate_log', 'control'=>'Distribut'),
//			)),

        'tools' => array('name' => '插件工具', 'icon'=>'fa-plug', 'sub_menu' => array(
            array('name' => '插件列表', 'act'=>'index', 'control'=>'Plugin'),
            array('name' => '数据备份', 'act'=>'index', 'control'=>'Tools'),
            array('name' => '数据还原', 'act'=>'restore', 'control'=>'Tools'),
        )),
        'finance' => array('name' => '财务管理', 'icon'=>'fa-book', 'sub_menu' => array(
            array('name' => '商家提现申请', 'act'=>'store_withdrawals', 'control'=>'Finance'),
            array('name' => '商家汇款记录', 'act'=>'store_remittance', 'control'=>'Finance'),
            array('name' => '会员提现申请', 'act'=>'withdrawals', 'control'=>'Finance'),
            array('name' => '会员汇款记录', 'act'=>'remittance', 'control'=>'Finance'),
            array('name' => '商家结算记录', 'act'=>'order_statis', 'control'=>'Finance'),
            array('name' => '订单佣金结算', 'act'=>'order_statis', 'control'=>'Finance'),
        )),
        'count' => array('name' => '统计报表', 'icon'=>'fa-signal', 'sub_menu' => array(
            array('name' => '销售概况', 'act'=>'index', 'control'=>'Report'),
            array('name' => '销售排行', 'act'=>'saleTop', 'control'=>'Report'),
            array('name' => '会员排行', 'act'=>'userTop', 'control'=>'Report'),
            array('name' => '销售明细', 'act'=>'saleList', 'control'=>'Report'),
            array('name' => '会员统计', 'act'=>'user', 'control'=>'Report'),
            array('name' => '运营概览', 'act'=>'finance', 'control'=>'Report'),
        ))
    );
}



function respose($res){
    exit(json_encode($res));
}

/**
 * 密码加密方式
 *
 * @param $str
 * @return string
 */
function encrypt($str){
    return md5(config('auth_code') . $str);
}

/**
 * 获取客户端IP
 *
 * @return array|false|string
 */
function getIP(){
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow";

    if(preg_match('/^((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1 -9]?\d))))$/', $ip))
        return $ip;
    else
        return '';
}