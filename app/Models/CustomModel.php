<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class CustomModel extends Model
{
 
    protected $db;
    public function _construct(ConnectionInterface &$db)
     {
         $this->db=& $db;
     }
     function getOccassion()
     {
         $builder=$this->db->table('attendancetable');
         $sql="select date,count(distinct occassion) as occCnt from attendancetable group by date";
         $builder->select("date");
         $builder->distinct();
         $builder->select("occassion");
         $occassion=$builder->get()->getResult();
         return $occassion;

     }


}