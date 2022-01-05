<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountsModel extends Model
{
    protected $table      = 'accountstable';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
   
    protected $allowedFields = ['date','purpose','income','expense'];
    protected $updatedField  = 'updated_at';

}