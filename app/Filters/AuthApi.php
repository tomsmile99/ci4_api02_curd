<?php namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
use \Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Exception;

// แบบใช้ jwt token ควรใช้เฉพาะตอน auth User ที่จะ Login เข้าใช้ระบบ
/*
Class AuthApi implements FilterInterface
{   
    public function before(RequestInterface $request, $arguments = null)
    {  

        $key = "secret_key";
        /*
        $payload =[
            "iss" => "https://www.saksiam.com",  // ผู้ออก
            // "sub" => "admin@sss.com", // ข้อมูล
            // "iat" => time(), // เวลาออก timestamp
            // "exp" => time()+300 // เวลาหมดอายุ 5 นาที
        ];
        $jwt = JWT::encode($payload, $key); // ได้ค่า token     
        echo $jwt;
        
        
        list(,$jwt) = explode(" ",$request->getHeaderLine('Authorization'));             
        try {
            $decoded = JWT::decode($jwt, $key, array('HS256'));
            header('Access-Control-Allow-Origin: *');
            header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
            $method = $_SERVER['REQUEST_METHOD'];
            if($method == "OPTIONS") {
                die();
            }
        } catch (ExpiredException $e) {
            $response = service('response');
            $data = [
                "status" => 401,
                "error" => 401,
                "messages" => [
                    "error"  => "Token expired"
                ]
            ];
            return $response->setStatusCode(401)->setJSON($data);             
        } catch (Exception $e){
            $response = service('response');
            $data = [
                "status" => 401,
                "error" => 401,
                "messages" => [
                    "error"  => "Unauthorized"
                ]
            ];
            return $response->setStatusCode(401)->setJSON($data);     
        }
        
    }
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
      // Do something here
    }
}
*/


// แบบไม่ได้ใช้ jwt token

Class AuthApi implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
          die();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
      // Do something here
    }
}
