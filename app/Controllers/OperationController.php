<?php 
namespace App\Controllers;
use App\Models\ProfileModel;
use CodeIgniter\Controller;

class OperationController extends Controller
{
    private $profile = '' ;
    public function __construct(){
      
        $this->profile = new ProfileModel();       
    }
    
    public function index()    {

                if(isset($_POST['source']))
       {

        $data=['source'=>$_POST['source'],'benefits'=>$_POST['benefits']];

        $this->profile->update($_POST['sourceId'],$data);
        $session = session();  
        $session->setFlashdata('sourceId', session()->get('sourceId'));
        $session->setFlashdata('lid1', session()->get('lid1'));
         $session->setFlashdata("user_name",$session->get('user_name'));
        return redirect()->to(base_url('ProfileController'));
        
        }
                      
    }

    public function delete($data)    {  

              $deleteObject = new ProfileModel();
              $deleteObject->delete($data);
             return redirect()->to(base_url('ProfileController'));
    }
    public function update($sourceId)    {  

        $data1=$this->profile->where('id',$sourceId)->first();

              $source=$data1['source'];
             $benefits=$data1['benefits'];
         
             $session = session();  
         $session->setFlashdata('sourceId',$sourceId);
         $session->setFlashdata('source',$source);
         $session->setFlashdata('benefits',$benefits);
         $session->setFlashdata('lid1', session()->get('lid1'));
         return view('UpdateView');
        

    }
 

}