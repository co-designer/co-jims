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
			body { background-color: #fff; color: #000; padding: 0; margin: 0; }
			/*.container { width: 900px; margin: auto; padding-top: 1em; }*/
			.ism-slider { margin-left: auto; margin-right: auto; }
		</style>
		<link rel="stylesheet" href="css/my-slider.css"/>
		<script src="js/ism-2.2.min.js"></script>
	</head>
	<body>
		<div id="wrap">
			<header>
				<?php include('header.php'); ?>
			</header>
			<div id="">
				<?php include('social-icons.php'); ?>
				<div align="center" style="width:100%;height:100%;background:#f2f2f2;">
				<div align="center" style="padding-top:82px;background:white;width:80%;height:100%;box-shadow:3px 3px 5px 6px #ccc; ">
					
						<div class="ism-slider" data-transition_type="zoom" data-play_type="loop" data-interval="3000" id="my-slider">
  							<ol>
    							<li>
      								<img src="image/slides/_u/1479281361838_647611.jpg">
      								<div class="ism-caption ism-caption-0">Certified as A+ Institute by the State Fee Regulatory Committee, Govt of NCT of Delhi<br></div>
    							</li>
    							<li>
      								<img src="image/slides/_u/1479281358705_264764.jpg">
      								<div class="ism-caption ism-caption-0">Journals and Publications<br></div>
    							</li>
    							<li>
      								<img src="image/slides/_u/1479281353916_401189.jpg">
      								<div class="ism-caption ism-caption-0">JIMS Student Exchange Program</div>
    							</li>
    							<li>
      								<img src="image/slides/_u/1479281352463_815754.jpg">
      								<div class="ism-caption ism-caption-0">Sports and Recreation</div>
    							</li>
    							<li>
      								<img src="image/slides/_u/1479281351487_826887.jpg">
      								<div class="ism-caption ism-caption-0">Accredited by NAAC, University Grants Commission, Govt. of India</div>
    							</li>
  							</ol>
						</div>
					
					<div style="width:90%;height:100%;color:Brown;text-align: left;font-size:20px;" ><b>Welcome to JIMS, Vasant Kunj</b></div>
					<div style="width:90%;height:100%; text-align:left;">
						<p>
							Jagannath International Management School (JIMS), Vasant Kunj was established in 2003 as Jagannath Institute of Communication and Design	(JICD). Consequent upon certain structural changes because of the changes in the regulatory environment, the Institute was renamed as JIMS 	in 2006. Besides, in this year the Institute added two bachelor�s degree programs in Business Administration and Computer Applications to the already running Bachelor's Degree Program in Journalism.
						</p>
						<p>
							The Institute has since then grown manifold, with creditable achievements in University Examinations results and Placements. As a result of these achievements, the institute has been ranked among the top most institutes of GGS IP University by the Government of NCT of Delhi and other Third Party Agencies. The Institute also enjoys the distinction of being the first Undergraduate College in the NCT of Delhi to have been accredited by NAAC, an autonomous body under the University Grants Commission, Govt. of India. The institute has recently been approved by the University Grants Commission under section 2(f).<br><br><br><br>
						</p>
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