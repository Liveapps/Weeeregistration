<?php
ob_start();

session_start();
include("include/functions.php");

if(!isset($_SESSION['username']) || !isset($_SESSION['pword'])){
 header("Location: http://weeeregistration.org/index.php");
} 
 
	
include("config.php");
						
$sel=mysql_query("SELECT * FROM `weeereg` where Email='".$_SESSION['username']."'");
$fet=mysql_fetch_array($sel);
/*echo $fet['id'];*/
$coun=mysql_query("SELECT count(`id`)  FROM `weeereg` WHERE `id`=".$fet['id']."");
$con1=mysql_fetch_array($coun);
$rows=$con1['0'];
if(isset($_POST['edit']))
    {
     
     $OrgName=$_POST['OrgName'];

     $TradingName=$_POST['TradingName'];
	 $Password=$_POST['Password'];
	 $Title=$_POST['Title'];
	 $GivenName=$_POST['GivenName'];
	 $Surname=$_POST['Surname'];
	
	 $Landline=$_POST['Landline'];
	 $Mobile=$_POST['Mobile'];
	  $Fax=$_POST['Fax'];
	 $Email=$_POST['Email'];
	
	 $Position=$_POST['Position'];
	  for($i=1;$i<=$count;$i++)
  {
  mysql_query("UPDATE `weeereg` SET `id`='".$auto_id."' ");
 
  }
  	
	
 
  

   $f=mysql_query("UPDATE `weeereg` SET `OrgName`='".$OrgName."',`TradingName`='".$TradingName."',`Password`='".$Password."',`Title`= '".$Title."',`GivenName`='".$GivenName."',`Surname`='".$Surname."',`Landline`='".$Landline."',`Mobile`='".$Mobile."',`Fax`='".$Fax."',`Email`='".$Email."',`Position`='".$Position."'  WHERE  `id` =".$fet['id']."");
   header("location:customer.php");

}



?>
<?php
if(isset($_POST['edit']))
{
   $Email=$_POST['Email'];
   $email_from="noreply@weeeregistration.org";
  $email_to ="weeeregistration@avcgroup.co.uk";
  $email_from1=$_POST['Email'];
     $email_subject = "Thanks for Editing Your Weeeregistration Organisation Details.";
         $email_message = "OrgName:\t\t".$OrgName."\r\n"."TradingName:\t\t".$TradingName."\r\n"."Password:\t\t".$Password."\r\n"."Title:\t\t".$Title."\r\n"."GivenName:\t\t".$GivenName."\r\n"."Surname:\t\t".$Surname."\r\n"."Landline:\t\t".$Landline."\r\n"."Position:\t\t".$Position;
                 $headers = 'From: '.$email_from."\r\n".
      'Reply-To: '.$email_from."\r\n" . 'CC: '.$email_from1."\r\n" .
       'X-Mailer: PHP/' . phpversion();
	    
        mail($email_to, $email_subject, $email_message, $headers);  
 
	}			
  
?>



<style type="text/css">
<!--
label {
	float: left;
	clear: both;
	width: 330px;
	font-weight: bold;
	margin-right: 10px;
	margin-top: 3px;
}
input, textarea, select {
	margin-left: 5px;
	padding: 1px;
	border: 2px solid #151663;
	margin-bottom: 5px;
	font-size: 12px;
	width: 300px;
	display: block;
	background-color: aaafc2;
}
textarea  { height: 140px; }
#Submit { width: 200px; }
-->
</style>
 <link rel="stylesheet" href="css/wee_style.css"/>
<link rel="stylesheet" href="css/style.css"/>
<div style="max-width:980px; margin-right:auto; margin-left:auto; overflow:hidden;">
<!-- Header start-->
<?php top();
?>
<!-- header close-->
<?php sidemenu();
?>


<div style="width:721px; float:left;">
<div>
<strong><span style="font-size:20px; color:#203fbe;">WEEE</span>&nbsp;<span style="font-size:20px;">Edit Registration Form</span></strong>

<div style="text-align:left;">
<form action="" method="post">
<h3>Producer Details:</h3>
     <label for="WEENumber"><span style="color:red;">*</span><span class="data_label">WEEE Number</span>:</label> 
	<input name="WEENumber" id="WEENumber" type="text"  disabled="disabled" value="<?php echo $fet['WeeeNumber'];?>"/>
	<label for="Name"><span style="color:red;">*</span><span class="data_label">Organisation Name</span>:</label> 
	<input name="OrgName" id="Name" type="text"  value="<?php echo $fet['OrgName']; ?>"/>		
	<label for="CompanyName"><span style="color:red;">*</span><span class="data_label">Trading Name</span>:</label> 
	<input name="TradingName" id="TradingName" type="text"  value="<?php echo $fet['TradingName']; ?>"/>
	<label for="Password"><span style="color:red;">*</span><span class="data_label">Password</span>:</label> 
	<input name="Password" id="Password" type="text" value="<?php echo $fet['Password']; ?>" />
	<br>
<br>
<br>
<strong><span>Director Contact Details:</span></strong>
<br><br>
<br>

<label for="Name"><span style="color:red;">*</span><span class="data_label">Title</span>:</label> 
	<input name="Title" id="Title" type="text"  value="<?php echo $fet['Title']; ?>"/>		
	
	<label for="GivenName"><span style="color:red;">*</span><span class="data_label">Given Name</span>:</label> 
	<input name="GivenName" id="GivenName" type="text"  value="<?php echo $fet['GivenName']; ?>"/>
	<label for="Surname"><span style="color:red;">*</span><span class="data_label">Surname</span>:</label> 
	<input name="Surname" id="Surname" type="text"  value="<?php echo $fet['Surname']; ?>"/>
	<label for="Landline"><span style="color:red;">*</span><span class="data_label">Landline</span>:</label> 
	<input name="Landline" id="Landline" type="text"  value="<?php echo $fet['Landline']; ?>"/>
	<label for="Mobile"><span class="data_label">&nbsp;&nbsp;Mobile</span>:</label> 
	<input name="Mobile" id="Mobile" type="text"  value="<?php echo $fet['Mobile']; ?>"/>
	<label for="Fax"><span class="data_label">&nbsp;&nbsp;Fax</span>:</label> 
	<input name="Fax" id="Fax" type="text" value="<?php echo $fet['Fax']; ?>"/>		
	<label for="Email"><span style="color:red;">*</span><span class="data_label">Confirmation Email</span>:</label> 
	<input name="Email" id="Email" type="text"  value="<?php echo $fet['Email']; ?>"/>
	<label for="Position"><span style="color:red;">*</span><span class="data_label">Position</span>:</label> 
	<input name="Position" id="Position" type="text"  value="<?php echo $fet['Position']; ?>"/>
	<br>
<br>
<br>
<br>

<?php /*?><label><span style="color:red;">*</span><span>Do you have a WEEE Registration Number?</span>:</label>
<select option="one" class="select_opt" style="width: 80px;"><option>select</option><option>Yes</option><option>No</option></select>
<br>
<br>
<label><span style="color:red;">*</span><span>If you know your WEEE Registration Number
please enter it here, otherwise leave it blank</span>:</label>
<input name="Position" id="Position" type="text" /><br>
<br>
<br>

<label><span style="color:red;">*</span><span>Please tick the box to confirm that you have read and agree to our Terms and Conditions</span>:</label>
<input type="checkbox" style="margin-left: 27%;margin-top: 11px;" /><br>
<br>
<br><?php */?>

<div style="float:left; width:100px;"><input type="submit"  name="edit" value="SAVE"  class="button_base" style="width: 100%;height: 5%; color: #ffffff; border:0px; border-radius: 7px; cursor:pointer;"/></div><div><!--<input type="reset" value="Clear" style="width: 16%;height: 6%;color: #ffffff;background-color: #151663;margin-left: 24%;border-radius: 7px;"/>
</div>-->
</form>

</div>
</div>
</div></div></div>
<?php footer()
?>
