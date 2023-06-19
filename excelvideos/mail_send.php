<?php session_start();
ini_set('display_errors', 1);
echo error_reporting(E_ALL);
/*//if(isset($_POST['submit'])){
    $to ='radhikatreegear2019@gmail.com';//$_SESSION['activate_mail']; // this is your Email address
    $from = 'mailing@thestrategist.co.in';//$_POST['email']; // this is the sender's Email address
    $first_name = $_SESSION['user'];
   $last_name ='';// $_POST['last_name'];
    $subject = "Registered successfull!";
    $subject2 = "Copy of your form submission";
    $message = "Please click onthe below activation link to activate your acount<br/>Url : http://thestrategist.co.in/demo/excelvideos/user_activation.php?activation_code=".base64_encode($_SESSION['activate_mail']);
    $message2 =''; "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
   // }*/

?>




<?php
$to = "radhikatreegear2019@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

if(mail($to,$subject,$txt,$headers)){
    echo "Send";
}else{
    echo "Oooops";
}






/*//error_reporting(E_ALL);
error_reporting(E_STRICT);
//date_default_timezone_set('America/Toronto');
require_once('./mail/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
$mail             = new PHPMailer();
$body             = file_get_contents('contents.html');
$body             = eregi_replace("[\]",'',$body);
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.yourdomain.com"; // sets the SMTP server
$mail->Port       = 26;                    // set the SMTP port for the GMAIL server
$mail->Username   = "yourname@yourdomain"; // SMTP account username
$mail->Password   = "yourpassword";        // SMTP account password
$mail->SetFrom('name@yourdomain.com', 'First Last');
$mail->AddReplyTo("name@yourdomain.com","First Last");
$mail->Subject    = "PHPMailer Test Subject via smtp, basic with authentication";
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->MsgHTML($body);
$address = "whoto@otherdomain.com";
$mail->AddAddress($address, "John Doe");
$mail->AddAttachment("images/phpmailer.gif");      // attachment
$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}*/
?>