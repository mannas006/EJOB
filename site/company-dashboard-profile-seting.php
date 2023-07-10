<?php include('include/application-top.php');
CheckCompanyLogin();

	if((isset($_POST['submit'])) AND ($_POST['submit']=='Save Setting'))
	{
		//echo "<pre>"; print_r($_POST); die;
		$sql = "UPDATE `tbl_company` SET 
				`name`                = '".mysqli_real_escape_string($connt,$_POST['name'])."',
				`industry`            = '".mysqli_real_escape_string($connt,$_POST['industry'])."',
				`organization_type`   = '".mysqli_real_escape_string($connt,$_POST['organization_type'])."',
				`land_line_no`        = '".mysqli_real_escape_string($connt,$_POST['land_line_no'])."',							
				`cell_phone`          = '".mysqli_real_escape_string($connt,$_POST['cell_phone'])."',
				`website`             = '".mysqli_real_escape_string($connt,$_POST['website'])."',
				`no_of_employee`      = '".mysqli_real_escape_string($connt,$_POST['no_of_employees'])."',
				`description`         = '".mysqli_real_escape_string($connt,$_POST['description'])."',
				`country`             = '".mysqli_real_escape_string($connt,$_POST['country'])."',
				`city`                = '".mysqli_real_escape_string($connt,$_POST['city'])."',
				`full_address`        = '".mysqli_real_escape_string($connt,$_POST['full_address'])."'
				
				WHERE `tbl_company`.`id` = '".$_SESSION['company_id']."'";
		
		if (mysqli_query($connt, $sql)) {
			//header("Location:company-dashboard-manage-jobs.php?op=u");
			header("Location:company-dashboard-profile-seting.php?op=u");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connt);
		}			
		
			
	}



$sql = "SELECT * FROM tbl_company WHERE id = '".$_SESSION['company_id']."'";
$query = mysqli_query($connt, $sql);
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from combinedgroupltd.com/job/new_job/candidate-dashboard-profile-seting.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:45:57 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>company Profile Setting</title>
    
    <!-- Css -->
    <link href="<?php echo SITE_URL; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/flaticon.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>fonts/next-icon/flat-icon.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/slick-slider.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>build/mediaelementplayer.css">
    <link href="<?php echo SITE_URL; ?>plugin-css/fancybox.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>plugin-css/plugin.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>style.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/color.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/responsive.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/homepage-two-typo.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/home-two-color.css" rel="stylesheet">
</head>

<body>
    
    <!-- Wrapper -->
    <div class="careerfy-wrapper">

        <!-- Header -->
		<?php include("include/header.php"); ?>        
        <!-- Header -->
        
        <!-- SubHeader -->
        <div class="careerfy-subheader careerfy-subheader-without-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="careerfy-page-title">
                            <h1>Dashboard</h1>
                            <p>Manage your operations.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="careerfy-breadcrumb">
                <ul>
                    <li><a href="#">Home</a></li>
                   
                    <li>Dashboard</li>
                </ul>
            </div>
        </div>
        <!-- SubHeader -->

        <!-- Main Content -->
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container">
                    <div class="row">

                        <aside class="careerfy-column-3">
                            <div class="careerfy-typo-wrap">
                                <?php include("include/company-menu-bar.php"); ?>
                            </div>
                        </aside>
                        <div class="careerfy-column-9">
                            <div class="careerfy-typo-wrap">
							
							 <?php if(isset($_GET['op'])) {?>
								<div class="alert alert-success">
									 <?php if(isset($_GET['op']) AND ($_GET['op']=="u")){
										echo "Record Updated Successfully.";
										}
									?>
								</div>
							<?php } ?>							
							
								 <form class="careerfy-employer-dasboard" name="emp_comp_form" id="emp_comp_form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
								   <div class="careerfy-employer-box-section">
									  <div class="careerfy-profile-title">
										 <h2><?php echo $row["company_name"]; ?></h2>
									  </div>
									  <ul class="careerfy-row careerfy-employer-profile-form">
										 <div class="col-md-6">
											<li>
												<label>Your Name *</label>
												<input type="text"  name="name" value="<?php echo $row["name"]; ?>" required >
											</li>
										 </div>

										 <li class="careerfy-column-6 ">
											<label>Industry</label>
											<div class="careerfy-profile-select">
												 <select name="industry" id="industry" required>
													<option value="1">IT - Software</option>
												 </select>	
											   </div>
											 </li>
											 <li class="careerfy-column-6  ">
												<label>Organization Type</label>
												<div class="careerfy-profile-select">
													<select class="form-control" name="organization_type" id="organization_type" required>
													  <option value="Private"  <?php if($row["organization_type"]=="Private"){ ?> selected="selected" <?php } ?>>Private</option>
													  <option value="Government"  <?php if($row["organization_type"]=="Government"){ ?> selected="selected" <?php } ?>>Government</option>
												   </select>
												</div>
										  </li>
										 <div class="col-md-6">
											<li class="careerfy-column-12  ">
											   <label>Land Line </label>
											  <input type="text"  name="land_line_no" value="<?php echo $row["land_line_no"]; ?>"  >
											</li>
											 
										 </div>
										 <div class="col-md-6">
											<li class="careerfy-column-12  ">
											   <label>Phone *</label>
											   <input type="text"  name="cell_phone" value="<?php echo $row["cell_phone"]; ?>" required >
											</li>
											 
										 </div>
										 <div class="col-md-6">
											<li class="careerfy-column-12 ">
											   <label>Website</label>
											  <input type="text"  name="website" value="<?php echo $row["website"]; ?>"  >
											</li>
											 
										 </div>
										 <li class="careerfy-column-12 ">
											<label>No of Employee *</label>
											<div class="careerfy-profile-select">
											   <select name="no_of_employees" id="no_of_employees" class="form-control">
												  <option value="1-10" <?php if($row["no_of_employee"]=="1-10"){ ?> selected="selected" <?php } ?>>1-10</option>
												  <option value="11-50" <?php if($row["no_of_employee"]=="11-50"){ ?> selected="selected" <?php } ?>>11-50</option>
												  <option value="51-100" <?php if($row["no_of_employee"]=="51-100"){ ?> selected="selected" <?php } ?>>51-100</option>
												  <option value="101-300" <?php if($row["no_of_employee"]=="101-300"){ ?> selected="selected" <?php } ?>>101-300</option>
												  <option value="301-600" <?php if($row["no_of_employee"]=="301-600"){ ?> selected="selected" <?php } ?>>301-600</option>
												  <option value="601-1000" <?php if($row["no_of_employee"]=="601-1000"){ ?> selected="selected" <?php } ?>>601-1000</option>
												  <option value="1001-1500" <?php if($row["no_of_employee"]=="1001-1500"){ ?> selected="selected" <?php } ?>>1001-1500</option>
												  <option value="1501-2000" <?php if($row["no_of_employee"]=="1501-2000"){ ?> selected="selected" <?php } ?>>1501-2000</option>
												  <option value="More than 2000" <?php if($row["no_of_employee"]=="More than 2000"){ ?> selected="selected" <?php } ?>>More than 2000</option>
											   </select>
											 </div>
										 </li>
										
										 <div class="col-md-12">
											<li class="careerfy-column-12 ">
											   <label>Description *</label>
											   <textarea name="description" cols="70" row="20" ><?php echo $row["description"]; ?></textarea>
											</li>
											 
										 </div>
									  </ul>
								   </div>
								   <div class="careerfy-employer-box-section">
									  <div class="careerfy-profile-title">
										 <h2>Address / Location</h2>
									  </div>
									  <ul class="careerfy-row careerfy-employer-profile-form">
										 <li class="careerfy-column-12 ">
											<label>Country *</label>
											<div class="careerfy-profile-select">
												<select name="country">
													<option value="1">India</option>
												</select>
										   </div>
										 </li>
										
										 <div class="col-md-12">
											<li class="careerfy-column-12">
											   <label>City *</label>
											   <div class="careerfy-profile-select">
											   <select name="city" id="city">
													<option value="1" <?php if($row["city"]=="1"){ ?> selected="selected" <?php } ?>>Kolkata</option>
													<option value="2" <?php if($row["city"]=="2"){ ?> selected="selected" <?php } ?>>Durgapur</option>
													<option value="3" <?php if($row["city"]=="3"){ ?> selected="selected" <?php } ?>>Asansol</option>
											   </select>
											   </div>
											</li>
											 
										 </div>

										 <div class="col-md-12">
											<li class="careerfy-column-12 ">
											   <label>Full Address *</label>
											   <input type="text"  name="full_address" value="<?php echo $row["full_address"]; ?>" required >
											</li>
											 
										 </div>
										
									  </ul>
								   </div>
								   
									<input type="submit" name="submit" class="careerfy-employer-profile-submit" value="Save Setting">
								</form>                               
								
								
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

        </div>
        <!-- Main Content -->
        
        <!-- Footer -->
 		<?php include("include/footer.php"); ?>       
        <!-- Footer -->

    </div>
    <!-- Wrapper -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo SITE_URL; ?>script/jquery.js"></script>
    <script src="<?php echo SITE_URL; ?>script/bootstrap.js"></script>
    <script src="<?php echo SITE_URL; ?>script/slick-slider.js"></script>
    <script src="<?php echo SITE_URL; ?>plugin-script/counter.js"></script>
    <script src="<?php echo SITE_URL; ?>plugin-script/fancybox.pack.js"></script>
    <script src="<?php echo SITE_URL; ?>plugin-script/isotope.min.js"></script>
    <script src="<?php echo SITE_URL; ?>plugin-script/progressbar.js"></script>
    <script src="<?php echo SITE_URL; ?>script/google-map.js"></script>
    <script src="<?php echo SITE_URL; ?>build/mediaelement-and-player.js"></script>
    <script src="<?php echo SITE_URL; ?>plugin-script/functions.js"></script>
    <script src="<?php echo SITE_URL; ?>script/functions.js"></script>	
</body>


</html>
