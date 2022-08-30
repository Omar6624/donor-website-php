<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'donor_db');
$email = $password = $veified = $resultset ='';

$error="Make sure you are verified!We sent a verification link ";
//$_SESSION['login'] = '';
if(!isset($_SESSION['login']))
{
  if(isset($_POST['submit']))
  {

    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    $resultset = $mysqli->query("SELECT * FROM user3 WHERE Email='$email' and Password =' $password' and verified = 1 LIMIT 1");
    
    
    if($resultset->num_rows == 1)
    {

      $_SESSION['login'] = true;
      $_SESSION['email'] = $email;
      $error = "Successful";

      header('location:a_donor.php');
     // $row = $resultset->fetch_assoc();
      //$verified = $row['verified'];
      
      
    }else{
      $error = "Log in failed";
    }


  }

  
}else{
  header('location:a_donor.php');
 
}


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In</title>

  <link rel="stylesheet" href="login.css" />
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

  <!-- PHP !-->

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


  <div class="container carousel-div py-1 ">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="pic/don1.jpg" class=" rounded d-block w-100">
          <div class="carousel-caption d-none d-md-block">
            <h5>BLOOD DONATION</h5>
            <p>For Greater Cause</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="pic/don3.jpg" class=" rounded d-block w-100 " >
          <div class="carousel-caption d-none d-md-block">
            <h5>DONATE TODAY</h5>
            <p>Be the reason for someone's heartbeat</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="pic/donorbg.jpg" class="rounded d-block w-100" >
          <div class="carousel-caption d-none d-md-block">
            <h5>The gift of blood is a gift to someone's life</h5>
            <p>A blood donor is equal to a lifesaver</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container  div-log">

    <div class=" row  alert  alert-info another-div " >
      <div class="col-12 col-lg-12 "><h4><?php echo $error ?></h4></div>
      

    </div> 

    


      <form action="" method="POST">
        <div class="row text-center ">
              <h3>Log In</h3>
        </div>
        <div>

        
                <div class=" row form-floating  another-div text-center">
                      <input type="Email" class="form-control " id="floatingInputGrid" placeholder="name@example.com" name="email"value=""  required>
                      <label for="floatingInputGrid">&nbsp Email address</label>
                     
                </div>
                <div class=" row form-floating  another-div text-center">
                      <input type="password" class="form-control " id="floatingPassword" placeholder="Password" name="password" required>
                      <label for="floatingPassword">Password</label>
                    
                </div>
                <div class=" row  another-div">
                  <!-- <a href="#" class="btn btn-primary" type="submit" name="submit" value="Submit">Log In</a> !-->
                  <button class="btn  " type="submit" name="submit" value="submit">Log In</button>
                </div>
                
                
        </div>
      </form>

    </div>


  </div>

  <div class="container">
    <div class="row another-div">
    <a class="btn btn-danger  " href="http://www.localhost:443/project/admin_login.php" >Admin</a>

    </div>
  </div>


  <div class="container">
    <div class="row img-div">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
        <img src="pic/rer1.jpg" alt="photo" class="img-fluid rounded " />
      </div>

    </div>

  </div>


  


  <footer class=" container-fluid bg-dark">
    <div class="footer-copyright text-center pt-2 ">
      <p class="font">&copy; Copyright 2022-2024 by paradise.com All Rights Reserved </p>
    </div>
    <div class="row d-div pb-3">
      <!--<div class="col col-sm-2 col-lg-2 fot-link"> !-->
      <div class="col-sm-4">
        <a href="http://www.localhost:8080/help.php" class="l-div">Help & support</a>
      </div>
      <!--<div class="col col-sm-2 col-lg-2 fot-link"> !-->
      <div class="col-sm-4">
        <a href="https://www.who.int/news-room/questions-and-answers/item/blood-products-why-should-i-donate-blood#:~:text=Why%20should%20people%20donate%20blood,and%20surgical%20and%20cancer%20patients." class="l-div">About Blood Donation</a>
      </div>
      <!--<div class="col col-sm-2 col-lg-2 fot-link"> !-->
      <div class="col-sm-4">
        <a href="http://www.localhost:8080/HOMEPAGE.html" class="l-div">About Us</a>
      </div>
      <!--<div class="col col-sm-2 col-lg-2 fot-link">
          <a href="" class="l-div"> Privacy Policy</a>
        </div> !-->
    </div>

  </footer>
 


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>