<?php

namespace App\Models;

use CodeIgniter\Model;

class ChurchModel extends Model
{
    protected $table      = 'churchtable';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
   
    protected $allowedFields = ['orgId','church','formdate','paddress','city','country','state','district','taluk','pin','mobile','Amobile','email','username','build','remarks','believersN','BbelieversN','youthsN','teenagersN','childrenN','locLat', 'locLong','org','history'];
    protected $updatedField  = 'updated_at';

}