<?php include('include/application-top.php');
CheckCompanyLogin();
	if((isset($_POST['submit'])) AND ($_POST['submit']=='Submit'))
	{
		$sql = "INSERT INTO 
				`tbl_post_jobs` 
				(`company_id`,`job_title`,`last_date`,`job_description`,`vacancies`,`industry_id`,`job_mode`,`pay`,`experience`,`qualification`,`required_skills`,`contact_person`,`contact_email`,`contact_phone`,`country`,`city`) 
				VALUES ('".$_SESSION['company_id']."', 
						'".$_POST['job_title']."', 
						'".$_POST['last_date']."',
						'".$_POST['job_description']."', 
						'".$_POST['vacancies']."',
						'".$_POST['industry_id']."',
						'".$_POST['job_mode']."',
						'".$_POST['pay']."',
						'".$_POST['experience']."',
						'".$_POST['qualification']."',
						'".$_POST['required_skills']."',
						'".$_POST['contact_person']."',
						'".$_POST['contact_email']."',
						'".$_POST['contact_phone']."',
						'".$_POST['country']."',
						'".$_POST['city']."'
						)";
		
		if (mysqli_query($connt, $sql)) {
			$lid=mysqli_insert_id($connt);
						
			header("Location:company-dashboard-manage-jobs.php?op=a");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connt);
		}	
	}

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
                    <li>Candidates</li>
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
                                    <form name="post_job_form" id="post_job_form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                                        <div class="careerfy-employer-box-section">
                                            <!-- Profile Title -->
                                            <div class="careerfy-profile-title">
                                                <h2>Post a New Job</h2>
                                            </div> 
                                          
                                            <ul class="careerfy-row careerfy-employer-profile-form">
												<li class="careerfy-column-12 ">
                                                                                                      
                                                </li>
                                                <li class="careerfy-column-6 ">
                                                    <label>Job Title *</label>
                                                    <input name="job_title" id="job_title" value="" type="text" maxlength="150" required>
												</li>
												
												<li class="careerfy-column-6 ">
                                                <label>Deadline Submission *</label>
                                                <input name="last_date" id="last_date" value=""  type="text" required>
												</li>
												
                                              
                                                <li class="careerfy-column-12 ">
                                                    <label>Description *</label>
                                                    <textarea name="job_description" id="job_description" required></textarea>
                                                </li>
												
												
                                                												
												
                                                <li class="careerfy-column-6  ">
                                                    <label>No Of Vacancies</label>
                                                    <input name="vacancies" id="vacancies" value="" type="text" required>
												</li>
												
                                                <li class="careerfy-column-6">
                                                    <label>Job Category *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="industry_id" id="industry_id" class="form-control" required>
														  <option value="" selected="">Select Industry</option>
															  
															 
															  <option value="1">IT - Software</option>
															  
															</select>
														 
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6 ">
                                                    <label>Job Type *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="job_mode" id="job_mode" class="form-control" required>
														  <option value="Full Time" selected="selected">Full Time</option>
														  <option value="Part Time">Part Time</option>
														  <option value="Home Based">Home Based</option>
														</select>
													</div>
                                                </li>
                                  
                                                <li class="careerfy-column-6 ">
                                                    <label>Salary Offer</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="pay" id="pay" class="form-control" required>
															  <option value="Please Select">Please Select</option>
															  <option value="10000">10,000</option>
															  <option value="15000">15,000</option>
															  <option value="20000">20,000</option>
															  <option value="25000">25,000</option>
															  <option value="30000">30,000</option>
															   <option value="35000">35,000</option>
															  <option value="40000">40,000</option>
															  <option value="45000">45,000</option>
															  <option value="50000">50,000</option>
															  <option value="55000">55,000</option>
															  <option value="60000">60,000</option>
															  <option value="65000">65,000</option>
															  <option value="70000" >70,000</option>
															  <option value="80000">80,000</option>
															  <option value="90000">90,000</option>
															  <option value="100000">100,000</option>
															  

															</select>
														</div>
                                                </li>

                                                <li class="careerfy-column-6 ">
                                                    <label>Experience</label>
                                                    <div class="careerfy-profile-select">
                                                       <select name="experience" id="experience" class="form-control" required>
														  <option value="Fresh" selected="selected">Fresh</option>
														  <option value="Less than 1">Less than 1 year</option>
															  <option value="1">1</option>
															  <option value="2">2</option>
															  <option value="3">3</option>
															  <option value="4">4</option>
															  <option value="5">5</option>
															  <option value="6">6</option>
															  <option value="7">7</option>
															  <option value="8">8</option>
															  <option value="9">9</option>
															  <option value="10">10</option>
															  <option value="10+">10+</option>
														</select>
													 </div>
                                                </li>

                                                <li class="careerfy-column-6 ">
                                                    <label>Qualification</label>
                                                    <div class="careerfy-profile-select">
                                                       <select name="qualification" id="qualification" class="form-control" required>
														  <option value="">Select Qualification</option>
															  <option value="BA">BA</option>
															  <option value="BE">BE</option>
															  <option value="BS">BS</option>
															  <option value="CA">CA</option>
															  <option value="Certification">Certification</option>
															  <option value="Diploma">Diploma</option>
															  <option value="HSSC">HSSC</option>
															  <option value="MA" selected="selected">MA</option>
															  <option value="MBA">MBA</option>
															  <option value="MS">MS</option>
															  <option value="PhD">PhD</option>
															  <option value="SSC">SSC</option>
															  <option value="ACMA">ACMA</option>
															  <option value="MCS">MCS</option>
															  <option value="Does not matter">Does not matter</option>
															  <option value="B.Tech">B.Tech</option>
															</select>
														</div>
                                                </li>
												
                                            </ul>
											
											 <ul class="careerfy-row careerfy-employer-profile-form skillDetail">
														<li class="careerfy-column-6 ui-widget">
															<label>Required Skills *</label>
															 <select name="required_skills" id="required_skills" class="form-control" required>
															  <option value="Please Select">Please Select</option>
															  <option value="php">PHP</option>
															  <option value="java">JAVA</option>
															  <option value=".net">.NET</option>
															  
															</select>
                                            			 </li>
											 
													<!-- <li class="careerfy-column-6 ui-widget ">
		
															<input style="width:auto;margin-top: 8px; float:left; height:auto;" type="checkbox" name="private" id="private"  value="1" class="form-control">
															Private Job (Check if this is a Private job) <br>
															
															<input style="width:auto;margin-top: 8px; float:left; height:auto;" type="checkbox" name="featured" id="featured"  value="1" class="form-control">
															Featured(Check if this is a Featured job) <br>
															
															<input style="width:auto;margin-top: 8px; float:left; height:auto;" type="checkbox" name="temporary" id="temporary"  value="1" class="form-control">
															Temporary(Check if this is a Temporary job) <br>
															
															
															<input style="width:auto;margin-top: 8px; float:left; height:auto;" type="checkbox" name="bid" id="bid" value="1" class="form-control">
															Allow to bid job													
															
													
													 </li>											 
											 
											 
				   
													<small>Single skill at a time.</small>-->
				   
											 </ul>
											
                                        </div>
										
										
										 <div class="careerfy-employer-box-section">
                                            <div class="careerfy-profile-title"><h2>Contact Information</h2></div>
                                            <ul class="careerfy-row careerfy-employer-profile-form">
												 <li class="careerfy-column-6">
                                                    <label>Contact Person *</label>
                                                    <input name="contact_person" id="contact_person" value="" type="text" >
                                                </li> 												 
												<li class="careerfy-column-6">
												
                                                    <label>Email *</label>
                                                    <input name="contact_email" id="contact_email" value=""  type="text">
                                                </li> 												 
												<li class="careerfy-column-6">
                                                    <label>Phone *</label>
                                                    <input name="contact_phone" id="contact_phone" value=""  type="text">
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
													 <div class="careerfy-profile-select">
														<select name="city" required> 
															<option value="1">Kolkata</option>
															<option value="2">Durgapur</option>
															<option value="3">Asansol</option>
														</select>
                     								</div>
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
