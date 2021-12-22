<?php

namespace App\Models;

use CodeIgniter\Model;

class ChurchModel extends Model
{
    protected $table      = 'churchtable';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['church','formdate','paddress','city','country','state','district','taluk','pin','mobile','Amobile','email','username','build','remarks','believersN','BbelieversN','youthsN','teenagersN','childrenN','locLat', 'locLong','org','history'];
    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    //protected $validationRules    = ["email"=>"is_unique[user.email]"];
    //protected $validationMessages = ["email"=>["is_unique"=>"This Email already exists"]];
    //protected $skipValidation     = false;

    

}