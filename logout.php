<?php
ob_start();
include("include/functions.php");

session_destroy();
		
header("location:index.php");
	
?>
