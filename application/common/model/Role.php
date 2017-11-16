<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/15
 * Time: 10:11
 */

namespace app\common\model;


use traits\model\SoftDelete;

class Role extends Base
{
    protected $hidden = ['delete_time'];

    use SoftDelete;

}