<?php 
namespace App\Controllers;
use App\Models\OrgModel;
use CodeIgniter\Controller;

class OrgController extends Controller
{
    private $profile = '' ;
    public function __construct(){
      
        $this->org = new OrgModel();       
    }
    
    public function index()    { 
        if(isset($_POST['viewButton']))
        {
            echo "View Test";
            $data=$this->org->where('id',$_POST['viewButton'])->first();
            $session=session();
            $session->setFlashdata('action',"view");
            $session->setFlashdata('orgId',$data['id']);
            $session->setFlashdata('name',$data['org']);
            $session->setFlashdata('formdate',$data['formdate']);
        
            $data1['result']=$this->org->findAll();
            return view('OrgView',$data1);
         }
        if(isset($_POST['org']))
        {
            $validated = ['logoimage' => ['uploaded[logoimage]',
                'mime_in[logoimage,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[logoimage,4096]']];
                if($this->validate($validated))
                {
                   $file=$this->request->getFile('logoimage');
                   $picName=$file->getName();
                   $file->move('./uploads');
          
                   $insertdata=['org'=>$_POST['org'],'formdate'=>$_POST['formdate'],'paddress'=>$_POST['paddress'],
                         'city'=>$_POST['city'],'country'=>$_POST['country'],'state'=>$_POST['state'],
                         'district'=>$_POST['district'],'taluk'=>$_POST['taluk'],'pin'=>$_POST['pin'],
                         'mobile'=>$_POST['mobile'],'Amobile'=>$_POST['Amobile'],'email'=>$_POST['email'],
                         'username'=>$_POST['username'],'remarks'=>$_POST['remarks'],
                         'locLat'=>$_POST['lat'],'locLong'=>$_POST['lng'],'logoimage'=>$picName];
                         $this->org->save($insertdata);
            
                }
                else{
               return view('OrgView');
                } 
        }
          
    
        $data1['result']=$this->org->findAll();
             return view('OrgView',$data1);
    }

    public function view($data)    {  
           $data=$this->org->where('id',$data)->first();
           $session=session();
           $session->setFlashdata('action',"view");
           $session->setFlashdata('orgId',$data['id']);
         $session->setFlashdata('name',$data['org']);
         $session->setFlashdata('formdate',$data['formdate']);
        $data1['result']=$this->org->findAll();
            return view('OrgView',$data1);   }


}