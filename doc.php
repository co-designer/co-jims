<?php include('database.php');
    $eno=$_SESSION['username'];
    $obj=$_POST['obj']; $plan=$_POST['plan'];
    $slan=$_POST['slan'];   $dlan=$_POST['dlan'];
    $olt1=$_POST['olt1'];   $oli1=$_POST['oli1'];
    $olt2=$_POST['olt2'];   $oli2=$_POST['oli2'];
    $olt3=$_POST['olt3'];   $oli3=$_POST['oli3'];
    $txthc=$_POST['txthc']; $txthcboard=$_POST['txthcboard'];$stream=$_POST['stream'];
    $txtssc=$_POST['txtssc'];   $txtsscboard=$_POST['txtsscboard'];

    $ci1=$_POST['ci1']; $cb1=$_POST['cb1'];
    $cy1=$_POST['cy1']; $ci2=$_POST['ci2'];
    $cb2=$_POST['cb2']; $cy2=$_POST['cy2'];
    $ci3=$_POST['ci3']; $cb3=$_POST['cb3'];
    $cy3=$_POST['cy3']; $ci4=$_POST['ci4'];
    $cb4=$_POST['cb4']; $cy4=$_POST['cy4'];
    $txtstrength=$_POST['txtstrength'];$language=$_POST['languages'];
    $con=mysql_query("Select * from login where eno='$eno'");
    $con1=mysql_query("Select * from personal_details where eno='$eno'");
    $con2=mysql_query("Select * from academic_details where eno='$eno'");
    $l=mysql_fetch_array($con);
    $ad=mysql_fetch_array($con2);
    $pd=mysql_fetch_array($con1);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jQuery Word Export Plugin Demo</title>

</head>

<body>

<h1 style="margin-top:150px;">jQuery Word Export Plugin Demo</h1>
<div id="page-content">
<h1>Hello, world!</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula bibendum lacinia. Pellentesque placerat interdum nisl non semper. Integer ornare, nunc non varius mattis, nulla neque venenatis nibh, vitae cursus risus quam ut nulla. Aliquam erat volutpat. Aliquam erat volutpat. Etiam eu auctor risus, condimentum sodales nisi. Curabitur aliquam, lorem accumsan aliquam mattis, sem ipsum vulputate quam, at interdum nisl turpis pharetra odio. Vivamus diam eros, mattis eu dui nec, blandit pulvinar felis.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula bibendum lacinia. Pellentesque placerat interdum nisl non semper. Integer ornare, nunc non varius mattis, nulla neque venenatis nibh, vitae cursus risus quam ut nulla. Aliquam erat volutpat. Aliquam erat volutpat. Etiam eu auctor risus, condimentum sodales nisi. Curabitur aliquam, lorem accumsan aliquam mattis, sem ipsum vulputate quam, at interdum nisl turpis pharetra odio. Vivamus diam eros, mattis eu dui nec, blandit pulvinar felis.</p>
<table width="700px" border="0" align="">
                <tr>
                    <td valign="bottom">
                        <strong style="font-size:24px;text-transform:uppercase;"><?php echo $pd['firstname'].' '.$pd['lastname'];?></strong><br>
                        <strong><?php echo $pd['city'].','.$pd['state']; ?></strong><br>
                        <b>Contact:</b> +91 <?php echo $pd['mobileno'];?>, <b>Email:</b> <?php echo $l['email'];?>
                    </td>
                    <td align="right">
                        
                    </td>
                </tr>
            </table><br>
            <table width="700px" border="0" align="">
                <tr>
                    <td valign="bottom">
                        <p><strong><u>CAREER OBJECTIVE</u></strong></p>
                    </td>
                </tr>
            </table>
            <table width="600px" style="padding-left:40px;" border="0" align="">
                <tr>
                    <td>
                        <p><?php echo $obj; ?></p>
                    </td>
                </tr>
            </table>
            <br>
            <table width="700px" border="0" align="">
                <tr>
                    <td>
                        <p><strong><u>TECHNICAL SKILLS</u></strong></p>
                    </td>
                </tr>
                <tr>
                    <table width="600px" style="padding-left:40px;" border="0" align="">
                        <tr>
                            <td width="346">
                                <p><strong>PROGRAMMING LANGUAGES </strong></p>
                            </td>
                            <td width="19">
                                <p>:</p>
                            </td>
                            <td width="414">
                                <p><?php echo $plan; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td width="246">
                                <p><strong>SCRIPTING LANGUAGES </strong></p>
                            </td>
                            <td width="19">
                                <p>:</p>
                            </td>
                            <td width="414">
                                <p><?php echo $slan; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td width="246">
                                <p><strong>DATABASE </strong></p>
                            </td>
                            <td width="19">
                                <p>:</p>
                            </td>
                            <td width="414">
                                <p><?php echo $dlan; ?></p>
                            </td>
                        </tr>
                    <?php 
                        if($olt1){

                    ?>
                        <tr>
                            <td width="246">
                                <p><strong><?php echo $olt1;?> </strong></p>
                            </td>
                            <td width="19">
                                <p>:</p>
                            </td>
                            <td width="414">
                                <p><?php echo $oli1;?></p>
                            </td>
                        </tr>
                    <?php 
                        }if($olt2){

                    ?>
                        <tr>
                            <td width="246">
                                <p><strong><?php echo $olt2;?> </strong></p>
                            </td>
                            <td width="19">
                                <p>:</p>
                            </td>
                            <td width="414">
                                <p><?php echo $oli2;?></p>
                            </td>
                        </tr>
                    
                    <?php 
                        }if($olt3){

                    ?>
                        <tr>
                            <td width="246">
                                <p><strong><?php echo $olt3;?> </strong></p>
                            </td>
                            <td width="19">
                                <p>:</p>
                            </td>
                            <td width="414">
                                <p><?php echo $oli3;?></p>
                            </td>
                        </tr>
                    <?php 
                        } 
                    ?>
                    </table>
                </tr>
            </table><br>
            <table width="700px" border="0" align="">
                <tr>
                    <td>
                        <p><strong><u>QUALIFICATION</u></strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong><u>BACHELORS:</u></strong></p>
                    </td>
                </tr>
            </table>
            <table width="600px" style="padding-left:40px;" border="0" align="">
                <tr>
                    <?php if($ad['course']=='BCA'){?>
                    <td>
                        <p><strong>Bachelor of Computer Application &ndash; July, <?php echo $ad['batch']; ?> - April, <?php echo $ad['batch']+3; ?></strong></p>
                    </td>
                    <?php }elseif($ad['course']=='BBA'){?>
                    <td>
                        <p><strong>Bachelor of Business Administration &ndash; July, <?php echo $ad['batch']; ?> - April, <?php echo $ad['batch']+3; ?></strong></p>
                    </td>
                    <?php }else{?>
                    <td>
                        <p><strong>Bachelor of Computer Application &ndash; July, <?php echo $ad['batch']; ?> - April, <?php echo $ad['batch']+3; ?></strong></p>
                    </td>
                    <?php }?>
                </tr>
                <tr>
                    <td>
                        <p><strong>Jagannath International Management School (JIMS University) Affiliated to GGSIPU</strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>Percentage</strong><strong>: <?php $percen=($ad['gradperc']+$ad['ii']+$ad['iii']+$ad['iv'])/4;echo $percen.'%';?> </strong></p>
                    </td>
                </tr>
            </table>
            <table width="700px" border="0" align="">
                <tr>
                    <td>
                        <p><strong><u>HSC:</u></strong><strong>(<?php echo $stream; ?> Stream)</strong><strong>: </strong></p>
                    </td>
                </tr>
            </table>
            <table width="600px" style="padding-left:40px;" border="0" align="">
                <tr>
                    <td>
                        <p><strong><?php echo $txthc; ?> &ndash; March <?php echo $ad['xiiyop']; ?> (<?php echo $txthcboard; ?>)</strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>Percentage</strong><strong>: <?php echo $ad['xiiperc']; ?> </strong></p>
                    </td>
                </tr>
            </table>
            <table width="700px" border="0" align="">
                <tr>
                    <td>
                        <p><strong><u>SSC:</u> </strong></p>
                    </td>
                </tr>
            </table>
            <table width="600px" style="padding-left:40px;" border="0" align="">
                <tr>
                    <td>
                        <p><strong><?php echo $txtssc; ?> &ndash; March <?php echo $ad['xyop']; ?> (<?php echo $txtsscboard; ?>)</strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>Percentage</strong><strong>: <?php echo $ad['xperc']; ?> </strong></p>
                    </td>
                </tr>
            </table><br>
            <?php 
                if($ci1 || $ci2 || $ci3 || $ci4){
            ?>
            <table width="700px"  border="0" align="">
                <tr>
                    <td>
                        <p><strong><u>CERTIFICATIONS</u></strong></p>
                    </td>
                </tr>
            </table>
            <?php 
                if($ci1){
            ?>
            <table width="600px" style="padding-left:40px;" border="0" align="">
                <tr>
                    <td>
                        <p><strong><?php echo $ci1; ?> (<?php echo $cy1; ?>)</strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $cb1; ?>
                    </td>
                </tr>
            </table><br>
            <?php } 
                if($ci2){
            ?>
            <table width="600px" style="padding-left:40px;" border="0" align="">
                <tr>
                    <td>
                        <p><strong><?php echo $ci2; ?> (<?php echo $cy2; ?>)</strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $cb2; ?>
                    </td>
                </tr>
            </table><br>
            <?php } 
                if($ci3){
            ?>
            <table width="600px" style="padding-left:40px;" border="0" align="">
                <tr>
                    <td>
                        <p><strong><?php echo $ci3; ?> (<?php echo $cy3; ?>)</strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $cb3; ?>
                    </td>
                </tr>
            </table><br>
            <?php } 
                if($ci4){
            ?>
            <table width="600px" style="padding-left:40px;" border="0" align="">
                <tr>
                    <td>
                        <p><strong><?php echo $ci4; ?> (<?php echo $cy4; ?>)</strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $cb4; ?>
                    </td>
                </tr>
            </table>
            <?php }
                }
             ?>
            <table width="700px" border="0" align="">
                <tr>
                    <td>
                        <p><strong><u>INTERNSHIP</u></strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>On project entitled &ldquo;<strong>eZMining</strong>&rdquo; at &ldquo;<strong>Capital Novus Pvt. Ltd.</strong>&rdquo; from 5<sup>th</sup> Jan 2015 to 14<sup>th</sup> April 2015</li>
                        </ul>
                    </td>
                </tr>
            </table><br>
            <table width="700px" border="0" align="">
                <tr>
                    <td>
                        <p><strong><u>STRENGTH</u></strong></p>
                    </td>
                </tr>
            </table>
            <table width="600px" style="padding-left:40px;" border="0" align="">
                <tr>
                    <td>
                        <?php echo $txtstrength; ?>
                    </td>
                </tr>
            </table><br>
            <table width="700px" border="0" align="">
                <tr>
                    <td>
                        <p><strong><u>PERSONAL INFORMATION</u></strong></p>
                    </td>
                </tr>
            </table>
            <table width="600px" style="padding-left:40px;" border="0" align="">
                <tr>
                    <td>
                        <table width="950" align="">
                            <tr>
                                <td width="186">
                                    <p>Father&rsquo;s name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                </td>
                                <td width="20">
                                    <p>:</p>
                                </td>
                                <td width="484">
                                    <p><?php echo $pd['fathername']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="186">
                                    <p>Date of Birth&nbsp;</p>
                                </td>
                                <td width="20">
                                    <p>:</p>
                                </td>
                                <td width="484">
                                    <p><?php echo $pd['dob']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="186">
                                    <p>Marital Status</p>
                                </td>
                                <td width="20">
                                    <p>:</p>
                                </td>
                                <td width="484">
                                    <p><?php echo $pd['marital']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="186">
                                    <p>Languages Known&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                </td>
                                <td width="20">
                                    <p>:</p>
                                </td>
                                <td width="484">
                                    <p><?php echo $language; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="186">
                                    <p>Permanent Address</p>
                                </td>
                                <td width="20">
                                    <p>:</p>
                                </td>
                                <td width="484">
                                    <p><?php echo $pd['address']; ?></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table><br>
            <table width="700px" border="0" align="">
                <tr>
                    <td>
                        <p>I hereby declare that above mentioned information is correct and best to my knowledge.</p>
                    </td>
                </tr>
            </table><br><br>
            <table width="700px" border="0" align="">
                <tr>
                    <td>
                        <p><strong>PLACE: <?php echo $pd['city']; ?></strong></p>
                    </td>
                    <td align="right">
                        <p><strong><?php echo $pd['firstname'].' '.$pd['lastname']; ?></strong></p>
                    </td>
                </tr>
            </table><br>
</div>
  <a class="word-export" href="javascript:void(0)"> Export as .doc </a> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
    <script src="doc/FileSaver.js"></script> 
    <script src="doc/jquery.wordexport.js"></script> 
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $("a.word-export").click(function(event) {
            $("#page-content").wordExport();
        });
    });
   </script>
</body>
</html>
