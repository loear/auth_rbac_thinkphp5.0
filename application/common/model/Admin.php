<?php
/**
 * Created by PhpStorm.
 * User: Guo
 * Date: 2017/11/13
 * Time: 23:17
 */

namespace app\common\model;

use traits\model\SoftDelete;

class Admin extends Base
{
    protected $hidden = ['delete_time'];
    use SoftDelete;

    public static function getAdminInfo($id)
    {
        return self::where(['id'=>$id])->find();
    }

    public function role()
    {
        return $this->hasOne('Role', 'id', 'role_id');
    }

}