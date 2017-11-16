<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/16
 * Time: 11:14
 */

namespace app\common\model;


use think\Request;

class AdminLog extends Base
{
    protected $hidden = ['create_time', 'update_time', 'delete_time'];

     /**
     * 管理员操作记录
     *
     * @param $log_url 操作URL
     * @param $log_info 记录信息
     * @param $log_type 日志类别 0默认1操作店铺2审核活动3处理投诉4其他
     */
    public function saveLog($log_info, $log_type = 0)
    {
        $this->admin_id = session('admin_id');
        $this->log_info = $log_info;
        $this->log_ip = getIP();
        $this->log_url = Request::instance()->url();
        $this->log_type = $log_type;
        $this->save();
    }

    public function admin()
    {
        return $this->hasOne('Admin', 'id', 'admin_id');
    }


}