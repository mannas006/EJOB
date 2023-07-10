<?php include('include/application-top.php');
CheckCandidateLogin();
$sql1="delete from  tbl_candidate_applied_for_job where job_id=".$_GET['jobid']." and candidate_id = ".$_SESSION['candidate_id']."";
$query = mysqli_query($connt, $sql1);
	 header("Location:candidate-dashboard-applied-jobs.php?op=del");
?>