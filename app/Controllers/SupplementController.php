<?php 
namespace App\Controllers;
use App\Models\ProfileModel;
use CodeIgniter\Controller;

class SupplementController extends Controller
{
    private $profile = '' ;
    public function __construct(){
      
        $this->profile = new ProfileModel();       
    }
    
  
    public function index()    {  

       $data1['result']=$this->profile->findAll();
             return view('SupplementView',$data1);
    }      

    
}