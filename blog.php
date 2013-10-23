<?php
include("include/functions.php");
$sel=mysql_query('select * from blog ORDER BY id DESC LIMIT 0,3');
$all=mysql_query('select * from blog ORDER BY id DESC');

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
a:hover {
color: black;
}
a {
text-decoration: underline;
cursor: auto;
}
-->
</style>
</head>

<body>
<div class="header">
<?php top(); ?>
 <div>
 <?php sidemenu(); ?>
 <div style="width:721px;">
<div style="margin-bottom: -11px;">
<strong class="mainheading">
<h1><span style="color:#2141c2;">WEEE</span color:#140033;> Blog</h1></strong><br />
</div>
<?php
while($fet=mysql_fetch_array($sel))
{
$originalDate = $fet[8]; 
$newDate = date("jS,F Y", strtotime($originalDate));
?>		
<div>
<div><h2><?php echo $fet[1]; ?>(<?php echo $newDate; ?>)</h2></div>
<p style="font-size:12px;"><?php echo $fet[2]; ?></p>
<p><a href="details.php?id=<?php echo $fet[0]; ?>">More »</a></p>
</div>
				
<?php }?>
<div>
<h2>The Archive</h2>
<?php
while($fet=mysql_fetch_array($all))
{
$originalDate = $fet[8];
$newDate = date("jS,F Y", strtotime($originalDate));
?><p>		
<a href="details.php?id=<?php echo $fet[0]; ?>"><div style="float:left;"><h2><?php echo $fet[1]; ?></h2></div></a><div style="float: right;"><?php echo $newDate; ?></div></p><br />


				
<?php }?>

</div>
</div></div></div></body>
		  

	
    
    
