<?php
include('include/application-top.php');
CheckCompanyLogin();
if((isset($_SESSION["company_id"]))  && ($_SESSION["company_id"]!=0))
   {
	unset($_SESSION['company_id']);
	$_SESSION['company_login']=0;	
	$_SESSION['company_id']=0;
	header("location:index.php");
}
?>
