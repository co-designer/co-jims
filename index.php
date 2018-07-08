<?php include('database.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Placement</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="shortcut icon" href="images/favicon/favicon.ico" >
		<link rel="icon" type="image/gif" href="images/favicon/animated_favicon1.gif" >
		<script src="js/func.js"></script>
	</head>
	<body>
		<div id="wrap">
			<header>
				<?php include('header.php'); ?>
			</header>
			<div id="">
				<?php include('social-icons.php'); ?>
				<div align="center" style="width:100%;height:100%;background:#f2f2f2;">
				<div align="center" style="padding-top:82px;background:white;width:80%;height:100%;box-shadow:3px 3px 5px 6px #ccc; ">
					<div><img src="images/placementcell.jpg" width="100%"></div>
					<div style="width:90%;color:Brown;text-align: left;font-size:20px;" ><b>JIMS Placement Cell</b></div>
					<div style="width:90%;text-align:left;" >
						<p style="line-height:30px;">The College has a full fledged Placement & Internship Cell headed by a Senior Corporate professional designated as Head-Corporate Affairs and supported by two qualified and experienced Managers.
						<br><b>Objectives of the Placement & Internship Cell are three- fold as under:</b><br>
						�	Initiating series of campus and off campus recruitments, and making arrangements with corporate organizations for placement of our various students in the areas of Management, IT and Journalism & Mass Communication.<br> 

						�	Placement of students in different companies for Internships & Live projects. <br>

						�	Prepare students in keeping with the changing requirements of business and industry.<br> 

						Keeping this in view, Industry visits are arranged with good organizations. For the furtherance of this objective Guest lectures are arranged every month by Senior Executives/Professional Managers.<br><br><br></p></div>
					</div>
					</div>
				</div>
				</div>
			</div>
			<div>
				<?php include('footer.php'); ?>
			</div>
		</div>
		<div>
				<?php include('login-signup.php'); ?>
		</div>
		<?php 
			if($wrong || $sucess || $failed || $confirm || $f_sent || $f_fail || $s_sucess || $s_fail){
				echo "<script type='text/Javascript'> wrongpass(); </script>";
			}
			
		?>
	</body>
</html>

		
					
