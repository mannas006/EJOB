<?php
include('include/application-top.php');
CheckCandidateLogin();
if((isset($_SESSION["candidate_id"]))  && ($_SESSION["candidate_id"]!=0))
   {
	unset($_SESSION['candidate_id']);
	$_SESSION['candidate_login']=0;	
	$_SESSION['candidate_id']=0;
	header("location:index.php");
}
?>
