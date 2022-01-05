<?php 
namespace App\Controllers;
use App\Models\ChurchModel;
use App\Models\OrgModel;
use CodeIgniter\Controller;

class ChurchController extends Controller
{
    private $profile = '' ;
    public function __construct(){
      
        $this->church = new ChurchModel();
        $this->org = new  OrgModel();       
    }
    
    public function index()    { 

        $orgData['result']=$this->org->findAll();
                
        if(isset($_POST['church']))
        {
            $validated = ['logoimage' => ['uploaded[logoimage]',
                'mime_in[logoimage,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[logoimage,4096]']];
                /*if($this->validate($validated))
                {
                   //$file=$this->request->getFile('logoimage');
                   //$picName=$file->getName();
                   //$file->move('./uploads'); */
          
          $insertdata=['church'=>$_POST['church'],'formdate'=>$_POST['formdate'],'paddress'=>$_POST['paddress'],
                         'city'=>$_POST['city'],'country'=>$_POST['country'],'state'=>$_POST['state'],
                         'district'=>$_POST['district'],'taluk'=>$_POST['taluk'],'pin'=>$_POST['pin'],
                         'mobile'=>$_POST['mobile'],'Amobile'=>$_POST['Amobile'],'email'=>$_POST['email'],
                         'username'=>$_POST['username'],'build'=>$_POST['build'],'remarks'=>$_POST['remarks'],
                         'believersN'=>$_POST['believersN'],'BbelieversN'=>$_POST['BbelieversN'],'youthsN'=>$_POST['youthsN'],
                         'teenagersN'=>$_POST['teenagersN'],'childrenN'=>$_POST['childrenN'],'locLat'=>$_POST['lat'],
                         'locLong'=>$_POST['lng'],'orgId'=>$_POST['orgId'],'history'=>$_POST['history']];
            $this->church->save($insertdata);
        /*        }
                else{
               return view('ChurchView');
                }*/ 
        }
          
    

             return view('ChurchView',$orgData);
    }

    public function delete($data)    {  

              $deleteObject = new ChurchModel();
              $deleteObject->delete($data);
        
    return redirect()->to(base_url('ChurchController'));
    }


    public function update($sourceId)    {  
         $session = session();  
         $session->setFlashdata('sourceId', $sourceId);
          return view('UpdateView');
    }


    public function logout()    {  

        if(session()->has('id'))
          {
          session()->destroy('id');
         }
    return redirect()->to(base_url('Home'));
    }    

}