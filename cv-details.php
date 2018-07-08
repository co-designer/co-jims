<html>
	<head>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="shortcut icon" href="images/favicon/favicon.ico" >
		<link rel="icon" type="image/gif" href="images/favicon/animated_favicon1.gif" >
		<script src="js/func.js"></script>
		<title>Placement || CV Details</title>
	</head>	
	<body>
		<div id="wrap">
			<header>
				<?php include('header.php'); ?>
			</header>
			<div style="padding-top: 90px;">
				<center><b><i> Enter the following details:</i></b>
					<form method="post" action="resume.php">
						<br>Your Objective: <textarea maxlength="250" rows="2" placeholder="Maximum 250 Characters" width="300px"></textarea><br><br>
						<b>Technical Skills:</b><br>
						<p id="expand">Programming Languages: <input type="text" name="txtlan" required="true"><input type="button" onclick="more();" value=" + "></p>
						<p id="expandscr">Scripting Languages(<i>Optional</i>): <input type="text" name="txtscr"><input type="button" onclick="morescr();" value=" + "></p>
						<p id="expanddb">Databases: (<i>Optional</i>):  <input type="text" name="txtdb"><input type="button" onclick="moredb();" value=" + "></p>
						<p id="expanddb">Any other: (<i>Optional</i>): <input type="text" name="txtother"><input type="button" onclick="moreother();" value=" + "></p><br>
						<b>Qualification:</b><br><br>
						High School's Name:	<input type="text" name="txthc" required="true" width="300px"><br>
						Board:	<input type="text" name="txthcboard" required="true" width="100px"><br>
						Senior Secondary School's Name: <input type="text" name="txtssc" required="true" width="300px"><br>
						Board:	<input type="text" name="txtsscboard" required="true" width="100px"><br><br>
						<b>Certifications (<i>Optional</i>):</b><br><br>
						Certified in: <input type="text" name="txtcertin" width="300px"><br>
						Certified by: <input type="text" name="txtcertby" width="300px"><br>
						Year: <input type="text" name="txtyear"><br>
						<p id="expandcert"><input type="button" onclick="morecert();" value=" + "></p><br>
						<b>Strength :</b>
						<p id="expandstrength"><textarea rows="2" width="300px" name="txtstrength" required="true"></textarea><input type="button" onclick="morestrength();" value=" + "></p><br><br>
						<input type="submit" value="  Submit  ">	<input type="reset" value="  Reset  ">
					</form>
				</center>
			</div>
			<?php
				include("Footer.php");
			?>
		</div>
	</body>
</html>