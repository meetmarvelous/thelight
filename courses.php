<?php
require_once './include/connect.php';

$query = mysqli_query($dbcon, "SELECT * FROM site_info");
$site = mysqli_fetch_array($query);

$id = (int)$_GET['id'];
if ($id < 1) {
  header("location: index.php");
}

// $sql = "Select * FROM posts WHERE id = '$id'";
// $result = mysqli_query($dbcon, $sql);

// $invalid = mysqli_num_rows($result);
// if ($invalid == 0) {
// 	header("location: $url_path");
// }

$hsql = "SELECT * FROM projects WHERE id = '$id'";
$res = mysqli_query($dbcon, $hsql);
$row = mysqli_fetch_assoc($res);

$id = $row['id'];
$title = $row['title'];
$abstract = $row['abstract'];
$body = $row['body'];
$department = $row['department'];
$faculty = $row["faculty"];
$time = $row["date"];

$datee = new DateTime($time);
$date = $datee->format('d F, Y');

?>

<!DOCTYPE html>
<html lang="en">

<!-- courses-detail21:19  -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Project Details</title>

  <!-- Css Files -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">
  <link href="css/flaticon.css" rel="stylesheet">
  <link href="css/slick-slider.css" rel="stylesheet">
  <link href="css/prettyphoto.css" rel="stylesheet">
  <link href="build/mediaelementplayer.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <link href="css/color.css" rel="stylesheet">
  <link href="css/color-two.css" rel="stylesheet">
  <link href="css/color-three.css" rel="stylesheet">
  <link href="css/color-four.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="css/datatables/datatables.min.css">
  <link rel="stylesheet" href="css/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <!--// Main Wrapper \\-->
  <div class="wm-main-wrapper">

    <!--// Header \\-->
    <header id="wm-header" class="wm-header-one">

      <!--// TopStrip \\-->
      <div class="wm-topstrip">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="wm-language">
                <ul>
                  <li><a href="#">English</a></li>
                  <li><a href="#">FAQS</a></li>
                </ul>
              </div>
              <ul class="wm-stripinfo">
                <li><i class="wmicon-location"></i>Lead City University, Ibadan, Nigeria.</li>
                <li><i class="wmicon-technology4"></i>+234 705 114 4058</li>
                <li><i class="wmicon-clock2"></i> Mon - Fri: 7:00am - 6:00pm</li>
              </ul>
              <!-- <ul class="wm-stripinfo">
                <li><i class="wmicon-location"></i> 2925 Swick Hill Street, Charlotte, NC 28202</li>
                <li><i class="wmicon-technology4"></i> +1 984-700-7129</li>
                <li><i class="wmicon-clock2"></i> Mon - fri: 7:00am - 6:00pm</li>
              </ul> -->
              <ul class="wm-adminuser-section">
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalLogin">login</a>
                </li>
                <li>
                  <a href="#">Contact</a>
                </li>
                <li>
                  <a href="#" class="wm-search-btn" data-toggle="modal" data-target="#ModalSearch"><i
                      class="wmicon-search"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!--// TopStrip \\-->

      <!--// MainHeader \\-->
      <div class="wm-main-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3"><a href="" class="wm-logo"><img src="images/thelight.png" alt=""></a>
            </div>
            <div class="col-md-9">
              <!--// Navigation \\-->
              <nav class="navbar navbar-default">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse-1" aria-expanded="true">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a>
                    </li>
                    <li><a href="#">About</a>
                    </li>
                    <li><a href="category.php">Category</a>
                    </li>
                    <li><a href="#">Blog</a>
                    </li>
                    <li><a href="">Reviews</a>
                    </li>
                    <li><a href="#">Contact</a>
                    </li>
                  </ul>
                </div>
              </nav>
              <!--// Navigation \\-->
              <a href="#" class="wm-header-btn">get started</a>
            </div>
          </div>
        </div>
      </div>
      <!--// MainHeader \\-->

    </header>
    <!--// Header \\-->

    <!--// Mini Header \\-->
    <div class="wm-mini-header">
      <span class="wm-blue-transparent"></span>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="wm-mini-title">
              <h1><?php echo $title; ?></h1>
            </div>
            <div class="wm-breadcrumb">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#"><?php echo $faculty; ?></a></li>
                <li><?php echo $title; ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--// Mini Header \\-->

    <!--// Main Content \\-->
    <div class="wm-main-content">

      <!--// Main Section \\-->
      <div class="wm-main-section">
        <div class="container">
          <div class="row">
            <aside class="col-md-3">
              <div class="widget widget_categories">
                <div class="wm-widget-title">
                  <h2>Faculty</h2>
                </div>
                <ul>
                  <li><a href="#">Art and Humanity</a></li>
                  <li><a href="#">Pure Science</a></li>
                  <li><a href="#">Medical Science</a></li>
                  <li><a href="#">Social Science </a></li>
                  <li><a href="#">Management Science</a></li>
                  <li><a href="#">Education</a></li>

                </ul>
              </div>
            </aside>
            <div class="col-md-9">

              <div class="wm-our-course-detail">
                <div class="wm-title-full">
                  <h2>Project Topic:</h2>
                  <h3><?php echo $title; ?></h3>
                </div>
                <div><?php echo $abstract; ?></div>

                <div class="wm-certification-listing">
                  <div class="wm-title-full">
                    <h2>Project Body:</h2>
                  </div>

                  <div>
                  <?php echo $body; ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!--// Main Section \\-->

      <!--// Main Section \\-->
    </div>
    <!--// Main Content \\-->

    <!--// Footer \\-->
    <footer id="wm-footer" class="wm-footer-two">

      <!--// FooterWidgets \\-->
      <div class="wm-footer-widget">
        <div class="container">
          <div class="row">

            <aside class="widget widget_contact_info col-md-4">
              <a href="" class="wm-footer-logo"><img src="images/light.png" alt=""></a>
              <ul>
                <li><i class="wmicon-pin"></i>Lead City University, Ibadan, Nigeria.</li>
                <li><i class="wmicon-phone"></i> +234 (0) 705-114-4058 <br> +234 705 114 4058</li>
                <li><i class="wmicon-letter"></i> <a href="mailto:name@email.com">info@university.com</a> <a
                    href="mailto:name@email.com">support@thelighteducate.com</a></li>
              </ul>
              <div class="wm-footer-icons">
                <a href="#" class="wmicon-social5"></a>
                <a href="#" class="wmicon-social4"></a>
                <a href="#" class="wmicon-social3"></a>
                <a href="#" class="wmicon-vimeo"></a>
              </div>
            </aside>

            <aside class="widget widget_archive col-md-4">
              <div class="wm-footer-widget-title">
                <h2>Quick Links</h2>
              </div>
              <ul>
                <li><a href="#">Our Events</a></li>
                <li><a href="#">Our Courses</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">404 Page</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">All Instructors</a></li>
              </ul>
            </aside>

            <aside class="col-md-4 widget wm_working_hours">
              <div class="wm-footer-widget-title">
                <h2>Working Hours</h2>
              </div>
              <ul>
                <li>Monday <span>8am - 6pm</span></li>
                <li>Tuesday <span>8am - 6pm</span></li>
                <li>Wednesday <span>8am - 6pm</span></li>
                <li>Thursday <span>8am - 6pm</span></li>
                <li>Friday <span>8am - 6pm</span></li>
                <li>Saturday <span>Closed</span></li>
                <li>Sunday <span>Closed</span></li>
              </ul>
            </aside>
          </div>
        </div>
      </div>
      <!--// FooterWidgets \\-->

      <div class="clearfix"></div>
      <!--// FooterCopyRight \\-->
      <div class="wm-copyright-two">
        <div class="container">
          <div class="row">
            <div class="col-md-6"> <span><i class="wmicon-nature"></i> Ibadan, Nigeria 2°F / -17°C</span> </div>
            <div class="col-md-6">
              <p><a target="_blank" href="https://bio.link/meetmarvelous">Marvelbyte</a></p>
            </div>
          </div>
        </div>
      </div>
      <!--// FooterCopyRight \\-->

    </footer>
    <!--// Footer \\-->

    <div class="clearfix"></div>
  </div>
  <!--// Main Wrapper \\-->

  <!-- ModalLogin Box -->
  <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">

          <div class="wm-modallogin-form wm-login-popup">
            <span class="wm-color">Login to Your Account</span>
            <form>
              <ul>
                <li> <input type="text" value="Your Username"
                    onblur="if(this.value == '') { this.value ='Your Username'; }"
                    onfocus="if(this.value =='Your Username') { this.value = ''; }"> </li>
                <li> <input type="password" value="password" onblur="if(this.value == '') { this.value ='password'; }"
                    onfocus="if(this.value =='password') { this.value = ''; }"> </li>
                <li> <a href="#" class="wm-forgot-btn">Forgot Password?</a> </li>
                <li> <input type="submit" value="Sign In"> </li>
              </ul>
            </form>
            <span class="wm-color">or try our socials</span>
            <ul class="wm-login-social-media">
              <li><a href="#"><i class="wmicon-social5"></i> Facebook</a></li>
              <li class="wm-twitter-color"><a href="#"><i class="wmicon-social4"></i> twitter</a></li>
              <li class="wm-googleplus-color"><a href="#"><i class="fa fa-google-plus-square"></i> Google+</a></li>
            </ul>
            <p>Not a member yet? <a href="#">Sign-up Now!</a></p>
          </div>
          <div class="wm-modallogin-form wm-register-popup">
            <span class="wm-color">create Your Account today</span>
            <form>
              <ul>
                <li> <input type="text" value="Your Username"
                    onblur="if(this.value == '') { this.value ='Your Username'; }"
                    onfocus="if(this.value =='Your Username') { this.value = ''; }"> </li>
                <li> <input type="text" value="Your E-mail" onblur="if(this.value == '') { this.value ='Your E-mail'; }"
                    onfocus="if(this.value =='Your E-mail') { this.value = ''; }"> </li>
                <li> <input type="password" value="password" onblur="if(this.value == '') { this.value ='password'; }"
                    onfocus="if(this.value =='password') { this.value = ''; }"> </li>
                <li> <input type="text" value="Confirm Password"
                    onblur="if(this.value == '') { this.value ='Confirm Password'; }"
                    onfocus="if(this.value =='Confirm Password') { this.value = ''; }"> </li>
                <li> <input type="submit" value="Create Account"> </li>
              </ul>
            </form>
            <span class="wm-color">or signup with your socials:</span>
            <ul class="wm-login-social-media">
              <li><a href="#"><i class="wmicon-social5"></i> Facebook</a></li>
              <li class="wm-twitter-color"><a href="#"><i class="wmicon-social4"></i> twitter</a></li>
              <li class="wm-googleplus-color"><a href="#"><i class="fa fa-google-plus-square"></i> Google+</a></li>
            </ul>
            <p>Already a member? <a href="#">Sign-in Here!</a></p>
          </div>

        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- ModalLogin Box -->

  <!-- ModalSearch Box -->
  <div class="modal fade" id="ModalSearch" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">

          <div class="wm-modallogin-form">
            <span class="wm-color">Search Your KeyWord</span>
            <form>
              <ul>
                <li> <input type="text" value="Keywords..." onblur="if(this.value == '') { this.value ='Keywords...'; }"
                    onfocus="if(this.value =='Keywords...') { this.value = ''; }"> </li>
                <li> <input type="submit" value="Search"> </li>
              </ul>
            </form>
          </div>

        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- ModalSearch Box -->

  <!-- jQuery (necessary for JavaScript plugins) -->
  <script type="text/javascript" src="script/jquery.js"></script>
  <script type="text/javascript" src="script/modernizr.js"></script>
  <script type="text/javascript" src="script/bootstrap.min.js"></script>
  <script type="text/javascript" src="script/jquery.prettyphoto.js"></script>
  <script type="text/javascript" src="script/jquery.countdown.min.js"></script>
  <script type="text/javascript" src="script/fitvideo.js"></script>
  <script type="text/javascript" src="script/skills.js"></script>
  <script type="text/javascript" src="script/slick.slider.min.js"></script>
  <script type="text/javascript" src="script/waypoints-min.js"></script>
  <script type="text/javascript" src="build/mediaelement-and-player.min.js"></script>
  <script type="text/javascript" src="script/isotope.min.js"></script>
  <script type="text/javascript" src="script/jquery.nicescroll.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
  <script type="text/javascript" src="script/functions.js"></script>

  <script src="css/datatables/datatables.min.js"></script>
  <script src="css/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
</body>

<!-- courses-detail21:28  -->

</html>