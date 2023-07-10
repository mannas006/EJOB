<?php include('include/application-top.php');
CheckCompanyLogin();
	if((isset($_POST['submit'])) AND ($_POST['submit']=='Submit'))
	{
	//echo "<pre>"; print_r($_POST); die;
	
		$sql = "UPDATE `tbl_post_jobs` SET 
				`job_title`         = '".mysqli_real_escape_string($connt,$_POST['job_title'])."',
				`last_date`         = '".mysqli_real_escape_string($connt,$_POST['last_date'])."',
				`job_description`   = '".mysqli_real_escape_string($connt,$_POST['job_description'])."',
				`vacancies`         = '".mysqli_real_escape_string($connt,$_POST['vacancies'])."',							
				`industry_id`       = '".mysqli_real_escape_string($connt,$_POST['industry_id'])."',
				`job_mode`          = '".mysqli_real_escape_string($connt,$_POST['job_mode'])."',
				`pay`               = '".mysqli_real_escape_string($connt,$_POST['pay'])."',
				`experience`        = '".mysqli_real_escape_string($connt,$_POST['experience'])."',
				`qualification`     = '".mysqli_real_escape_string($connt,$_POST['qualification'])."',
				`required_skills`   = '".mysqli_real_escape_string($connt,$_POST['required_skills'])."',
				`contact_person`    = '".mysqli_real_escape_string($connt,$_POST['contact_person'])."',
				`contact_email`     = '".mysqli_real_escape_string($connt,$_POST['contact_email'])."',
				`contact_phone`     = '".mysqli_real_escape_string($connt,$_POST['contact_phone'])."',
				`country`           = '".mysqli_real_escape_string($connt,$_POST['country'])."',
				`city`              = '".mysqli_real_escape_string($connt,$_POST['city'])."'
				WHERE `tbl_post_jobs`.`id` = '".$_GET['jobid']."'";
		
		if (mysqli_query($connt, $sql)) {
			header("Location:company-dashboard-manage-jobs.php?op=u");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connt);
		}		
	
	}


	$sql = "SELECT * FROM tbl_post_jobs WHERE company_id = '".$_SESSION['company_id']."' AND id = '".$_GET["jobid"]."'";
	$query = mysqli_query($connt, $sql);
	$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from combinedgroupltd.com/job/new_job/employer-dashboard-newjob.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:46:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employer NewJob</title>
    
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
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                            <h1>Companies</h1>
                            <p>Thousands of prestigious employers for you, search for a recruiter right now.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="careerfy-breadcrumb">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li>Companies</li>
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
                                <div class="careerfy-employer-dasboard">
                                    <form name="post_job_form" id="post_job_form" action="<?php echo $_SERVER["PHP_SELF"] ?>?jobid=<?php echo $_GET["jobid"]; ?>" method="post">
                                        <div class="careerfy-employer-box-section">
                                            <!-- Profile Title -->
                                            <div class="careerfy-profile-title">
                                                <h2>Update a New Job</h2>
                                            </div> 
                                          
                                            <ul class="careerfy-row careerfy-employer-profile-form">
												<li class="careerfy-column-12 ">
                                                                                                      
                                                </li>
                                                <li class="careerfy-column-6 ">
                                                    <label>Job Title *</label>
                                                    <input name="job_title" id="job_title" value="<?php echo $row["job_title"]; ?>" type="text" maxlength="150" required>
												</li>
												
												<li class="careerfy-column-6 ">
                                                <label>Deadline Submission *</label>
                                                <input name="last_date" id="last_date" value="<?php echo $row["last_date"]; ?>"  type="text" required>
												</li>
												
                                              
                                                <li class="careerfy-column-12 ">
                                                    <label>Description *</label>
                                                    <textarea name="job_description" id="job_description" required><?php echo $row["job_description"]; ?></textarea>
                                                </li>
												
												
                                                												
												
                                                <li class="careerfy-column-6  ">
                                                    <label>No Of Vacancies</label>
                                                    <input name="vacancies" id="vacancies" value="<?php echo $row["vacancies"]; ?>" type="text" required>
												</li>
												
                                                <li class="careerfy-column-6">
                                                    <label>Job Category *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="industry_id" id="industry_id" class="form-control" required>
															  <option value="1">IT - Software</option>
															  
															</select>
														 
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6 ">
                                                    <label>Job Type *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="job_mode" id="job_mode" class="form-control" required>
														  <option value="Full Time" <?php if($row["job_mode"]=="Full Time"){ ?> selected="selected" <?php } ?>>Full Time</option>
														  <option value="Part Time"  <?php if($row["job_mode"]=="Part Time"){ ?> selected="selected" <?php } ?>>Part Time</option>
														  <option value="Home Based"  <?php if($row["job_mode"]=="Home Based"){ ?> selected="selected" <?php } ?>>Home Based</option>
														</select>
													</div>
                                                </li>
                                  
                                                <li class="careerfy-column-6 ">
                                                    <label>Salary Offer</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="pay" id="pay" class="form-control" required>
															  <option value="Please Select">Please Select</option>
															  <option value="10000" <?php if($row["pay"]=="10000"){ ?> selected="selected" <?php } ?>>10,000</option>
															  <option value="15000" <?php if($row["pay"]=="15000"){ ?> selected="selected" <?php } ?>>15,000</option>
															  <option value="20000" <?php if($row["pay"]=="20000"){ ?> selected="selected" <?php } ?>>20,000</option>
															  <option value="25000" <?php if($row["pay"]=="25000"){ ?> selected="selected" <?php } ?>>25,000</option>
															  <option value="30000" <?php if($row["pay"]=="30000"){ ?> selected="selected" <?php } ?>>30,000</option>
															  <option value="35000" <?php if($row["pay"]=="35000"){ ?> selected="selected" <?php } ?>>35,000</option>
															  <option value="40000" <?php if($row["pay"]=="40000"){ ?> selected="selected" <?php } ?>>40,000</option>
															  <option value="45000" <?php if($row["pay"]=="45000"){ ?> selected="selected" <?php } ?>>45,000</option>
															  <option value="50000" <?php if($row["pay"]=="50000"){ ?> selected="selected" <?php } ?>>50,000</option>
															  <option value="55000" <?php if($row["pay"]=="55000"){ ?> selected="selected" <?php } ?>>55,000</option>
															  <option value="60000" <?php if($row["pay"]=="60000"){ ?> selected="selected" <?php } ?>>60,000</option>
															  <option value="65000" <?php if($row["pay"]=="65000"){ ?> selected="selected" <?php } ?>>65,000</option>
															  <option value="70000" <?php if($row["pay"]=="70000"){ ?> selected="selected" <?php } ?>>70,000</option>
															  <option value="80000" <?php if($row["pay"]=="80000"){ ?> selected="selected" <?php } ?>>80,000</option>
															  <option value="90000" <?php if($row["pay"]=="90000"){ ?> selected="selected" <?php } ?>>90,000</option>
															  <option value="100000" <?php if($row["pay"]=="100000"){ ?> selected="selected" <?php } ?>>100,000</option>
															  

															</select>
														</div>
                                                </li>

                                                <li class="careerfy-column-6 ">
                                                    <label>Experience</label>
                                                    <div class="careerfy-profile-select">
                                                       <select name="experience" id="experience" class="form-control" required>
														  <option value="Fresh" <?php if($row["experience"]=="Fresh"){ ?> selected="selected" <?php } ?>>Fresh</option>
														  <option value="Less than 1" <?php if($row["experience"]=="Less than 1"){ ?> selected="selected" <?php } ?>>Less than 1 year</option>
															  <option value="1" <?php if($row["experience"]=="1"){ ?> selected="selected" <?php } ?>>1</option>
															  <option value="2" <?php if($row["experience"]=="2"){ ?> selected="selected" <?php } ?>>2</option>
															  <option value="3" <?php if($row["experience"]=="3"){ ?> selected="selected" <?php } ?>>3</option>
															  <option value="4" <?php if($row["experience"]=="4"){ ?> selected="selected" <?php } ?>>4</option>
															  <option value="5" <?php if($row["experience"]=="5"){ ?> selected="selected" <?php } ?>>5</option>
															  <option value="6" <?php if($row["experience"]=="6"){ ?> selected="selected" <?php } ?>>6</option>
															  <option value="7" <?php if($row["experience"]=="7"){ ?> selected="selected" <?php } ?>>7</option>
															  <option value="8" <?php if($row["experience"]=="8"){ ?> selected="selected" <?php } ?>>8</option>
															  <option value="9" <?php if($row["experience"]=="9"){ ?> selected="selected" <?php } ?>>9</option>
															  <option value="10" <?php if($row["experience"]=="10"){ ?> selected="selected" <?php } ?>>10</option>
															  <option value="10+" <?php if($row["experience"]=="10+"){ ?> selected="selected" <?php } ?>>10+</option>
														</select>
													 </div>
                                                </li>

                                                <li class="careerfy-column-6 ">
                                                    <label>Qualification</label>
                                                    <div class="careerfy-profile-select">
                                                       <select name="qualification" id="qualification" class="form-control" required>
														 
															  <option value="BA" <?php if($row["qualification"]=="BA"){ ?> selected="selected" <?php } ?>>BA</option>
															  <option value="BE" <?php if($row["qualification"]=="BE"){ ?> selected="selected" <?php } ?>>BE</option>
															  <option value="BS" <?php if($row["qualification"]=="BS"){ ?> selected="selected" <?php } ?>>BS</option>
															  <option value="CA" <?php if($row["qualification"]=="CA"){ ?> selected="selected" <?php } ?>>CA</option>
															  <option value="Certification" <?php if($row["qualification"]=="Certification"){ ?> selected="selected" <?php } ?>>Certification</option>
															  <option value="Diploma" <?php if($row["qualification"]=="Diploma"){ ?> selected="selected" <?php } ?>>Diploma</option>
															  <option value="HSSC" <?php if($row["qualification"]=="HSSC"){ ?> selected="selected" <?php } ?>>HSSC</option>
															  <option value="MA" <?php if($row["qualification"]=="MA"){ ?> selected="selected" <?php } ?>>MA</option>
															  <option value="MBA" <?php if($row["qualification"]=="MBA"){ ?> selected="selected" <?php } ?>>MBA</option>
															  <option value="MS" <?php if($row["qualification"]=="MS"){ ?> selected="selected" <?php } ?>>MS</option>
															  <option value="PhD" <?php if($row["qualification"]=="PhD"){ ?> selected="selected" <?php } ?>>PhD</option>
															  <option value="SSC" <?php if($row["qualification"]=="SSC"){ ?> selected="selected" <?php } ?>>SSC</option>
															  <option value="ACMA" <?php if($row["qualification"]=="ACMA"){ ?> selected="selected" <?php } ?>>ACMA</option>
															  <option value="MCS" <?php if($row["qualification"]=="MCS"){ ?> selected="selected" <?php } ?>>MCS</option>
															  <option value="Does not matter" <?php if($row["qualification"]=="Does not matter"){ ?> selected="selected" <?php } ?>>Does not matter</option>
															  <option value="B.Tech" <?php if($row["qualification"]=="B.Tech"){ ?> selected="selected" <?php } ?>>B.Tech</option>
															</select>
														</div>
                                                </li>
												
                                            </ul>
											
											 <ul class="careerfy-row careerfy-employer-profile-form skillDetail">
														<li class="careerfy-column-6 ui-widget">
															<label>Required Skills *</label>
															 <select name="required_skills" id="required_skills" class="form-control" required>
															  
															  <option value="php" <?php if($row["required_skills"]=="php"){ ?> selected="selected" <?php } ?>>PHP</option>
															  <option value="java" <?php if($row["required_skills"]=="java"){ ?> selected="selected" <?php } ?>>JAVA</option>
															  <option value=".net" <?php if($row["required_skills"]==".net"){ ?> selected="selected" <?php } ?>>.NET</option>
															  
															</select>
                                            			 </li>
											 
													 <!--<li class="careerfy-column-6 ui-widget ">
		
															<input style="width:auto;margin-top: 8px; float:left; height:auto;" type="checkbox" name="private" id="private"  value="1" class="form-control">
															Private Job (Check if this is a Private job) <br>
															
															<input style="width:auto;margin-top: 8px; float:left; height:auto;" type="checkbox" name="featured" id="featured"  value="1" class="form-control">
															Featured(Check if this is a Featured job) <br>
															
															<input style="width:auto;margin-top: 8px; float:left; height:auto;" type="checkbox" name="temporary" id="temporary"  value="1" class="form-control">
															Temporary(Check if this is a Temporary job) <br>
															
															
															<input style="width:auto;margin-top: 8px; float:left; height:auto;" type="checkbox" name="bid" id="bid" value="1" class="form-control">
															Allow to bid job													
															
													
													 </li>								 
											 
											 
				   
													<small>Single skill at a time.</small>	-->		
				   
											 </ul>
											
                                        </div>
										
										
										 <div class="careerfy-employer-box-section">
                                            <div class="careerfy-profile-title"><h2>Contact Information</h2></div>
                                            <ul class="careerfy-row careerfy-employer-profile-form">
												 <li class="careerfy-column-6">
                                                    <label>Contact Person *</label>
                                                    <input name="contact_person" id="contact_person" value="<?php echo $row["contact_person"]; ?>" type="text" >
                                                </li> 												 
												<li class="careerfy-column-6">
												
                                                    <label>Email *</label>
                                                    <input name="contact_email" id="contact_email" value="<?php echo $row["contact_email"]; ?>"  type="text">
                                                </li> 												 
												<li class="careerfy-column-6">
                                                    <label>Phone *</label>
                                                    <input name="contact_phone" id="contact_phone" value="<?php echo $row["contact_phone"]; ?>"  type="text">
												</li>
                                            </ul>
										</div>
										
										
                                        <div class="careerfy-employer-box-section">
                                            <div class="careerfy-profile-title"><h2>Address / Location</h2></div>
                                            <ul class="careerfy-row careerfy-employer-profile-form">
                                                <li class="careerfy-column-6 ">
                                                    <label>Country *</label>
                                                    <div class="careerfy-profile-select">
                                                         <select name="country" id="country" class="form-control" required>
															  <option value="1">India</option>
														 </select>
													</div>
                                                </li>

                                												
												 <li class="careerfy-column-6">
                                                    <label>City *</label>
														<select name="city" required> 
															<option value="1" <?php if($row["city"]=="1"){ ?> selected="selected" <?php } ?>>Kolkata</option>
															<option value="2" <?php if($row["city"]=="2"){ ?> selected="selected" <?php } ?>>Durgapur</option>
															<option value="3" <?php if($row["city"]=="3"){ ?> selected="selected" <?php } ?>>Asansol</option>
														</select>
                     
                                                </li>
												
                                          
                                            </ul>
                                        </div>
                                        <input type="submit" name="submit" id="submit" class="careerfy-employer-profile-submit" value="Submit">
                                    </form>
                                </div>
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

    <!-- ModalLogin Box -->
    
    <!-- Modal Signup Box -->
    

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


<!-- Mirrored from combinedgroupltd.com/job/new_job/employer-dashboard-newjob.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:46:20 GMT -->
</html>
