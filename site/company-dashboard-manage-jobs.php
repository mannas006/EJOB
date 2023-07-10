<?php include('include/application-top.php');
CheckCompanyLogin();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from combinedgroupltd.com/job/new_job/employer-dashboard-manage-jobs.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:46:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employer Manage Jobs</title>
    
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
                    <li>Manage Jobs</li>
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
                                    <div class="careerfy-employer-box-section">
                                        <!-- Profile Title -->
                                        <div class="careerfy-profile-title">
                                            <h2>Manage Jobs</h2>
                                            <form class="careerfy-employer-search">
                                                <input value="Search orders" onBlur="if(this.value == '') { this.value ='Search orders'; }" onFocus="if(this.value =='Search orders') { this.value = ''; }" type="text">
                                                <input type="submit" value="">
                                                <i class="careerfy-icon careerfy-search"></i>
                                            </form>
                                        </div>
                                        <!-- Manage Jobs -->
                                        <div class="careerfy-managejobs-list-wrap">
                                            <div class="careerfy-managejobs-list">
                                                <!-- Manage Jobs Header -->
                                                <div class="careerfy-table-layer careerfy-managejobs-thead">
                                                    <div class="careerfy-table-row">
                                                        <div class="careerfy-table-cell">Job Title</div>
                                                        <!--<div class="careerfy-table-cell">Applications</div>
                                                        <div class="careerfy-table-cell">Featured</div>-->
                                                        <div class="careerfy-table-cell">Status</div>
                                                        <div class="careerfy-table-cell"></div>
                                                    </div>
                                                </div>
                                                <!-- Manage Jobs Body -->
												
												<?php
													$sql = "SELECT * FROM tbl_post_jobs WHERE company_id = '".$_SESSION['company_id']."'";
													$query = mysqli_query($connt, $sql);
													
													if(mysqli_num_rows($query)>0){
														while($row = mysqli_fetch_assoc($query)){											
												
												 ?>
												
												
												
														<div class="careerfy-table-layer careerfy-managejobs-tbody">
															<div class="careerfy-table-row">
																<div class="careerfy-table-cell">
																	<h6><a href="#"><?php echo $row["job_title"]; ?></a></h6>
																	<ul>
																		<li><i class="careerfy-icon careerfy-calendar"></i> Created: <span><?php echo date("M d, Y", strtotime($row["added_date"])); ?></span></li>
																		<li><i class="careerfy-icon careerfy-calendar"></i> Expiry: <span><?php echo date("M d, Y", strtotime($row["last_date"])); ?></span></li>
																		<li><i class="careerfy-icon careerfy-maps-and-flags"></i> @ INDIA,<?php if($row["city"] == 1){echo 'Kolkata'; }elseif($row["city"] == 2){ echo 'Durgapur'; }else{ echo 'Asansol';} ?></li>
																		<li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">IT - Software</a></li>
																	</ul>
																</div>
																<!--<div class="careerfy-table-cell"><a href="#" class="careerfy-managejobs-appli">4 Application(s)</a></div>
																<div class="careerfy-table-cell"><i class="fa fa-star-o"></i></div>-->
																<div class="careerfy-table-cell"><span class="careerfy-managejobs-option">Active</span></div>
																<div class="careerfy-table-cell">
																	<div class="careerfy-managejobs-links">
																		<!--<a href="#" class="careerfy-icon careerfy-view"></a>-->
																		<a href="employer-dashboard-editjob.php?jobid=<?php echo $row["id"]; ?>" class="careerfy-icon careerfy-edit"></a>
																		<!--<a href="#" class="careerfy-icon careerfy-rubbish"></a>-->
																	</div>
																</div>
															</div>
														</div>

												<?php
													}
												}else{
												
													echo "No records found.";
												
												}
												
												?>

                                                <!-- Manage Jobs Body -->
                                            </div>
                                        </div>
                                        <!-- Pagination -->
                                        <!--<div class="careerfy-pagination-blog">
                                            <ul class="page-numbers">
                                                <li><a class="prev page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                                                <li><span class="page-numbers current">01</span></li>
                                                <li><a class="page-numbers" href="#">02</a></li>
                                                <li><a class="page-numbers" href="#">03</a></li>
                                                <li><a class="page-numbers" href="#">04</a></li>
                                                <li><a class="next page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                                            </ul>
                                        </div>-->

                                    </div>
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


<!-- Mirrored from combinedgroupltd.com/job/new_job/employer-dashboard-manage-jobs.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:46:20 GMT -->
</html>
