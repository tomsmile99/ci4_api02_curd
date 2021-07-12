<?php namespace App\Models\Api\Backend; // กำหนด namespace
use CodeIgniter\Model; // เรียกใช้งาน Model class

class UsersModel extends Model
{
    protected $table      = 'tbl_users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'name', 'username', 'datetime_add'];

}