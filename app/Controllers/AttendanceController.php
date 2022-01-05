<?php 
namespace App\Controllers;
use App\Models\MemberModel;
use App\Models\AttendanceModel;
use App\Models\OrgModel;

use CodeIgniter\Controller;

class AttendanceController extends Controller
{
    
    public function __construct(){
      
        $this->mem = new MemberModel(); 
        $this->attend=new AttendanceModel();
        $this->org=new OrgModel();

    }
    
    public function index()    {


        $data1['result']=$this->mem->findAll();
        
        
        
        if(!empty($_POST['occassion']))
        {
            $data=$this->mem->findAll();
            
            $postAtt=$_POST['attend'];
            for($i=0;$i<count($_POST['attend']);$i++)
            {
            foreach($data as $value){
                $mno = $value['id'];
               
                
                if($mno==$postAtt[$i])
    			{
                   
                   $insertdata=['occassion'=>$_POST['occassion'],'memberId'=>$value['id'],'date'=>$_POST['oDate']];
                   
                   $this->attend->save($insertdata);

	    		}
                
            }
            }
        }

        return view('AttendanceView',$data1);       
    }

 
}