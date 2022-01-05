<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table      = 'membertable';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['cid','member','bOrp','church','paddress','city','country','state','district','taluk','pin','email','cnumber','wnumber','dob','gender','equalification','skills','involve','baptized','declaration','adhar','memberimage'];
    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    //protected $validationRules    = ["email"=>"is_unique[user.email]"];
    //protected $validationMessages = ["email"=>["is_unique"=>"This Email already exists"]];
    //protected $skipValidation     = false;

    

}