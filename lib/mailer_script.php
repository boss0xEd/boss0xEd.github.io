<?php

session_start();

require("mail/src/Exception.php");
	
require("mail/src/PHPMailer.php");

require("mail/src/SMTP.php");


use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $visitor_name = htmlspecialchars(stripslashes(trim($_POST['yourName'])));
		
    $visitor_email = htmlspecialchars(stripslashes(trim($_POST['yourEmail'])));

    $password_subject = htmlspecialchars(stripslashes(trim($_POST['yourSubject'])));

    $visitor_message = htmlspecialchars(stripslashes(trim($_POST['yourMessage'])));
            
    $email_exp = /*'/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]/'; */
				  '/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/';
    
    if(!preg_match($email_exp,$visitor_email)) {
        
        $_SESSION["error_message"] = "The email address your entered does not appear to be valid. Try Again!";
        
        header("Location: index.php#contact");
        
        die();
        
    }
    
    $mail = new PHPMailer(TRUE);
    
    try {
        
        $mail->setFrom("myportfolio@github.com", "Oladiran Samuel");
        
        $mail->addAddress("007.authority2@gmail.com", "Your Email");
        
        $mail->Subject = ":::::: New eMail notification from your Portfolio ::::::";
        
        $mail->isHTML(TRUE);
        
        $mail->Body = "<html><body style='background-color:#A5D6B8; color: #344D3E; padding:10px 20px'><h5 align='center'>echo 'Visitor name: '.$visitor_name.'Visitor Email Address: '.$visitor_email.'Visitor Subject'.$password_subject. 'and the main message: '.$visitor_message;</h5></body></html>";
        
        $mail->AltBody = "<h4>echo echo 'Visitor name: '.$visitor_name.'Visitor Email Address: '.$visitor_email.'Visitor Subject'.$password_subject. 'and the main message: '.$visitor_message; </h4>";
        
        $mail->send();

        $_SESSION['successmsg'] = "Your Message has been sent. Thank you for stopping by!<br>Kindly expect a response within 24 hours.";
    
    }
    
    catch (Exception $e){/* PHPMailer exception. */
        
        echo $e->errorMessage();
    
    }catch (\Exception $e){/* PHP exception for global namespace Exception class */
        
        echo $e->getMessage();
    
    }
}

?>