<?php 
namespace App\Controllers;
use App\Models\SignupModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    private $login = '' ;
    public function __construct(){
        $this->login = new SignupModel();       
    }
    public function index()    {  
        return view('LoginView');
    }      
    //check user is exist or not
    public function login(){
        $session = session();
        $userRes =  $this->login->where('user_name',$_POST['user_id'])->first();
        if($userRes!=Null)
        {
        $verify = password_verify($_POST['password'], $userRes['password']);
        }
                  
        if($userRes!=Null && $verify){
            $session->setFlashdata("lid1",$userRes['id']);
            $session->setFlashdata("user_name",$userRes['user_name']);
            $_SESSION['lid1'] = $userRes['id'];
                        return redirect()->to(base_url('ProfileController'));
        }
        else{
            $session->setFlashdata('fail', "Invalid User");
            return view('LoginView');
        } 
     }
}