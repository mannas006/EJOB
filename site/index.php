<?php include('include/application-top.php'); ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from combinedgroupltd.com/job/new_job/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:44:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careerfy Home 2</title>
    
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
    <style>
        .img_logo {
            
            width: 230px !important;
            max-width: 230px;
        }
        
    </style>
    <!-- Wrapper -->
    <div class="careerfy-wrapper">

        <!-- Header -->
        <?php include("include/header.php"); ?>
        <!-- Header -->
        
        <!-- Banner -->
        <div class="careerfy-banner-two careerfy-typo-wrap">
            <div class="careerfy-banner-caption">
                <div class="container">

                    <h1>Want To Get Your Dream Job?</h1>
                    <p>Everybody Is Looking For Jobs, Find The Best Jobs With Us!</p>
                    <div class="clearfix"></div>
                    <a href="#" class="careerfy-banner-two-btn">Find a Jobs</a>
                    <div class="clearfix"></div>
                    <form action="job-listings.php" class="careerfy-banner-search-two" method="get" name="jobsearch">
                        <ul>
                            <li>
                                <i class="careerfy-icon careerfy-search"></i>
                                <input value="Job Title, or Keywords" name="search_keyword" onBlur="if(this.value == '') { this.value ='Job Title, or Keywords'; }" onFocus="if(this.value =='Job Title, or Keywords') { this.value = ''; }" type="text">
                            </li>
                            <li>
                                <i class="careerfy-icon careerfy-location"></i>
                                <div class="careerfy-select-style">
                                    <select name="city">
                                        <option value="1" style="background-color:#0033FF;">Kolkata</option>
										<option value="2" style="background-color:#0033FF;">Durgapur</option>
										<option value="3" style="background-color:#0033FF;">Asansol</option>
                                    </select>
                                </div>						   
						   
						    </li>
                            <li>
                                <i class="careerfy-icon careerfy-folder"></i>
                                <div class="careerfy-select-style">
                                    <select name="industry_id">
                                        <option value="1">IT - Software</option>
                                    </select>
                                </div>
                            </li>
                            <li> <input type="submit" value="Search Jobs"> </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <!-- Banner -->

        <!-- Main Content -->
        <div class="careerfy-main-content">
            


            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-joblisting-plain-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <!-- FancyTitle -->
                            <div class="careerfy-fancy-title careerfy-fancy-title-two">
                                <h2>Recommend <span>Jobs</span></h2>
                                <p>A better career is out there. We'll help you find it to use.</p>
                            </div>
                            <!-- FancyTitle -->
                            <!-- Job Listings -->
                            <div class="careerfy-job careerfy-joblisting-plain">
                                <ul class="row">
								
									
                                   <?php 
								   	$sql = "SELECT A.*, B.company_name, B.full_address FROM tbl_post_jobs A LEFT OUTER JOIN tbl_company B ON A.company_id = B.id WHERE A.status =1";
									$query=mysqli_query($connt,$sql);
									if(mysqli_num_rows($query)>0){
										while($row = mysqli_fetch_assoc($query)){
										//echo "<pre>"; print_r($row); die;
								   ?>
									
                                    <li class="col-md-12">
                                        <div class="careerfy-joblisting-plain-wrap">
                                            <figure><a href="job-detail.php?jobid=<?php echo $row["id"]; ?>"><img src="extra-images/joblisting-plain-5.png" alt=""></a></figure>
                                            <div class="careerfy-joblisting-plain-text">
                                                <div class="careerfy-joblisting-plain-left">
                                                    <h2><a href="job-detail.php?jobid=<?php echo $row["id"]; ?>"><?php echo $row["job_title"]; ?></a></h2>
                                                    <ul>
                                                        <li><span>@ INDIA,<?php if($row["city"] == 1){echo 'Kolkata'; }elseif($row["city"] == 2){ echo 'Durgapur'; }else{ echo 'Asansol';} ?></span></li>
                                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> IT - Software</li>
                                                        <li><i class="careerfy-icon careerfy-money"></i> <?php echo '₹'.$row["pay"]; ?></li>
                                                    </ul>
                                                </div>
                                                <div class="careerfy-joblisting-plain-right">
                                                    <small><i class="careerfy-icon careerfy-maps-and-flags"></i>  <?php echo $row["full_address"]; ?></small>
                                                    <a href="job-detail.php?jobid=<?php echo $row["id"]; ?>" class="careerfy-job-like" title="View Job Details"><i class="fa fa-heart"></i></a>
                                                    <span class="careerfy-joblisting-plain-status careerfy-option-btn"><?php echo $row["job_mode"]; ?></span>
                                                </div>
                                            <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </li>
									<?php
										} 
									}else{
									
										echo "No records Found.";
									
									}
									
									?>
									
									
                                </ul>
                            </div>
                            <!-- Job Listings -->
                            <!--<div class="careerfy-modren-btn"><a href="#">Browse all jobs</a></div>-->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

           

            

            

        </div>
        <!-- Main Content -->
        
		<?php include("include/footer.php"); ?>

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


<!-- Mirrored from combinedgroupltd.com/job/new_job/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:45:27 GMT -->
</html>
