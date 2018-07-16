<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta content="text/html; charset=ISO-8859-1"
      http-equiv="Content-Type">
    <title>Contact Form</title>
  </head>
  <body>
	<table width="650px" border=2><tr><td align=center>
	<h2>NmeaRouter Registration</h2>
	
<?php
/*
// You must not do this because the data has not been validated
// echo $_POST['first_name']." ".$_POST['last_name']."<br />" ; 
   phpinfo(INFO_VARIABLES);
   var_dump(get_defined_vars());
*/


if(isset($_POST['emailto'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED

	$email_subject = $_POST['subject'];
   
    function died($error) {
        // your error code can go here
        echo "I am very sorry, but there were error(s) found with the registration you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['emailfrom']) ||
        !isset($_POST['emailto']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['sysinfo']) ||
        !isset($_POST['comments'])) {
        died('I am sorry, but there appears to be a problem with the registration you submitted.');      
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['emailfrom']; // required
    $email_to = $_POST['emailto']; // required
    $sysinfo = $_POST['sysinfo']; // required
    $comments = $_POST['comments']; // required

    $error_message = "";

/* //php 5.2 onwards

    $sanitized_email = filter_var($email_from, FILTER_SANITIZE_EMAIL);
        $error_message .= $sanitized_email."<br /><br />";

 if (filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
    $error_message .= "This sanitized email address is considered valid.";
 } else {
    $error_message .= "This (b) sanitized email address is considered invalid.\n";
  }

*/

// This is the "book" method
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }


// var_dump($work_string);
// echo '<br />';


// This is Simon's method
   if($email_from && !preg_match('/^[\w.-]+@[\w.-]+$/', $email_from)) {
      $error_message .= 'Invalid E-Mail address format, expected format is joe@company.com<br />';
    }


    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

// If set but "" then strlen=0
  if(strlen($comments) < 0) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Registration details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Subject: ".clean_string($email_subject)."\n";
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
    $email_message .= "sysinfo: ".clean_string($sysinfo)."\n";
    
     
// create email headers
   $headers = 'From: '.$email_from."\r\n".
   'Reply-To: '.$email_from."\r\n" .
   'X-Mailer: PHP/' . phpversion();
   @mail($email_to, $email_subject, $email_message, $headers); 

   }		// end of got emailto

?>

 
<!-- success html -->
 
 
Thank you for contacting me. I will be in touch with you shortly. <br>

	<br><br>
	</td></tr></table>
  </Body>
</html>


