<?php 

ob_start();

	session_start ();



 include("include/functions.php");

	if(isset($_POST['submit']))

	{

		

		$email_sel="select * from weeereg where Email='$_POST[username]'";

$res_e = mysql_query($email_sel);

		$count_e = mysql_num_rows($res_e);

		$row_e = mysql_fetch_array($res_e); 
		
		$_SESSION['username12'] = $row_e['Email'];
		

			if($count_e != 0)

		{

	

 $str = "select * from weeereg where id=".$row_e['id']." ";

	$res = mysql_query($str);

		$count = mysql_num_rows($res);

		$row = mysql_fetch_array($res); 

		//$count = 1;

		

			$customer_id = $row['id'];

			$customer_name=$row['name'];

			 

			//mail for forgot password

						$Message = '<b>Dear </b>Admin !<br/><br/>';



			$Message .= '&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$_POST["username"].'  </b> has requested a password reminder. Please contact this customer.<br/> <a href="http://weeeregistration.org/changepwd/changepassword.php?id='.$row['id'].'></a>';

		//	$mail=$_POST["day_instate_email"			];

	

			//$Message .= ' <b>Username : </b>'.$producerid;

//			$Message .="<br/>";

//			$Message .= ' <b>Password : </b>'.$pwd;

//			$Message .="<br/>";

//			

			$Message .="<br/>Kind Regards <br/>weeeregistration.com";

			

			$headers  = 'MIME-Version: 1.0' . "\n";

			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			

			

			@mail("swathi@bramblebusiness.com", "Password request", $Message, $headers);

			$msg="Your password request is sucessfully submitted.Company will contact directly.";



			header("location:forgot_password.php?msg=$msg");

			//end



		}

		else

		{

			$msg= '<b style="color:#FF0033; font-size:12px; font-weight:bold;"> Email not found on file </b>';

		}

	}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>WEEEREGISTRATION-A simple future</title>

<link rel="stylesheet" href="css/wee_style.css"/>

<style>

.button{

background-color:#7dbd2b;

border-radius:4px;

width:auto;

height:27px;

border:0;

padding:4px 10px;

color:#FFF;

font-weight:bold;

}

</style>
<link rel="stylesheet" href="css/wee_style.css"/>
<link rel="stylesheet" href="css/style.css"/>

</head>



<body>

<!-- Header start-->
<?php top(); ?>

<?php /*?><div id="header">

<div style="float:left; width:625px; margin-top:32px; height:35px; padding-left:0px; background-image:url(images/main.png);background-repeat: no-repeat;">
<span style="font-family:Verdana; font-weight:bold; font-size:18px; color:#FFFFFF; line-height:35px; padding-left:15px;">
www.weeeregistration.org
</span>
</div>

<div style="float:left; width:215px; padding-top:7px; "><a href="http://weeeregistration.org/">
<img src="images/logo.png" align="WEEREGISTRATION-A simple future" title="WEEREGISTRATION-A simple future"/></a>
</div>

</div><?php */?>

<!-- header close-->

<!-- Main Content start-->





<!-- Navigation -->



<?php sidemenu(); ?>

    <!-- Navigation end-->

  <br/>



  <br/>

<!--<img style="border:1px  solid #b4e077; padding:5px;" src="images/frog.jpg"/>-->









<div id="content">

<div style="padding-left:15px;"> 

<span style="font-family:Verdana;font-weight:bold; font-size:24px; color:#151663;">WEEE </span><span style="font-family:Verdana;font-weight:bold; font-size:24px; color:#000033;">  Registration </span></div>

<p><?php if(isset($_GET['msg']))

echo '<span  style="padding-left:15px; font-size:14px; ">'.$_GET['msg'].'</span>'; ?></p>

<p>&nbsp;</p>

<div style="padding-left:85px;"> 

 <span style="font-family:verdana;font-weight:bold; font-size:18px; color:#151663;">Forgot password </span> Request

</div>

<table width="408" height="100" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td align="center" valign="middle" class="bg"><table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">

              

            </table>

            <br />

            <?php echo $msg; ?>

            <br/>

            

          <table  border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <th scope="col">

			

			<form name="form1" id="form1" method="post" action="">

			<table width="100%" border="0" cellspacing="3" cellpadding="0">

              <tr>

                <td width="30%" align="left"  style="font-size:14px;">E-Mail : </td>

                <td width="70%" align="left" ><span>

                  <input type="text" name="username"   style="width: 290px;border: 2px solid #151663;background-color: #aaafc2;"/>

                </span></td>

              </tr>

              <tr>

                <td align="left" valign="top">&nbsp;</td>

                <td align="left" valign="top">&nbsp;</td>

              </tr>

              <tr>

                <td align="left" valign="top">&nbsp;</td>

                <td align="right" valign="top">

				<input type="submit" value="Send Request" name="submit" class="button" /></td>

              </tr>

              <tr>

                <td align="left" valign="top">&nbsp;</td>

                <td align="center" valign="top"><label></label></td>

              </tr>

            </table>

			</form></th>

          </tr>

        </table></td>

      </tr>

    </table>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<div style="width:680px;border-bottom:3px solid #151663;">

</div>



<div style="width:640px; margin-top:45px; "></div>

<!--content End-->

<div style="clear:both;"></div>

</div>

<div style="clear:both;"> </div>

</div>

<!-- main content close-->

<br/>

<br/>



<br/><br/>
<?php footer(); ?>

<?php /*?><div id="footer">

<span style="font-size:12px; color:#000033; line-height:40px; padding-left:2px;">

&copy;Copyright 2013 Weeeregistration All Rights Reserved 

</span>

<span style=" float:right;font-size:14px; line-height:40px; padding-right:2px;">

<a class="footer_menu" href="index.html">Home</a> &nbsp;|&nbsp; <a class="footer_menu" href="#">Sitemap</a> &nbsp;|&nbsp;<a class="footer_menu" href="#"> Privacy </a>&nbsp;| &nbsp;<a class="footer_menu" href="#">eee register</a> &nbsp;| &nbsp;<a class="footer_menu" href="#">Contact Us </a> 

</span>



<br/>

</div><?php */?>

</body>

</html>

