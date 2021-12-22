<?php

namespace App\Models;

use CodeIgniter\Model;

class SignupModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['user_name', 'password','hint'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    //protected $validationRules    = ["email"=>"is_unique[user.email]"];
    //protected $validationMessages = ["email"=>["is_unique"=>"This Email already exists"]];
    //protected $skipValidation     = false;

    

}