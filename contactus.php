<?php
ob_start();
include("include/functions.php");
?>
<?php
        if(isset($_POST['Submit'])) {
	
      // EDIT THE 2 LINES BELOW AS REQUIRED
       
     
       $name = $_POST['name']; // required
       $email = $_POST['country']; // required
       $subj = $_POST['subject']; // not required
       $feedback = $_POST['msg']; // required
          

if($name == "" ) {
$msg1= "<span style='color:red;'>please enter a name.</span>";
$code= "1" ;
}
else if(!preg_match('/^\pL+$/u', $name)){
$msg1= "<span style='color:red;' >please enter valid a Name.</span>";
$code= "1" ;
}

else if($email == "" ) {
$msg2= "<span style='color:red;'>please enter a Country.</span>";
$code= "2";
} //check for valid email 

else  if($subj == "" ) {
$msg3= "<span style='color:red;'>please enter a subject.</span>";
$code= "3" ;
}

else if($feedback == "" ) {
$msg4= "please enter a Message.";
$code= "4" ;
}


else
{
$email_to ="weeeregistration@avcgroup.co.uk";
       $email_subject = "Hello";
	   $email_message = "Name:\t".$name."\r\n"."Email:\t".$email."\r\n"."Subject:\t".$subj."\r\n"."Feed Back:\t" .$feedback;
       $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
         'X-Mailer: PHP/' . phpversion();
          if(mail($email_to, $email_subject, $email_message, $headers))  
          { 
            $msg ="<span style='color:red;'>Message Sent Successfully.</span>";   
              
          }	 
        }
        }
        ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" ="text/html; charset=iso-8859-1" />
<title>WEEE Registration, WEEE De Minimis Registration, WEEE Changes 2014- Contact Us </title>
<link rel="stylesheet" href="css/wee_style.css"/>
<link rel="stylesheet" href="css/style.css"/>
<style>

.feilds{
background-color:#aaafc2;
border: 2px solid rgb(21, 22, 99);
width: 320px;
height: 20px;

}


.text_area{
margin:0px;
padding:0px;
background-color:#aaafc2;
border: 2px solid rgb(21, 22, 99);
width: 320px;
height: 160px;

}
.select_field
{
border: 1px solid #a2ac93;
height:25px; 
outline:0px;
overflow:hidden;
}
#content {
    float: left;
    width: 625;
    height: auto;
}
.button1{
background-color: rgb(21, 22, 99);
width: auto;
border-radius: 3px;
height: 27px;
border: 0px none;
padding: 4px 10px;
color: #aaafc2;
font-weight: bold;
cursor: pointer;
}

.button11 {background-color: rgb(21, 22, 99);
width: auto;
border-radius: 3px;
height: 27px;
border: 0px none;
padding: 4px 10px;
color: #aaafc2;
font-weight: bold;
cursor: pointer;
}
.content{
color:#140033;
 font-size:14px;
  width:100%;
   text-align:right;
    line-height:30px;
}
.button111 {background-color: rgb(21, 22, 99);
width: auto;
border-radius: 3px;
height: 27px;
border: 0px none;
padding: 4px 10px;
color: #aaafc2;
font-weight: bold;
cursor: pointer;
}
.button1111 {background-color: rgb(21, 22, 99);
width: auto;
border-radius: 3px;
height: 27px;
border: 0px none;
padding: 4px 10px;
color: #aaafc2;
font-weight: bold;
cursor: pointer;
}
.button11111 {background-color: rgb(21, 22, 99);
width: auto;
border-radius: 3px;
height: 27px;
border: 0px none;
padding: 4px 10px;
color: #aaafc2;
font-weight: bold;
cursor: pointer;
}
.button111111 {background-color: rgb(21, 22, 99);
width: auto;
border-radius: 3px;
height: 27px;
border: 0px none;
padding: 4px 10px;
color: #aaafc2;
font-weight: bold;
cursor: pointer;
}
.button112 {background-color: rgb(21, 22, 99);
width: auto;
border-radius: 3px;
height: 27px;
border: 0px none;
padding: 4px 10px;
color: #aaafc2;
font-weight: bold;
cursor: pointer;
}
</style>
</head>

<body>

<div style="max-width:980px; margin-right:auto; margin-left:auto; overflow:hidden;">

<!-- Header start-->
<?php top(); ?>
<!-- header close-->
<!-- Main Content start-->
<div>
<?php
if(isset($_SESSION['username']) && isset($_SESSION['pword']))
{
?>
<div style="float: right;margin-top: 10px;">
<div id="navigation">
      
    <?php login(); ?>
    <ul>
	<li class="nav"> <a class="current" href="downloads.php">Download Centre  </a></li> 
	<li class="nav"> <a class="current" href="infocentre.php">Info Centre</a></li> 
	<li class="nav"> <a class="current" href="blog.php">Blog  </a></li>
    <li class="nav"> <a class="current" href="contactus.php">Contact</a></li></ul>
	</div>
</div>
<?php
	}
	else
	{
	?>
	<div style="float: right;margin-top: 10px;">
<div id="navigation">
    <ul>  
    <li class="nav"  style="border-radius: 5px;"> <a class="current" href="request/register.php">Register </a></li>
    <?php login(); ?> 
	<li class="nav"> <a class="current" href="infocentre.php">Info Centre</a></li> 
	<li class="nav"> <a class="current" href="blog.php">Blog  </a></li>
     <li class="nav"> <a class="current" href="contactus.php">Contact</a></li></ul>
	</div>
    
</div>
<?php
	}
	?>
<div style="width:721px;">
<div><strong style="font-size: 22px;"><h1><span style="color:#2141c2;">WEEE</span color:#140033;> Contact </h1></strong><br /></div>
<br/>
<div style="color:#000000; font-size:12px; padding-left:15px;">
<span>Please contact us if you have any questions, comments or messages.</span><br />

<span>All fields are required.</span>

 
</div>


<div style="width:680px;"><br/>
<span style=" font-size:14px; padding-left:15px;">
<?php echo $msg; ?>
</span>
<div style="float:right; padding-top:6px; margin-right:66px;"> 



<span style="color:#140033; font-size:14px; width:100%; font-weight:bold; text-align:right; line-height:40px;">
Address </span>
<br/>
<span class="content"> AVC House
</span>
<br/>
<span class="content"> Bessmer Dr
</span>
<br/>
<span class="content"> Stevenage
</span>
<br/>
<span class="content"> Hertfordshire
</span>
<br/>
<span class="content"> SG1 2DT
</span><br/>
<span class="content">
0845 257 7024</span>
<br/>
<br/>

<br/>

</div>
<form action="" method="post">
<table width="469"  style=" padding-left:0px; margin-left:0px; ">
  <tr>
    <td width="119"  style=" font-size:14px;  text-align:left;color:#000033; vertical-align:middle;padding-bottom:15px;"><span style="color:red;padding-left:5px;">*</span> Full Name </td>
 <td width="338"  style="padding-left:7px; padding-bottom:15px;"><input class="feilds" type="text" name="name"  placeholder="Name..." /><?php echo $msg1;?></td>
  </tr>
  <tr>
    <td style=" font-size:14px;  text-align:left;color:#000033; vertical-align:middle;padding-bottom:15px;"><span style="color:red;padding-left:5px;">*</span> Country </td>
    <td style="padding-left:7px;padding-bottom:15px;"><input class="feilds" type="text" name="country" id="country" value="<?php if(isset($email)){echo $email;} ?>"/><?php echo $msg2;?></td>
  </tr>
  <tr>
    <td style=" font-size:14px; text-align:left; vertical-align:middle;padding-bottom:15px;"><span style="color:red;padding-left:5px">*</span> Subject </td>
    <td style="padding-left:7px;padding-bottom:15px;"><input class="feilds" type="text" name="subject" id="subject" value="<?php if(isset($subj)){echo $subj;} ?>" /><?php echo $msg3;?></td>
  </tr>
  <tr>
    <td style=" padding-top:10px; font-size:14px;text-align:left; vertical-align:top;padding-bottom:15px;"><p><span style="color:red;padding-left:5px">*</span> Message</p>
      <p>&nbsp; </p></td>
    <td style="padding-left:7px;padding-bottom:15px;"><textarea class="text_area" name="msg" id="msg" value="<?php if(isset($feedback)){echo $feedback;} ?>"/ ><?php echo $msg4;?>

</textarea></td>
  </tr>
  </form>
 </table>
 <div style="padding-left: 125px;">
  <input class="button" type="submit" name="Submit" value="Send"/>
 <span style="padding-left: 20px;"> <input class="button" type="submit" name="Clear" value="Clear" /></span>
  </div>
  
<div style="clear:both;"></div>

<br/><br/>

</div>
<!--content End-->
<div style="clear:both;"></div>
</div>
</div></table>
<!-- main content close-->
<br/><br/><br/>


<?php
footer();
?>
</body>
</html>
<!-- comment2 -->
