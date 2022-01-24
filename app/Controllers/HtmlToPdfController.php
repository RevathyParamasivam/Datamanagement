<?php 
namespace App\Controllers;
use App\Models\MemberModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;


class HtmlToPdfController extends Controller
{
    
    public function __construct(){
      
        $this->member = new MemberModel();
        
        
        }
    
    public function index()    {
        $data['customer_data']=$this->member->findAll();
        return view('htmlToPdfView',$data);
    }
    public function details($customer_id)    {
        
            $data=$this->member->where('id',$customer_id)->findAll();
            
            $output='
             <style>
            
            @font-face {
            font-family:"Kruti Dev 001";
            font-style: normal;
            font-weight: normal;
            src: url(http:localhost/Datamanagement/fonts/Kruti Dev 011.ttf) format("truetype");
            }
            
            </style>
            <table width="100%" cellspacing="5" cellpadding="5">
            <tr>
                <td width="25%"><img src="http://localhost/Datamanagement/uploads/'.$data[0]['memberimage'].'"/></td>
                <td width="75%">
                    <p><b>Name:</b>'.$data[0]['member'].'</p>
                    <p><b>Address:</b></p>
                    <p>'.$data[0]['paddress'].'</p>
                    <p style="font-family: Kruti Dev 011"><b>City:</b>'.$data[0]['city'].'</p>
                    <p><b>Pin:</b>'.$data[0]['pin'].'</p>
                </td>
            </tr></table>';
            $data1['customer_details']=$output;
            return view('htmlToPdfView',$data1);        
    }
    public function pdfdetails($customer_id)    {
        
           //require_once("dompdf_config.inc.php");

            $data=$this->member->where('id',$customer_id)->findAll();
            $image_path='';
            $output='
            <html>
            <head>
            <meta http-equiv="Content-Type" content="charset=utf-8"/>
            </head>
            <style>
            @font-face {
            font-family:"bboo";
            src: url(http:localhost/Datamanagement/vendor/dompdf/dompdf/lib/fonts/bboo.ttf) format("truetype");
            }
            <style>
            @font-face {
            font-family:"Kruti Dev 011";
            font-style: normal;
            font-weight: normal;
            src: url(http:localhost/Datamanagement/vendor/dompdf/dompdf/lib/fonts/KrutiDev011.ttf) format("truetype");
            }
            #add
            {
                font-family: "DejaVu Sans Mono", monospace;
              
                border: solid 1px black;
                font-size: 28px;
            }
            </style>
            
            </head>
            <body>
            <table width="100%" cellspacing="5" cellpadding="5">
            <tr>
                <td width="75%"><img src="http://localhost/Datamanagement/uploads/'.$data[0]['memberimage'].'"/></td>
                <td width="25%">
                    <p><b>Name:</b>'.$data[0]['member'].'</p>
                    
                    <p style="font-family: DejaVu Sans Mono" ><b>Address:</b></p>
                    <p id="add" style="font-family: Bamini">revathy'.$data[0]['paddress'].'</p>
                    <p><b>City:</b>'.$data[0]['city'].'</p>
                    <p style="font-family: bboo">Test Data'.$data[0]['involve'].'Test Data</p>
                    <p><b>Pin:</b>'.$data[0]['pin'].'</p>
                    
                    
                </td>
            </tr></table>
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
            $pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
            
        /*
            $pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		$data=$this->member->where('id',$customer_id)->findAll();
		
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(15,10,$data[0]['member'],1,0,'C');
			$pdf->Cell(65,10, $data[0]['paddress'],1,0,'C');
			$pdf->Cell(60,10, $data[0]['city'],1,0,'C');
			$pdf->Cell(55,10, $data[0]['pin'],1,1,'C');
			
		
		$curdate = date('d-m-Y His');
		$pdf->Output('product_report'.$curdate.'.pdf', 'I');
        */
    }

 
}