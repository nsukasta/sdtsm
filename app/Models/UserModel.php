<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\PseudoTypes\True_;



class UserModel extends Model
{
    protected $table = 'user';

    protected $allowedFields = ['nilai'];

    public function getUser($id = false)
    {
        if ($id == false) {

            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }


    public function add($data)
    {
      $this->db->table('user')->insert($data);
    }

 

}