<?php 
namespace App\Controllers;
use App\Models\MemberModel;
use App\Models\ChurchModel;
use CodeIgniter\Controller;

class MemberController extends Controller
{
    private $profile = '' ;
    public function __construct(){
        $this->church = new ChurchModel();
        $this->org = new MemberModel();       
    }
    
    public function index()    {

         $church['result']=$this->church->findAll();
           // print_r($church);   
        if(isset($_POST['member']))
        {

            
            $validateMemberPhoto = ['memberimage' => ['uploaded[memberimage]',
                'mime_in[memberimage,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[memberimage,4096]']];
                
                if($_POST['baptized']==1)
                {
                $validateDeclaration = ['declaration' => ['uploaded[declaration]',
                'mime_in[declaration,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[declaration,4096]']];
                 if($this->validate($validateDeclaration))
                 {
                   $fileDeclaration=$this->request->getFile('declaration');
                   $decName=$fileDeclaration->getName();
                   $fileDeclaration->move('./uploads');  
                 }
                }
                else{
                    $decName="";
                }

            
                  
                if($this->validate($validateMemberPhoto))
                {
                   $file=$this->request->getFile('memberimage');
                   $picName=$file->getName();
                   $file->move('./uploads');
          
                   $insertdata=['cid'=>$_POST['cid'],'member'=>$_POST['member'],'bOrp'=>$_POST['bOrp'],'paddress'=>$_POST['paddress'],
                         'city'=>$_POST['city'],'country'=>$_POST['country'],'state'=>$_POST['state'],
                         'district'=>$_POST['district'],'taluk'=>$_POST['taluk'],'pin'=>$_POST['pin'],
                         'email'=>$_POST['email'],'cnumber'=>$_POST['cnumber'],
                         'wnumber'=>$_POST['wnumber'],'dob'=>$_POST['dob'],'gender'=>$_POST['gender'],
                         'equalification'=>$_POST['equalification'],'skills'=>$_POST['skills'],
                         'involve'=>$_POST['involve'],'involve'=>$_POST['involve'],
                         'cnumber'=>$_POST['cnumber'],'wnumber'=>$_POST['wnumber'],'email'=>$_POST['email'],
                         'baptized'=>$_POST['baptized'],'declaration'=>$decName,
                         'adhar'=>$_POST['adhar'],'memberimage'=>$picName];
                         
                         $this->org->save($insertdata);
            
                }
                else{
               return view('MemberView');
                } 
        }
          
    

             return view('MemberView',$church);
    }

 
}