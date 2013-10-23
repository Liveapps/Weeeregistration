<?php
include("include/functions.php");
$sel=mysql_query("select * from blog where id=".$_GET['id']."");
$fet=mysql_fetch_array($sel);
$originalDate = $fet[8]; 
$newDate = date("jS,F Y", strtotime($originalDate));
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>WEEE Registration, WEEE De Minimis Registration, WEEE Changes 2014</title>
<meta name="description" content="WEEE 2013 Online De Minimis Registration Form - A Simpler Compliant Future">
<meta name="keywords" content="WEEE Registration, WEEE De minimis Regulations, WEEE Changes 2014, WEEE Reg, WEEE Reg 2014, WEEE Reg 2015">
<link rel="stylesheet" href="css/wee_style.css"/>
<link rel="stylesheet" href="css/style.css"/>
<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-size: 10px}
.style4 {
	font-family: arial;
	font-size: 14px;
	font-weight: bold;
	}
	a:hover {
color: black;
}
a {
text-decoration: underline;
cursor: auto;
}
.section_bottom_menu {
padding: 0 0 15px 0;
margin: 15px 0 0 0;
}
.section_bottom_menu li {
list-style-type: none;
float: left;
padding: 0 3px;
margin: 0;
color:blue
text-decoration: underline;
}
-->
</style>

</head>

<body>
<!-- Header start-->
<div style="max-width:980px; margin-right:auto; margin-left:auto; overflow:hidden;">
<!-- Header start-->
<?php
top();
?>
<!-- header close-->
 <div>
 <?php sidemenu(); ?>
 <div style="width:721px;">
<div style="margin-bottom: -11px;"><strong style="font-family: arial Black;font-size: 22px;"><h1><span style="color:#2141c2;">WEEE</span color:#140033;> Registration</h1></strong><br />
</div>	
<div>
<h1 style="height: auto;background-color: #aaafc2;padding: 3px 0px 3px 3px;"><?php echo $fet[1]; ?></h1><br />
<h2><?php echo $newDate; ?></h2>
<p style="font-size:12px;"><?php echo $fet[7]; ?></p>
<p style="font-size:12px;"><?php echo $fet[9]; ?></p>
<p style="font-size:12px;"><?php echo $fet[4]; ?></p>
<p style="font-size:12px;"><?php echo $fet[6]; ?></p>
<form action="" method="post">
		Rate this entry:<select name="blog_ratingtgiv5ef6"><option value="0">1 star</option><option value="1">2 stars</option><option value="2">3 stars</option><option value="3">4 stars</option><option value="4">5 stars</option></select><input type="submit" name="Rate" value="Rate"></form>
		<ul class="section_bottom_menu">
					<li style="text-decoration: underline;
cursor: auto;color:blue;" onclick="window.print();">Print</li>
					<li>|</li>
					<li><a href="http://del.icio.us/post?url=http%3A%2f%2f46.252.192.29%2Fblog%2FWEEE%2BIndia.html&amp;title=WEEE+India">Del.icio.us</a></li>
					<li>|</li>
					<li><a href="http://digg.com/submit?phase=3&amp;url=http%3A%2F%2F46.252.192.29%2Fblog%2FWEEE%2BIndia.html">Digg</a></li>
					<li>|</li>
					<li><a href="http://reddit.com/submit?url=http%3A%2F%2F46.252.192.29%2Fblog%2FWEEE%2BIndia.html&amp;title=WEEE+India">Reddit</a></li>
					<li>|</li>
					<li><a href="/contact/emailafriend.html">Email</a></li>
				</ul>
				<p class="bttm"><a href="friendemail.php">Send this page to a friend</a> or <a href="contactus.php">contact
	    us</a> for further information</p>
</div>
</div></div></div></body>
				
		  

	
    
    
