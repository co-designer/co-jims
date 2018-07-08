<?php 
	include('database.php'); 
	
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
					if(isset($_SESSION['username'])){ 

			?>
			<div id="">
				<?php include('social-icons.php'); ?>
				<div align="center" style="width:100%;height:100%;background:#f2f2f2;">
					<div align="center" style="background:white;width:80%;height:100%;box-shadow:3px 3px 5px 6px #ccc; ">
						<div style="width:100%;height:100%; text-align:left;">
							<div style="padding-top:100px;text-align:center;">
								<label style="font-size:24px;"><b><u>COMPANIES</u></b></label>
							</div>
							<div style="padding-top:30px;height:100%;" align="center">
						<?php 
							$ccc=mysql_query("Select * from admin where eno='$user'");
							$admin=mysql_fetch_array($ccc);
							$g=mysql_query("select * from company");
						
							?>
    							<table border="0" width="100%" cellpadding="12px" >
    								<tr>
    									<td><b><u>Company ID</u></b></td>
    									<td><b><u>Company Name</u></b></td>
    									<td><b><u>Designation</u></b></td>
    									<td><b><u>Package</u></b></td>
    									<td><b><u>Date of Interview</u></b></td>
    									<td><b><u>Date of Assessment</u></b></td>
    									<td><b><u>X(%)</u></b></td>
    									<td><b><u>XII(%)</u></b></td>
    									<td><b><u>Course(%)</u></b></td>
    									<td><b><u>Backlogs</u></b></td>
    									<?php if($p['type']=='P'){?>
    									<td><b><u>Eligible</u></b></td>	
    									<td><b><u>Remove</u></b></td>
    									<?php } ?>
    								</tr>
    							
						<?php
							while ($row=mysql_fetch_assoc($g)) {
								
    							?>
    							<tr>
    								<form action="eligible-students.php" method="post">
    									<td><b><?php echo $row['companyid']?></b></td>
    									<td><b><?php echo $row['name']?></b></td>
    									<td><b><?php echo $row['designation']?></b></td>
    									<td><b><?php echo $row['package']?></b></td>
    									<td><b><?php echo $row['doi']?></b></td>
    									<td><b><?php echo $row['doa']?></b></td>
    									<td><b><?php echo $row['xperc']?></b></td>
    									<td><b><?php echo $row['xiiperc']?></b></td>
    									<td><b><?php echo $row['gradperc']?></b></td>
    									<td><b><?php echo $row['backlogs']?></b></td>
    									<?php if($p['type']=='P'){?>
    									<td><b><input type="submit" name="list" value="List"></b></td>	
    									<td><b><input type="submit" name="delete" value="Delete"></b></td>
    									<input type="hidden" name="companyid" value="<?php echo $row['companyid']; ?>">
    								</form>
    									<?php } ?>
    							</tr>
    							<?php
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