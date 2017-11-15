<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/*return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];*/

use think\Route;

Route::group('admin', function(){
    // 分类
    Route::group('admin', [
        'index'             =>  ['admin/Admin/index',       ['method' => 'get']  ],
        'admin_info/:id'    =>  ['admin/Admin/adminInfo',   ['method' => 'get'], ['id' => '\d+']  ],
        'admin_handle'      =>  ['admin/Admin/adminHandle', ['method' => 'post'] ],
//        'edit/:id'      =>  ['admin/Category/edit',        ['method' => 'get'], ['id' => '\d+']],

    ]);


},['ext'=>'html']);
