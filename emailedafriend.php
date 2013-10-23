<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Thank-you</title>

<link rel="stylesheet" type="text/css" href="/scripts/styles.css" />
<link rel="stylesheet" type="text/css" href="/scripts/print.css" media="print" />


</head>

<body>
<div id="frame">
<div id="content">
	
<?php
include("name.php");
include ("email_a_friend.php");
if ($_POST['page']<>"")
{
	$page=$_POST['page'];
}
else
{
	$page="http://".$_SERVER['SERVER_NAME'];
}

$signature=nl2br($signature);
$details="

$greeting ".ucfirst($_POST['f_name']).",

".ucfirst($_POST['y_name'])." $main
 $page
 
 $signature
 $signature1";


require("class.phpmailer.php");
require("local_mail.php");


if ($_POST['y_email'] and Check_Email($_POST['f_email']))
{
	$mail = new PHPMailer();
//	$mail->IsSMTP();
//	$mail->IsHTML(1);                     
//	$mail->SMTPAuth=1;
//	$mail->Username=	$user;
//	$mail->Password=	$password;
//	$mail->Host = 		$host;  
//	$mail->From = 		$from;
//	$mail->FromName = 	"$client_name";
	
	
	$mail->AddCC ($_POST['y_email']);
	$mail->AddAddress($_POST['f_email']);


	$mail->Subject = 	"Message from ".ucfirst($_POST['y_name']);	
	$mail->Body = $details;
	if (!$mail->Send())
	{
		echo "<h1>System failure, please call 0845 345 7849</h1>";
	}
	else
	{
		echo "<p>Thank-you for recommending us. Click <a href='$page'>here</a> to return to where you were.</p>";
	}
}
else
{
	echo "<h2>Please make sure you have entered both your email address and your friend's email address correctly</h2>";
	echo "<p>You entered your email address as ".$_POST['y_email']."</p>";
	echo "<p>You entered your friend's address as ".$_POST['f_email']."</p>";
	echo "<p><a href='emailafriend.html'>Click here</a> to try again</p>";

}	
					
function Check_Email($email)
{
   // Create the syntactical validation regular expression
   $regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$";

   // Presume that the email is invalid
   $valid = 0;

   // Validate the syntax
   if (eregi($regexp, $email))
   {
      list($username,$domaintld) = split("@",$email);
      // Validate the domain
      if (getmxrr($domaintld,$mxrecords))
         $valid = 1;
   }

   return $valid;
}				
					
?>	
</div>

</div></div>
</div>
</body>

