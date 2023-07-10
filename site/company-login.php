<?php include('include/application-top.php'); 
$_SESSION['company_login']=0;
if((isset($_POST['submit'])) AND ($_POST['submit']=='Sign In'))	{

	$sql="select * from tbl_company where email = '".$_POST["email"]."'AND password = '".$_POST["password"]."'";
	$query=mysqli_query($connt,$sql);
	if(mysqli_num_rows($query)>0)
		{
			    $data=mysqli_fetch_assoc($query);
				//echo "<pre>"; print_r( $data); die;
				$_SESSION['company_login']=1;
				$_SESSION['company_id']=$data['id'];
				header("Location:company-dashboard-manage-jobs.php");
				
			}
		else
		  {
			//echo "not successful";
			$MSG="Invalid Email or Password, Please Try again!";
		}
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from combinedgroupltd.com/job/new_job/employer-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:46:14 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company SignIn</title>
    
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
        <div class="careerfy-job-subheader">
            <span class="careerfy-banner-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- SubHeader -->

        <!-- Main Content -->
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">
                        
                        <!-- Job Detail List -->
                        <div class="careerfy-column-12 careerfy-typo-wrap">
                            <figure class="careerfy-jobdetail-list">
                                <figcaption>
								

									<form action="<?php echo $_SERVER["PHP_SELF"] ?>" name="company_login" id="company_login" method="post">
										
										<div class="careerfy-user-options">
											<ul>
												<li class="active">
													<a href="#">
														 <i class="careerfy-icon careerfy-user"></i>
														 <span>Company</span>
														 <small>Login to your account</small>
														 
													</a>
													
													<div class="alert alert-danger">
														<?php if(isset($MSG) AND ($MSG<>"")){ echo $MSG; } ?>
													</div>													
													
												</li>
											</ul>
										</div>
										<div class="careerfy-user-form careerfy-user-form-coltwo">
											<ul>
												<li>
													<label>Email Address:</label>
													<input type="text" name="email" value="" required >
													<i class="careerfy-icon careerfy-mail"></i>
												</li>
												
												<li>
													<label>Password:</label>
													<input type="password" name="password" value="" required  >
													<i class="careerfy-icon careerfy-multimedia"></i>
												</li>													
												

												<li class="careerfy-user-form-coltwo-half">
													<input type="submit" name="submit" value="Sign In">
												</li>
												
												<li >
													<label></label>
													<a href="company-signup.php">Dont have an account? Signup Now </a>
												</li>
											</ul>
										</div>
										
									</form>									
									
									
                                </figcaption>
                            </figure>
                        </div>
                        <!-- Job Detail List -->

                        <!-- Job Detail Content -->
                        
                        <!-- Job Detail Content -->
                       

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


<!-- Mirrored from combinedgroupltd.com/job/new_job/employer-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:46:16 GMT -->
</html>
