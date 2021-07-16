<?php

namespace App\Controllers\Fontend;
use CodeIgniter\RESTful\ResourceController;  // ใช้งาน ResourceController class
use CodeIgniter\API\ResponseTrait; // เรียกใช้  ResponseTrait class
//use App\Models\Api\Bankend\UsersModel as UsersModel; // กรณีต้องประกาศ  $model = new UsersModel; ตลอด

class BannerslideController extends ResourceController
{
    use ResponseTrait; // .ใช้  ResponseTrait เพื่อเปิดใช้ Api
    protected $modelName = 'App\Models\Api\Fontend\BannerSlideimgModel'; //เรียกใช้งาน Model 
    protected $format    = 'json';

	public function index() // get all Data
	{   
        //echo "มาละๆ";
		$res = $this->model->select('id,name_slide,name_slide_rp,link_slide,order_slide,status_slide')
        ->where('status_slide =', '1')
        ->orderBy('order_slide', 'ASC')
        ->findAll();
        // return $this->respond($getusesrM, 200);
        return $this->response
            ->setStatusCode(200)
            ->setJSON($res);
	}
}
