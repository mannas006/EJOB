<?php include('include/application-top.php');
CheckCandidateLogin();

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from combinedgroupltd.com/job/new_job/candidate-dashboard-applied-jobs.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:45:54 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Candidate Applied Jobs</title>
    
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
            <div class="careerfy-main-section careerfy-dashboard-full">
                <div class="container">
                    <div class="row">

                        <aside class="careerfy-column-3">
                            <div class="careerfy-typo-wrap">
                                <?php include("include/candidate-menu-bar.php"); ?>
                            </div>
                        </aside>
                        <div class="careerfy-column-9">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-box-section">
																	<?php
										if(isset($_GET['op']) AND ($_GET['op']=="del"))
										  {
											 echo "<div class='alert alert-danger'>Record Deleted Sucessfully.</div>";
										   }
									?>
                                    <div class="careerfy-profile-title">
                                        <h2>Applied Jobs</h2>
	                                 
                                    </div>
									
                                    <div class="careerfy-applied-jobs">
                                        <ul class="careerfy-row">
										
						
                                   <?php 
								   	$sqljob = "SELECT A.*, B.company_name, B.full_address, C.job_apply_date, C.job_id
												FROM tbl_post_jobs A 
												LEFT OUTER JOIN tbl_company B ON A.company_id = B.id 
												LEFT OUTER JOIN tbl_candidate_applied_for_job C ON A.id = C.job_id 
												WHERE C.candidate_id = '".$_SESSION['candidate_id']."'";
									$queryjob=mysqli_query($connt,$sqljob);
									if(mysqli_num_rows($queryjob)>0){
										while($row = mysqli_fetch_assoc($queryjob)){
								   ?>

                                            <li class="careerfy-column-12">
                                                <div class="careerfy-applied-jobs-wrap">
                                                    <a href="#" class="careerfy-applied-jobs-thumb"><img src="extra-images/candidate-01.jpg" alt=""></a>
                                                    <div class="careerfy-applied-jobs-text">
                                                        <div class="careerfy-applied-jobs-left">
                                                            <!--<span>@ Yup Studios</span>-->
                                                            <h2><a href="#"><a href="#"><?php echo $row["job_title"]; ?></a></h2>
                                                            <ul>
                                                                <li><i class="fa fa-map-marker"></i> @ INDIA,<?php if($row["city"] == 1){echo 'Kolkata'; }elseif($row["city"] == 2){ echo 'Durgapur'; }else{ echo 'Asansol';} ?></li>
                                                                <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">IT - Software</a></li>
                                                                <li><i class="careerfy-icon careerfy-calendar"></i> <?php echo date('M d, Y'); ?></li>
                                                            </ul>
                                                        </div>
                                                        <a href="delete-user-job-detail.php?jobid=<?php echo $row["job_id"]; ?>" class="careerfy-savedjobs-links"><i class="careerfy-icon careerfy-rubbish"></i></a>
                                                        <a href="job-detail.php?jobid=<?php echo $row["job_id"]; ?>" class="careerfy-savedjobs-links"><i class="careerfy-icon careerfy-view"></i></a>
                                                    </div>
                                                </div>
                                            </li>
											
									<?php
										} 
									}else{?>
									<li>No records Found</li>
									<?php
										
									
									}
									
									?>											
											
											
											
                                           
                                        </ul>
                                    </div>
                                    <!-- Pagination -->
                                    
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
        <footer id="careerfy-footer" class="careerfy-footer-two">
            <div class="container">
                <!-- Footer Widget -->
                <div class="careerfy-footer-widget">
                    <div class="row">
                        <aside class="col-md-9">
                            <div class="widget widget_section_nav">
                                <ul>
                                    <li><a href="#">Shortcodes</a></li>
                                    <li><a href="#">Browse Jobs</a></li>
                                    <li><a href="#">Browse Candidates</a></li>
                                    <li><a href="#">Help Center</a></li>
                                </ul>
                            </div>
                            <div class="widget widget_section_nav">
                                <ul>
                                    <li><a href="#">Job Page</a></li>
                                    <li><a href="#">Browse Categories</a></li>
                                    <li><a href="#">Employer Dashboard</a></li>
                                    <li><a href="#">Guidelines</a></li>
                                </ul>
                            </div>
                            <div class="widget widget_section_nav">
                                <ul>
                                    <li><a href="#">Job Page Alternative</a></li>
                                    <li><a href="#">Submit Resume</a></li>
                                    <li><a href="#">Add Job</a></li>
                                    <li><a href="#">NEW - Terms of Use</a></li>
                                </ul>
                            </div>
                            <div class="widget widget_section_nav">
                                <ul>
                                    <li><a href="#">Resume Page</a></li>
                                    <li><a href="#">Candidate Dashboard</a></li>
                                    <li><a href="#">Job Packages</a></li>
                                    <li><a href="#">NEW - Privacy & Cookies</a></li>
                                </ul>
                            </div>
                            <div class="careerfy-footer-newslatter">
                                <form>
                                    <label>Subscribe for weekly newsletter</label>
                                    <ul>
                                        <li>
                                            <i class="careerfy-icon careerfy-mail"></i>
                                            <input value="Sign up for newsletter professionally designed templates." onBlur="if(this.value == '') { this.value ='Sign up for newsletter professionally designed templates.'; }" onFocus="if(this.value =='Sign up for newsletter professionally designed templates.') { this.value = ''; }" type="text">
                                        </li>
                                        <li>
                                            <i class="careerfy-icon careerfy-arrows22"></i>
                                            <input type="submit" value="Subcribe">
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </aside>
                        <aside class="col-md-3">
                            <div class="widget jobsearch_twitter_widget">
                                <div class="jobsearch_twitter_widget_wrap">
                                    <p>Great fun commentating with @mj_slats that last 30 mins ! We were riding the emotion of the game with all our viewers, was great fun, enjoyed itx</p>
                                    <span>3 hours ago</span>
                                </div>
                                <small><i class="fa fa-twitter"></i> @ShaneWarne</small>
                            </div>
                        </aside>
                    </div>
                </div>
                <!-- Footer Widget -->
                <!-- CopyRight -->
                <div class="careerfy-copyright-two">
                    <ul class="careerfy-copyright-social">
                        <li><a href="#" class="careerfy-icon careerfy-facebook-logo"></a></li>
                        <li><a href="#" class="careerfy-icon careerfy-twitter-logo"></a></li>
                        <li><a href="#" class="careerfy-icon careerfy-linkedin-button"></a></li>
                        <li><a href="#" class="careerfy-icon careerfy-dribbble-logo"></a></li>
                    </ul>
                    <p>Copyrights © 2018 All Rights Reserved by EyeCix</p>
                    <ul class="careerfy-copyright-download">
                        <li>Download Apps</li>
                        <li><a href="#" class="careerfy-icon careerfy-apple"></a></li>
                        <li><a href="#" class="careerfy-icon careerfy-android-logo"></a></li>
                    </ul>
                </div>
                <!-- CopyRight -->
            </div>
        </footer>
        <!-- Footer -->

    </div>
    <!-- Wrapper -->

    <!-- ModalLogin Box -->
    <div class="careerfy-modal fade careerfy-typo-wrap" id="JobSearchModalSignup">
        <div class="modal-inner-area">&nbsp;</div>
        <div class="modal-content-area">
            <div class="modal-box-area">

                <div class="careerfy-modal-title-box">
                    <h2>Login to your account</h2>
                    <span class="modal-close"><i class="fa fa-times"></i></span>
                </div>
                <form>
                    <div class="careerfy-box-title">
                        <span>Choose your Account Type</span>
                    </div>
                    <div class="careerfy-user-options">
                        <ul>
                            <li class="active">
                                <a href="#">
                                     <i class="careerfy-icon careerfy-user"></i>
                                     <span>Candidate</span>
                                     <small>I want to discover awesome companies.</small>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                     <i class="careerfy-icon careerfy-building"></i>
                                     <span>Employer</span>
                                     <small>I want to attract the best talent.</small>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="careerfy-user-form">
                        <ul>
                            <li>
                                <label>Email Address:</label>
                                <input value="Enter Your Email Address" onBlur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onFocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text">
                                <i class="careerfy-icon careerfy-mail"></i>
                            </li>
                            <li>
                                <label>Password:</label>
                                <input value="Enter Password" onBlur="if(this.value == '') { this.value ='Enter Password'; }" onFocus="if(this.value =='Enter Password') { this.value = ''; }" type="text">
                                <i class="careerfy-icon careerfy-multimedia"></i>
                            </li>
                            <li>
                                <input type="submit" value="Sign In">
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <div class="careerfy-user-form-info">
                            <p>Forgot Password? | <a href="#">Sign Up</a></p>
                            <div class="careerfy-checkbox">
                                <input type="checkbox" id="r10" name="rr" />
                                <label for="r10"><span></span> Remember Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="careerfy-box-title careerfy-box-title-sub">
                        <span>Or Sign In With</span>
                    </div>
                    <div class="clearfix"></div>
                    <ul class="careerfy-login-media">
                        <li><a href="#"><i class="fa fa-facebook"></i> Sign In with Facebook</a></li>
                        <li><a href="#" data-original-title="google"><i class="fa fa-google"></i> Sign In with Google</a></li>
                        <li><a href="#" data-original-title="twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</a></li>
                        <li><a href="#" data-original-title="linkedin"><i class="fa fa-linkedin"></i> Sign In with LinkedIn</a></li>
                    </ul>
                </form>
                
            </div>
        </div>
    </div>
    <!-- Modal Signup Box -->
    <div class="careerfy-modal fade careerfy-typo-wrap" id="JobSearchModalLogin">
        <div class="modal-inner-area">&nbsp;</div>
        <div class="modal-content-area">
            <div class="modal-box-area">

                <div class="careerfy-modal-title-box">
                    <h2>Signup to your account</h2>
                    <span class="modal-close"><i class="fa fa-times"></i></span>
                </div>
                <form>
                    <div class="careerfy-box-title">
                        <span>Choose your Account Type</span>
                    </div>
                    <div class="careerfy-user-options">
                        <ul>
                            <li class="active">
                                <a href="#">
                                     <i class="careerfy-icon careerfy-user"></i>
                                     <span>Candidate</span>
                                     <small>I want to discover awesome companies.</small>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                     <i class="careerfy-icon careerfy-building"></i>
                                     <span>Employer</span>
                                     <small>I want to attract the best talent.</small>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="careerfy-user-form careerfy-user-form-coltwo">
                        <ul>
                            <li>
                                <label>First Name:</label>
                                <input value="Enter Your Name" onBlur="if(this.value == '') { this.value ='Enter Your Name'; }" onFocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text">
                                <i class="careerfy-icon careerfy-user"></i>
                            </li>
                            <li>
                                <label>Last Name:</label>
                                <input value="Enter Your Name" onBlur="if(this.value == '') { this.value ='Enter Your Name'; }" onFocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text">
                                <i class="careerfy-icon careerfy-user"></i>
                            </li>
                            <li>
                                <label>Email Address:</label>
                                <input value="Enter Your Email Address" onBlur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onFocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text">
                                <i class="careerfy-icon careerfy-mail"></i>
                            </li>
                            <li>
                                <label>Phone Number:</label>
                                <input value="Enter Your Phone Number" onBlur="if(this.value == '') { this.value ='Enter Your Phone Number'; }" onFocus="if(this.value =='Enter Your Phone Number') { this.value = ''; }" type="text">
                                <i class="careerfy-icon careerfy-technology"></i>
                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                                <label>Categories:</label>
                                <div class="careerfy-profile-select">
                                    <select>
                                        <option>Sales & Marketing</option>
                                        <option>Sales & Marketing</option>
                                    </select>
                                </div>
                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                                <img src="extra-images/login-robot.png" alt="">
                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                                <input type="submit" value="Sign Up">
                            </li>
                        </ul>
                    </div>
                    <div class="careerfy-box-title careerfy-box-title-sub">
                        <span>Or Sign Up With</span>
                    </div>
                    <div class="clearfix"></div>
                    <ul class="careerfy-login-media">
                        <li><a href="#"><i class="fa fa-facebook"></i> Sign In with Facebook</a></li>
                        <li><a href="#" data-original-title="google"><i class="fa fa-google"></i> Sign In with Google</a></li>
                        <li><a href="#" data-original-title="twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</a></li>
                        <li><a href="#" data-original-title="linkedin"><i class="fa fa-linkedin"></i> Sign In with LinkedIn</a></li>
                    </ul>
                </form>
                
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="script/jquery.js"></script>
    <script src="script/bootstrap.js"></script>
    <script src="script/slick-slider.js"></script>
    <script src="plugin-script/counter.js"></script>
    <script src="plugin-script/fancybox.pack.js"></script>
    <script src="plugin-script/isotope.min.js"></script>
    <script src="plugin-script/functions.js"></script>
    <script src="script/functions.js"></script>

</body>


<!-- Mirrored from combinedgroupltd.com/job/new_job/candidate-dashboard-applied-jobs.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:45:57 GMT -->
</html>
