<?php
session_start();
require 'PHPMailerAutoload.php';
//$mail = new PHPMailer;
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//use PHPMailer\PHPMailer\SMTP;

//require 'user/ASUS/PHPMailer/src/Exception.php';
//require 'user/ASUS/PHPMailer/src/PHPMailer.php';
//require 'user/ASUS/PHPMailer/src/SMTP.php';
$mysqli = new mysqli('localhost', 'root', '', 'donor_db');





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration</title>

  <link rel="stylesheet" href="reg.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <!-- Font !-->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&family=Eczar&family=Kanit:wght@400;500&family=Lobster&family=Lobster+Two:ital,wght@1,700&family=Proza+Libre:ital,wght@0,400;1,800&family=Tiro+Kannada:ital@1&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500&family=Lobster&family=Lobster+Two:ital,wght@1,700&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&family=Eczar&family=Kanit:wght@400;500&family=Lobster&family=Lobster+Two:ital,wght@1,700&family=Proza+Libre:ital,wght@0,400;1,800&display=swap" rel="stylesheet">



</head>

<body>

  <?php
  $fnameErr = $lnameErr = $emailErr  = $passwordErr = $addressErr = $numberErr = $none = $bar = $vkey =  "";
  $fname =  $lname  = $email = $password = $address = $number = $selection = $any = $subject = "";
  $bol = true;
  $subject = '';
  $errors = array();

  $emp = '';


  //firstname
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
      $fnameErr = "Name is required";
      $emp = false;
    } else {

      $fname = test_input($_POST["fname"]);

      //check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
        $fnameErr = "Only letters and white space allowed";
        $bol = false;
        $none = "fname";
      }
    }
  }
  //lastname
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lname"])) {
      $lnameErr = "Name is required";
      $emp = false;
    } else {



      $lname = test_input($_POST["lname"]);

      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
        $lnameErr = "Only letters and white space allowed";
        $bol = false;
        $none = "lname";
      }
    }
  }


  //email
  if (empty($_POST["email"])) {
    //$emailErr = "Email is required";
    $emp = false;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = " &nbsp &nbsp Invalid email format";
      $bol = false;
      $none = "email";
    }

    //email 
    $email_check = "SELECT * FROM user3 WHERE email = '$email'";
    $res = mysqli_query($mysqli, $email_check);
    if (mysqli_num_rows($res) > 0) {
      $emailErr = " &nbsp &nbsp Email that you have entered already exist!";
      $bol = false;
    }
  }
  //pass
  if (empty($_POST["password"])) {
    //$passwordErr = "&nbsp &nbsp &nbsp Enter Password";
    $emp = false;
  } else {
    $password = test_input($_POST["password"]);
  }
  //address

  if (empty($_POST["address"])) {
    //$addressErr = "&nbsp &nbsp &nbsp &nbsp Enter your Address";
    $emp = false;
  } else {

    $address = test_input($_POST["address"]);
  }
  //mobilenumber


  if (empty($_POST["number"])) {
    //$numberErr = "&nbsp &nbsp &nbsp &nbsp Mobile number is required";
    $emp = false;
  } else {
    $number = test_input($_POST["number"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/", $number)) {
      $numberErr = " &nbsp &nbsp &nbsp &nbsp Only numbers are allowed";
      $bol = false;
      $none = "number";
    }
    if (strlen($number) != 11) {
      $numberErr = " &nbsp &nbsp &nbsp &nbsp Invalid Mobile Number";
      $bol = false;
      $none = "number2";
    }
  }


  $selection = filter_input(INPUT_POST, 'selection', FILTER_SANITIZE_STRING);
  $any = filter_input(INPUT_POST, 'any', FILTER_SANITIZE_STRING);
  $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);

  //$vkey = md5(time() . $fname);
  $vkey=mysqli_real_escape_string($mysqli,md5(time().$fname));
  $_SESSION['vkey'] = $vkey;
  $verified = 0;
  $error = NULL;

  if (isset($_POST["submit"]) && isset($bol) && $bol == true) {
;
    $insert = null;

    $insert = $mysqli->query("INSERT INTO user3(Firstname,LastName,Email,Password,address,Number,Bloodgroup,Disease,Commnet,vkey,verified)
VALUES ('$fname ',' $lname ','$email ',' $password ','$address ',' $number ','$selection ',' $any','$subject ',' $vkey ',' $verified')");

    if ($insert) {
      $mail = new PHPMailer;
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = '190204084@aust.edu';                 // SMTP username
      $mail->Password = '25thBAM27765##';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      $mail->setFrom('190204084@aust.edu', 'Mailer');
      $mail->addAddress($email, ' User');     // Add a recipient

      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Email Verification';
      $mail->Body    = "<a href='http://localhost:443/project/a_verfied.php'>Click Here</a>";
      $mail->AltBody = 'Verify your email ';
      //$mail->send();
      if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
        echo 'Message has been sent';
      }
      header('location:a_user_login.php');
    } else {
      $bar = "Failed";
    }
  }




  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  ?>



  <nav class="navbar navbar-expand-lg bg-danger navbar-dark ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="pic/blood0.png" alt="Avatar Logo" style="width: 35px" />
      </a>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active navbar-brand " href="http://www.localhost:443/project/a_homepage.php"> <span class="font">Donor</span> </a>
        </li>
      </ul>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active navbar-brand" href="http://www.localhost:443/project/a_homepage.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active navbar-brand" href="#carouselExampleCaptions">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active navbar-brand" href="http://www.localhost:443/project/help.php" data-toggle="tooltip" data-placement="bottom" title="If you have any complain or suggestion for us please click here & send us your complain / suggestion">Help & support</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>


  <div class="container   card  ">
    <form action="" method="POST">

      <div class="row card-body">
        <h2 class="text-center">Registration</h2>

      </div>

      <div class="row card-body ">
        <div class="col-4 col-lg-2 col-md-4 col-sm-4 pd-2">
          <label for="fname">First Name:</label>

        </div>
        <div class="col-6 col-lg-3 col-md-6 col-sm-6 pb-2">
          <input type="text" id="fname" name="fname" placeholder="Your name.." class="name-div" required>
          <span style="color: #FF0000"> <?php echo $fnameErr; ?></span>
        </div>

        <div class="col-4 col-lg-2 col-md-24 col-sm-4 pb-2">
          <label for="lname">Last Name:</label>
        </div>
        <div class="col-6 col-lg-3 col-md-6 col-sm-6 pb-2">
          <input type="text" id="lname" name="lname" placeholder="Your last name.." class="name-div" required>
          <span style="color: #FF0000"> <?php echo $lnameErr; ?></span>
        </div>


      </div>

      <div class="row card-body">
        <div class="col-4 col-lg-2  col-md-4 col-sm-4 ">
          <label for="email">Email Address:</label>
        </div>
        <div class="col-8 col-lg-10  col-md-8 col-sm-8">
          <input type="text" id="email" name="email" placeholder="Your Email." required>
          <span style="color: #FF0000"> <?php echo $emailErr; ?></span>
        </div>


      </div>


      <div class="row card-body">
        <div class="col-4 col-lg-2  col-md-4 col-sm-4 ">
          <label for="password">Password:</label>
        </div>
        <div class="col-8 col-lg-10  col-md-8 col-sm-8">
          <input type="password" id="password" name="password" placeholder="" required>
          <span style="color: #FF0000"> <?php echo $passwordErr; ?></span>
        </div>


      </div>

      <div class="row card-body">
        <div class="col-4 col-lg-2  col-md-4 col-sm-4 ">
          <label for="address">Address:</label>
        </div>
        <div class="col-8 col-lg-10  col-md-8 col-sm-8">
          <input type="text" id="address" name="address" placeholder="Your Address." required>
          <span style="color: #FF0000"> <?php echo $addressErr; ?></span>
        </div>

      </div>

      <div class="row card-body">
        <div class="col-4 col-lg-2  col-md-4 col-sm-4 ">
          <label for="number">Mobile Number:</label>
        </div>
        <div class="col-8 col-lg-10  col-md-8 col-sm-8">
          <input type="text" id="number" name="number" placeholder="Your contact info" required>
          <span style="color: #FF0000"> <?php echo $numberErr; ?></span>
        </div>

      </div>

      <div class="row card-body ">
        <div class="col-4 col-lg-2  col-md-4 col-sm-4 ">
          <label for="selection">Blood Group:</label>
        </div>
        <div class="col-8 col-lg-10  col-md-8 col-sm-8">
          <select id="selection" name="selection">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select>
        </div>
      </div>
      <div class="row card-body ">
        <div class="col-4 col-lg-2  col-md-4 col-sm-4 ">
          <label for="any">Any Disease:</label>
        </div>
        <div class="col-8 col-lg-10  col-md-8 col-sm-8">
          <select id="any" name="any">
            <option value="no">NO</option>
            <option value="yes">YES</option>

          </select>
        </div>
      </div>
      <div class="row card-body">
        <div class="col-4 col-lg-2  col-md-4 col-sm-4 ">
          <label for="subject">Disease Description:</label>
        </div>
        <div class="col-8 col-lg-10  col-md-8 col-sm-8">
          <textarea id="subject" name="subject" placeholder="Write if you have any blood related diseases." style="height:200px"></textarea>
        </div>
      </div>
      <div class="row card-body">
        <button type="submit" class="btn " name="submit" value="submit"> Register

        </button>
      </div>

      <?php

      if (isset($_POST["submit"])) {
        echo $error;
        echo $bar;

      ?>
        <br>
      <?php
        echo $bol;
      } else {
      }

      ?>

    </form>
  </div>










  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>