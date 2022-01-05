<?php 
namespace App\Controllers;
use App\Models\AccountsModel;
use App\Models\AttendanceModel;
use App\Models\MemberModel;
use App\Models\OrgModel;
use App\Models\ChurchModel;

use App\Models\CustomModel;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    private $profile = '' ;
    public function __construct(){
        
        $this->church = new ChurchModel();  
        $this->member = new MemberModel();
        $this->org = new OrgModel();
        $this->accounts = new AccountsModel();
        $this->attendance = new AttendanceModel(); 

    }
    
  
    public function index()    {  

        $datachurch=$this->church->findAll();
        $dataorg=$this->org->findAll();
        $datamember=$this->member->findAll();
        $dataaccounts=$this->accounts->findAll();
              
        $sql="Select * from churchtable";
        $db = db_connect();
        $model=new CustomModel($db);
        $query = $db->query($sql);
              
        $attendance=$model->getOccassion();
        $session = session();
        $session->setFlashdata("church",sizeof($datachurch));
        $session->setFlashdata("member",sizeof($datamember));
        $session->setFlashdata("org",sizeof($dataorg));
        $session->setFlashdata("accounts",sizeof($dataaccounts));
        $session->setFlashdata("attendance",sizeof($attendance));

             return view('DashboardView');

    }      

    
}