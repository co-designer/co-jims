<div id="login">
	<button id="close" onclick="document.getElementById('login').className='hidden';document.getElementById('wrap').className='bgblurout';"></button>
	<form name="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<h1><span>Login</span></h1>
		<p class="float">
			<input type="Text" name="eno" placeholder="Username/Eno." class="user" required="true">
		</p>
		<p class="float">
			<input type="password" name="pass" placeholder="Password" class="pass" required="true">
		</p>
		<p>
			<a name="forgot-password" style="color:#008CBA" onclick="forgotpass()">Forgot Your Password</a>
		</p>
		<p >
			<input type="submit" name="login" class="font" value="Login">   
		</p>
	</form>
</div>

<div id="forgot">
	<button id="back-btn" onclick="document.getElementById('forgot').className='hidden';document.getElementById('login').style.visibility='visible';"></button>
	<form name="forgot" action="<?=$_SERVER['PHP_SELF']?>" method="post" >
		<h1><span>Recover Password</span></h1>
		<p class="float">
			<input type="text" name="f_eno" placeholder="Your ID" class="user" required="true">
		</p>
		<p >
			<input type="submit" name="recover" class="font" value="Recover">   
		</p>
	</form>
</div>

<div id="Signup">
	<button id="close" onclick="document.getElementById('Signup').className='hidden';document.getElementById('wrap').className='bgblurout';"></button>
		<form name="Signup" action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<h1><span>Register</span></h1>
		<p class="float">
			<input type="Text" name="firstname" placeholder="Fisrt Name" class="name" required="true">
		</p>
		<p class="float">
			<input type="Text" name="lastname" placeholder="Last Name" class="name" required="true">
		</p>
		<p class="float">
			<input type="Email" name="email" placeholder="Email Id" class="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="true">
		</p>
		<p class="float">
			<input type="Number" name="eno" placeholder="Enrollment No." class="user" required="true">
		</p>
		<p class="float">
				<select style="width:81px;" name="courses"  required="true">
					<option value="" disabled selected style="display: none;">Course</option>
					<option value="BCA">BCA</option>
					<option value="BBA">BBA</option>
					<option value="BJMC">BJMC</option>
				</select>
				<select style="width:67px;" name="shift"  required="true">
					<option value="" disabled selected style="display: none;">Shift</option>
					<option value="M">M</option>
					<option value="E">E</option>
				</select>
		</p>
		<p >
			<input type="submit" name="signup" class="font" value="Signup">   
		</p>
	</form>
</div>

<div id="change">
	<button id="close" onclick="document.getElementById('change').className='hidden';document.getElementById('wrap').className='bgblurout';"></button>
	<form name="change" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<h1><span>Change Password</span></h1>
		<p class="float">
			<input type="password" name="oldpass" placeholder="Old Password" class="pass" required="true">
		</p>
		<p class="float">
			<input type="password" name="newpass" placeholder="New Password" class="pass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Must contain at least one number/special character and one uppercase and lowercase letter, and at least 8 or more characters" required="true">
		</p>
		<p class="float">
			<input type="password" name="confirmpass" placeholder="Confirm Password" class="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="true">
		</p>
		<p >
			<input type="submit" name="changepass" class="font" value="Submit">   
		</p>
	</form>
</div>

<div id='wrong'>
	<button id='close' onclick="document.getElementById('wrong').className='hidden';document.getElementById('wrap').className='bgblurout';window.location='index.php';"></button>
	<?php
		if($wrong){
			echo "<p>Wrong Username Or Password.</p>";
		}
		elseif($sucess){
			echo "<p>Password Changed.</p>";
   			unset($_SESSION["username"]);
   			session_destroy();  
		}
		elseif($failed){
			echo "<p>Wrong Password.</p>";
		}
		elseif($confirm){
			echo "<p>Password Does Not Match.</p>";
		}
		elseif($f_fail){
			echo "<p>Password Not Sent.</p>";
		}
		elseif($f_sent){
			echo "<p>Password Sent.</p>";
		}
		elseif($s_sucess){
			echo "<p>You will recieve password in email after admin accepts your request.</p>";
		}
		elseif($s_fail){
			echo "<p>Already Registered.</p>";
		}
	?>
</div>