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
    // 管理员
    Route::group('admin', [
        'index'             =>  ['admin/Admin/index',       ['method' => 'get']  ],
        'admin_info/:id'    =>  ['admin/Admin/adminInfo',   ['method' => 'get'], ['id' => '\d+']  ],
        'admin_handle'      =>  ['admin/Admin/adminHandle', ['method' => 'post'] ],
        'role_info/:id'     =>  ['admin/Admin/roleInfo',    ['method' => 'get'], ['id' => '\d+']  ],
        'role_save'         =>  ['admin/Admin/roleSave',    ['method' => 'post'] ],
        'role_del'          =>  ['admin/Admin/roleDel',     ['method' => 'post'] ],
        'login'             =>  ['admin/Admin/login',       ['method' => 'get|post'] ],
        'vertify'           =>  ['admin/Admin/vertify',     ['method' => 'get'] ],
        'logout'            =>  ['admin/Admin/logout',      ['method' => 'get'] ],
        'modify_pwd/:id'    =>  ['admin/Admin/modifyPwd',   ['method' => 'get|post'], ['id' => '\d+'] ],
    ]);
    // 系统
    Route::group('system', [
        'right_list'        =>  ['admin/System/rightList',      ['method' => 'get']  ],
        'edit_right/:id'    =>  ['admin/System/editRight',      ['method' => 'get|post'], ['id' => '\d+']  ],
        'ajax_get_action'   =>  ['admin/System/ajaxGetAction',  ['method' => 'get']  ],
        'clean_cache'        =>  ['admin/System/cleanCache',    ['method' => 'get']  ],
    ]);


},['ext'=>'html']);
