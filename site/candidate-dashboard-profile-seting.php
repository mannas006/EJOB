<?php include('include/application-top.php');
CheckCandidateLogin();

if((isset($_POST['submit'])) AND ($_POST['submit']=='Save Setting'))
{

	$sql = "UPDATE `tbl_candidate` SET 
			`dob_day`         = '".mysqli_real_escape_string($connt,$_POST['dob_day'])."',
			`dob_month`       = '".mysqli_real_escape_string($connt,$_POST['dob_month'])."',
			`dob_year`        = '".mysqli_real_escape_string($connt,$_POST['dob_year'])."',
			`phone`           = '".mysqli_real_escape_string($connt,$_POST['phone'])."',							
			`gender`          = '".mysqli_real_escape_string($connt,$_POST['gender'])."',
			`description`     = '".mysqli_real_escape_string($connt,$_POST['description'])."',
			`city`            = '".mysqli_real_escape_string($connt,$_POST['city'])."',
			`full_address`    = '".mysqli_real_escape_string($connt,$_POST['full_address'])."',
			`experience`      = '".mysqli_real_escape_string($connt,$_POST['experience'])."',
			`age`             = '".mysqli_real_escape_string($connt,$_POST['age'])."',
			`current_salary`  = '".mysqli_real_escape_string($connt,$_POST['current_salary'])."',
			`expected_salary` = '".mysqli_real_escape_string($connt,$_POST['expected_salary'])."',
			`languages`       = '".mysqli_real_escape_string($connt,$_POST['languages'])."',
			`qualification`   = '".mysqli_real_escape_string($connt,$_POST['qualification'])."',
			`required_skills` = '".mysqli_real_escape_string($connt,$_POST['required_skills'])."',
			`experience`      = '".mysqli_real_escape_string($connt,$_POST['experience'])."'
			WHERE `tbl_candidate`.`id` = '".$_SESSION['candidate_id']."'";
	
	if (mysqli_query($connt, $sql)) {
		header("Location:candidate-dashboard-profile-seting.php?op=u");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($connt);
	}	

}

$sql = "SELECT * FROM tbl_candidate WHERE id = '".$_SESSION['candidate_id']."'";
$query = mysqli_query($connt, $sql);
$row = mysqli_fetch_assoc($query);
//echo "<pre>"; print_r($row); die;
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from combinedgroupltd.com/job/new_job/candidate-dashboard-profile-seting.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:45:57 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Candidate Profile Setting</title>
    
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
                            <h1>Dashboard</h1>
                            <p>Manage your operations.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="careerfy-breadcrumb">
                <ul>
                    <li><a href="#">Home</a></li>
                   
                    <li>Dashboard</li>
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
                                <?php include("include/candidate-menu-bar.php"); ?>
                            </div>
                        </aside>
                        <div class="careerfy-column-9">
                            <div class="careerfy-typo-wrap">
							
							 <?php
								if(isset($_GET['op']))
									  {
								?>
									<div class="alert alert-success">
									 <?php 
										  if(isset($_GET['op']) AND ($_GET['op']=="u")){
											 echo "Profile Updated Successfully.";
											}
									   ?>
									 </div>
							<?php } ?>							
							
							
							
                                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" name="candidate_profile_update" id="candidate_profile_update" method="post" autocomplete="off" enctype="multipart/form-data"> 
                                    <div class="careerfy-employer-box-section">
                                        <div class="careerfy-profile-title"><h2>Basic Information</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Your Name *</label>
                                                <input type="text"  name="name" value="<?php echo $row["name"]; ?>" required readonly="readonly">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Email *</label>
                                                <input type="text" name="email" value="<?php echo $row["email"]; ?>" required readonly="readonly">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Date of Birth:</label>
                                                <div class="careerfy-three-column-row">
                                                    <div class="careerfy-profile-select careerfy-three-column">
														<select class="" name="dob_day" id="dob_day" required>
															
															<option value="01" <?php if($row["dob_day"] == "01"){ ?> selected="selected" <?php } ?> >01</option>
															<option value="02" <?php if($row["dob_day"] == "02"){ ?> selected="selected" <?php } ?> >02</option>
															<option value="03" <?php if($row["dob_day"] == "03"){ ?> selected="selected" <?php } ?> >03</option>
															<option value="04" <?php if($row["dob_day"] == "04"){ ?> selected="selected" <?php } ?> >04</option>
															<option value="05" <?php if($row["dob_day"] == "05"){ ?> selected="selected" <?php } ?> >05</option>
															<option value="06" <?php if($row["dob_day"] == "06"){ ?> selected="selected" <?php } ?> >06</option>
															<option value="07" <?php if($row["dob_day"] == "07"){ ?> selected="selected" <?php } ?> >07</option>
															<option value="08" <?php if($row["dob_day"] == "08"){ ?> selected="selected" <?php } ?> >08</option>
															<option value="09" <?php if($row["dob_day"] == "09"){ ?> selected="selected" <?php } ?> >09</option>
															<option value="10" <?php if($row["dob_day"] == "10"){ ?> selected="selected" <?php } ?> >10</option>
															<option value="11" <?php if($row["dob_day"] == "11"){ ?> selected="selected" <?php } ?> >11</option>
															<option value="12" <?php if($row["dob_day"] == "12"){ ?> selected="selected" <?php } ?> >12</option>
															<option value="13" <?php if($row["dob_day"] == "13"){ ?> selected="selected" <?php } ?> >13</option>
															<option value="14" <?php if($row["dob_day"] == "14"){ ?> selected="selected" <?php } ?> >14</option>
															<option value="15" <?php if($row["dob_day"] == "15"){ ?> selected="selected" <?php } ?> >15</option>
															<option value="16" <?php if($row["dob_day"] == "16"){ ?> selected="selected" <?php } ?> >16</option>
															<option value="17" <?php if($row["dob_day"] == "17"){ ?> selected="selected" <?php } ?> >17</option>
															<option value="18" <?php if($row["dob_day"] == "18"){ ?> selected="selected" <?php } ?> >18</option>
															<option value="19" <?php if($row["dob_day"] == "19"){ ?> selected="selected" <?php } ?> >19</option>
															<option value="20" <?php if($row["dob_day"] == "20"){ ?> selected="selected" <?php } ?> >20</option>
															<option value="21" <?php if($row["dob_day"] == "21"){ ?> selected="selected" <?php } ?> >21</option>
															<option value="22" <?php if($row["dob_day"] == "22"){ ?> selected="selected" <?php } ?> >22</option>
															<option value="23" <?php if($row["dob_day"] == "23"){ ?> selected="selected" <?php } ?> >23</option>
															<option value="24" <?php if($row["dob_day"] == "24"){ ?> selected="selected" <?php } ?> >24</option>
															<option value="25" <?php if($row["dob_day"] == "25"){ ?> selected="selected" <?php } ?> >25</option>
															<option value="26" <?php if($row["dob_day"] == "26"){ ?> selected="selected" <?php } ?> >26</option>
															<option value="27" <?php if($row["dob_day"] == "27"){ ?> selected="selected" <?php } ?> >27</option>
															<option value="28" <?php if($row["dob_day"] == "28"){ ?> selected="selected" <?php } ?> >28</option>
															<option value="29" <?php if($row["dob_day"] == "29"){ ?> selected="selected" <?php } ?> >29</option>
															<option value="30" <?php if($row["dob_day"] == "30"){ ?> selected="selected" <?php } ?> >30</option>
															<option value="31" <?php if($row["dob_day"] == "31"){ ?> selected="selected" <?php } ?> >31</option>
														 </select>
                                                    </div>
                                                    <div class="careerfy-profile-select careerfy-three-column">
                                                        <select class="" name="dob_month" id="dob_month" required>
															
															<option value="01" <?php if($row["dob_month"] == "01"){ ?> selected="selected" <?php } ?> >Jan</option>
															<option value="02" <?php if($row["dob_month"] == "02"){ ?> selected="selected" <?php } ?> >Feb</option>
															<option value="03" <?php if($row["dob_month"] == "03"){ ?> selected="selected" <?php } ?> >Mar</option>
															<option value="04" <?php if($row["dob_month"] == "04"){ ?> selected="selected" <?php } ?> >Apr</option>
															<option value="05" <?php if($row["dob_month"] == "05"){ ?> selected="selected" <?php } ?> >May</option>
															<option value="06" <?php if($row["dob_month"] == "06"){ ?> selected="selected" <?php } ?> >Jun</option>
															<option value="07" <?php if($row["dob_month"] == "07"){ ?> selected="selected" <?php } ?> >Jul</option>
															<option value="08" <?php if($row["dob_month"] == "08"){ ?> selected="selected" <?php } ?> >Aug</option>
															<option value="09" <?php if($row["dob_month"] == "09"){ ?> selected="selected" <?php } ?> >Sep</option>
															<option value="10" <?php if($row["dob_month"] == "10"){ ?> selected="selected" <?php } ?> >Oct</option>
															<option value="11" <?php if($row["dob_month"] == "11"){ ?> selected="selected" <?php } ?> >Nov</option>
															<option value="12" <?php if($row["dob_month"] == "12"){ ?> selected="selected" <?php } ?> >Dec</option>
                                                        </select>
                                                    </div>
                                                    <div class="careerfy-profile-select careerfy-three-column">
														<select class="" name="dob_year" id="dob_year" required>
															
															<option value="2009" <?php if($row["dob_year"] == "2009"){ ?> selected="selected" <?php } ?> >2009</option>
															<option value="2008" <?php if($row["dob_year"] == "2008"){ ?> selected="selected" <?php } ?> >2008</option>
															<option value="2007" <?php if($row["dob_year"] == "2007"){ ?> selected="selected" <?php } ?> >2007</option>
															<option value="2006" <?php if($row["dob_year"] == "2006"){ ?> selected="selected" <?php } ?> >2006</option>
															<option value="2005" <?php if($row["dob_year"] == "2005"){ ?> selected="selected" <?php } ?> >2005</option>
															<option value="2004" <?php if($row["dob_year"] == "2004"){ ?> selected="selected" <?php } ?> >2004</option>
															<option value="2003" <?php if($row["dob_year"] == "2003"){ ?> selected="selected" <?php } ?> >2003</option>
															<option value="2002" <?php if($row["dob_year"] == "2002"){ ?> selected="selected" <?php } ?> >2002</option>
															<option value="2001" <?php if($row["dob_year"] == "2001"){ ?> selected="selected" <?php } ?> >2001</option>
															<option value="2000" <?php if($row["dob_year"] == "2000"){ ?> selected="selected" <?php } ?> >2000</option>
															<option value="1999" <?php if($row["dob_year"] == "1999"){ ?> selected="selected" <?php } ?> >1999</option>
															<option value="1998" <?php if($row["dob_year"] == "1998"){ ?> selected="selected" <?php } ?> >1998</option>
															<option value="1997" <?php if($row["dob_year"] == "1997"){ ?> selected="selected" <?php } ?> >1997</option>
															<option value="1996" <?php if($row["dob_year"] == "1996"){ ?> selected="selected" <?php } ?> >1996</option>
															<option value="1995" <?php if($row["dob_year"] == "1995"){ ?> selected="selected" <?php } ?> >1995</option>
															<option value="1994" <?php if($row["dob_year"] == "1994"){ ?> selected="selected" <?php } ?> >1994</option>
															<option value="1993" <?php if($row["dob_year"] == "1993"){ ?> selected="selected" <?php } ?> >1993</option>
															<option value="1992" <?php if($row["dob_year"] == "1992"){ ?> selected="selected" <?php } ?> >1992</option>
															<option value="1991" <?php if($row["dob_year"] == "1991"){ ?> selected="selected" <?php } ?> >1991</option>
															<option value="1990" <?php if($row["dob_year"] == "1990"){ ?> selected="selected" <?php } ?> >1990</option>
															<option value="1989" <?php if($row["dob_year"] == "1989"){ ?> selected="selected" <?php } ?> >1989</option>
															<option value="1988" <?php if($row["dob_year"] == "1988"){ ?> selected="selected" <?php } ?> >1988</option>
															<option value="1987" <?php if($row["dob_year"] == "1987"){ ?> selected="selected" <?php } ?> >1987</option>
															<option value="1986" <?php if($row["dob_year"] == "1986"){ ?> selected="selected" <?php } ?> >1986</option>
															<option value="1985" <?php if($row["dob_year"] == "1985"){ ?> selected="selected" <?php } ?> >1985</option>
															<option value="1984" <?php if($row["dob_year"] == "1984"){ ?> selected="selected" <?php } ?> >1984</option>
															<option value="1983" <?php if($row["dob_year"] == "1983"){ ?> selected="selected" <?php } ?> >1983</option>
															<option value="1982" <?php if($row["dob_year"] == "1982"){ ?> selected="selected" <?php } ?> >1982</option>
															<option value="1981" <?php if($row["dob_year"] == "1981"){ ?> selected="selected" <?php } ?> >1981</option>
															<option value="1980" <?php if($row["dob_year"] == "1980"){ ?> selected="selected" <?php } ?> >1980</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Phone *</label>
                                           		<input type="text" name="phone" value="<?php echo $row["phone"]; ?>" required >
										    </li>
                                            <li class="careerfy-column-6">
                                                <label>Gender *</label>
                                                <div class="careerfy-profile-select">

													<select name="gender" id="gender" required>
														<option value="Male" <?php if($row["gender"] == "Male"){ ?> selected="selected" <?php } ?> >Male</option>
													  <option value="Female" <?php if($row["gender"] == "Female"){ ?> selected="selected" <?php } ?> >Female</option>
													</select>													
													
                                                </div>
                                            </li>
                                            <li class="careerfy-column-12">
                                                <label>Resume Details *</label>
												<textarea name="description"><?php echo $row["description"]; ?></textarea>
													
												
										   
										    </li>
                                        </ul>
                                    </div>
                                    <div class="careerfy-employer-box-section">
                                        <div class="careerfy-profile-title"><h2>Address / Location</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Country *</label>
                                                <div class="careerfy-profile-select">
												<select name="country" required>
													<option value="1" >India</option>
												</select>
                                                </div>
                                            </li>
  
                                            <li class="careerfy-column-6">
                                                <label>City / Town *</label>
                                                <div class="careerfy-profile-select">
												<select name="city" required>
													<option value="1" <?php if($row["city"] == "1"){ ?> selected="selected" <?php } ?> >Kolkata</option>
													<option value="2" <?php if($row["city"] == "2"){ ?> selected="selected" <?php } ?> >Durgapur</option>
													<option value="3" <?php if($row["city"] == "3"){ ?> selected="selected" <?php } ?> >Asansol</option>
												</select>
                                                </div>
                                            </li>

                                            <li class="careerfy-column-10">
                                                <label>Full Address *</label>
                                                <input type="text"  name="full_address" value="<?php echo $row["full_address"]; ?>" required >
												
                                            </li>
                                            
                                            
                                        </ul>
                                    </div>
                                    <div class="careerfy-employer-box-section">
                                        <div class="careerfy-profile-title"><h2>Other Information</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Experience *</label>
                                                <div class="careerfy-profile-select">
													<select name="experience" required>
													  
														<option value="0" <?php if($row["city"] == "1"){ ?> selected="selected" <?php } ?> >Fresher </option> 				
														<option value="1" <?php if($row["city"] == "1"){ ?> selected="selected" <?php } ?> >1</option							
														><option value="2" <?php if($row["city"] == "2"){ ?> selected="selected" <?php } ?> >2</option>							
														<option value="3" <?php if($row["city"] == "3"){ ?> selected="selected" <?php } ?> >3</option>		
														<option value="4" <?php if($row["city"] == "4"){ ?> selected="selected" <?php } ?> >4</option>							
														<option value="5" <?php if($row["city"] == "5"){ ?> selected="selected" <?php } ?> >5</option>							
														<option value="6" <?php if($row["city"] == "6"){ ?> selected="selected" <?php } ?> >6</option>							
														<option value="7" <?php if($row["city"] == "7"){ ?> selected="selected" <?php } ?> >7</option>							
														<option value="8" <?php if($row["city"] == "8"){ ?> selected="selected" <?php } ?> >8</option>							
														<option value="9" <?php if($row["city"] == "9"){ ?> selected="selected" <?php } ?> >9</option>							
														<option value="10" <?php if($row["city"] == "10"){ ?> selected="selected" <?php } ?> >10</option>
													  </select>
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Age *</label>
                                                <div class="careerfy-profile-select">
                                                    <select name="age" required>
														<option value="10" <?php if($row["age"] == "10"){ ?> selected="selected" <?php } ?> >10</option>						
														<option value="11" <?php if($row["age"] == "11"){ ?> selected="selected" <?php } ?> >11</option>						
														<option value="12" <?php if($row["age"] == "12"){ ?> selected="selected" <?php } ?> >12</option>						
														<option value="13" <?php if($row["age"] == "13"){ ?> selected="selected" <?php } ?> >13</option>						
														<option value="14" <?php if($row["age"] == "14"){ ?> selected="selected" <?php } ?> >14</option>							
														<option value="15" <?php if($row["age"] == "15"){ ?> selected="selected" <?php } ?> >15</option>						
														<option value="16" <?php if($row["age"] == "16"){ ?> selected="selected" <?php } ?> >16</option>						
														<option value="17" <?php if($row["age"] == "17"){ ?> selected="selected" <?php } ?> >17</option>						
														<option value="18" <?php if($row["age"] == "18"){ ?> selected="selected" <?php } ?> >18</option>						
														<option value="19" <?php if($row["age"] == "19"){ ?> selected="selected" <?php } ?> >19</option>						
														<option value="20" <?php if($row["age"] == "20"){ ?> selected="selected" <?php } ?> >20</option>						
														<option value="21" <?php if($row["age"] == "21"){ ?> selected="selected" <?php } ?>>21</option>							
														<option value="22" <?php if($row["age"] == "22"){ ?> selected="selected" <?php } ?>>22</option>						
														<option value="23" <?php if($row["age"] == "23"){ ?> selected="selected" <?php } ?>>23</option>						
														<option value="24" <?php if($row["age"] == "24"){ ?> selected="selected" <?php } ?>>24</option>						
														<option value="25" <?php if($row["age"] == "25"){ ?> selected="selected" <?php } ?>>25</option>						
														<option value="26" <?php if($row["age"] == "26"){ ?> selected="selected" <?php } ?> >26</option>						
														<option value="27" <?php if($row["age"] == "27"){ ?> selected="selected" <?php } ?>>27</option>						
														<option value="28" <?php if($row["age"] == "28"){ ?> selected="selected" <?php } ?>>28</option>						
														<option value="29" <?php if($row["age"] == "29"){ ?> selected="selected" <?php } ?>>29</option>						
														<option value="30" <?php if($row["age"] == "30"){ ?> selected="selected" <?php } ?>>30</option>						
														<option value="31" <?php if($row["age"] == "31"){ ?> selected="selected" <?php } ?>>31</option>						
														<option value="32" <?php if($row["age"] == "32"){ ?> selected="selected" <?php } ?>>32</option>						
														<option value="33" <?php if($row["age"] == "33"){ ?> selected="selected" <?php } ?>>33</option>						
														<option value="34" <?php if($row["age"] == "34"){ ?> selected="selected" <?php } ?>>34</option>						
														<option value="35" <?php if($row["age"] == "35"){ ?> selected="selected" <?php } ?>>35</option>						
														<option value="36" <?php if($row["age"] == "36"){ ?> selected="selected" <?php } ?>>36</option>						
														<option value="37" <?php if($row["age"] == "37"){ ?> selected="selected" <?php } ?>>37</option>						
														<option value="38" <?php if($row["age"] == "38"){ ?> selected="selected" <?php } ?>>38</option>						
														<option value="39" <?php if($row["age"] == "39"){ ?> selected="selected" <?php } ?>>39</option>						
														<option value="40" <?php if($row["age"] == "40"){ ?> selected="selected" <?php } ?>>40</option>						
														<option value="41" <?php if($row["age"] == "41"){ ?> selected="selected" <?php } ?>>41</option>						
														<option value="42" <?php if($row["age"] == "42"){ ?> selected="selected" <?php } ?>>42</option>						
														<option value="43" <?php if($row["age"] == "43"){ ?> selected="selected" <?php } ?>>43</option>						
														<option value="44" <?php if($row["age"] == "44"){ ?> selected="selected" <?php } ?>>44</option>						
														<option value="45" <?php if($row["age"] == "45"){ ?> selected="selected" <?php } ?>>45</option>						
														<option value="46" <?php if($row["age"] == "46"){ ?> selected="selected" <?php } ?>>46</option>						
														<option value="47" <?php if($row["age"] == "47"){ ?> selected="selected" <?php } ?>>47</option>						
														<option value="48" <?php if($row["age"] == "48"){ ?> selected="selected" <?php } ?>>48</option>						
														<option value="49" <?php if($row["age"] == "49"){ ?> selected="selected" <?php } ?>>49</option>						
														<option value="50" <?php if($row["age"] == "50"){ ?> selected="selected" <?php } ?>>50</option>
  	
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Current Salary($) *</label>
                                                <div class="careerfy-profile-select">
                                                    <select name="current_salary" required>
													 	
														<option value="1000" <?php if($row["current_salary"] == "1000"){ ?> selected="selected" <?php } ?>>1000</option>					
														<option value="2000" <?php if($row["current_salary"] == "2000"){ ?> selected="selected" <?php } ?>>2000</option>					
														<option value="3000" <?php if($row["current_salary"] == "3000"){ ?> selected="selected" <?php } ?>>3000</option>					
														<option value="4000" <?php if($row["current_salary"] == "4000"){ ?> selected="selected" <?php } ?>>4000</option>					
														<option value="5000" <?php if($row["current_salary"] == "5000"){ ?> selected="selected" <?php } ?>>5000</option>					
														<option value="6000" <?php if($row["current_salary"] == "6000"){ ?> selected="selected" <?php } ?>>6000</option>					
														<option value="7000" <?php if($row["current_salary"] == "7000"){ ?> selected="selected" <?php } ?>>7000</option>					
														<option value="8000" <?php if($row["current_salary"] == "8000"){ ?> selected="selected" <?php } ?>>8000</option>					
														<option value="9000" <?php if($row["current_salary"] == "9000"){ ?> selected="selected" <?php } ?>>9000</option>					
														<option value="10000" <?php if($row["current_salary"] == "10000"){ ?> selected="selected" <?php } ?>>10000</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Expected Salary($) *</label>
                                                <div class="careerfy-profile-select">
                                                    <select name="expected_salary" required>
														
														<option value="10000" <?php if($row["expected_salary"] == "10000"){ ?> selected="selected" <?php } ?>>10000</option>					
														<option value="11000" <?php if($row["expected_salary"] == "11000"){ ?> selected="selected" <?php } ?>>11000</option>					
														<option value="12000" <?php if($row["expected_salary"] == "12000"){ ?> selected="selected" <?php } ?>>12000</option>					
														<option value="13000" <?php if($row["expected_salary"] == "13000"){ ?> selected="selected" <?php } ?>>13000</option>					
														<option value="14000" <?php if($row["expected_salary"] == "14000"){ ?> selected="selected" <?php } ?>>14000</option>					
														<option value="15000" <?php if($row["expected_salary"] == "15000"){ ?> selected="selected" <?php } ?>>15000</option>					
														<option value="16000" <?php if($row["expected_salary"] == "16000"){ ?> selected="selected" <?php } ?>>16000</option>					
														<option value="17000" <?php if($row["expected_salary"] == "17000"){ ?> selected="selected" <?php } ?>>17000</option>					
														<option value="18000" <?php if($row["expected_salary"] == "18000"){ ?> selected="selected" <?php } ?>>18000</option>					
														<option value="19000" <?php if($row["expected_salary"] == "19000"){ ?> selected="selected" <?php } ?>>19000</option>					
														<option value="20000" <?php if($row["expected_salary"] == "20000"){ ?> selected="selected" <?php } ?>>20000</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Languages *</label>
                                                <div class="careerfy-profile-select">
                                                    <select name="languages" required>
														
														<option value="Bengali/Bangla" <?php if($row["languages"] == "Bengali/Bangla"){ ?> selected="selected" <?php } ?>>Bengali/Bangla</option>
														<option value="English" <?php if($row["languages"] == "English"){ ?> selected="selected" <?php } ?>>English</option>
														<option value="Hindi" <?php if($row["languages"] == "Hindi"){ ?> selected="selected" <?php } ?>>Hindi</option>
													</select>	
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Education Levels *</label>
                                                <div class="careerfy-profile-select">
                                                    <select name="qualification" required>
                                                        
															<option value="BA" <?php if($row["qualification"] == "BA"){ ?> selected="selected" <?php } ?>>BA</option>
															<option value="BE" <?php if($row["qualification"] == "BE"){ ?> selected="selected" <?php } ?>>BE</option>
															<option value="BS" <?php if($row["qualification"] == "BS"){ ?> selected="selected" <?php } ?>>BS</option>
															<option value="CA" <?php if($row["qualification"] == "CA"){ ?> selected="selected" <?php } ?>>CA</option>
															<option value="Certification" <?php if($row["qualification"] == "Certification"){ ?> selected="selected" <?php } ?>>Certification</option>
															<option value="Diploma" <?php if($row["qualification"] == "Diploma"){ ?> selected="selected" <?php } ?>>Diploma</option>
															<option value="HSSC" <?php if($row["qualification"] == "HSSC"){ ?> selected="selected" <?php } ?>>HSSC</option>
															<option value="MA" <?php if($row["qualification"] == "MA"){ ?> selected="selected" <?php } ?>>MA</option>
															<option value="MBA" <?php if($row["qualification"] == "MBA"){ ?> selected="selected" <?php } ?>>MBA</option>
															<option value="MS" <?php if($row["qualification"] == "MS"){ ?> selected="selected" <?php } ?>>MS</option>
															<option value="PhD" <?php if($row["qualification"] == "PhD"){ ?> selected="selected" <?php } ?>>PhD</option>
															<option value="SSC" <?php if($row["qualification"] == "SSC"){ ?> selected="selected" <?php } ?>>SSC</option>
															<option value="ACMA" <?php if($row["qualification"] == "ACMA"){ ?> selected="selected" <?php } ?>>ACMA</option>
															<option value="MCS" <?php if($row["qualification"] == "MCS"){ ?> selected="selected" <?php } ?>>MCS</option>
															<option value="Does not matter" <?php if($row["qualification"] == "Does not matter"){ ?> selected="selected" <?php } ?>>Does not matter</option>
															<option value="B.Tech" <?php if($row["qualification"] == "B.Tech"){ ?> selected="selected" <?php } ?>>B.Tech</option>
														  </select>
                                                </div>
                                            </li>
											
											
                                            <li class="careerfy-column-6">
                                                <label>Required Skills *</label>
                                                <div class="careerfy-profile-select">
												 	  <select name="required_skills" required="">
														  <option value="php" <?php if($row["required_skills"] == "php"){ ?> selected="selected" <?php } ?>>PHP</option>
														  <option value="java" <?php if($row["required_skills"] == "java"){ ?> selected="selected" <?php } ?>>JAVA</option>
														  <option value=".net" <?php if($row["required_skills"] == ".net"){ ?> selected="selected" <?php } ?>>.NET</option>
													  </select>
                                                </div>
                                            </li>											
											
											
                                            <li class="careerfy-column-6">
                                                <label>Experience *</label>
												<div class="careerfy-profile-select">
												<select name="experience" required>
												  
													<option value="0" <?php if($row["experience"] == "0"){ ?> selected="selected" <?php } ?>>Fresher </option> 				
													<option value="1" <?php if($row["experience"] == "1"){ ?> selected="selected" <?php } ?>>1</option>						
													<option value="2" <?php if($row["experience"] == "2"){ ?> selected="selected" <?php } ?>>2</option>							
													<option value="3" <?php if($row["experience"] == "3"){ ?> selected="selected" <?php } ?>>3</option>		
													<option value="4" <?php if($row["experience"] == "4"){ ?> selected="selected" <?php } ?>>4</option>							
													<option value="5" <?php if($row["experience"] == "5"){ ?> selected="selected" <?php } ?>>5</option>							
													<option value="6" <?php if($row["experience"] == "6"){ ?> selected="selected" <?php } ?>>6</option>							
													<option value="7" <?php if($row["experience"] == "7"){ ?> selected="selected" <?php } ?>>7</option>							
													<option value="8" <?php if($row["experience"] == "8"){ ?> selected="selected" <?php } ?>>8</option>							
													<option value="9" <?php if($row["experience"] == "9"){ ?> selected="selected" <?php } ?>>9</option>							
													<option value="10" <?php if($row["experience"] == "10"){ ?> selected="selected" <?php } ?>>10</option>
												  </select>
												  </div>
                                            </li>											
											
											
                                        </ul>
                                    </div>
									<input type="submit" name="submit" class="careerfy-employer-profile-submit" value="Save Setting">
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


<!-- Mirrored from combinedgroupltd.com/job/new_job/candidate-dashboard-profile-seting.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Feb 2019 12:45:57 GMT -->
</html>
