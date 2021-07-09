<?php

namespace App\Controllers\Backend;
use CodeIgniter\RESTful\ResourceController;  // ใช้งาน ResourceController class
use CodeIgniter\API\ResponseTrait; // เรียกใช้  ResponseTrait class
//use App\Models\Api\Bankend\UsersModel as UsersModel; // กรณีต้องประกาศ  $model = new UsersModel; ตลอด

class UsersController extends ResourceController
{
    use ResponseTrait; // .ใช้  ResponseTrait เพื่อเปิดใช้ Api
    protected $modelName = 'App\Models\Api\Backend\UsersModel'; //เรียกใช้งาน Model 
    protected $format    = 'json';

	public function index() // get all Data
	{
		$res = $this->model->select('id_user,name,username')
            ->findAll();
        // return $this->respond($getusesrM, 200);
        return $this->response
            ->setStatusCode(200)
            ->setJSON($res);
	}

    public function create() // create a Data
    {
        // echo "<per>";
        // print_r($_POST);
        // echo "</per>";
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'datetime_add' => $now = date('Y-m-d H:i:s'),
        ];
        $data = json_decode(file_get_contents("php://input"));

        $this->model->insert($data);
    
        $response = [
            'status'   => 201,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function show($id = null) // ดึงข้อมูลมาเแสดงพื่อแก้ไข
    {
        $data = $this->model->getWhere(['id_user' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    public function update($id = null) //แก้ไขข้อมูล
    {
        $json = $this->request->getJSON();
        if($json){
            $data = [
                'name' =>   $json->name,
                'username' => $json->username,
            ];
        }else{
            $input = $this->request->getRawInput();
            $data = [
                'name' => $input['name'],
                'username' => $input['username'],
            ];
        }
        // Update to Database
        $this->model->update($id, $data);
        $response = [
            'status'   => 200,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null) //ลบข้อมูล
    {
        $data = $this->model->find($id);
        if($data){
            $this->model->delete($id);
            $response = [
                'status'   => 200,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
         
    }
}
