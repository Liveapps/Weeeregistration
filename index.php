<?php 
/*ob_start();
session_start();
	if(!isset($_SESSION['users']))
	header('Location:index.php');*/
	

$filter_reg = $_SESSION["filter_reg"];
$filter_name = $_SESSION["filter_name"];
$year = $_SESSION["year"];
$from = $_SESSION["from"];
$charfrom = $_SESSION["charfrom"];
 include("./include/functions.php");
if(empty($year))
{
	$year = date("Y");
	$_SESSION["year"] = $year;
}
if(empty($from))
	$from = 0;

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
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />

<!-- added for autocomplete -->

<!-- -->	<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
<!-- -->	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<!-- -->	<script type="text/javascript"> 
/**/
/**/		jQuery(document).ready(function(){
/**/			//alert('hi');
/**/			$('#filtername').autocomplete({source:'fet2.php', minLength:1});
/**/			//alert("hi1");
/**/			$('#filterreg').autocomplete({source:'fet3.php', minLength:1});
/**/		});
/**/
/**/	</script> 	 
<!-- added for autocomplete -->

</head>

<body>
<div class="header">
<?php top(); ?>
<div>
<?php sidemenu(); ?>
<div style="width:721px;">
<div style="margin-bottom:-11px;">
<strong class="mainheading">
<h1><span style="color:#2141c2;">WEEE</span color:#140033;> Registration</h1></strong><br />
<?php	 
$record120 = mysql_query("SELECT * FROM weeereg");
$record130 = mysql_num_rows($record120);
$sel=mysql_query('select * from blog ORDER BY id DESC LIMIT 0,1');
?>

<div class="content5">
<span>Welcome to the free portal for information on the UK WEEE Regulations and an invite for Producers to join our <span class="content1">[<?php echo "$record130"; ?>]</span> UK Producers registered to date. It is also the place for Producers falling into De Minimis to seek assistance in your registration direct with the Appropriate Government 
</span><span>Agency from 1 January 2014.</span>
<br /><br />
<span class="large_heading" style="font-weight:bold;">Registration is Completed in Four Easy Steps</span>
<br /><br />
<div style="margin-bottom:5px;">
<div class="steps">1.</div>
<div style="padding-top:7px;">&nbsp;&nbsp;Click on the Registration Button on the right hand menu bar</div></div><br />
<div style="margin-bottom:5px; margin-top: -11px;">
<div class="steps">2.</div>
<div style="padding-top:7px;">&nbsp; Complete the registration form check and press submit</div>
</div><br />
<div style="margin-bottom:5px; margin-top: -11px;">
<div class="steps">3.</div>
<div style="padding-top:7px;">&nbsp;&nbsp;You will receive confirmation of your registration by email</div>
</div><br />
<div style="margin-top: -11px;">
<div class="steps">4.</div>
<div style="padding-top:7px;">&nbsp;&nbsp;You will begin to receive regular updates on the new regulations</div>
</div></div>
</div><br />
<div class="box">
 <div><strong class="content2"><h2> WEEE Registration Compliance for De Minimis Users 2013-2014</h2></strong></div>
</div>
<?php
while($fet=mysql_fetch_array($sel))
{
?>
<div style="font-size: 12px; margin-top:20px ;margin-bottom: -25px;">
<p><span class="content3"><?php echo $fet[4]; ?></span></p>
<?php } ?>

<div class="fb-like" data-href="http://www.weeeregistration.org" data-width="450" data-show-faces="true" data-send="true"></div>

</div>

</div><br />

<br/>
<!--<div style="padding-left:15px;"> 
  <p ><span style="font-family:Verdana;font-weight:bold; font-size:24px; color:#b4e077;"><?php echo $title; ?></span></p>
  </div>-->


<form method="post" action="" name="producers">

<?php /*?><?php year_combo("Year", "year", true, $year); ?>
<input type="submit" value="Change" name="action"><?php */?>

<table width="721";><font class="verdana" size="10pt" weight="bold" align="center">
          </font>
           <tr class="tabhead";>
            <td ><div align="center" class="style4"><font weight="bold" align="center">Register of Members</font></div></td>
           </tr>
    </table>
    
         <table width="721">
	<thead class="th_producers"><tr class="tabhead"><th width="28"/>
	<th width="220">Company Name</th>
	<th width="220">WEEE  Number</th>
	<th width="220">Registered</th>
	</tr></thead>
	<tr class="tabhead">
		<form action="producers1.php" method="post">
		<td/>
		<td class="tabhead"><input type="text" name="filtername" value="<?php echo $_POST['filtername']; ?>" ></td>
		<td class="tabhead"><input type="text" name="filterreg"  value="<?php echo $_POST['filterreg']; ?>" ></td>
		<td class="td_action"><select option="one" class="select_opt" id="select" name="select"><option>Select</option><option value="yes">Yes</option><option value="no">No</option></select>   <input type="submit" name="filter" value="Filter"></td>
	
		</form>
	
</tr>
<?php
if(isset($_POST['filter']))
{
if($_POST['filtername']!='' && $_POST['filterreg']!='')
{
//$where=" where name like '".$_POST['filtername']."%' and reg_number like '".$_POST['filterreg']."%'";
//changed to
$where=" where orgname like '".$_POST['filtername']."%' and weeenumber like '".$_POST['filterreg']."%'";
}
else if($_POST['filtername']=='' && $_POST['filterreg']=='')
{
$where=" where auth_2=5";
}
else if($_POST['filtername']!='')
{
//	$where=" where name like '".$_POST['filtername']."%'";
// changed to 
$where=" where orgname like '".$_POST['filtername']."%'";
}
else if($_POST['filterreg']!='')
{
// $where=" where reg_number like '".$_POST['filterreg']."%'";
// changed to
$where=" where weeenumber like '".$_POST['filterreg']."%'";
}

}


else
{
 $search_key = $_REQUEST['paginationfrom']; 
 if(!isset($search_key))
 {
     $search_key='';
	 $where="where ORDER BY RAND() LIMIT 0,1";
	 
 }
else
{
//$where=" where name like '".$search_key."%'";
//changed to
$where=" where orgname like '".$search_key."%' ";
}
}
  
	?>
     <?php
if(isset($_POST['filter']))
{
if($_POST['select']=='no')
{
$where="where WeeeNumber='Pending'";
}
else if($_POST['select']=='yes')
{
$where="where not WeeeNumber='Pending'";
}
}
?>


<?php
	// $resu_sub1="select id, weeenumber,OrgName
	//		from weeereg ";
	// changed to

   $resu_sub1="select id, WeeeNumber,OrgName
			from weeereg ".$where." order by OrgName";
	@$result_sub = mysql_query($resu_sub1);
	while(@$sub_producer = mysql_fetch_array($result_sub))
	{	
	
	
		?>

<tr<?php /*?> <?php echo ++$a%2?$alternate="class=\"alternate\"":""; ?><?php */?>>
		<td class="td_select"><input type="checkbox" name="checked_<?php echo $sub_producer["id"]; ?>"
			></td>

		<td class="td_name"><?php echo $sub_producer["OrgName"]; ?></td>
        
		<td class="td_reg_number"><?php echo $sub_producer["WeeeNumber"]; ?></td>
      <?php  if($sub_producer['WeeeNumber']=='Pending')
	  {
	  ?>
		<td class="td_status"> No</td>
        <?php
		}
		else
		{
		?>
		<td class="td_status"> Yes</td>
        <?php
		}
		?>
		
		<td >
			<?php /*?><a href="weee_edit_sub_registration.php?action=edit&id=<?php echo $sub_producer["id"]; ?>" title="Details"><img border="0" src="icon/details.png"></a>
			<a href="weee_deletesub.php?action=delete&id=<?php echo $sub_producer["id"]; ?>&deleteyear=<?php echo $year; ?>"
				onclick="return confirm('Are you sure you want to delete <?php echo $sub_producer['Sname']; ?> from the year <?php echo $year; ?>? Clicking OK will irrevocably remove all the producers return data for the year.');" title="Delete"><img border="0" src="icon/delete.png"></a>		<?php */?></td>
		</tr>

	
        

    	
    <?php

}
       
?>


</table>
<table width="721">
<tr>
<td>
<div class="scroller">
<?php include'scrolling.php'; ?>
</div>
</td>
</tr>
</table>
<table>
<tr><td width="717" style="font-size:15px">


<?php


	for($charno =65;$charno<=90;$charno++)
	{
	
?>
		<a onclick="document.producers.paginationfrom.value='<?php echo chr($charno); ?>'; document.producers.submit();" onmouseover="this.style.cursor='pointer';">
<?php
		echo(chr($charno));
?>
		</a>&nbsp;
<?php
	}
?>
<a onclick="document.producers.paginationfrom.value='<?php echo ''; ?>'; document.producers.submit();" onmouseover="this.style.cursor='pointer';">
<?php
		echo('All');
?>
		</a>
        </td></tr></table>
<br />
<?php if($from > 0){ ?><input type="image" alt="First" src="icon/first.png" value="First" name="first">
<input type="image" alt="Previous" src="icon/previous.png" value="Previous" name="previous"> <?php } ?>
<?php if($from + $count < $matched){ ?><input type="image" alt="Next" src="icon/next.png" value="Next" name="next">
<input type="image" alt="Last" src="icon/last.png" value="Last" name="last">
<br />
<br />
<?php } ?>
<input type="hidden" name="paginationfrom" value="unset">
<br />
</form>


<!--<div style="width:720px;border-bottom:3px solid #151663;">-->
</div>

<div style="width:640px; margin-top:45px; "></div>
<!--content End-->
<div style="clear:both;"></div>
</div>
<div style="clear:both;"> </div>
</div>
<!-- main content close-->
<br/>

<?php footer(); ?> 

<!--<div id="footer">
<span style="font-size:12px; color:#000033; line-height:40px; padding-left:2px;">
&copy;Copyright 2012 Weeeindia All Rights Reserved 
</span>
<span style=" float:right;font-size:14px; color:#7dbd2b; line-height:40px; padding-right:2px;">
Home &nbsp;|&nbsp; Sitemap &nbsp;|&nbsp; Privacy &nbsp;| &nbsp;eee register &nbsp;| &nbsp;Contact Us  
</span>
<br/>
</div>-->
<!-- Social Network Script-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=63083304908";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Social Network Script End-->
</body>
</html>
