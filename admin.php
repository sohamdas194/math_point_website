<?php
include("config.php");
include("process_input.php");
if (isset($_POST['submit'])) 
{
	$uname=processInput($_POST['username']);
	$pwd=processInput($_POST['pwd']);
	$result=pg_query($conn,"SELECT * FROM admin WHERE uname='$uname' and pwd='$pwd'");
	if($result){
	    $_SESSION['admin']=$uname;
        $row = pg_fetch_array($result);
        $_SESSION['adminID']=$row["id"];
	    header('location:admin_portal.php');
	}
	else
	{
	    echo "<script>alert('Wrong Username Or Password !'); location.href='admin.php';</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Math Point Coaching Center</title>
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/owl.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
    <div class="page-wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <div class="header-top">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Logo-->
                        <div class="col-md-3 col-sm-3 col-xs-12 logo"><a href="index.php"><img src="images/logo.png" alt="Math Point" title="Math Point"></a></div>

                        <div class="col-lg-5 col-md-6 col-sm-10 header-top-infos pull-right">
                            <ul class="clearfix">
                                <li>
                                    <div class="clearfix">
                                        <img src="images/icons/header-phone.png" alt="">
                                        <p><b>Call Us Now</b> <br>9046132561</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="clearfix">
                                        <img src="images/icons/header-timer.png" alt="">
                                        <p><b>Email us</b> <br>mathpointquery@gmail.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!--Header Lower-->
            <div class="header-lower">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Main Menu-->
                        <nav class="col-md-11 col-sm-12 col-xs-12 main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="download.php">Download</a></li>
                                    <li><a href="feedback.php">Feedback</a></li>
                                    <li><a href="notice.php">Notice</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" href="#">Teachers</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="atanu.php">Mr. Atanu Ainch</a></li>
                                            <li><a href="madhab.php">Mr. Madhab Bandyopadhyay</a></li>
                                            <li><a href="manas.php">Mr. Manas Banerjee</a></li>
                                            <li><a href="raju.php">Mr. Raju Mahato</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="course.php">Course</a></li>
                                    <li><a href="register.php">Register</a></li>
                                    <li><a href="student.php">Student</a></li>
                                    <li class="current"><a href="admin.php">Admin</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!--Main Menu End-->
                    </div>
                </div>
            </div>
        </header>
        <!--End Main Header -->

        <!-- Page Banner -->
        <div class="container-fluid" style="margin-top:-35px;">
            <div class="row">
                <img src="images/admin.jpg" width="100%" class="img-responsive">
            </div>
        </div>

        <!--Tabs Section-->
        <section class="tabs-section">
            <div class="auto-container">
                <div class="row">
                    <div class="tabs-box clearfix">
                        <!--Content Side-->
                        <div class="col-md-12 tabs-content clearfix">
                            <!--Tab / Active tab-->
                            <div class="tab active-tab" id="tab-one">
                                <div class="tab-title">
                                    <h2>Admin Login</h2>
                                </div>

                                <div class="cust-form">
                                    <form name="frm" action="" method="post" enctype="multipart/form-data">
                                        <label for="user_name">Username</label>
                                        <input type="text" name="username" placeholder="Enter Username">
                                        
                                        <label for="password">Password</label>
                                        <input type="password" name="pwd" placeholder="Enter Password">

                                        <input type="submit" name="submit" value="Login">
                                   </form>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br>
        
        <!--Main Footer-->
        <footer class="main-footer">
            <!--Footer Upper-->
            <div class="footer-upper">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Footer Widget-->
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="footer-widget contact-widget">
                                <h3>Contact Us</h3>

                                <ul class="info">
                                    <li><strong>Address :</strong>2 NO. SARDAPALLY (NEAR RASHIKPUR CHILDREN'S PARK), BURDWAN, PIN-713101</li>
                                    <li><strong>Email :</strong>atanu.boi@gmail.com</li>
                                    <li><strong>Phone :</strong>9046132561</li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Widget-->
                        <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-1">
                            <div class="footer-widget services-widget">
                                <h3>Our Services</h3>
                                <ul class="links">
                                    <li><a href="index.php"><i class="fa fa-check-circle"></i>Home</a></li>
                                    <li><a href="about.php"><i class="fa fa-check-circle"></i>About us</a></li>
                                    <li><a href="contact.php"><i class="fa fa-check-circle"></i>Contact us</a></li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Widget-->
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="footer-widget support-widget">
                                <h3>Quick link</h3>
                                <div class="social-links">
                                    <a href="#" class="fa fa-facebook-f"></a>
                                    <a href="#" class="fa fa-twitter"></a>
                                    <a href="#" class="fa fa-google"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Footer Bottom-->
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright" style="text-align:center">Copryright 2022 | All rights reserved</div>
                            <div class="col-md-12 footer-grid-in">
                                <p class="footer-class text-center">Designed by: Souvik Chandra || Rahul Jash || Subhajit Singha || Soham Das </p>
                                <p class="footer-class text-center">Dept. Of Bachelor of Computer Application | 6th Sem | 2022 | Cyber Research and Training Institute</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top"></div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bxslider.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/masterslider.min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/script.js"></script>

</body>
</html>
