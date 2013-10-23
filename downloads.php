<?php 
ob_start();
session_start();
 include("include/functions.php");

if(isset($_SESSION['username']) || isset($_SESSION['pword'])){
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>WEEE Registration, WEEE De Minimis Registration, WEEE Changes 2014</title>
<meta name="description" content="WEEE 2013 Online De Minimis Registration Form - A Simpler Compliant Future">
<meta name="keywords" content="WEEE Registration, WEEE De minimis Regulations, WEEE Changes 2014, WEEE Reg, WEEE Reg 2014, WEEE Reg 2015">
<link rel="stylesheet" href="css/wee_style.css"/>
<link rel="stylesheet" href="css/style.css"/>
</head>

<body>
<div style="max-width:980px; margin-right:auto; margin-left:auto; overflow:hidden;">
<!-- Header start-->
<?php top(); ?>
<!-- header close-->

 <div>
 <?php sidemenu(); ?>
<div style="width:721px;">
<div><strong style="font-size: 22px;"><h1><span style="color:#2141c2;">WEEE</span><span style="color:#140033;"> Download Centre</span></h1></strong>
<div><span style="font-size: 12px;color:#140033; text-align:justify;"></span></div>
</div><br />

<div class="style1" style=" height:auto; background-color:#aaafc2; padding: 10px 0px 10px 10px; ">
 <div class="style2"><strong  style="font-weight: bold;font-size: 18px;color:#140033;">Coming Soon...</strong></div>
</div>
<div style="font-size: 12px; margin-top:17px;">
<span style="font-size: 12px;color:#140033;">Download Centre will provide you with an easy to use tool for accessing and downloading important documents.</span></div>
<div style="width:640px; margin-top:7px; "></div>
<div style="border-bottom:3px solid #aaafc2;">
</div>
</div>
</div></div>
<br/><br />
<br />
<br />
<?php
} 
 
else
header("Location: http://weeeregistration.org/index.php");
 
?>


<!--<div id="footer">
<span style="font-size:12px; color:#000033; line-height:40px; padding-left:2px;">
&copy;Copyright 2012 Weeeindia All Rights Reserved 
</span>
<span style=" float:right;font-size:14px; color:#7dbd2b; line-height:40px; padding-right:2px;">
Home &nbsp;|&nbsp; Sitemap &nbsp;|&nbsp; Privacy &nbsp;| &nbsp;eee register &nbsp;| &nbsp;Contact Us  
</span>
<br/>
</div>-->
<?php
footer();
?>
</body>
</html>
