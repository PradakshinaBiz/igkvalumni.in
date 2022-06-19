<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use TCPDF;
class Test extends BaseController
{
    public function index()
    {
        //
    }

    public function mail() {
       $mail_content = <<< SHUBHKAMNA
         <h1>Hiiiiiii</h1>
SHUBHKAMNA;
       $data['content'] = $pdf_content;
       $email = \Config\Services::email();
       $config['mailType'] = 'html';
       $email->initialize($config);
       $email->setFrom('info@deancoaryp.in', 'deancoaryp.in');
       $email->setTo('krishna.shubhkamna@gmail.com');
       $email->setSubject('Email Test');
       $email->setMessage($mail_content);
       echo $email->send();
   }
   public function pdf() {
       $uniq_id = uniqid();
       $pdf_content = <<< SHUBHKAMNA
           <h1>Hiiiiiii</h1>

SHUBHKAMNA;
       $data['content'] = $pdf_content;
       $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
       $pdf->SetCreator(PDF_CREATOR);
       $pdf->setPrintHeader(false);
       $pdf->setPrintFooter(false);
       $pdf->SetFont('dejavusans', '', 10);
       $pdf->AddPage();
       $pdf->writeHTML($pdf_content);
       $pdf_file = $uniq_id . ".pdf";
       $pdf->Output("/www/deancoaryp.in/writable/uploads/pdf/" . $pdf_file, 'F');
   }
}
