<?php include('database.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Placement</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="shortcut icon" href="images/favicon/favicon.ico" >
		<link rel="icon" type="image/gif" href="images/favicon/animated_favicon1.gif" >
		<script src="js/func.js"></script>
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
			<div id="ed-content">
				<?php include('social-icons.php'); ?>
<?php
$user=$_SESSION['username'];
$d=mysql_query("select * from login where eno='$user'");
$p=mysql_fetch_array($d);
if(isset($_SESSION['username']) && $p['type']=='S'){ 
	$k=mysql_query("select * from personal_details where eno='$user'") or die(mysql_error());
	$n=mysql_fetch_array($k);
	$g=mysql_query("select * from academic_details where eno='$user'") or die(mysql_error());
	$a=mysql_fetch_array($g);
	if(isset($_POST['s1']))
	{
		$f=$_POST['fname'];$l=$_POST['lname'];$d=$_POST['dob'];$g=$_POST['gender'];$fn=$_POST['fathername'];$add=$_POST['address'];$mn=$_POST['mobile'];$state=$_POST['state'];$city=$_POST['city'];$marital=$_POST['ma'];
		$k=mysql_query("Update personal_details set firstname='$f',lastname='$l',dob='$d',gender='$g',fathername='$fn',address='$add',mobileno='$mn',state='$state',city='$city',marital='$marital' WHERE eno='$user'") or die(mysql_error());
		if($k)
		{
			header('location:edit-profile.php');
			header('location:index.php?details="updated"');		}
		else
		{
			header('location:edit-profile.php');
			header('location:index.php?details="notupdated"');		}		
	}

	if(isset($_POST['s2']))
	{
		$f=$_POST['xper'];$l=$_POST['xyop'];$d=$_POST['xiiper'];$g=$_POST['xiiyop'];$fn=$_POST['course'];$add=$_POST['batch'];
		$mn=$_POST['semIper'];$bl=$_POST['backlogs'];$semii=$_POST['semIIper'];$semiii=$_POST['semIIIper'];$semiv=$_POST['semIVper'];$math=$_POST['maths'];
		$k=mysql_query("Update academic_details set xperc='$f',xyop='$l',xiiperc='$d',xiiyop='$g',batch='$add',gradperc='$mn',ii='$semii',iii='$semiii',iv='$semiv',backlogs='$bl',maths='$math' WHERE eno='$user'") or die(mysql_error());
		if($k)
		{
			header('location:edit-profile.php');
			header('location:index.php?details="updated"');

		}
		else
		{
			header('location:edit-profile.php');
			header('location:index.php?details="notupdated"');
		}		
	}
	if(isset($_POST['remove']))
	{
		if($n['path']=='')
		{
			header("location:edit-profile.php");
		}
		else
		{
			unlink("./files/student/".$user."/".$n['path']);
			mysql_query("Update personal_details set path='' WHERE eno='$user'");
			header("location:edit-profile.php");
		}
	}
	if(isset($_POST['upload']))
	{
		$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
		$upload_exts = end(explode(".", $_FILES["file"]["name"]));
		if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/png")
			|| ($_FILES["file"]["type"] == "image/jpg"))
			&& ($_FILES["file"]["size"] < 9000000)
			&& in_array($upload_exts, $file_exts))
		{
			$temp = explode(".", $_FILES["file"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);	
			if ($_FILES["file"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
			else
			{
				if (file_exists("./files/student/".$user."/".$_FILES["file"]["name"]))
				{
					echo "<div class='error'>"."(".$_FILES["file"]["name"].")".
						" already exists. "."</div>";
				}
				else
				{
					mkdir("./files/student/".$user."/");
					unlink('./files/student/'.$user.'/'.$n['path']);
					move_uploaded_file($_FILES["file"]["tmp_name"],"./files/student/".$user."/".$newfilename);
					$h=mysql_query("Update personal_details set path='".$newfilename."'WHERE eno='$user'");
					header('location:edit-profile.php');

				}
			}
		}
		else
		{
			echo "<div class='error'>Invalid file</div>";
		}
	} 
?>
			
				<div id="default">
					<div id="edit-main">
						<div id="edit-box" style="padding-top:20px; padding-left:5px;">
							<p style="font-family:'headerfont'; font-size:24px; color:#8c8c8c;">YOUR ACCOUNT</p>
						</div>
						<div id="edit-box">
							<button id="edit-button" onclick="pdetails();"><span>Personal Details</span></button>
							<button id="edit-button" onclick="adetails();"><span>Academic Details</span></button>
							<button id="edit-button" onclick="cvdetails();"><span>CV Details</span></button>
						</div>
					</div>
					<div id="edit-content">
						<div style="padding-left:300px; border-bottom:1px solid #bfbfbf; padding-top:20px; height:80px; box-shadow: 0 1px 6px rgba(0, 0, 0, 0.12), 0 1px 4px rgba(0, 0, 0, 0.24);">
							<p style="font-family:'headerfont'; font-size:34px; color:#4775d1;">Personal Details</p>
						</div>
						<form name="frm" action="" method="post" enctype="multipart/form-data">
						<div style="height:100%;width:100%;">
							<div style="height:92%;width:300px;float:left;padding-left:50px;">
							<?php 
								if($n['path']=='')
								{
									echo"<p><img src='./files/student/default-profile.png' alt='default.jpg' width='300px' height='250px;'></p>";
								}
								else
								{
									echo"<p><img src='./files/student/".$user.'/'.$n['path']."' alt='profile.jpg' width='300px' height='250px' style='border-radius:10px;'></p>";
								}
							?>	
							<div>
								<input type="file" name="file">
							</div>
							<div style="float:left;padding-left:50px;padding-top:20px;">
								<input type="submit" name="upload" style="cursor:pointer;font-size:17px;" value="Upload">
							</div>
							<div style="padding-left:150px;padding-top:20px;">
								<input type="submit" name="remove" style="cursor:pointer;font-size:17px;" value="Remove">
							</div>
							</div>
						</form>
     					<form name="frm" action="" method="post">

							<div style="padding-top:20px; padding-left:700px;">
								<div style="float:left;">
									<label><b>First Name</b></label>
									<input type="text" name="fname" required="true" value="<?php echo $n['firstname']; ?>">
								</div>
								<div style="padding-left:170px;">
									<label><b>Last Name</b></label>
									<input type="text" name="lname" required="true" value="<?php echo $n['lastname']; ?>">
								</div>
								<div style="float:left;">
									<label><b>Date Of Birth</b></label>
									<input type="text" name="dob" required="true" onfocus="(this.type='date')" onfocusout="(this.type='text')" value="<?php echo $n['dob']; ?>">
								</div>
								<div style="padding-left:170px;">
									<label><b>Gender</b></label>
									<select name="gender"  required="true">
											<option value="" disabled selected style="display: none;">Gender</option>
											<option value="female" <?php if ($n['gender']=='female'){echo 'selected';}?>>Female</option>
											<option value="male" <?php if ($n['gender']=='male'){echo 'selected';}?>>Male</option>
											<option value="other" <?php if ($n['gender']=='other'){echo 'selected';}?>>Other</option>
										</select>
								</div>

								<div>
									</br>
									<label><b>Father's Name</b></label>
									<input type="text" name="fathername" required="true" style="width:300px;" value="<?php echo $n['fathername']; ?>">
								</div>
								<div>
									<label><b>Address</b></label>
									<input type="text" name="address" required="true" style="width:300px;" value="<?php echo $n['address']; ?>">
								</div>
								<div>
									<label><b>Mobile No.</b></label>
									<input type="number" name="mobile" minlength="10" required="true" style="width:300px;" value="<?php echo $n['mobileno']; ?>">
								</div>

								<div style="float:left;">
									<label><b>State</b></label>
									<input type="text" name="state" required="true" value="<?php echo $n['state']; ?>">
								</div>
								<div style="padding-left:170px;">
									<label><b>City</b></label>
									<input type="text" name="city" required="true" value="<?php echo $n['city']; ?>">
								</div>

								<div >
									<label><b>Marital Status</b></label>
									<select name="ma"  required="true">
											<option value="" disabled selected style="display: none;">Select</option>
											<option value="Unmarried" <?php if ($n['marital']=='Unmarried'){echo 'selected';}?>>Unmarried</option>
											<option value="Married" <?php if ($n['marital']=='Married'){echo 'selected';}?>>Married</option>
										</select>
								</div>

								<div style="float:left;padding-left:50px;padding-top:30px;">
									<input type="Submit" name="s1" style="width:100px; height:30px; cursor:pointer;" value="Submit">
								</div>
								<div style="padding-top:30px;padding-left:180px;">
									<input type="Reset" name="reset" style="width:100px; height:30px; cursor:pointer;" value="Reset">
								</div>
							</div>
						</div>
						</form>
					</div>
					<div id="edit-cont">
					<div style="position:absolute;top:0;height:100%;width:75%;background:white;border-left: 1px solid #bfbfbf;  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.12), 0 1px 4px rgba(0, 0, 0, 0.24);">
						<div style="padding-left:60px; border-bottom:1px solid #bfbfbf; padding-top:20px; height:80px; box-shadow: 0 1px 6px rgba(0, 0, 0, 0.12), 0 1px 4px rgba(0, 0, 0, 0.24);">
							<p style="font-family:'headerfont'; font-size:34px; color:#4775d1;">Academic Details</p>
						</div>
						<form name="frm" action="" method="post">
						<div style="height:100%;width:100%;">
							<div style="padding-top:20px; padding-left:100px;">
								<div style="float:left;">
									<label><b>10th Percentage</b></label>
									<input type="number" step="0.01" name="xper" required="true" value="<?php echo $a['xperc']?>">
								</div>
								<div style="padding-left:200px;">
									<label><b>Year Of Passing</b></label>
									<input type="number" name="xyop" required="true" value="<?php echo $a['xyop']?>">
								</div>
								<div style="float:left;">
									<label><b>12th Percentage</b></label>
									<input type="number" name="xiiper" step="0.01" required="true" value="<?php echo $a['xiiperc']?>">
										
								</div>
								<div style="padding-left:200px;">
									<label><b>Year Of Passing</b></label>
									<input type="number" name="xiiyop" required="true" value="<?php echo $a['xiiyop']?>">
								</div>
								<div style="float:left;">
									<label><b>Course</b></label>
									<input type="text" name="course" value="<?php echo $a['course']?>" readonly>
								</div>
								<div style="padding-left:200px;">
									<label><b>Batch</b></label>
									<input type="number" name="batch" required="true" value="<?php echo $a['batch']?>">
								</div>
								</br>
								<label style="font-size:18px;"><b><u>Percentage</u></b></label>
								<div style="border:1px solid #bfbfbf;width:40%;padding:2px 2px 2px 2px;">
								<div style="float:left;">
									<label><b>Sem I</b></label>
									<input type="number" name="semIper" step="0.01" required="true" value="<?php echo $a['gradperc']?>">
								</div>
								<div style="padding-left:200px;">
									<label><b>Sem II</b></label>
									<input type="number" name="semIIper" step="0.01" required="true" value="<?php echo $a['ii']?>">
								</div>
								<div style="float:left;">
									<label><b>Sem III</b></label>
									<input type="number" name="semIIIper" step="0.01" required="true" value="<?php echo $a['iii']?>">
								</div>
								<div style="padding-left:200px;">
									<label><b>Sem IV</b></label>
									<input type="number" name="semIVper" step="0.01" required="true" value="<?php echo $a['iv']?>">
								</div>
								</div>
								<div>
									<label><b>Backlogs</b></label>
									<input type="number" name="backlogs" style="width:335px;" value="<?php echo $a['backlogs']?>">
								</div>
								<div>
									<label><b>Do You Have Maths in XII class</b></label>
									<select name="maths"  required="true">
											<option value="" disabled selected style="display: none;">Select</option>
											<option value="Yes" <?php if ($a['maths']=="Yes"){echo 'selected';}?>>Yes</option>
											<option value="No" <?php if ($a['maths']=="No"){echo 'selected';}?>>No</option>
										</select>
								</div>
								<div style="float:left;padding-left:50px;padding-top:30px;">
									<input type="Submit" name="s2" style="width:100px; height:30px; cursor:pointer;" value="Submit">
								</div>
								<div style="padding-top:30px;padding-left:180px;">
									<input type="Reset" name="reset" style="width:100px; height:30px; cursor:pointer;" value="Reset">
								</div>
							</div>
						</div>
						</form>
					</div>
					</div>
					<div id="ed-cont">
					<div style="position:absolute;top:0;height:100%;width:75%;background:white;border-left: 1px solid #bfbfbf;  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.12), 0 1px 4px rgba(0, 0, 0, 0.24);">
						<div style="padding-left:60px; border-bottom:1px solid #bfbfbf; padding-top:20px; height:80px; box-shadow: 0 1px 6px rgba(0, 0, 0, 0.12), 0 1px 4px rgba(0, 0, 0, 0.24);">
							<p style="font-family:'headerfont'; font-size:34px; color:#4775d1;">CV Details</p>
						</div>
						<div style="padding-left: 90px;padding-top:10px;">
							<b><u><i><label>Enter the following details:</label></i></u></b>
							<form method="post" action="cv-generated.php">
								<label>Your Objective<label>
								<textarea maxlength="250" rows="2" cols="117" name="obj" placeholder="Maximum 250 Characters"></textarea><br><br>
							<div style="float:left;width:45%;">
								<b>Technical Skills:</b><br>
								<label>Programming Languages</label>
								<input type="text" name="plan" size="50px" required="true">
								<label>Scripting Languages(<i>Optional</i>)</label>
								<input type="text" name="slan" size="50px">
								<label>Databases(<i>Optional</i>)</label>
								<input type="text" name="dlan" size="50px">
								<label>Any other(<i>Optional</i>)</label>
								<div id="skill">
									<div style="float:left;">
										<label>Title</label>
										<input type="text" name="olt1" size="21px">
									</div>
									<div style="float:left;padding-left:10px;">
										<label>Info</label>
										<input type="text" name="oli1" size="22px">
									</div><br>
								</div>
								<div id="skill">
									<div style="float:left;">
										<label>Title</label>
										<input type="text" name="olt2" size="21px">
									</div>
									<div style="float:left;padding-left:10px;">
										<label>Info</label>
										<input type="text" name="oli2" size="22px">
									</div><br>
								</div>
								<div id="skill">
									<div style="float:left;">
										<label>Title</label>
										<input type="text" name="olt3" size="21px">
									</div>
									<div style="float:left;padding-left:10px;">
										<label>Info</label>
										<input type="text" name="oli3" size="22px">
									</div><br>
								</div>
							</div>
							<div>
								<b>Qualification:</b><br>
								<label>High School's Name</label>
								<input type="text" name="txthc" size="50px" required="true" width="300px">
								<label>Board</label>
								<input type="text" name="txthcboard" size="50px" required="true" width="100px">
								<label>Stream</label>
								<select name="stream"  required="true">
											<option value="" disabled selected style="display: none;">Select</option>
											<option value="Science" >Science</option>
											<option value="Commerce" >Commerce</option>
											<option value="Arts" >Arts</option>
								</select>
								<label>Senior Secondary School's Name</label>
								<input type="text" name="txtssc" size="50px" required="true" width="300px">
								<label>Board</label>
								<input type="text" name="txtsscboard" size="50px" required="true" width="300px"><br>
								<label>Languages Known</label>
								<input type="text" name="languages" size="50px" required="true">
							</div>
							<br>
							<br><br>
							<div>
								<b>Certifications (<i>Optional</i>):</b><br><br>
									<div>
										<div style="float:left;">
											<label>Certified In</label>
											<input type="text" name="ci1" size="21px">
										</div>
										<div style="float:left;padding-left:10px;">
											<label>Certified By</label>
											<input type="text" name="cb1" size="22px">
										</div>
										<div style="float:left;padding-left:10px;">
											<label>Year</label>
											<input type="Number" name="cy1" size="22px">
										</div>
									</div><br><br><br>
									<div>
										<div style="float:left;">
											<label>Certified In</label>
											<input type="text" name="ci2" size="21px">
										</div>
										<div style="float:left;padding-left:10px;">
											<label>Certified By</label>
											<input type="text" name="cb2" size="22px">
										</div>
										<div style="float:left;padding-left:10px;">
											<label>Year</label>
											<input type="Number" name="cy2" size="22px">
										</div>
									</div><br><br><br>
									<div>
										<div style="float:left;">
											<label>Certified In</label>
											<input type="text" name="ci3" size="21px">
										</div>
										<div style="float:left;padding-left:10px;">
											<label>Certified By</label>
											<input type="text" name="cb3" size="22px">
										</div>
										<div style="float:left;padding-left:10px;">
											<label>Year</label>
											<input type="Number" name="cy3" size="22px">
										</div>
									</div>
										<br><br><br>
									<div>
										<div style="float:left;">
											<label>Certified In</label>
											<input type="text" name="ci4" size="21px">
										</div>
										<div style="float:left;padding-left:10px;">
											<label>Certified By</label>
											<input type="text" name="cb4" size="22px">
										</div>
										<div style="float:left;padding-left:10px;">
											<label>Year</label>
											<input type="Number" name="cy4" size="22px">
										</div>
									</div>
									<br><br><br><br>
									<div>
										<label>Strength</label>
										<textarea rows="2" cols="117" name="txtstrength" required="true"></textarea><br><br>
									</div>
							</div>
							<div style="padding-left:300px; float:left;">
								<input style="width:100px; height:30px; cursor:pointer;" type="submit" value="Generate CV" 
								<?php 
									if(is_null($n['firstname']) || is_null($n['lastname']) || is_null($n['dob']) || is_null($n['gender']) || is_null($n['fathername']) || is_null($n['address']) || is_null($n['mobileno']) || is_null($n['state']) || is_null($n['city']) || is_null($n['path']) || is_null($a['xperc']) || is_null($a['xyop']) || is_null($a['xiiperc']) || is_null($a['xiiyop']) || is_null($a['course']) || is_null($a['batch']) || is_null($a['gradperc']) || is_null($a['ii']) || is_null($a['iii']) || is_null($a['iv']))
									{
										echo 'disabled';
									}
								?> >
							</div>
							<div style="padding-left:410px;">
								<input style="width:100px; height:30px; cursor:pointer;" type="reset" value="Reset">
							</div>
							</form>
						</div>
					</div>
					</div>
				</div>
			</div>
<?php		}
			elseif(isset($_SESSION['username']) && $p['type']=='C')
			{
				echo "<div id='content'></div>";
			}
			else 
			{
    			header("location:index.php");
			}
		?>
			<div>
				<?php include('footer.php'); ?>
			</div>
		</div>
		<div>
				<?php include('login-signup.php'); ?>
		</div>
	</body>
</html>
