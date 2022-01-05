<?php

namespace App\Models;

use CodeIgniter\Model;

class OrgModel extends Model
{
    protected $table      = 'orgtable';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['orgId','formdate','paddress','city','country','state','district','taluk','pin','mobile','Amobile','email','username','remarks','locLat', 'locLong','logoimage'];
    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    //protected $validationRules    = ["email"=>"is_unique[user.email]"];
    //protected $validationMessages = ["email"=>["is_unique"=>"This Email already exists"]];
    //protected $skipValidation     = false;

    

}