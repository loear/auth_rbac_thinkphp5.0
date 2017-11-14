<?php
/**
 * Created by PhpStorm.
 * User: Guo
 * Date: 2017/11/13
 * Time: 23:17
 */

namespace app\common\model;


class Admin extends Base
{

    public static function getAdminInfo($id)
    {
        return self::where(['id'=>$id])->find();
    }

}