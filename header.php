<script language="javascript">
document.getElementById('search-field').onkeydown = function(e){
   if(e.keyCode == 13){
     document.search.submit();
   }
};
</script>

<div id="container">
	<div class="logo">
		<h1><a href="index.php">JIMS Placement Cell</a></h1>
	</div>
	<div id="nav">
		<ul>
			<li><a href="index.php" class="m1">Home</a></li>
			<li>
				<div class="dropdown">
					<button class="dropbtn">Placement</button>
					<div class="dropdown-content">
						<a href="internship.php">Internship</a>
						<a href="placements.php">Placements</a>
						<a href="recuiters.php">Our Recruiters</a>
					</div>
				</div>
			</li>
			<li><a href="jims.php" class="m1">About JIMS</li>
			<li><a href="about-us.php" class="m1">About Us</a></li>
			<?php
				if(isset($_SESSION['username']))
				{ 
					$user=$_SESSION['username'];
					$k=mysql_query("select * from personal_details where eno='$user'") or die(mysql_error());
					$n=mysql_fetch_array($k);
					$c=mysql_query("select * from login where eno='$user'");
					$l=mysql_fetch_array($c);
					echo "<li><div class='dropdown'>";
					if($n['path']=='')
					{
					 echo"<button class='dropbtn'><img src='./files/student/default-profile.png' alt='default.jpg' width='30px' height='25px' style='border-radius:5px;'>";
					}
					else
					{
					 echo"<button class='dropbtn'><img src='./files/student/".$user."/".$n['path']."' alt='profile.jpg' width='30px' height='25px' style='border-radius:5px;' >";
					}
					if($l['type']=='P'){
					echo "</button>
							<div class='dropdown-content'>
									<a href='notices.php'>Notices</a>
									<a href='uploads.php'>Upload</a>
									<a href='company.php'>Company</a>
									<button onclick='changepass()'>Change Password</button>
							<a href='logout.php'>Logout</a>
							</div>
						</div></li>";
					}
					else if($l['type']=='C')
					{
						echo "</button>
							<div class='dropdown-content'>
								<a href='requests.php'>Requests</a>
								<button onclick='changepass()'>Change Password</button>
								<a href='notices.php'>Notices</a>
								<a href='company.php'>Company</a>
							<a href='logout.php'>Logout</a>
							</div>
						</div></li>";
					}

					else
					{
						echo "</button>
							<div class='dropdown-content'>
								<button onclick='changepass()'>Change Password</button>
								<a href='notices.php'>Notices</a>
									<a href='edit-profile.php'>Edit Profile</a>
									<a href='company.php'>Company</a>
								<a href='uploads.php'>Upload</a>
							<a href='logout.php'>Logout</a>
							</div>
						</div></li>";
					}
				}
				else
				{
					echo "<li><button name='login' class='dropbtn' onclick='loginbox()'> Login</button></li>
						<li><button name='signup' class='dropbtn' onclick='signupbox()'> Sign Up</button></li>";
				}
			?>
			<li>
				<form action="https://www.google.co.in/search?" id="search-form" name="search" target="_blank">
					<fieldset>
						<input type="text" id="search-field" name="q" placeholder="Search">
						<input type="hidden" name="sitesearch" value="jpc.org">
						<input type="submit" id="submit-search" style="display:none;">
					</fieldset>
				</form> 
			</li>
		</ul>
	</div>
</div>	