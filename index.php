<?php
    $nameErr = $emailErr = $genderErr  = $passErr="";
   $name = $email = $gender = $comment =  $pass="";
   
// 	sid	sname	semail	stime	sdate	scomfort	sadult	schildren	smessage
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
 {

  $servername = "localhost";
$username = "root";
$password = "";
$database = "taxed";

// Create connection
$conn = new mysqli($servername, $username, $password,$database,3308);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


if (empty($_POST["sname"])) {
  $nameErr = "Name is required";
} else {
  $sname = test_input($_POST["sname"]);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z-' ]*$/",$sname)) {
    $nameErr = "Only letters and white space allowed";
  }
}

if (empty($_POST["semail"])) 
{
    $emailErr = "Email is required";
  } else 
  {
   $semail = test_input($_POST["semail"]);
    // check if e-mail address is well-formed
    if (!filter_var($semail, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Invalid email format";
    }
  }
  
  if (empty($_POST["scomfort"])) {
    $genderErr = "Comfort is required";
  } else {
    $scomfort = test_input($_POST["scomfort"]);
    $smessage = test_input($_POST["smessage"]);
    $stime=test_input($_POST["stime"]);
    $sdate=test_input($_POST["sdate"]);

//sid	sname	semail	stime	sdate	scomfort	sadult	schildren	smessage
    $sql = "INSERT INTO add_booking(sname,	semail,	stime,sdate,	scomfort	,sadult,	schildren,smessage) values('".$sname."','".$semail."','".$stime."','".$sdate."','".$scomfort."','".$sadult."','".$schildren."','".$smessage."',)";


if ($conn->query($sql) === TRUE) 
{
  echo "insertion created successfully" ;
} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  }

$conn->close();

          
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    
    ?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="booking/css/booking.css" />
    <link rel="stylesheet" href="css/camera.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/script.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <script src="js/jquery.mobilemenu.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/camera.js"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->
    <script src="booking/js/booking.js"></script>
    <script>
      $(document).ready(function () {
        jQuery("#camera_wrap").camera({
          loader: false,
          pagination: false,
          minHeight: "444",
          thumbnails: false,
          height: "28.28125%",
          caption: true,
          navigation: true,
          fx: "mosaic",
        });
        $().UItoTop({ easingType: "easeOutQuart" });
      });
    </script>
    <!--[if lt IE 8]>
      <div style="clear: both; text-align: center; position: relative">
        <a
          href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"
        >
          <img
            src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg"
            border="0"
            height="42"
            width="820"
            alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."
          />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <link rel="stylesheet" media="screen" href="css/ie.css" />
    <![endif]-->
  </head>
  <body class="page1" id="top">
    <div class="main">
    
      <!--==============================header=================================-->
      <header>
        <div class="menu_block">
          <div class="container_12">
            <div class="grid_12">
              <nav class="horizontal-nav full-width horizontalNav-notprocessed">
                <ul class="sf-menu">
                  <li class="current"><a href="index.php">Home</a></li>
                  <li><a href="index-1.php">About</a></li>
                  <li><a href="index-2.php">Cars</a></li>
                  <li><a href="index-3.php">Services</a></li>
                  <li><a href="index-4.php">Contacts</a></li>
                </ul>
              </nav>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="container_12">
          <div class="grid_12">
            <h1>
              <a href="index.html">
                <img src="images/logo.png" alt="Your Happy Family" />
              </a>
            </h1>
          </div>
        </div>
        <div class="clear"></div>
      </header>
      <div class="slider_wrapper">
        <div id="camera_wrap" class="">
          <div data-src="images/slide.jpg"></div>
          <div data-src="images/slide1.jpg"></div>
          <div data-src="images/slide2.jpg"></div>
        </div>
      </div>
      <div class="container_12">
        <div class="grid_4">
          <div class="banner">
            <div class="maxheight">
              <div class="banner_title">
                <img src="images/icon1.png" alt="" />
                <div class="extra_wrapper">
                  Fast&amp;
                  <div class="color1">Safe</div>
                </div>
              </div>
              Dorem ipsum dolor sit amet, consectetur adipiscinger elit. In
              mollis erat mattis neque facilisis, sit ameter ultricies erat
              rutrum. Cras facilisis, nulla vel viver auctor, leo magna sodales
              felis, quis malesuad
              <a href="#" class="fa fa-share-square"></a>
            </div>
          </div>
        </div>
        <div class="grid_4">
          <div class="banner">
            <div class="maxheight">
              <div class="banner_title">
                <img src="images/icon2.png" alt="" />
                <div class="extra_wrapper">
                  Best
                  <div class="color1">Prices</div>
                </div>
              </div>
              Hem ipsum dolor sit amet, consectetur adipiscinger elit. In mollis
              erat mattis neque facilisis, sit ameter ultricies erat rutrum.
              Cras facilisis, nulla vel viver auctor, leo magna sodales felis,
              quis malesuader
              <a href="#" class="fa fa-share-square"></a>
            </div>
          </div>
        </div>
        <div class="grid_4">
          <div class="banner">
            <div class="maxheight">
              <div class="banner_title">
                <img src="images/icon3.png" alt="" />
                <div class="extra_wrapper">
                  Package
                  <div class="color1">Delivery</div>
                </div>
              </div>
              Kurem ipsum dolor sit amet, consectetur adipiscinger elit. In
              mollis erat mattis neque facilisis, sit ameter ultricies erat
              rutrum. Cras facilisis, nulla vel viver auctor, leo magna sodales
              felis, quis malesuki
              <a href="#" class="fa fa-share-square"></a>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="c_phone">
        <div class="container_12">
          <div class="grid_12">
            <div class="fa fa-phone"></div>
            + 1800 559 6580
            <span>ORDER NOW!</span>
          </div>
          <div class="clear"></div>
        </div>
      </div>
      <!--==============================Content=================================-->
      <div class="content">
        <div class="ic">
          More Website Templates @ TemplateMonster.com - April 07, 2014!
        </div>
        <div class="container_12">
          <div class="grid_5">
            <h3>Booking Form</h3>
            <p><span class="error" style="color:red;" >* required field</span></p>
            <form id="bookingForm">
              <div class="fl1">
                <div class="tmInput">
                <label for="exampleInputName1">Name</label>&nbsp <span style="color:red;" class="error">* <?php echo $nameErr;?></span>
                  <input
                    name="sname"
                    placeholder="Name:"
                    type="text"
                
                  />
                </div>
               
              </div>
              <div class="fl1">
                <div class="tmInput">
                <label for="exampleInputEmail3">Email address</label>&nbsp<span style="color:red;" class="error">* <?php echo $emailErr;?></span>
                  <input
                    name="semail"
                    placeholder="Email:"
                    type="text"
                   
                  />
                </div>
               
              </div>
              <div class="clear"></div>
              <strong>Time</strong>
              <span style="color:red;" class="error">*<?php echo $TimeErr;?></span>
              <div class="tmInput">
              
                <input
                  name="stime"
                  placeholder=""
                  type="text"
               
                />
              </div>
              <div class="clear"></div>
              <strong>Date</strong>
              <span style="color:red;" class="error">*<?php echo $DateErr;?></span>
              <label class="tmDatepicker">
                <input
                  type="text"
                  name="sdate"
                  placeholder="20/05/2014"
               
                />
              </label>
              <div class="clear"></div>
              
              <div class="tmRadio">
                <p><em>Comfort</em>&nbsp<span style="color:red;" class="error">*<?php echo $comforErr;?></span></p> 
                <input
                  name="scomfort" <?php if (isset($scomfort) && $scomfort=="cheap") echo "checked";?>
                  value="cheap"
                  type="radio"
                  id="tmRadio0"
                  
                 
                />
                <span>Cheap</span>
                <input
                name="scomfort" <?php if (isset($scomfort) && $scomfort=="Standard") echo "checked";?>
                  value="Standard"
                  type="radio"
                  id="tmRadio1"
                 
                />
                <span>Standard</span>
                <input
                name="scomfort" <?php if (isset($scomfort) && $scomfort=="lux") echo "checked";?>
                  value="Lux"
                  type="radio"
                  id="tmRadio2"
                  
                />
                <span>Lux</span>
              </div>
              <div class="clear"></div>
              <div class="fl1 fl2">
              <!-- <span style="color:red;" class="error">*</span> -->
                <em>Adults</em>
                <select
                  name="sadult"
                  class="tmSelect auto"
                  data-class="tmSelect tmSelect2"
                 
                >
                  <option>0</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </select>
                <div class="clear height1"></div>
              </div>
              <div class="fl1 fl2">
              <!-- <span style="color:red;" class="error">*<</span> -->
                <em>Children</em>
                <select
                  name="schildren"
                  class="tmSelect auto"
                  data-class="tmSelect tmSelect2"
                  
                >
                  <option>0</option>
                  <option>0</option>
                  <option>1</option>
                  <option>2</option>
                </select>
              </div>
              <div class="clear"></div>
              <label for="exampleInputEmail3">Message</label>
              <div class="tmTextarea">
             
                <textarea
                  name="Message"
                  placeholder="smessage"
                 
                ></textarea>
              </div>
              <a href="#" class="btn" data-type="submit">Submit</a>
            </form>
          </div>
          <div class="grid_6 prefix_1">
            <a href="index2.html" class="type"
              ><img src="images/page1_img1.jpg" alt="" /><span
                class="type_caption"
                >Economy</span
              ></a
            >
            <a href="index2.html" class="type"
              ><img src="images/page1_img2.jpg" alt="" /><span
                class="type_caption"
                >Standard</span
              ></a
            >
            <a href="index2.html" class="type"
              ><img src="images/page1_img3.jpg" alt="" /><span
                class="type_caption"
                >Lux</span
              ></a
            >
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <!--==============================footer=================================-->
    <footer>
      <div class="container_12">
        <div class="grid_12">
          <div class="f_phone"><span>Call Us:</span> + 1800 559 6580</div>
          <div class="socials">
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-google-plus"></a>
          </div>
          <div class="copy">
            <div class="st1">
              <div class="brand">Tour<span class="color1">T</span>axi</div>
              &copy; 2014 | <a href="#">Privacy Policy</a>
            </div>
            Website designed by
            <a href="http://www.templatemonster.com/" rel="nofollow"
              >TemplateMonster.com</a
            >
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </footer>
    <script>
      $(function () {
        $("#bookingForm").bookingForm({
          ownerEmail: "#",
        });
      });
      $(function () {
        $("#bookingForm input, #bookingForm textarea").placeholder();
      });
    </script>
  </body>
</html>
