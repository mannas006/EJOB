<?php include('include/application-top.php'); 
	if((isset($_POST['submit'])) AND ($_POST['submit']=='Sign Up'))
	{
	
	
	  if(!empty($_FILES['image']))
	  {
		$path = "uploads/company/";
		$path = $path . basename( $_FILES['image']['name']);
		$imagename = basename( $_FILES['image']['name']);
		
		  @$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		  $extensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$extensions)=== false){
			$MSG='Not allowed extension,please upload jpg,jpeg,gif,png images only!';
		  }else{
			if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {	
	
					$sql = "INSERT INTO 
							`tbl_company` 
							(`name`,`email`,`password`,`imagename`,`company_name`,`company_logo`,`industry`,`land_line_no`,`website`,`description`,`organization_type`,`cell_phone`,`no_of_employee`,`country`,`city`,`full_address`) 
							VALUES ('".mysqli_real_escape_string($connt,$_POST['name'])."', 
									'".mysqli_real_escape_string($connt,$_POST['email'])."', 
									'".mysqli_real_escape_string($connt,$_POST['password'])."',
									'".mysqli_real_escape_string($connt,$imagename)."',
									'".mysqli_real_escape_string($connt,$_POST['company_name'])."', 
									'".mysqli_real_escape_string($connt,$_POST['company_logo'])."',
									'".mysqli_real_escape_string($connt,$_POST['industry'])."',
									'".mysqli_real_escape_string($connt,$_POST['land_line_no'])."',
									'".mysqli_real_escape_string($connt,$_POST['website'])."',
									'".mysqli_real_escape_string($connt,$_POST['description'])."',
									'".mysqli_real_escape_string($connt,$_POST['organization_type'])."',
									'".mysqli_real_escape_string($connt,$_POST['cell_phone'])."',
									'".mysqli_real_escape_string($connt,$_POST['no_of_employee'])."',
									'".mysqli_real_escape_string($connt,$_POST['country'])."',
									'".mysqli_real_escape_string($connt,$_POST['city'])."',
									'".mysqli_real_escape_string($connt,$_POST['full_address'])."'
									)";
					
					if (mysqli_query($connt, $sql)) {
						$lid=mysqli_insert_id($connt);
						
						$_SESSION['company_login']=1;
						$_SESSION['company_id']=$lid;			
						header("Location:company-dashboard-manage-jobs.php?op=a");
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($connt);
					}
		
			}
		
		
		}
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
    <title>Company Registration</title>
    
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
								
										<?php
											if(isset($MSG) AND ($MSG<>"")){
											 echo "<div class='alert alert-danger' role='alert'>".$MSG."</div>";
											}
										?>									
								

										<form action="<?php echo $_SERVER["PHP_SELF"] ?>" name="company_signup" id="company_signup" method="post" enctype="multipart/form-data">
											
											<div class="careerfy-user-options">
												<ul>
													<li class="active">
														<a href="#">
															 <i class="careerfy-icon careerfy-user"></i>
															 <span>Company</span>
															 <small>Signup to your account</small>
														</a>
													</li>
												</ul>
											</div>
											<div class="careerfy-user-form careerfy-user-form-coltwo">
												<ul>
													<li>
														<label>Your Name *</label>
														<input type="text"  name="name" value="" required >
														
													</li>
													
													<li>
														<label>Email Address *</label>
														<input type="text" name="email" value="" required >
														
													</li>
													
													<li>
														<label>Password *</label>
														<input type="password" name="password" value="" required  >
														
													</li>													
													
													
													<li>
														<label>Company Name *</label>
														<input type="text"  name="company_name" value="" required >
														
													</li>	
													
													<li>
														<label>Company Logo *</label>
														<input type="file"  name="image" required >
													</li>														
																										
																									
													
													<li>
														<label>Industry *</label>

														<select name="industry" id="industry" required>
															<option value="" selected="">Select Industry</option>
															<option value="1">IT - Software</option>
														 </select>														
														
														
														
													</li>
													
													<li>
														<label>Organization Type *</label>
														<select class="form-control" name="organization_type" id="organization_type" required>
														  <option value="Private">Private</option>
														 <!-- <option value="Public">Public</option>-->
														  <option value="Government">Government</option>
														  <!--<option value="Semi-Government">Semi-Government</option>
														  <option value="NGO">NGO</option>-->
													   </select>													
													
													
													</li>
													
													
													<li>
														<label>Land Line </label>
														<input type="text"  name="land_line_no" value=""  >
													</li>																										
																											
													
													
													<li>
														<label>Phone *</label>
														<input type="text"  name="cell_phone" value="" required >
													</li>
													
													
													<li>
														<label>Website </label>
														<input type="text"  name="website" value=""  >
													</li>													
														
												
																												
														
													<li>
														<label>No of Employee *</label>
														  <select name="no_of_employee" id="no_of_employee" class="form-control" required>
															  <option value="1-10">1-10</option>
															  <option value="11-50">11-50</option>
															  <option value="51-100">51-100</option>
															  <option value="101-300">101-300</option>
															  <option value="301-600">301-600</option>
															  <option value="601-1000">601-1000</option>
															  <option value="1001-1500">1001-1500</option>
															  <option value="1501-2000">1501-2000</option>
															  <option value="More than 2000">More than 2000</option>
														   </select>														
														
														
													</li>														
														
													<li>
														<label>Description *</label>
														<textarea name="description" cols="70" row="20" style="margin: 0px; height: 203px; width: 520px;"></textarea>
													</li>															
														
																											
													<li>
														<label>Country *</label>
														<select name="country">
															<option value="1">India</option>
														</select>
													</li>	
													
													
													<li>
														<label>City *</label>
														<select name="city">
															<option value="1">Kolkata</option>
															<option value="2">Durgapur</option>
															<option value="3">Asansol</option>
														</select>
													</li>	
													
													
													<li>
														<label>Full Address</label>
														<input type="text"  name="full_address" value="" required >
													</li>																																						

													<li class="careerfy-user-form-coltwo-half">
														<input type="submit" name="submit" value="Sign Up">
													</li>
												</ul>
											</div>
											
										</form>
									
									
									
                                </figcaption>
                            </figure>
                        </div>
                        <!-- Job Detail List -->


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
