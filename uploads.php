<?php 
	include('database.php'); 
	if(isset($_POST['s1'])){
			$temp = explode(".", $_FILES["file"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);	
			$desc=$_POST['description'];
			$d=date('Y-m-d');
			move_uploaded_file($_FILES["file"]["tmp_name"],"./files/admin/notices/".$newfilename);
			mysql_query("Insert Into notices(name,description,date) values('$newfilename','$desc','$d')");
			header('location:uploads.php');
	}
	if(isset($_POST['s2'])){
			$eno=$_SESSION['username'];
			$k=mysql_query("select * from login where eno='$eno'");
			$user=mysql_fetch_array($k);
			$cc=mysql_query("select * from cv_details where eno='$eno'");
			$f=mysql_fetch_array($cc);
			$temp = explode(".", $_FILES["file"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			unlink('./files/student/'.$eno.'/'.$f['cvfile']);	
			move_uploaded_file($_FILES["file"]["tmp_name"],"./files/student/".$user['eno']."/".$newfilename);
			mysql_query("Update cv_details set cvfile='".$newfilename."' WHERE eno='$eno'");
			header('location:uploads.php');
	}
	if(isset($_POST['s3'])){
	$course=$_POST['course'];$comid=$_POST['txtid'];$desig=$_POST['txtdesign'];$package=$_POST['txtpack'];
	$xperc=$_POST['txt10'];$xiiperc=$_POST['txt12'];$gradperc=$_POST['txtcourse'];$backlogs=$_POST['txtbacklogs'];
	$doi=$_POST['txtdoi'];$doa=$_POST['txtdoa'];$name=$_POST['cname'];
	mysql_query("Insert into company(companyid,course,designation,package,xperc,xiiperc,gradperc,backlogs,doi,doa) values('$course','$comid','$desig','$package',
	'$xperc','$xiiperc','$gradperc','$backlogs','$doi','$doa')") or die("Company ID already exists");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Placement</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="shortcut icon" href="images/favicon/favicon.ico" >
		<link rel="icon" type="image/gif" href="images/favicon/animated_favicon1.gif" >
		<script src="js/func.js"></script>
		<script src="js/slider.js"></script>
		<style>
		div>input,label{
			display:block;
		}
		</style>
	</head>
	<body>
		<div id="wrap">
			<header>
				<?php include('header.php'); ?>
			</header>
			<?php 
					$user=$_SESSION['username'];
					$dd=mysql_query("select * from login where eno='$user'");
					$p=mysql_fetch_array($dd);
					if(isset($_SESSION['username']) && $p['type']=='P'){ 

			?>
			<div id="">
				<?php include('social-icons.php'); ?>
				<div align="center" style="width:100%;height:100%;background:#f2f2f2;">
				<div align="center" style="background:white;width:80%;height:100%;box-shadow:3px 3px 5px 6px #ccc; ">
					<div style="width:90%;height:100%;color:Brown;text-align: left;font-size:20px;"><b></b></div>
					<div style="width:90%;height:100%; text-align:left;">
						<div style="padding-top:100px;text-align:center;">
							<label style="font-size:24px;"><b><u>UPLOAD NOTICE</u></b></label>
						</div>
					<div style="padding-top:30px;height:100%;padding-left:150px;">
						<form name="" action="" method="post" enctype="multipart/form-data">
							<div>
								<label><b>Description</b></label>
								<textarea cols="100" name="description" required></textarea>
							</div>
							<div style="float:left;">
								<label><b>Choose File</b></label>
								<input type="file" name="file">
							</div>
							<br>
							<div style="padding-left:400px;">
								<input type="submit" value="Upload" name="s1" style="cursor:pointer;font-size:17px;">
							</div>
						</form>					
					</div><br><br>
					<div>
						<div style="padding-top:20px;text-align:center;">
							<label style="font-size:24px;"><b><u>COMPANY DETAILS</u></b></label>
						</div><br><br>
					<div style="padding-left:150px;float:left;">
						<div>
							<label><b>Enter the eligibility Criteria:</b></label><br>
						</div>
					<form method="post" action="">
						<div>
							<label>Course</label> 
							<select name="course"  required="true">
								<option value="" disabled selected style="display: none;">Select Course</option>
								<option value="ALL">ALL</option>
								<option value="BCA">BCA</option>
								<option value="BBA">BBA</option>
								<option value="BJMC">BJMC</option>
							</select>
						</div>
						<div style="float:left;">
							<label>Company ID</label>
							<input type="Number" name="txtid" placeholder="Company ID" style="width:80px;" required="true">
						</div>
						<div style="padding-left:120px;">
							<label>Company Name</label>
							<input type="text" name="cname" placeholder="Company Name" style="width:80px;" required="true">
						</div>
						<div>
							<label>Employee Designation</label>
							<input type="text" name="txtdesign" placeholder="Designation" style="width:200px;" required="true">
						</div>
						<div>
							<label>Package provided</label>
							<input type="text" name="txtpack" placeholder="Package" style="width:200px;" required="true">
						</div>
					</div>
					<div style="padding-left:470px;">
						<div>
							<label><b>Percentage:</b></label><br>
						</div>
						<div>	
							<label>10 class</label> 
							<input type="number" name="txt10" placeholder="Minimum in 10 class" style="width:200px;" required="true">
						</div>
						<div>
							<label>12 class</label> 
							<input type="number" name="txt12" placeholder="Minimum in 12 class" style="width:200px;" required="true">
						</div>
						<div>
							<label>Course</label>
							<input type="number" name="txtcourse" placeholder="Minimum in Course" style="width:200px;" required="true">
						</div>
						<div>
							<label>Backlogs allowed</label>
							<input type="number" name="txtbacklogs" placeholder="Backlogs" style="width:200px;">
						</div>
					</div><br>
					<div style="padding-left:150px;">
						<div style="float:left;">
							<label>Date of Interview</label>
							<input type="date" name="txtdoi" placeholder="Date of Interview" style="width:200px;" required="true">
						</div>
						<div  style="padding-left:320px;">
							<label>Date of Assessment</label>
							<input type="date" name="txtdoa" placeholder="Date of Assessment" style="width:200px;">
						</div>	
					</div>
					<div style="padding-left:400px;padding-top:40px;">
						<input type="submit" value="Submit" name="s3" style="cursor:pointer;font-size:22px;">
					</div>
					</form>
				</div>
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					</div>
					</div>
				</div>
			</div>
				<?php }
					elseif (isset($_SESSION['username']) && $p['type']=='S') {?>
						<div id="">
				<?php include('social-icons.php'); ?>
				<div align="center" style="width:100%;height:100%;background:#f2f2f2;">
				<div align="center" style="background:white;width:80%;height:100%;box-shadow:3px 3px 5px 6px #ccc; ">
					<div style="width:90%;height:100%;color:Brown;text-align: left;font-size:20px;"><b></b></div>
					<div style="width:90%;height:100%; text-align:left;">
						<div style="padding-top:100px;text-align:center;">
							<label style="font-size:24px;"><b><u>UPLOAD CV</u></b></label>
						</div>
					<div style="padding-top:30px;height:100%;padding-left:150px;">
						<form name="" action="" method="post" enctype="multipart/form-data">
							<div style="padding-left:200px;">
								<label><b>Choose File</b></label>
								<input type="file" name="file">
							</div>
							<br>
							<div style="padding-left:300px;">
								<input type="submit" value="Upload" name="s2" style="cursor:pointer;font-size:17px;">
							</div>
						</form>					
					</div><br><br>
					
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					</div>
					</div>
				</div>
			</div>						
				<?php	} ?>
			</div> 
		</div>
			<div>
				<?php include('footer.php'); ?>
			</div>
		</div>
		<div>
				<?php include('login-signup.php'); ?>
		</div>
	</body>
</html>