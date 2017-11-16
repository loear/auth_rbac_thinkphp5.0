<?php
return	array(
    'system'=>array('name'=>'平台','child'=>array(
        array('name' => '设置','child' => array(
            array('name'=>'商城设置','act'=>'index','op'=>'System'),
            //array('name'=>'支付方式','act'=>'index1','op'=>'System'),
            array('name'=>'地区&配送','act'=>'region','op'=>'Tools'),
            array('name'=>'短信模板','act'=>'index','op'=>'SmsTemplate'),
            //array('name'=>'接口对接','act'=>'index3','op'=>'System'),
            //array('name'=>'验证码设置','act'=>'index4','op'=>'System'),
            array('name'=>'自定义导航栏','act'=>'navigationList','op'=>'System'),
            array('name'=>'友情链接','act'=>'linkList','op'=>'Article'),
            array('name'=>'清除缓存','act'=>'cleanCache','op'=>'System')
        )),
        array('name' => '会员','child'=>array(
            array('name'=>'会员列表','act'=>'index','op'=>'User'),
            array('name'=>'会员等级','act'=>'levelList','op'=>'User'),
            array('name'=>'充值记录','act'=>'recharge','op'=>'User'),
            //array('name'=>'提现申请','act'=>'withdrawals','op'=>'User'),
        )),
        array('name' => '广告','child' => array(
            array('name'=>'广告列表','act'=>'adList','op'=>'Ad'),
            array('name'=>'广告位置','act'=>'positionList','op'=>'Ad'),
        )),
        array('name' => '文章','child'=>array(
            array('name' => '文章列表', 'act'=>'articleList', 'op'=>'Article'),
            array('name' => '文章分类', 'act'=>'categoryList', 'op'=>'Article'),
            //array('name' => '帮助管理', 'act'=>'help_list', 'op'=>'Article'),
            //array('name'=>'友情链接','act'=>'linkList','op'=>'Article'),
            //array('name' => '公告管理', 'act'=>'notice_list', 'op'=>'Article'),
            array('name' => '专题列表', 'act'=>'topicList', 'op'=>'Topic'),
        )),
        [
            'name'  => '权限',
            'child' =>  [
                [
                    'name'  =>  '管理员列表',
                    'act'   =>  'index',
                    'op'    =>  'admin'
                ],
                [
                    'name'  =>  '角色管理',
                    'act'   =>  'role',
                    'op'    =>  'admin'
                ],
                [
                    'name'  =>  '权限资源列表',
                    'act'   =>  'right_list',
                    'op'    =>  'system'
                ],
                [
                    'name'  =>  '管理员日志',
                    'act'   =>  'log',
                    'op'    =>  'admin'
                ],
            ]
        ],

        array('name' => '模板','child'=>array(
            array('name' => '模板设置', 'act'=>'templateList', 'op'=>'Template'),
        )),
        array('name' => '数据','child'=>array(
            array('name' => '数据备份', 'act'=>'index', 'op'=>'Tools'),
            array('name' => '数据恢复', 'act'=>'restore', 'op'=>'Tools'),
        ))
    )),

    'shop'=>array('name'=>'商城','child'=>array(
        array('name' => '商品','child' => array(
            array('name' => '商品分类', 'act'=>'categoryList', 'op'=>'Goods'),
            array('name' => '商品列表', 'act'=>'goodsList', 'op'=>'Goods'),
            array('name' => '库存日志', 'act'=>'stock_list', 'op'=>'Goods'),
            array('name' => '商品模型', 'act'=>'goodsTypeList', 'op'=>'Goods'),
            array('name' => '商品规格', 'act' =>'specList', 'op' => 'Goods'),
            array('name' => '品牌列表', 'act'=>'brandList', 'op'=>'Goods'),
            // array('name' => '库存日志', 'act'=>'brandList', 'op'=>'Goods'),
        )),

        array('name' => '商家','child'=>array(
            array('name' => '店铺列表', 'act'=>'store_list', 'op'=>'Store'),
            array('name' => '店铺等级', 'act'=>'store_grade', 'op'=>'Store'),
            array('name' => '店铺分类', 'act'=>'store_class', 'op'=>'Store'),
            array('name' => '自营店铺', 'act'=>'store_own_list', 'op'=>'Store'),
            array('name' => '经营类目审核', 'act'=>'apply_class_list', 'op'=>'Store'),
        )),
        array('name' => '订单','child'=>array(
            array('name' => '订单列表', 'act'=>'index', 'op'=>'Order'),
            array('name' => '虚拟订单', 'act'=>'virtual_list', 'op'=>'Order'),
            //array('name' => '发货单', 'act'=>'delivery_list', 'op'=>'Order'),
            array('name' => '换货维修', 'act'=>'return_list', 'op'=>'Service'),
            array('name' => '退款管理', 'act'=>'refund_list', 'op'=>'Service'),
            array('name' => '订单日志', 'act'=>'order_log', 'op'=>'Order'),
            array('name' => '商品评论','act'=>'index','op'=>'Comment'),
            array('name' => '商品咨询','act'=>'ask_list','op'=>'Comment'),
            array('name' => '投诉管理','act'=>'complain_list', 'op'=>'Service'),
            array('name' => '举报管理','act'=>'expose_list', 'op'=>'Service'),
        )),
        array('name' => '促销','child' => array(
            array('name' => '抢购管理', 'act'=>'flash_sale', 'op'=>'Promotion'),
            array('name' => '团购管理', 'act'=>'group_buy_list', 'op'=>'Promotion'),
            array('name' => '优惠促销', 'act'=>'prom_goods_list', 'op'=>'Promotion'),
            array('name' => '订单促销', 'act'=>'prom_order_list', 'op'=>'Promotion'),
            array('name' => '店铺优惠券','act'=>'index', 'op'=>'Coupon'),
        )),
        /*
        array('name' => '分销','child' => array(
                array('name' => '分销商品列表', 'act'=>'goods_list', 'op'=>'Distribut'),
                array('name' => '分销商列表', 'act'=>'distributor_list', 'op'=>'Distribut'),
                array('name' => '分销关系', 'act'=>'tree', 'op'=>'Distribut'),
                array('name' => '分销设置', 'act'=>'set', 'op'=>'Distribut'),
                array('name' => '分成日志', 'act'=>'rebate_log', 'op'=>'Distribut'),
        )),
    */
        array('name' => '微信','child' => array(
            array('name' => '公众号配置', 'act'=>'index', 'op'=>'Wechat'),
            array('name' => '微信菜单管理', 'act'=>'menu', 'op'=>'Wechat'),
            array('name' => '文本自动回复', 'act'=>'text', 'op'=>'Wechat'),
            //array('name' => '图文回复', 'act'=>'img', 'op'=>'Wechat'),
            array('name' => '粉丝列表', 'act'=>'fans_list', 'op'=>'Wechat'),
            // array('name' => '素材管理', 'act'=>'material', 'op'=>'Wechat'),
        )),

        array('name' => '运营','child' => array(
            array('name' => '商家提现申请', 'act'=>'store_withdrawals', 'op'=>'Finance'),
            array('name' => '商家转款列表', 'act'=>'store_remittance', 'op'=>'Finance'),
            array('name' => '会员提现申请', 'act'=>'withdrawals', 'op'=>'Finance'),
            array('name' => '会员转款列表', 'act'=>'remittance', 'op'=>'Finance'),
            array('name' => '商家结算记录', 'act'=>'order_statis', 'op'=>'Finance'),
            array('name' => '平台支出记录', 'act'=>'expense_log', 'op'=>'Finance'),
        )),

        array('name' => '统计','child' => array(
            array('name' => '销售概况', 'act'=>'index', 'op'=>'Report'),
            array('name' => '销售排行', 'act'=>'saleTop', 'op'=>'Report'),
            array('name' => '会员排行', 'act'=>'userTop', 'op'=>'Report'),
            array('name' => '销售明细', 'act'=>'saleList', 'op'=>'Report'),
            array('name' => '会员统计', 'act'=>'user', 'op'=>'Report'),
            array('name' => '运营概览', 'act'=>'finance', 'op'=>'Report'),
        )),
    )),

    'mobile'=>array('name'=>'手机端','child'=>array(
        array('name' => '设置','child' => array(
            array('name' => '模板设置', 'act'=>'templateList', 'op'=>'Template'),
            array('name' => '手机支付', 'act'=>'templateList', 'op'=>'Template'),
            array('name' => '微信二维码', 'act'=>'templateList', 'op'=>'Template'),
            array('name' => '第三方登录', 'act'=>'templateList', 'op'=>'Template'),
            array('name' => '导航管理', 'act'=>'finance', 'op'=>'Report'),
            array('name' => '广告管理', 'act'=>'finance', 'op'=>'Report'),
            array('name' => '广告位管理', 'act'=>'finance', 'op'=>'Report'),
        )),
    )),

    'resource'=>array('name'=>'资源','child'=>array(
        array('name' => '云服务','child' => array(
            array('name' => '插件库', 'act'=>'index', 'op'=>'Plugin'),
            array('name' => '数据备份', 'act'=>'index', 'op'=>'Tools'),
            array('name' => '数据还原', 'act'=>'restore', 'op'=>'Tools'),
        )),
    )),
);