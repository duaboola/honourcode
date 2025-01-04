<?php
date_default_timezone_set('Asia/Bahrain');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ( send_mail() )
{
    
    echo "success";
}

function send_mail()
{
	global $_POST;
    
    $name           = $_POST["name"];
    $email          = $_POST["email"];
    $msg_subject    = $_POST["msg_subject"];
    $message        = $_POST["message"];

	$mail = new PHPMailer(true);

	try 
	{
		$mail->isSMTP();
		$mail->SMTPDebug 	= false;
		$mail->Host       	= 'smtp.office365.com';
		$mail->SMTPAuth   	= true;
		$mail->Username   	= 'announcements@gulfuniversity.edu.bh';
		$mail->Password   	= 'zfrrhkpfrbncytvr';
		$mail->SMTPSecure 	= PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port       	= 587;
		$mail->CharSet      = 'UTF-8';
		
		$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		); 
		
		//Recipients
		$mail->setFrom('announcements@gulfuniversity.edu.bh', 'Gulf University');
		$mail->addAddress("dr.mohammed.alshekhly@gulfuniversity.edu.bh", "Assoc. Prof. Dr. Mohammed N. Abdulrazaq Alshekhly");
		$mail->addBCC("itd@gulfuniversity.edu.bh", "Muhammad Ali Kolachi");
        #$mail->addAddress("itd@gulfuniversity.edu.bh", "Muhammad Ali Kolachi");

		//Content
		$mail->isHTML(true);
		$mail->Subject = 'Contact Us Form - ICIAT 2024, Gulf University';
		$mail->Body = generate_body();
		
		$mail->send();
        
        $mail->ClearAddresses();
        $mail->ClearCCs();
        $mail->ClearBCCs();
	} 
	catch (Exception $e) 
	{
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}

    return true;
}

function generate_body()
{
	global $_POST;
    
    $name           = $_POST["name"];
    $email          = $_POST["email"];
    $msg_subject    = $_POST["msg_subject"];
    $message        = $_POST["message"];

    $html = "";

    $html .= '<html>';
        $html .= '<head>';
            $html .= '<title>'.$msg_subject.'</title>';
        $html .= '</head>';
        $html .= '<body>';
            $html .= '<h3>Dear ICIAT 2024 Organizer,';
            
            $html .= '<p>This email is to inform you that you have received a message from ICIAT 2024 website; kindly do the needful:</p>';
            $html .= '<br />';

            $html .= '<table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;">';
                $html .= '<tr>';
                    $html .= '<th style="text-align: left;">Name:</th>';
                    $html .= '<td style="text-align: left;">'.$name.'</td>';
                $html .= '</tr>';
                $html .= '<tr style="background-color: #e0e0e0;">';
                    $html .= '<th style="text-align: left;">Email Address:</th>';
                    $html .= '<td style="text-align: left;">'.$email.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<th style="text-align: left;">Subject:</th>';
                    $html .= '<td style="text-align: left;">'.$msg_subject.'</td>';
                $html .= '</tr>';
                $html .= '<tr style="background-color: #e0e0e0;">';
                    $html .= '<th style="text-align: left;">Message:</th>';
                    $html .= '<td style="text-align: left;">'.$message.'</td>';
                $html .= '</tr>';
            $html .= '</table>';
            
            $html .= '<p>Thank you for your attention and cooperation.</p>';
            $html .= '<br />';
            $html .= '<p>Best Regards.</p>';
        $html .= '</body>'; 
    $html .= '</html>';
    
    return $html;
}

?>