<?php 
namespace App\Controllers;
use App\Models\SignupModel;
use CodeIgniter\Controller;

class ResetController extends Controller
{
    private $updatePass = '' ;
    public function __construct(){
      
        $this->updatePass = new SignupModel();       
    }
    
    // show Reset form
    public function index()    {  

        function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }
                helper(['form','url','form_validation']);


     if($_POST!=NULL)
     {
        $userRes =  $this->updatePass->where('user_name',$_POST['user_id'])->first();
        
        $passwordErr=array();$i=0;
               
          
     if($userRes!=Null && $_POST['hint']==$userRes['hint'])
         {
        $session = session();          


        if(!empty($mailErr))
               {  
                  $passwordErr[$i] = $mailErr;
                  $i=$i+1;
               }
          if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
              $password = test_input($_POST["password"]);
              $cpassword = test_input($_POST["cpassword"]);
              
              
              if (strlen($_POST["password"]) <= '8') {

                  $passwordErr[$i] = "Your Password Must Contain At Least 8 Characters!";
                  $i=$i+1;
                  }
              if(!preg_match("#[0-9]+#",$password)) {
                 $passwordErr[$i] = "Your Password Must Contain At Least 1 Number!";
                  $i=$i+1;
                  }
              if(!preg_match("#[A-Z]+#",$password)) {
                $passwordErr[$i] = "Your Password Must Contain At Least 1 Capital Letter!";
                  $i=$i+1;
                  }
              if(!preg_match("#[a-z]+#",$password)) {
                 $passwordErr[$i]="Your Password Must Contain At Least 1 Lowercase Letter!";
                $i=$i+1;
                  }
            }
        elseif(!empty($_POST["password"])) {
            
            $passwordErr[$i] = "Please Check You've Entered Or Confirmed Your Password!";
            $i=$i+1;
            } 
        else {
             $passwordErr[$i] = "Please enter password";
             $i=$i+1;
            }    
                   
        if($passwordErr==Null)
        {
            $data=["user_name"=>$_POST['user_id'],"password"=>password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)];
                       
              $this->updatePass->update($userRes['id'], $data);
               if($this->updatePass->update($userRes['id'],$data)==true)
                {
                 $session->setFlashdata("user_id",$_POST['user_id']);
                 $session->setFlashdata("success","Password Reset Successfully");
                 return view('LoginView');
                }
        }
        else
        {
             $session->setFlashdata('failure', $passwordErr);
            return view('ResetHintView');
        }
         }
         elseif($userRes==Null) 
         {
            $session = session();
            $passwordErr[$i] = "Wrong Email";
            $i=$i+1;
            $session->setFlashdata('failure', $passwordErr);
            return view('ResetHintView');
         }
         else{
            
            
            $session = session();
            $passwordErr[$i] = "Wrong Hint";
            $i=$i+1;

            $session->setFlashdata('failure', $passwordErr);
            return view('ResetHintView');
           } 
     }
         return view('ResetHintView');
    }       

}