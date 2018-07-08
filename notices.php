<?php include('database.php'); 
$user=$_SESSION['username'];
$dd=mysql_query("select * from login where eno='$user'");
$p=mysql_fetch_array($dd);
if(isset($_SESSION['username'])){
	if(isset($_POST['delete'])){
		$na=$_POST['n1'];
		$ka=mysql_query("select * from notices where name='$na'");
		$ar=mysql_fetch_array($ka);
		unlink('./files/admin/notices/'.$na);
		mysql_query("Delete from notices where name='$na'");
		header('location:notices.php');
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
	</head>
	<body>
		<div id="wrap">
			<header>
				<?php include('header.php'); ?>
			</header>
			<div id="">
				<?php include('social-icons.php'); ?>
				<div align="center" style="width:100%;height:100%;background:#f2f2f2;">
				<div align="center" style="background:white;width:80%;height:100%;box-shadow:3px 3px 5px 6px #ccc; ">
					<div style="width:100%;height:100%;">
						
					</div>
					<div style="width:90%;height:100%;color:Brown;text-align: left;font-size:20px;"><b></b></div>
					<div style="width:90%;height:100%; text-align:left;">
						<div style="padding-top:100px;text-align:center;">
							<label style="font-size:24px;"><b><u>NOTICES</u></b></label>
						</div>
					<div style="padding-top:30px;height:100%;" align="center">
						<?php 
							
							$g=mysql_query("select * from notices");
						
							?>
    							<table border="1" width="100%" cellpadding="12px" >
    								<tr>
    									<td width="50px"><b><u>S No.</u></b></td>
    									<td><b><u>Description</u></b></td>
    									<td width="100px"><b><u>Date Of Upload</u></b></td>
    									<?php if($p['type']=='P'){echo '<td width=100px><b><u>Remove</u></b></td>';} ?>
    								</tr>
    							
						<?php
							$i=1;
							while ($row=mysql_fetch_assoc($g)) {

    					?>
    							
    							<tr>
    								<form name="" method="post" action="">
    									<input type="hidden" name="n1" value="<?php echo $row['name'];?>">
    									<td><b><?php echo $i; ?></b></td>
    									<td><b><a href="./files/admin/notices/<?php echo $row['name'];?>" target="_blank" style="text-decoration:underline;color:blue;"><?php echo $row['description'];?> </a></b></td>
    									<td><b><?php echo $row['date']; ?></b></td>
    									<?php 
    									if($p['type']=='P')
    										{
    											echo '<td width=100px>
    													<input type=Submit name=delete value=Delete style=font-size:17px;cursor:pointer;>
    												</td>';
    										} 
    									?>
    								</form>
    							</tr>
    							
    					<?php
    						$i++;
    						}
    					}
						?>
    						</table>
					
						</div>
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					</div>
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