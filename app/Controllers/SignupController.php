<?php 
namespace App\Controllers;
use App\Models\SignupModel;
use CodeIgniter\Controller;

class SignupController extends Controller
{
    
    // show signup form
    public function index()    {  
        helper(['form']);

        $session = session();  
        $session->setFlashdata('msg', '');
    return view('SignupView');
    }      

    //check user is exist or not
    public function signup(){
        helper(['form','url','form_validation']);
        
        $email = $_POST["email"];
  print "Revathy Stalin";
        // Validate email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $mailErr="";    
        } 
        else {
            $mailErr="Invalid email address";
        }
          function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }

                 $passwordErr=array();$i=0;
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
                $passwordErr[$i] = "Your Password Must Contain At Least 1 Lowercase Letter!";
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
                   

            if(empty($passwordErr) &&  empty($mailErr))
            {
              // Load encryption library
             // $this->load->library('encrypt');

              $signupDataObject=new SignupModel();
               if($signupDataObject->save([
                  'user_name'=>$this->request->getVar('email'),
                  'password'=>password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                  'hint'=>$this->request->getVar('hint')
                ]


                )==true)
                {
                  $s=session();       
              $s->setFlashdata("success","<div class='alert alert-success'>Account Created Successfully. Login to Proceed</div>");
              return redirect()->to('http://localhost/Weblog/LoginController');

                }
                else
                {
                $s=session();
                $errMsg=array("Account already exists");
                $s->setFlashdata('failure',$errMsg);
              return redirect()->to('http://localhost/Weblog/SignupController');
                }
                          }  
            elseif(empty($passwordErr))
            {
              $s=session();
                $s->setFlashdata('failure',$passwordErr);
              return redirect()->to('http://localhost/Weblog/SignupController');
            }
            else
            {
                $s=session();
              $s->setFlashdata('failure',$passwordErr);
              return redirect()->to('http://localhost/Weblog/SignupController');
            }
 
    
    /*     return view('Home',$data);
       // return view('welcome_message');

        $data = array('user_name'=>$this->request->getVar('user_id'),'password'=>md5($this->request->getVar('password')));       
        $user =  $this->login->where($data); 
        $rows = $this->login->countAllResults();
        $session = session();          
        if($rows==1){
            return view('success');
        }else{
            $session->setFlashdata('msg', 'Invalid User');
            return view('LoginView');
        } 
     } */
}

}