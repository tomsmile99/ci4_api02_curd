<?php namespace App\Models\Api\Fontend; // กำหนด namespace
use CodeIgniter\Model; // เรียกใช้งาน Model class

class BannerSlideimgModel extends Model
{
    protected $table      = 'slide_index';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name_slide', 'name_slide_rp', 'link_slide', 'order_slide', 'status_slide'];

}