<?php include('include/application-top.php');
CheckCompanyLogin();
if(isset($_POST['submit']))
			{
			extract($_POST);
			$error="";

			if((isset($password)) && ($password==''))
			{
				$error.="Please Enter Old Password";
			}
			
			if((isset($newpassword)) && ($newpassword==''))
			{
				$error.="Please Enter New Password";
			}
			if($conframpassword!=$newpassword)
			{
				$error.="Newpassword and confirmation password do not match. Please type more carefully!";
			}

			if((isset($conframpassword)) && ($conframpassword==''))
			{
				$error.="Please Enter Confirm Password";
			}
			if($error=='')
			{
			$sql_q=mysqli_query($connt,"SELECT * FROM tbl_company WHERE password='".mysqli_real_escape_string($connt,trim($_POST['password']))."' AND id=".$_SESSION['company_id']." "  );
			
			if(mysqli_num_rows($sql_q)>0)
			{
				$sql="UPDATE tbl_company SET password='" .mysqli_real_escape_string($connt,trim($_POST['conframpassword']))."' WHERE id=".$_SESSION['company_id']." ";
				$rs=mysqli_query($connt,$sql);
				
				$MSG1="Password changed sucessfully.";	
			
			
			//header("Location:login.php?msg=successful");	
			}
			else
			{
				$MSG="Old Password Does Not Match Try again!";
			}
			$row=mysqli_fetch_array($connt,$sql_q);
			//print_r($row);
   }
			else
			{
 				 $error;
			}
		}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from combinedgroupltd.com/job/new_job/candidate-dashboard-changed-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:45:57 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company Changed Password</title>
    
    <!-- Css -->
    <link href="<?php echo SITE_URL; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/flaticon.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>fonts/next-icon/flat-icon.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/slick-slider.css" rel="stylesheet">
    <link rel="<?php echo SITE_URL; ?>stylesheet" href="build/mediaelementplayer.css">
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
                    <li>Change Password</li>
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
                                <?php include("include/company-menu-bar.php"); ?>
                            </div>
                        </aside>
                        <div class="careerfy-column-9">
                            <div class="careerfy-typo-wrap">
							
							<?php
								if((isset($MSG1))||(isset($MSG)) || (isset($error)))
									{
								?>
								
									<div class="alert alert-danger">
										<?php   
										  if(isset($error) AND ($error<>"")){
										    echo $error;
										  }
										  if(isset($MSG) AND ($MSG<>"")){
										    echo $MSG;
										  }
										?>     
									 </div>
									 
									 <div class="alert alert-danger">
									   <?php 
										  if(isset($MSG1) AND ($MSG1<>"")){
											 echo $MSG1;
											}
									    ?>
									 </div>
							 
							 <?php } ?>							
							
							
							
							
                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" name="changepassword" class="careerfy-employer-dasboard">
                                    <div class="careerfy-employer-box-section">
                                        <div class="careerfy-profile-title">
                                            <h2>Change Password</h2>
                                        </div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-12">
                                                <label>Old Password *</label>
												<input type="password" name="password" maxlength="30" value="" id="password" class="required" size="30"/>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>New Password *</label>
												 <input type="password" name="newpassword" maxlength="16" value=""  id="newpassword" class="required" size="30"/>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Confirm New Password  *</label>
                                                <input type="password" name="conframpassword" maxlength="16" value="" id="conframpassword" class="required" size="30"/>
                                            </li>
                                        </ul>

                                    </div>
                                    <input type="submit" name="submit" class="careerfy-employer-profile-submit" value="Update Password">
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


</html>
