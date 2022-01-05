<?php 
namespace App\Controllers;
use App\Models\AccountsModel;
use CodeIgniter\Controller;

class AccountsController extends Controller
{
    private $profile = '' ;
    public function __construct(){
      
        $this->accounts = new AccountsModel(); 
        }
    
    public function index()    {
        if(isset($_POST['date']))
        {
            if($_POST['type']=="Income")
            {
                $income=($_POST['amt']);
            }
            else
            {
                $income=0;
                
            }
            if($_POST['type']=="Expense")
            {
                $expense=($_POST['amt']);
                            }
            else
            {
                $expense=0;
                
            }
            
            $insertData=['date'=>$_POST['date'],'purpose'=>$_POST['purpose'],'income'=>intval($income),'expense'=>intval($expense)];
            
            $this->accounts->save($insertData);
        }
        $accountsData['result']=$this->accounts->findAll();

    return view('AccountsView',$accountsData);       
    }

 
}