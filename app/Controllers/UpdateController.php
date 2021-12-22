<?php 
namespace App\Controllers;
use App\Models\ProfileModel;
use CodeIgniter\Controller;

class UpdateController extends Controller
{

    public function index()    {  
        
        return view('UpdateView');
    }


}