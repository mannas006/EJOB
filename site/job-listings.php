<?php include('include/application-top.php'); ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from combinedgroupltd.com/job/new_job/job-listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:45:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Listings</title>
    
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
        <div class="careerfy-subheader">
            <span class="careerfy-banner-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="careerfy-page-title">
                            <h1>Jobs For Good Programmers</h1>
                            <p>Yes! You make or may not find the right job for you, but that’s ok.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SubHeader -->

        <!-- Main Content -->
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-subheader-form-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 careerfy-typo-wrap">
                            <!-- Sub Header Form -->
                            <div class="careerfy-subheader-form">
                                <form class="careerfy-banner-search">
                                    <ul>
                                        <li>
                                            
									   		<input value="<?php echo $_GET["search_keyword"]; ?>" name="search_keyword"  type="text">
									   </li>
                                        <li>
                                             <div class="careerfy-select-style">
											<select name="city">
												<option value="1"  <?php if($_GET["city"] == 1){ ?> selected="selected" <?php } ?>>Kolkata</option>
												<option value="2"  <?php if($_GET["city"] == 2){ ?> selected="selected" <?php } ?>>Durgapur</option>
												<option value="3"  <?php if($_GET["city"] == 3){ ?> selected="selected" <?php } ?>>Asansol</option>
											</select>											
											
											<i class="careerfy-icon careerfy-location"></i>
                                        </li>
                                        <li>
                                            <div class="careerfy-select-style">
											<select name="industry_id">
												<option value="1" <?php if($_GET["industry_id"] == 1){ ?> selected="selected" <?php } ?>>IT - Software</option>
											</select>
                                            </div>
                                        </li>
                                        <li class="careerfy-banner-submit"> <input type="submit" value=""> <i class="careerfy-icon careerfy-search"></i> </li>
                                    </ul>
                                </form>
                            </div>
                            <!-- Sub Header Form -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

            <!-- Main Section -->
            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">
                        
                        <?php /*?><aside class="careerfy-column-3 careerfy-typo-wrap">
                            <div class="careerfy-typo-wrap">
                                <!--<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
                                    <div class="careerfy-search-filter-wrap careerfy-without-toggle">
                                        <h2><a href="#">Locations</a></h2>
                                        <ul class="careerfy-checkbox">
                                            <li>
                                                <input type="checkbox" id="r1" name="rr" />
                                                <label for="r1"><span></span>San Francisco</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="r2" name="rr" />
                                                <label for="r2"><span></span>Portland</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="r3" name="rr" />
                                                <label for="r3"><span></span>London</label>
                                            </li>

                                        </ul>
                                       
                                    </div>
                                    
                                    
                                    
                                </form>-->
                            </div>
                        </aside><?php */?>
                        <div class="careerfy-column-12 careerfy-typo-wrap">
                            <div class="careerfy-typo-wrap">
                                <!-- JobGrid -->
                                <div class="careerfy-job careerfy-joblisting-classic">
                                    <ul class="careerfy-row">
									
                                   <?php 
								   	$sql = "SELECT A.*, B.company_name, B.full_address FROM tbl_post_jobs A LEFT OUTER JOIN tbl_company B ON A.company_id = B.id WHERE A.job_title LIKE '%".$_GET["search_keyword"]."%' AND A.city = '".$_GET["city"]."' AND A.industry_id = '".$_GET["industry_id"]."' AND A.status =1";
									$query=mysqli_query($connt,$sql);
									if(mysqli_num_rows($query)>0){
										while($row = mysqli_fetch_assoc($query)){
										
								   ?>									
									
                                        <li class="careerfy-column-12">
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="job-detail.php?jobid=<?php echo $row["id"]; ?>"><img src="extra-images/job-listing-logo-1.png" alt=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                        <h2><a href="job-detail.php?jobid=<?php echo $row["id"]; ?>"><?php echo $row["job_title"]; ?></h2>
                                                        <ul>
                                                            <li><a href="job-detail.php?jobid=<?php echo $row["id"]; ?>">@ INDIA,<?php if($row["city"] == 1){echo 'Kolkata'; }elseif($row["city"] == 2){ echo 'Durgapur'; }else{ echo 'Asansol';} ?></a></li>
                                                            <li><i class="careerfy-icon careerfy-maps-and-flags"></i> <?php echo $row["full_address"]; ?></li>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> IT - Software</li>
                                                        </ul>
                                                    </div>
                                                    <div class="careerfy-job-userlist">
                                                        <a href="job-detail.php?jobid=<?php echo $row["id"]; ?>" class="careerfy-option-btn">View Details</a>
                                                        
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
                                <!-- Pagination -->
                                
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
    <script src="<?php echo SITE_URL; ?>plugin-script/functions.js"></script>
    <script src="<?php echo SITE_URL; ?>script/functions.js"></script>

</body>


<!-- Mirrored from combinedgroupltd.com/job/new_job/job-listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:45:52 GMT -->
</html>
