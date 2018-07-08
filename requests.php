<?php include('database.php');
$user=$_SESSION['username'];
$dd=mysql_query("select * from login where eno='$user'");
$p=mysql_fetch_array($dd);
if(isset($_SESSION['username']) && $p['type']=='C'){
	if(isset($_POST['yes'])){
		$eno=$_POST['eno'];
		$ms=mysql_query("select * from login where eno='$eno'");
		$h=mysql_fetch_array($ms);
		$email=$h['email'];
		$password=$h['password'];
			require 'PHPMailer/PHPMailerAutoload.php';
			$mail = new PHPMailer;
			$mail->isSMTP();                                   // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                            // Enable SMTP authentication
			$mail->Username = 'jimsplacementcell2016@gmail.com';          // SMTP username
			$mail->Password = 'hello@jpc'; // SMTP password
			$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                 // TCP port to connect to
			$mail->setFrom('jimsplacementcell2016@gmail.com', 'Jims Placement Cell');
			$mail->addReplyTo('jimsplacementcell2016@gmail.com', 'Jims Placement Cell');
			$mail->addAddress($email);   // Add a recipient
			$mail->isHTML(true);  // Set email format to HTML
			$bodyContent = '<h1>Jims Placement Cell</h1>';
			$bodyContent .= '<p><b>Enrollment No : </b>'.$eno.'</p><p><b>Password : </b>'.$password.'</p>'.'<p><a href="http://localhost/placement/index.php" target="_blank">Click Here</a>';
			$mail->Subject = 'Registration Details';
			$mail->Body    = $bodyContent; 
			$mail->send();
		mysql_query("Update login set verified='1' where eno='$eno'");
	
	}
	if(isset($_POST['no'])){
		$eno=$_POST['eno'];
		$ms=mysql_query("select * from login where eno='$eno'");
		$h=mysql_fetch_array($ms);
		$email=$h['email'];
			require 'PHPMailer/PHPMailerAutoload.php';
			$mail = new PHPMailer;
			$mail->isSMTP();                                   // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                            // Enable SMTP authentication
			$mail->Username = 'jimsplacementcell2016@gmail.com';          // SMTP username
			$mail->Password = 'hello@jpc'; // SMTP password
			$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                 // TCP port to connect to
			$mail->setFrom('jimsplacementcell2016@gmail.com', 'Jims Placement Cell');
			$mail->addReplyTo('jimsplacementcell2016@gmail.com', 'Jims Placement Cell');
			$mail->addAddress($email);   // Add a recipient
			$mail->isHTML(true);  // Set email format to HTML
			$bodyContent = '<h1>Jims Placement Cell</h1>';
			$bodyContent .= '<p><b>Admin Rejected Your Account.</b></p>';
			$mail->Subject = 'Registration Details';
			$mail->Body    = $bodyContent; 
			$mail->send();
		mysql_query("delete from login where eno='$eno'");

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
		<style>
			td>input{
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<div id="wrap">
			<header>
				<?php include('header.php'); ?>
			</header>
			<div id="content">
				<?php include('social-icons.php'); ?>
				<div align="center" style="width:100%;height:100%;background:#f2f2f2;">
				<div align="center" style="background:white;width:80%;height:100%;box-shadow:3px 3px 5px 6px #ccc; ">
				<div id="default">
					<div style="padding-top:100px;text-align:center;">
						<label style="font-size:24px;"><b><u>USER AUTHENTICATION</u></b></label>
					</div>
					<div style="padding-top:30px;height:100%;" align="center">
						<?php 
							$ccc=mysql_query("Select * from admin where eno='$user'");
							$admin=mysql_fetch_array($ccc);
							$g=mysql_query("select * from login");
						
							?>
    							<table border="0" width="100%" cellpadding="12px" >
    								<tr>
    									<td><b><u>First Name</u></b></td>
    									<td><b><u>Last Name</u></b></td>
    									<td><b><u>Enrollment No.</u></b></td>
    									<td><b><u>Email</u></b></td>
    									<td><b><u>Course</u></b></td>
    									<td><b><u>Shift</u></b></td>
    									<td><b><u>Confirm</u></b></td>
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
    							if(!$n['verified'] && $r['course']==$admin['course'] && $r['shift']==$admin['shift'])
    							{
    							?>
    							<tr>
    								<form name="" method="post" action="">
    									<td><b><?php echo $p['firstname']; ?></b></td>
    									<td><b><?php echo $p['lastname']; ?></b></td>
    									<td><b><?php echo $row['eno']; ?></b></td>
    									<td><b><?php echo $row['email']; ?></b></td>
    									<td><b><?php echo $r['course']; ?></b></td>
    									<td><b><?php echo $r['shift']; ?></b></td>
    									<td><input type="Submit" name="yes" value="Yes">&nbsp;&nbsp;<input type="Submit" name="no" value="No"></td>
    									<input type="hidden" name="eno" value="<?php echo $e; ?>">
    								</form>
    							</tr>
    							
    							<?php
    							}
    						}
						?>
    						</table>
					
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
<?php }
else{
	header("location:index.php");
}