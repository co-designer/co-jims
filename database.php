<?php
	mysql_connect("localhost","root","") or die(mysql_error());;
	mysql_select_db("placement") or die(mysql_error());;
	$wrong=0;
	$sucess=0;
	$failed=0;
	$confirm=0;
	$f_sent=0;$s_sucess=0;$s_fail=0;
	$f_fail=0;
	session_start();
	
	if(isset($_POST['login'])){
			$eno=$_POST['eno'];
			$pass=$_POST['pass'];
			$k=mysql_query("select * from login where eno='$eno' AND password='$pass'") or die(mysql_error());
			$z=mysql_num_rows($k);
			$n=mysql_fetch_array($k);
			if($z){
				$_SESSION['username']=$eno;
				$_SESSION['valid'] = true;
				$_SESSION['time'] = time();
				header('location:index.php');
			}
			else{
				$wrong=1;
			}
	}
	elseif (isset($_POST['signup'])) {
		$fname=$_POST['firstname'];$course=$_POST['courses'];$shift=$_POST['shift'];
		$lname=$_POST['lastname'];
		$eno=$_POST['eno'];
		$email=$_POST['email'];
    	$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    	$password=substr(str_shuffle($chars),0,12);
		$p=mysql_query("Insert Into login(eno,password,email) values('$eno','$password','$email')");
		if(!$p)
		{
			echo "Already Registered.";
			die();
		}
		mysql_query("Insert Into personal_details (eno,firstname,lastname) values('$eno','$fname','$lname')") or die(mysql_error());
		mysql_query("Insert Into academic_details (eno,course,shift) values('$eno','$course','$shift')") or die(mysql_error());
		mysql_query("Insert Into cv_details (eno) values('$eno')") or die(mysql_error());  
		$s_sucess=1;
	}
	elseif (isset($_POST['changepass'])) {
		$user=$_SESSION['username'];
		$k=mysql_query("select * from login where eno='$user'") or die(mysql_error());;
		$y=mysql_fetch_array($k);
		$newpass=$_POST['newpass'];
		$oldpass=$_POST['oldpass'];
		$confirmpass=$_POST['confirmpass'];
		if($newpass==$confirmpass){
			if($y['password']==$oldpass){
				mysql_query("Update login set password='$newpass' where eno='$user'") or die(mysql_error());;
				$sucess=1;
			}
			else{
				$failed=1;
			}
		}
		else{
			$confirm=1;
		}

	}
	elseif(isset($_POST['recover'])){
		$user=$_POST['f_eno'];
		$k=mysql_query("select * from login where eno='$user'") or die(mysql_error());;
		if($k){
			$y=mysql_fetch_array($k);
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
			$mail->addAddress($y['email']);   // Add a recipient
			$mail->isHTML(true);  // Set email format to HTML
			$bodyContent = '<h1>Jims Placement Cell</h1>';
			$bodyContent .= '<p><b>Enrollment No : </b>'.$y['eno'].'</p><p><b>Password : </b>'.$y['password'].'</p>'.'<p><a href="http://localhost/placement/index.php" target="_blank">Click Here</a>';
			$mail->Subject = 'Account Password';
			$mail->Body    = $bodyContent; 
			if(!$mail->send()) {
    			$f_fail=1;
			} 
			else {
    			$f_sent=1;
			}
		}
	}


?>