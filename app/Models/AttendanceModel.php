<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model
{
    protected $table      = 'attendancetable';
  
    protected $useAutoIncrement = true;
    
    protected $allowedFields = ['occassion','date','memberId'];
    protected $updatedField  = 'updated_at';

}