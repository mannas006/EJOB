<?php include('include/application-top.php'); 
if($_SESSION['candidate_login'] == 0){

	header("Location:candidate-login.php?orderid=".$_GET["jobid"]);

}else{

	// SAVE THIS JOB FROM USERS
	$sql = "SELECT * FROM tbl_post_jobs WHERE id = '".$_GET["jobid"]."'";
	$query=mysqli_query($connt,$sql);
	if(mysqli_num_rows($query)>0){
	    $row = mysqli_fetch_assoc($query);
		$sql_aply = "INSERT INTO `tbl_candidate_applied_for_job` (`candidate_id`, `company_id`, `job_id`, `job_apply_date`) VALUES ('".$_SESSION["candidate_id"]."', '".$row["company_id"]."', '".$row["id"]."', '".date('Y-m-d')."')";
		
		if (mysqli_query($connt, $sql_aply)) {
			$lid=mysqli_insert_id($connt);		
			//header("Location:job-detail.php?jobid='".preg_replace('/\s+/', '', $row["id"])."'&op=applysuccess");
			$jobid = $_GET["jobid"];
			header("Location:job-detail.php?jobid=$jobid&op=applysuccess");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connt);
		}	

	
	}
}	
	
?>