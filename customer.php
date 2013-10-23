<?php
ob_start();

session_start();
include("include/functions.php");

if(isset($_SESSION['username']) || isset($_SESSION['pword'])){

 include("config.php");
						
$sel=mysql_query("SELECT * FROM `weeereg` where Email='".$_SESSION['username']."'");
$fet=mysql_fetch_array($sel);
/*echo $fet['id'];*/
 ?>
 <link rel="stylesheet" href="css/wee_style.css"/>
<link rel="stylesheet" href="css/style.css"/>
<div style="max-width:980px; margin-right:auto; margin-left:auto; overflow:hidden;">
<?php 
top();
 ?>
<div>
<?php sidemenu();?>
<div style="width:721px;">
<div><strong style="font-size: 22px;"><h1><span style="color:#2141c2;">WEEE</span><span style=" color:#140033;"> Customer Details</span></h1></strong>
<div><span style="font-size: 12px;color:#140033; text-align:justify;"></span></div>
</div><br />

<div class="style1" style=" height:auto; background-color:#aaafc2; padding: 10px 0px 10px 10px; ">
 <div class="style2"><strong  style="font-weight: bold;font-size: 18px;color:#140033;">Coming Soon...</strong></div>
</div>
<div style="font-size: 12px; margin-top:17px ;"><span style="font-size: 12px;color:#140033;">Your details</span></div>

 <?php /*?><a href="edit.php?id=<?php echo $fet['id']; ?>" />edit</a>
 <a href="logout.php">logout</a><?php */?>
 <?php
} 
 
else
header("Location: http://weeeregistration.org/index.php");
 
?>
<div style="margin-top:7px; "></div>
<div style="border-bottom:3px solid #aaafc2;"></div>
</div>
</div></div>

<br/><br />
<br />
<br />


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


		


 
