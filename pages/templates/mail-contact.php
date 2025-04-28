<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';


	$to = "satyaprahlad@gmail.com"; // this is your Email address
	$from  = $_POST['email']; // this is the sender's Email address
	$sender_name = $_POST['name'];
	$phone = $_POST['phone'];
	$service = $_POST['service'];
	$note = $_POST['note'];

	$subject = "Form submission";

	$message = $sender_name . " has send the contact message. His / Her contact Service is " . $service . " and his / her adress is "  . $phone . ". He / she wrote the following... ". "\n\n" . $note;

	$headers = 'From: ' . $from;
	//mail($to, $subject, $message, $headers);

  $mail = new PHPMailer(true);
	try {
 //Server settings
 $mail->SMTPDebug = 2; // Enable verbose debug output
 $mail->isSMTP(); // Set mailer to use SMTP
 $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
 $mail->SMTPAuth = true; // Enable SMTP authentication
 $mail->Username = 'satyaprahlad@example.com'; // SMTP username
 $mail->Password = 'Himaja@1992'; // SMTP password
 $mail->SMTPSecure = 'tls'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
 $mail->Port = 587; // TCP port to connect to

//Recipients
 $mail->setFrom('from@example.com', 'Mailer');
 $mail->addAddress('vsprahlad@gmail.com', 'Joe User'); // Add a recipient
 $mail->addReplyTo('satyaprahlad@example.com', 'Information');
 //$mail->addCC('cc@example.com');
 //$mail->addBCC('bcc@example.com');

// Attachments
 //$mail->addAttachment('/home/cpanelusername/attachment.txt'); // Add attachments
 //$mail->addAttachment('/home/cpanelusername/image.jpg', 'new.jpg'); // Optional name

// Content
 $mail->isHTML(true); // Set email format to HTML
 $mail->Subject = 'Here is the subject';
 $mail->Body = 'This is the HTML message body <b>in bold!</b>';
 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
 echo 'Message has been sent';

} catch (Exception $e) {
 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>
