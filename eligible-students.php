<?php 
	include('database.php');
	$cid=$_POST['companyid']; 
	if(isset($_POST['delete'])){
		mysql_query("delete from company where companyid='$cid'");
		header('location:company.php');
	}
	if(isset($_POST['list'])){
		$company=mysql_query("Select * from company where companyid='$cid'");
		$list=mysql_fetch_array($company);
	$course=$list['course'];$comid=$list['companyid'];$desig=$list['designation'];$package=$list['package'];
	$xperc=$list['xperc'];$xiiperc=$list['xiiperc'];$gradperc=$list['gradperc'];$backlogs=$list['backlogs'];
	$doi=$list['doi'];$doa=$list['doa'];
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
						<div style="width:90%;height:100%; text-align:left;">
							<div style="padding-top:100px;text-align:center;">
								<label style="font-size:24px;"><b><u>ELIGIBLE STUDENTS</u></b></label>
							</div>
							<div style="padding-top:30px;height:100%;" align="center">
						<?php 
							$ccc=mysql_query("Select * from admin where eno='$user'");
							$admin=mysql_fetch_array($ccc);
							$g=mysql_query("select * from login");
						
							?>
    							<table border="0" width="100%" cellpadding="12px" >
    								<tr>
    									<td><b><u>Student Name</u></b></td>
    									<td><b><u>Enrollment No.</u></b></td>
    									<td><b><u>Course</u></b></td>
    									<td><b><u>X(%)</u></b></td>
    									<td><b><u>XII(%)</u></b></td>
    									<td><b><u>Course(%)</u></b></td>
    									<td><b><u>Shift</u></b></td>
    									<td><b><u>Backlogs</u></b></td>
    								</tr>
    							
						<?php
							while ($row=mysql_fetch_assoc($g)) {
								$e=$row['eno'];
    							$l=mysql_query("select * from personal_details where eno='$e'");
    							$p=mysql_fetch_array($l);
    							$k=mysql_query("select * from academic_details where eno='$e'");
    							$r=mysql_fetch_array($k);
    							$ss=mysql_query("select * from login where eno='$e'");
    							$n=mysql_fetch_array($ss);
    							$percen=($r['gradperc']+$r['ii']+$r['iii']+$r['iv'])/4;
    							if($r['xperc']>=$xperc && $r['xiiperc']>=$xiiperc && $percen>=$gradperc && $r['backlogs']<=$backlogs)
    							{
    								if($course=="ALL"){
    							?>
    							<tr>
    									<td><b><?php echo $p['firstname'].' '.$p['lastname']; ?></b></td>
    									<td><b><?php echo $row['eno']; ?></b></td>
    									<td><b><?php echo $r['course']; ?></b></td>
    									<td><b><?php echo $r['xperc'].'%'; ?></b></td>
    									<td><b><?php echo $r['xiiperc'].'%'; ?></b></td>
    									<td><b><?php echo $percen.'%'; ?></b></td>
    									<td><b><?php echo $r['shift']; ?></b></td>
    									<td><b><?php echo $r['backlogs']; ?></b></td>
    							</tr>
    							<?php } elseif($course==$r['course']){ ?>
    							<tr>
    									<td><b><?php echo $p['firstname'].' '.$p['lastname']; ?></b></td>
    									<td><b><?php echo $row['eno']; ?></b></td>
    									<td><b><?php echo $r['course']; ?></b></td>
    									<td><b><?php echo $r['xperc'].'%'; ?></b></td>
    									<td><b><?php echo $r['xiiperc'].'%'; ?></b></td>
    									<td><b><?php echo $percen.'%'; ?></b></td>
    									<td><b><?php echo $r['shift']; ?></b></td>
    									<td><b><?php echo $r['backlogs']; ?></b></td>
    							</tr>
    							<?php
    								}
    								else{ }
    							}
    							}
    						}
						?>
    						</table><br><br><br><Br><Br><br><br><br><Br><Br><br><br><br><Br><Br><br><br><br><Br><Br>
					
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
	</body>
</html>