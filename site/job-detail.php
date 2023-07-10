<?php include('include/application-top.php'); ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from combinedgroupltd.com/job/new_job/job-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:45:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Detail</title>
    
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
                    
					
				    
									
				   <?php 
					$sql = "SELECT A.*, B.company_name, B.full_address FROM tbl_post_jobs A LEFT OUTER JOIN tbl_company B ON A.company_id = B.id WHERE A.id ='".$_GET["jobid"]."'";
					$query=mysqli_query($connt,$sql);
					if(mysqli_num_rows($query)>0){
						$row = mysqli_fetch_assoc($query);
				   ?>						
						
						
                        <!-- Job Detail List -->
                        <div class="careerfy-column-12">
						
						<?php 
							if(isset($_GET['op']) AND ($_GET['op']=="applysuccess"))
							{
								echo '<div class="alert alert-success">
										<strong>Success!</strong> Thanks for applyed for this job.
									  </div>';
							}
						?>							
						
						<?php 
							if(isset($_GET['op']) AND ($_GET['op']=="applyalready"))
							{
								echo '<div class="alert alert-danger">
									     <strong>You already applied this job!</strong>
									  </div>';
							}
						?>						
						
						
						
						
                            <div class="careerfy-typo-wrap">
                                <figure class="careerfy-jobdetail-list">
                                    <span class="careerfy-jobdetail-listthumb"><img src="extra-images/job-detail-logo-1.png" alt=""></span>
                                    <figcaption>
                                        <h2><?php echo $row["job_title"]; ?></h2>
                                        <span><small class="careerfy-jobdetail-type"><?php echo $row["job_mode"]; ?></small> </span>
                                        <ul class="careerfy-jobdetail-options">
                                            <li><i class="fa fa-map-marker"></i> INDIA,<?php if($row["city"] == 1){echo 'Kolkata'; }elseif($row["city"] == 2){ echo 'Durgapur'; }else{ echo 'Asansol';} ?>, <?php echo $row["full_address"]; ?> </li>
                                            <li><i class="careerfy-icon careerfy-calendar"></i> Post Date: <?php echo date('M, d Y',strtotime($row["added_date"])); ?></li>
                                            <li><i class="careerfy-icon careerfy-calendar"></i> Apply Before: <?php echo date('M, d Y',strtotime($row["last_date"])); ?></li>
                                            <!--<li><i class="careerfy-icon careerfy-summary"></i> Applications 4 </li>
                                            <li><a href="#"><i class="careerfy-icon careerfy-view"></i> Views 3806 </a></li>-->
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <!-- Job Detail List -->

                        <!-- Job Detail Content -->
                        <div class="careerfy-column-8">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-jobdetail-content">
                                    <div class="careerfy-content-title"><h2>Job Detail</h2></div>
                                    <div class="careerfy-jobdetail-services">
                                        <ul class="careerfy-row">
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-salary"></i>
                                                <div class="careerfy-services-text">Offerd Salary <small><?php echo '₹'.$row["pay"]; ?></small></div>
                                            </li>

                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-briefcase"></i>
                                                <div class="careerfy-services-text">Experience <small><?php echo $row["experience"]; ?> Years </small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-network"></i>
                                                <div class="careerfy-services-text">Industry <small>IT - Software</small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-mortarboard"></i>
                                                <div class="careerfy-services-text">Qualification <small><?php echo $row["qualification"]; ?></small></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="careerfy-content-title"><h2>Job Description</h2></div>
                                    <div class="careerfy-description">
                                        <p><?php echo $row["job_description"]; ?></p>
                                    </div>
                                   
                                    
                                    <div class="careerfy-content-title"><h2>Required skills</h2></div>
                                    <div class="careerfy-jobdetail-tags">
                                        <a href="#"><?php echo $row["required_skills"]; ?></a>
                                    </div>
                                </div>
                               
                                <div class="careerfy-job careerfy-joblisting-classic careerfy-jobdetail-joblisting">
                                    
									
									
									
                                </div>
                            </div>
                        </div>
                        <!-- Job Detail Content -->
                        <!-- Job Detail SideBar -->
                        <aside class="careerfy-column-4">
                            <div class="careerfy-typo-wrap">
                                <div class="widget widget_apply_job">
                                    <div class="widget_apply_job_wrap">
									
										<?php 
											// USER applyed this job or not
											$sql_job_aply = "SELECT * FROM tbl_candidate_applied_for_job WHERE candidate_id = '".$_SESSION["candidate_id"]."' AND company_id = '".$row["company_id"]."' AND job_id = '".$row["id"]."'";
											$query_job_aply=mysqli_query($connt,$sql_job_aply);
											if(mysqli_num_rows($query_job_aply)>0){
										 ?>
										 
										 <a href="javascript:void(0)" class="careerfy-applyjob-btn">Already Applied.</a>
										 
										 <?php
										 	}else{
										 ?>
										 
                                        		<a href="apply-job.php?jobid=<?php echo $row["id"]; ?>" class="careerfy-applyjob-btn">Apply for the job</a>
                                        <?php 
											}
										?>
                                    </div>
                                    
                                </div>
                                
                                
                                
                            </div>
                        </aside>
                        <!-- Job Detail SideBar -->

                    </div>
					
					
					<?php 
						}
					?>
					
					
					
					
					
					
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
    <script src="<?php echo SITE_URL; ?>plugin-script/functions.js"></script>
    <script src="<?php echo SITE_URL; ?>script/functions.js"></script>

</body>


<!-- Mirrored from combinedgroupltd.com/job/new_job/job-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:45:52 GMT -->
</html>
