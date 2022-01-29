<?php 
namespace App\Controllers;
use App\Models\AccountsModel;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use CodeIgniter\API\ResponseTrait;

class AccountsController extends Controller
{
    private $profile = '' ;
    use ResponseTrait;

    public function __construct(){
      
        $this->accounts = new AccountsModel(); 
        }
    
    public function index()    {
        
        $accountsData['result']=$this->accounts->findAll();

            return view('TestView',$accountsData);       
         }
        public function store()    {  
            echo "<script>console.log('Debug Objects:');</script>";

           
           $data=[
               'date'=>$_POST['date'],
               'head'=>$_POST['head'],
               'type'=>$_POST['type'],
               'purpose'=>$_POST['purpose'],
               'expense'=>$_POST['amt'],
               'income'=>$_POST['amt']
           ];
           
            if($_POST['type']=="Income") { $data['income']=$_POST['amt']; }
            else { $data['income']=0; }

            if($_POST['type']=="Expense") { $data['expense']=$_POST['amt']; }
            else { $data['expense']=0; }
            
            $insertData=['date'=>$_POST['date'],'head'=>$_POST['head'],'purpose'=>$_POST['purpose'],'income'=>intval($data['income']),'expense'=>intval($data['expense'])];
            
            $this->accounts->save($insertData);
            $data=$this->accounts->findAll();
            //$returnData=array('status'=>'Account Inserted Succesfully');
            //header('Content-Type: application/json');
            echo json_encode( $data );
           
           //return view('AccountsView');  
           }

        public function fetch($data)    {  
            $data=$this->accounts->where('id',$data)->first();
            $session=session();
            $session->setFlashdata('action',"fetch");
            $session->setFlashdata('accId',$data['id']);
            $session->setFlashdata('purpose',$data['purpose']);
            $session->setFlashdata('date',$data['date']);
            $session->setFlashdata('head',$data['head']);
            $session->setFlashdata('income',$data['income']);
            $session->setFlashdata('expense',$data['expense']);
            $data1['result']=$this->accounts->findAll();
            
            return view('AccountsView',$data1); 
           }
         public function delete($data)    {  
           $data=$this->accounts->where('id',$data)->first();
           $deleteObject = new AccountsModel();
           $deleteObject->delete($data);
           $data1['result']=$this->accounts->findAll();
           return view('AccountsView',$data1);   
           }

        function exportExcel()
	        {   
		    $data1=$this->accounts->findAll();

			$file_name = 'accountsdata.xlsx';

		    $spreadsheet = new Spreadsheet();
		    $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('C1', 'Accounts Statement');
		    $sheet->setCellValue('A2', 'S.No');
		    $sheet->setCellValue('B2', 'Date');
		    $sheet->setCellValue('C2', 'Ledger Head');
    		$sheet->setCellValue('D2', 'Purpose');
            $sheet->setCellValue('E2', 'Income');
            $sheet->setCellValue('F2', 'Expense');  
		    $count = 3;
            $sno=1;
            $cashonhand=0;
    		foreach($data1 as $row)
	    	{
			$sheet->setCellValue('A' . $count, $sno); $sno++;
			$sheet->setCellValue('B' . $count, $row['date']);
			$sheet->setCellValue('C' . $count, $row['head']);
			$sheet->setCellValue('D' . $count, $row['purpose']);
            $sheet->setCellValue('E' . $count, $row['income']);
            $sheet->setCellValue('F' . $count, $row['expense']);
			$cashonhand=$cashonhand+$row['income']-$row['expense'];
            $count++;
    		}
            $sheet->setCellValue('C' . $count, "Cash on Hand");
            $sheet->setCellValue('F' . $count, $cashonhand);
	    	$writer = new Xlsx($spreadsheet);
    		$writer->save($file_name);
	        header("Content-Type: application/vnd.ms-excel");
    		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
    		header('Expires: 0');
    		header('Cache-Control: must-revalidate');
    		header('Pragma: public');
    		header('Content-Length:' . filesize($file_name));
    		flush();
    		readfile($file_name);
    		exit;
	    }
        public function exportPdf()    {
            $data=$this->accounts->findAll();
            
            $output='
            <html>
            <head>
            <meta http-equiv="Content-Type" content="charset=utf-8"/>
            <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(odd) {
            background-color: #dddddd;
            }
            </style>
            </head>
            <body>
            <h1 style="text-align:center">Accounts Statement</h1>
            <table width="100%" cellspacing="5" cellpadding="5">
            <tr>
                <td width="5%">S.No</td>
                <td width="20%">Date</td>
                <td width="20%">Ledger Head</td>
                <td width="30%">Purpose</td>
                <td width="20%">Income</td>
                <td width="20%">Expense</td>
            </tr>';
            $sno=1;$cashonhand=0;
            foreach($data as $row)	{
            $output=$output.' 
            <tr>
                <td width="20%">'.$sno.'</td>
                <td width="20%">'.$row['date'].'</td>
                <td width="20%">'.$row['head'].'</td>
                <td width="20%">'.$row['purpose'].'</td>
                <td width="20%">'.$row['income'].'</td>
                <td width="20%">'.$row['expense'].'</td>
            </tr>';
            $cashonhand=$cashonhand+$row['income']-$row['expense'];
            $sno++;
            }
            $output=$output.'
            </table>
            <h2 style="text-align:center">Cash on hand  : Rs. '.$cashonhand.'</h2>
            </body>
            </html>
            ';
            
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('isUnicodeEnabled', TRUE);
            $options->set('isHtml5ParserEnabled', TRUE);
            //$dompdf->set_option('isHtml5ParserEnabled', true);)
            $pdf=new Dompdf($options);
            
            $pdf->loadHtml($output);
            $pdf->render();
            $pdf->stream("accounts.pdf", array("Attachment"=>1));
        }      
 
 
}