<?php
session_start();
ob_start();

 $id = $_GET['id'];


require_once './../../tcpdf/tcpdf.php';
require_once './../../pdoconn/qlicoon.php';
require_once './../../class/ToWords.php';
require_once './../../class/accountant.php';


require_once './../../pdoconn/accountantconfig.php';






$getInstitutionDetail = org_details();

$get_root_url = $accountant ->get_root_url();



 $getSchool_name = $getInstitutionDetail["org_name"];
$getSchoolMotor = $getInstitutionDetail["slogan"];
$cult_council = $getInstitutionDetail["cult_council"];
$getTelephoneNumbers = $getInstitutionDetail["contact_1"] . " / " . $getInstitutionDetail["contact_2"];
$email = $getInstitutionDetail["email"];
$website = $getInstitutionDetail["website"];
$upload_logo_url = $getInstitutionDetail["upload_logo_url"];

//$upload_logo_url = $getInstitutionDetail["email"];


 

$org_logo = $get_root_url.$upload_logo_url;

$get_payment_details_by_id = get_payment_details_by_id($id);

$sum_guest_amount = sum_guest_receipt($id);
 

   

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        
    }

    // Page footer
    public function Footer() {
      
        // Position at 15 mm from bottom
        $this->SetY(-34);
        // Set font
        $this->SetFont('helvetica', '', 11);
        // Page number
//        date_default_timezone_set("Africa/Accra");
//        $this->Cell(0, 10, date("d/m/Y h:i:sa") . " " . 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
//        $takeNote = "<strong><u>FOOTNOTES:</u></strong>";
        $horizontalLine = "<hr />";
        $space = "<p></p>";
       // $msg = "<strong>Received by:</strong> " . $get_payment_details_by_id['paid_by'];
        $sign = "<strong>Signature:</strong> ...................................................";
        $company = "<strong><em>Have a nice stay, hope to see you again!</em></strong>";

        $this->writeHTML($horizontalLine, true, 0, true, 0);
//        $this->writeHTML($takeNote, true, 0, true, 0);
//        $this->writeHTML($space, true, 0, true, 0);
       // $this->writeHTML($get_payment_details_by_id['paid_by'], true, 0, true, 0);
        $this->writeHTML($space, true, 0, true, 0);
        $this->writeHTML($space, true, 0, true, 0);
        $this->writeHTML($sign, true, 0, true, 0);
        $this->writeHTML($company, true, 0, true, 0, 'R');
    }

}

$pdf = new MYPDF("L", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . "/lang/eng.php")) {
    require_once(dirname(__FILE__) . "/lang/eng.php");
    $pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('times', '', 18.5);

// add a page
$pdf->AddPage();
$pdf->setJPEGQuality(75);

//$getTransactionDetails = $payment->getTransactionDetails($_SESSION["pupil_id_ledger"]);

// $iD = $get_payment_details_by_id["receipt_no"];
// if (empty($iD)) {
//     $transactionID = "____________________";
// } else {
//     $transactionID = $get_payment_details_by_id["receipt_no"];
// }

// $transaction_date = date("d-m-Y", strtotime($get_payment_details_by_id["book_date"]));
// if ($transaction_date === "01-01-1970") {
//     $transactionDate = "____________________";
// } else {
//     $transactionDate = date("d-m-Y", strtotime($transaction_date));
// }

$date_sent_ = $get_payment_details_by_id["book_date"];

$no_of_days_ = $get_payment_details_by_id["number_of_days"];

$transactionID = $get_payment_details_by_id["receipt_number"];

//transactionID

$date_convert = date('jS M, Y', strtotime("$date_sent_")).", ".date('l', strtotime("$date_sent_"));

// $time = $get_payment_details_by_id["time_"];
// if (empty($time)) {
//     $transactionTime = "____________________";
// } else {
//     $transactionTime = $get_payment_details_by_id["time_"];
// }

//$feesPaidBy = $get_payment_details_by_id["paid_by"];

// $chequeDraftNumber = $get_payment_details_by_id["mode_of_payment_number"];
// if (empty($chequeDraftNumber)) {
//     $number = "________________";
// } else {
//     $number = $chequeDraftNumber . " ";
// }

$transactionAmount = $sum_guest_amount;
$toWords = new ToWord($transactionAmount);
 

$member_details = member_details($get_payment_details_by_id["guest_id"]);

$user_details = user_details($get_payment_details_by_id["u_id"]);

$getStudentName = $member_details["fullname"];
//if (empty($getStudentName)) {
//    $studentName = "____________________";
//} else {
//    $studentName = $getStudentName;
//}

// $studentID = $member_details["member_id"];
// if (empty($studentID)) {
//     $getStudentID = "____________________";
// } else {
//     $getStudentID = $member_details["member_id"];
// }

// $className = $member_details["house_name"];
// if (empty($className)) {
//     $getClassName = "____________________";
// } else {
//     $getClassName = $member_details["house_name"];
// }



 
 


  
//$schoolLogo = "../../../institution_images/clinic_logo.png";

$heading = "<h4 style='color: #00193a' >" . $getSchool_name . "</h4>";

$add = "<span>" . $cult_council . "</span><br />"
        . "<span>" . $getTelephoneNumbers . "</span><br />"
        . "<span>" . $email . "</span>";


$pdf->Image($org_logo, 5, 7, 40, 21, '', '', '', true, 450, '', false, false, 0, false, false, false);

$sik_head_heading = '<table cellspacing = "0" cellpadding = "5">';
$sik_foot_heading = '</table>';
$sik_heading = '';

$sik_heading .= '
<tbody>
       
      <tr >
      
              <td style="text-align: center;  color: #666;" colspan="4"></td>
    <td style="text-align: left; color: #666;" colspan="4">' . $heading . '</td>
             <td style="text-align: left;  color: #666;" colspan="4">' . $add . '</td>
      </tr >
</tbody>' .
        '<hr style="color: #666"/>';


$pdf->writeHTML($sik_head_heading . $sik_heading . $sik_foot_heading, true, false, true, false, '');

// $horizontalLineII = '<hr style="">'.'</hr>';

$divSaparate = '<div style="width:auto; background-color:#ffb347; height:25px;  border-bottom:3px solid #ddd;padding-bottom:3px;">'.'</div>';
$pdf->writeHTML($divSaparate);
 
 //$pdf->writeHTML($horizontalLineII);
$headingSpace = "<div></div>";
$pdf->writeHTML($headingSpace, true, 0, true, 0);

$schoolFeesReceipt = "<strong>" . "PAYMENT RECEIPT" . "</strong>";
$pdf->writeHTML($schoolFeesReceipt, true, 0, true, 0, 'C');

$headingSpace = "<div></div>";
$pdf->writeHTML($headingSpace, true, 0, true, 0);

//$className = "House: <strong>" . $getClassName . "</strong>";
//$pdf->writeHTML($className, true, 0, true, 0, 'R');

//$paymentDate = "Date: <strong>" . $transactionDate . "</strong>";
//$pdf->writeHTML($paymentDate, true, 0, true, 0, 'R');

//$paymentDate = "Time: <strong>" . $transactionTime . "</strong>";
//$pdf->writeHTML($paymentDate, true, 0, true, 0, 'R');

$receiptNumber = "Receipt No.: <strong>" . $transactionID . "</strong>";
$pdf->writeHTML($receiptNumber, true, 0, true, 0, 'R');

// $studentID = "Student ID: <strong>" . $getStudentID . "</strong>";
// $pdf->writeHTML($studentID, true, 0, true, 0, 'R');

$tbl_head_title = '<table cellspacing = "0" cellpadding = "2" border = "0">';
$tbl_foot_title = '</table>';
$tbl_title = '';

$tbl_title .= '
    <tbody>
      <tr style="color: #000;">
         <!--<td style="text-align: right; width: 10%;">&nbsp;</td>-->
         <td style="text-align: left; width: 90%;">' . "<strong>Received from</strong> " . $getStudentName . '</td>
         <td style="text-align: right; width: 10%;">&nbsp;</td>
      </tr>


      <tr style="color: #000;">
         <!--<td style="text-align: right; width: 10%;">&nbsp;</td>-->
         <td style="text-align: left; width: 90%;">' . "<strong>On: </strong> " . $date_convert . '</td>
         <td style="text-align: right; width: 10%;">&nbsp;</td>
      </tr>

     
      
      <tr style="color: #000;">
         <!--<td style="text-align: right; width: 10%;">&nbsp;</td>-->
         <td style="text-align: left; width: 90%;">' . "<strong>Being</strong> part/full payment for accomodation" . '</td>
         <td style="text-align: right; width: 10%;">&nbsp;</td>
      </tr>

      <tr style="color: #000;">
      <!--<td style="text-align: right; width: 10%;">&nbsp;</td>-->
      <td style="text-align: left; width: 90%;">' . "<strong>For  : </strong>" .  $no_of_days_ ." night(s)". '</td>
      <td style="text-align: right; width: 10%;">&nbsp;</td>
   </tr>
      
      
     
      <tr style="color: #000;">
         <!--<td style="text-align: right; width: 10%;">&nbsp;</td>-->
         <td style="text-align: left; width: 90%;">' . "<strong>Amount Charged:</strong> GH&cent;" . number_format($transactionAmount, 2, ".", ",") . '</td>
         <td style="text-align: right; width: 10%;">&nbsp;</td>
      </tr>

      <tr style="color: #000;">
      <!--<td style="text-align: right; width: 10%;">&nbsp;</td>-->
      <td style="text-align: left; width: 90%;">' . "<strong>Received By : </strong>" .  $user_details['full_name'] . '</td>
      <td style="text-align: right; width: 10%;">&nbsp;</td>
   </tr>
      
      <tr style="color: #000;">
         <!--<td style="text-align: right; width: 10%;">&nbsp;</td>-->
         <td style="text-align: center; width: 90%;">' . "<em>Thank you!</em>" . '</td>
         <td style="text-align: right; width: 10%;">&nbsp;</td>
      </tr>
    </tbody>';

$pdf->writeHTML($tbl_head_title . $tbl_title . $tbl_foot_title, FALSE, false, true, false, '');

$pdf->lastPage();

ob_end_clean();

$pdf->Output();





