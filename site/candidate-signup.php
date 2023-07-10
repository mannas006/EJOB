<?php include('include/application-top.php'); 
	if((isset($_POST['submit'])) AND ($_POST['submit']=='Sign Up'))
	{
	

	  if(!empty($_FILES['image']))
	  {
		$path = "uploads/candidate/";
		$path = $path . basename( $_FILES['image']['name']);
		$imagename = basename( $_FILES['image']['name']);
		
		  @$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		  $extensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$extensions)=== false){
			$MSG='Not allowed extension,please upload jpg,jpeg,gif,png images only!';
		  }else{
			if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
			 
				$sql = "INSERT INTO `tbl_candidate` (`name`, 
													`email`, 
													`phone`, 
													`password`,
													`imagename`,
													`gender`,
													`description`,
													`dob_day`,
													`dob_month`,
													`dob_year`,
													`country`,
													`city`,
													`full_address`,
													`experience`,
													`age`,
													`current_salary`,
													`expected_salary`,
													`languages`,
													`qualification`,
													`required_skills`) 
										   VALUES ('".mysqli_real_escape_string($connt,$_POST['name'])."',
												   '".mysqli_real_escape_string($connt,$_POST['email'])."',
												   '".mysqli_real_escape_string($connt,$_POST['phone'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['password'])."', 
												   '".mysqli_real_escape_string($connt,$imagename)."', 
												   '".mysqli_real_escape_string($connt,$_POST['gender'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['description'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['dob_day'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['dob_month'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['dob_year'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['country'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['city'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['full_address'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['experience'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['age'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['current_salary'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['expected_salary'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['languages'])."', 
												   '".mysqli_real_escape_string($connt,$_POST['qualification'])."',
												   '".mysqli_real_escape_string($connt,$_POST['required_skills'])."'
												   )";
				
				if (mysqli_query($connt, $sql)) {
					$lid=mysqli_insert_id($connt);
					
					$_SESSION['candidate_login']=1;
					$_SESSION['candidate_id']=$lid;			
					header("Location:candidate-dashboard-profile-seting.php?op=a");
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($connt);
				}			 
			 
			 

			} else{
				echo "There was an error uploading the file, please try again!";
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
    <title>User Registration</title>
    
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




										<form action="<?php echo $_SERVER["PHP_SELF"] ?>" name="candidate_signup" id="candidate_signup" method="post" autocomplete="off" enctype="multipart/form-data"> 
											
											<div class="careerfy-user-options">
												<ul>
													<li class="active">
														<a href="#">
															 <i class="careerfy-icon careerfy-user"></i>
															 <span>Candidate</span>
															 <small>Signup to your account</small>
												

															 
															 
														</a>
														
													</li>
													
												</ul>
												
											</div>
											
											
											
											<div class="careerfy-user-form careerfy-user-form-coltwo">
												<ul>
													<li class="careerfy-column-12">
														<label>Name: *</label>
														<input type="text"  name="name" value="" required >
														
													</li>
													
													<li>
														<label>Password: *</label>
														<input type="password" name="password" value="" required  >
														
													</li>													
																										
													<li>
														<label>Email Address: *</label>
														<input type="text" name="email" value="" required >
														
													</li>														
													
		
													<li>
														<label>Phone Number: *</label>
														<input type="text" name="phone" value="" required >
														
													</li>													
													
													
													<li>
														<label>Image: *</label>
														<input type="file"  name="image"  accept="image/gif, image/jpeg, image/png" required >
														
													</li>													
								
													<li>
														<label>Gender *</label>
														<select name="gender" id="gender" required>
															<option value="Male" selected>Male</option>
														  <option value="Female" >Female</option>
														</select>
													</li> 
	
													<li>
														<label>Resume Details *</label>
														<textarea name="description" cols="70" row="20" style="margin: 0px; height: 115px; width: 520px;"></textarea>
													</li>													
													
													<li>
													<label>Date of Birth: *</label>
													<div class="careerfy-three-column-row">
														<div class="careerfy-profile-select careerfy-three-column">
															<select class="" name="dob_day" id="dob_day" required>
															<option value="" selected="selected">Day</option>
															<option value="01" >01</option>
															<option value="02" >02</option>
															<option value="03" >03</option>
															<option value="04" >04</option>
															<option value="05" >05</option>
															<option value="06" >06</option>
															<option value="07" >07</option>
															<option value="08" >08</option>
															<option value="09" >09</option>
															<option value="10" >10</option>
															<option value="11" >11</option>
															<option value="12" >12</option>
															<option value="13" >13</option>
															<option value="14" >14</option>
															<option value="15" >15</option>
															<option value="16" >16</option>
															<option value="17" >17</option>
															<option value="18" >18</option>
															<option value="19" >19</option>
															<option value="20" >20</option>
															<option value="21" >21</option>
															<option value="22" >22</option>
															<option value="23" >23</option>
															<option value="24" >24</option>
															<option value="25" >25</option>
															<option value="26" >26</option>
															<option value="27" >27</option>
															<option value="28" >28</option>
															<option value="29" >29</option>
															<option value="30" >30</option>
															<option value="31" >31</option>
														  </select>
														</div>
													   <div class="careerfy-profile-select careerfy-three-column">
														 <select class="" name="dob_month" id="dob_month" required>
															<option value="" selected="selected">Month</option>
															<option value="01" selected="selected">Jan</option>
															<option value="02" >Feb</option>
															<option value="03" >Mar</option>
															<option value="04" >Apr</option>
															<option value="05" >May</option>
															<option value="06" >Jun</option>
															<option value="07" >Jul</option>
															<option value="08" >Aug</option>
															<option value="09" >Sep</option>
															<option value="10" >Oct</option>
															<option value="11" >Nov</option>
															<option value="12" >Dec</option>
														  </select>
														 </div>
														<div class="careerfy-profile-select careerfy-three-column">
															<select class="" name="dob_year" id="dob_year" required>
															<option value="" selected="selected">Year</option>
															<option value="2009" >2009</option>
															<option value="2008" >2008</option>
															<option value="2007" >2007</option>
															<option value="2006" >2006</option>
															<option value="2005" >2005</option>
															<option value="2004" >2004</option>
															<option value="2003" >2003</option>
															<option value="2002" >2002</option>
															<option value="2001" >2001</option>
															<option value="2000" >2000</option>
															<option value="1999" >1999</option>
															<option value="1998" >1998</option>
															<option value="1997" >1997</option>
															<option value="1996" >1996</option>
															<option value="1995" >1995</option>
															<option value="1994" >1994</option>
															<option value="1993" >1993</option>
															<option value="1992" >1992</option>
															<option value="1991" >1991</option>
															<option value="1990">1990</option>
															<option value="1989" >1989</option>
															<option value="1988" >1988</option>
															<option value="1987" >1987</option>
															<option value="1986" >1986</option>
															<option value="1985" >1985</option>
															<option value="1984" >1984</option>
															<option value="1983" >1983</option>
															<option value="1982" >1982</option>
															<option value="1981" >1981</option>
															<option value="1980" >1980</option>
														   
															
														  </select>
													 </div>
												</div>
											</li>													

											<li>
												<label>Country *</label>
												<select name="country" required>
													<option value="1">India</option>
												</select>
												
											</li>	
											
											
											<li>
												<label>City *</label>
												<select name="city" required>
													<option value="1">Kolkata</option>
													<option value="2">Durgapur</option>
													<option value="3">Asansol</option>
												</select>
											</li>	
											
											
											<li>
												<label>Full Address  *</label>
												<input type="text"  name="full_address" value="" required >
											</li>						
					
					
                                   

                                            <li>
                                                <label>Experience *</label>
												<select name="experience" required>
												   <option value=""> Select Experience </option> 
													<option value="0">Fresher </option> 				
													<option value="1">1</option>							
													<option value="2">2</option>							
													<option value="3" selected="selected">3</option>		
													<option value="4">4</option>							
													<option value="5">5</option>							
													<option value="6">6</option>							
													<option value="7">7</option>							
													<option value="8">8</option>							
													<option value="9">9</option>							
													<option value="10">10</option>
												  </select>
                                            </li>
                                            <li >
                                                <label>Age *</label>
                                                    <select name="age" required>
														<option value=""> Select Age</option> 				
														<option value="10">10</option>						
														<option value="11">11</option>						
														<option value="12">12</option>						
														<option value="13">13</option>						
														<option value="14">14</option>							
														<option value="15">15</option>						
														<option value="16">16</option>						
														<option value="17">17</option>						
														<option value="18">18</option>						
														<option value="19">19</option>						
														<option value="20">20</option>						
														<option value="21">21</option>							
														<option value="22">22</option>						
														<option value="23">23</option>						
														<option value="24">24</option>						
														<option value="25">25</option>						
														<option value="26">26</option>						
														<option value="27">27</option>						
														<option value="28">28</option>						
														<option value="29">29</option>						
														<option value="30">30</option>						
														<option value="31">31</option>						
														<option value="32">32</option>						
														<option value="33">33</option>						
														<option value="34">34</option>						
														<option value="35">35</option>						
														<option value="36">36</option>						
														<option value="37">37</option>						
														<option value="38">38</option>						
														<option value="39">39</option>						
														<option value="40">40</option>						
														<option value="41">41</option>						
														<option value="42">42</option>						
														<option value="43">43</option>						
														<option value="44">44</option>						
														<option value="45">45</option>						
														<option value="46">46</option>						
														<option value="47">47</option>						
														<option value="48">48</option>						
														<option value="49">49</option>						
														<option value="50">50</option>
  	
                                                    </select>
													
												
                                            </li>
                                            <li >
                                                <label>Current Salary($) *</label>
                                               
                                                    <select name="current_salary" required>
														<option value=""> Select Current Salary</option> 	
														<option value="1000">1000</option>					
														<option value="2000">2000</option>					
														<option value="3000">3000</option>					
														<option value="4000">4000</option>					
														<option value="5000">5000</option>					
														<option value="6000">6000</option>					
														<option value="7000">7000</option>					
														<option value="8000">8000</option>					
														<option value="9000">9000</option>					
														<option value="10000">10000</option>
                                                    </select>
                                                
                                            </li>
                                            <li >
                                                <label>Expected Salary($) *</label>
                                               
                                                    <select name="expected_salary" required>
														<option value=""> Select Expected Salary</option>
														<option value="10000">10000</option>					
														<option value="11000">11000</option>					
														<option value="12000">12000</option>					
														<option value="13000">13000</option>					
														<option value="14000">14000</option>					
														<option value="15000">15000</option>					
														<option value="16000">16000</option>					
														<option value="17000">17000</option>					
														<option value="18000">18000</option>					
														<option value="19000">19000</option>					
														<option value="20000">20000</option>
                                                    </select>
                                               
                                            </li>
                                            <li>
                                                <label>Languages *</label>
                                                
                                                    <select name="languages" required>
														<option value="">Choose a Language...</option>
														<option value="Bengali/Bangla">Bengali/Bangla</option>
														<option value="English">English</option>
														<option value="Hindi">Hindi</option>
													</select>														
																	
                                              
                                            </li>
                                            <li >
                                                <label>Education Levels *</label>
                                                
                                                    <select name="qualification" required>
                                                        <option value="">-Select Your Education-</option>
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
                                              
                                            </li>  
                                       									
                                            <li >
												<label>Required Skills *</label>
												 <select name="required_skills" required="">
												  <option value="Please Select">Please Select</option>
												  <option value="php">PHP</option>
												  <option value="java">JAVA</option>
												  <option value=".net">.NET</option>
												  
												</select>
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
