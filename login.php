<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['pword'])){



header("Location: customer.php");
}
?>
<form name="frm" id="frm"   method="post"  onsubmit="return validate()" style="margin-top: -30px;" action="logoff.php" >

<table style="background-color:#aaafc2; margin:0px; padding:0px; text-align:left; width:178px; padding-bottom:10px;margin-top: 3px;">
<tr>
<th style="padding-top:15px; padding-left:8px; font-family:verdana; font-size:16px; color:#000033; font-weight:bold;"> Members Login </th>
</tr>
<tr>
<td style="padding-top:8px; padding-left:5px;"> <input  style="background-color:#FFF;
border: 2px solid #151663; padding-left:7px;" type="text" name="username" id="username" placeholder="E-Mail address..."/></td>
</tr>
<tr>
<td style="padding-top:5px; padding-left:5px;"> <input style="background-color:#FFF;
border: 2px solid #151663;padding-left:7px;" type="password" name="pword" id="pwd" placeholder="Password..."/></td>
</tr>
<tr>
<td style="padding-top:8px; padding-left:10px; text-align:left;"><a href="" style="font-family:arial-Black; font-size:14px; color:#151663;font-weight: bold;">Register</a> &nbsp; <span style="font-family:arial-Black; font-size:14px; color:#000;">or</span> &nbsp; <input class="button" type="submit" name="login" value="Login"/></td>
</tr>
<tr>
<td style="padding-top:5px; padding-left:8px;"><a href="../forgot_password.php" style="font-family:Verdana; font-weight:bold; color:#151663; font-size:10px;margin-left: 25px;">Forgot Your Password?</a></td>
</tr>
</table>
</form>
