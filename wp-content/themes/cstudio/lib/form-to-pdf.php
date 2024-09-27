<?php

add_action('wpcf7_before_send_mail', 'wpcf7_update_email_body');
function wpcf7_update_email_body($contact_form) {

$submission = WPCF7_Submission::get_instance();
if ( $submission ) {
/* DEFINE CONSTANT AND GET FPDF CLASSES */
define ('FPDF_PATH',get_template_directory().'/fpdf/'); // MAKE SURE THIS POINTS TO THE DIRECTORY IN YOUR THEME FOLDER THAT HAS FPDF.PHP
require(FPDF_PATH.'fpdf.php');

$posted_data = $submission->get_posted_data();
// SAVE FORM FIELD DATA AS VARIABLES
$name = $posted_data["your-name"];
$email = $posted_data["your-email"];
$subject = $posted_data["your-subject"];
$message = $posted_data["your-message"];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Write(5,$name . "\n\n" . $email . "\n\n" . $subject . "\n\n" . $message);
$pdf->Output(FPDF_PATH.'test.pdf', 'F'); // OUTPUT THE NEW PDF INTO THE SAME DIRECTORY DEFINED ABOVE

}
}

add_filter( 'wpcf7_mail_components', 'mycustom_wpcf7_mail_components' );
function mycustom_wpcf7_mail_components($components){
if (empty($components['attachments'])) {
$components['attachments'] = array(FPDF_PATH .'test.pdf'); // ATTACH THE NEW PDF THAT WAS SAVED ABOVE
}
return $components;
}