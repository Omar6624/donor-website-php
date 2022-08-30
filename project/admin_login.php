<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>

    <link rel="stylesheet" href="login2.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

  </head>

  <body>
  
  <!-- PHP !-->

<?php

$servername = "localhost";
$username = "root";
$Dpassword = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $Dpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT login FROM login";
$result = $conn->query($sql);





// define variables and set to empty values
$fnameErr = $lnameErr = $emailErr = $RemailErr = $commentErr = $passwordErr = $RpasswordErr = $addressErr = $mblnumberErr = "";
$fname = $lname = $email = $Remail = $comment = $password = $Rpassword = $address = $mblnumber = $reg = "";

$admin = $passwordAD = "false";

$piyal = $faruk = "piyal@gmail.com";
$passwordP = "12345678";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if ($row["login"] == "yes") {
  // output data of each row
	header('Location: http://'.$_SERVER['HTTP_HOST'].'/admin.php');
		}
	}
}

$conn->close();


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["email"])) {
		$emailErr = "&nbsp Email is required";
	  } else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "&nbsp Invalid email format";
		}
		else{
			if ($piyal == $email || $faruk==$email) {
				$admin = "true";
			}
			else{
				$emailErr = "&nbsp Wrong email address";
				$admin = "false";
			}
		}
	  }

	if (empty($_POST["password"])) {
		$passwordErr = "&nbsp Enter Password";
	  } else {
		$password = test_input($_POST["password"]);
		if(strlen($password) < 6){
			$passwordErr = "&nbsp Password has to be at last 6 character";
		}
		else{
			if ($passwordP==$password) {
				$passwordAD = "true";
			}
			else{
				$passwordErr = "&nbsp Wrong Password";
				$passwordAD = "false";
			}
		}
	  }
	  
	  if($admin == "true" && $passwordAD == "true"){
		  
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "admin";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql = "UPDATE login SET login='yes' ";

			if ($conn->query($sql) === TRUE) {
			  echo "Record updated successfully";
			  
			  header('Location: http://'.$_SERVER['HTTP_HOST'].'/project/admin.php');
			  
			} else {
			  echo "Error updating record: " . $conn->error;
			}

			$conn->close();

		  
		  
		// Problem
		
		
	  }
	  
	}	



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
  
  
<nav class="navbar navbar-expand-lg  navbar-dark n-div">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="pic/blood0.png" alt="Avatar Logo" style="width: 35px" />
        </a>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active navbar-brand " href="http://localhost:443/project/a_homepage.php">Donor</a>
          </li>
        </ul>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active navbar-brand " href="http://localhost:443/project/a_homepage.php">Home</a>
            </li>
			<li class="nav-item">
              <a class="nav-link active navbar-brand " href="http://localhost:443/project/a_user_login.php">User Log-in</a>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>

	<div class="container mt-3">
		<img src="pic/donorbg.jpg" class="mx-auto d-block img-fluid">
	</div>

	<div class="container">	
		<form class="action" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row  main-div">
          <div class="col-12 col-sm-12 col-md-12 col-lg-5">
            <img
              src="pic/logo3.jpg"
              alt="photo"
              class="img-fluid rounded img-div mt-5"
            />
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-6 form-div">
            <div>
              <div class="row  another-div pt-4">
                <h3 class="fw-light text-center">Log In</h3>
              </div>

              <div class=" row form-floating  another-div">
                <input
                  type="Email"
                  class="form-control"
                  id="floatingInputGrid"
                  placeholder="name@example.com"
				  name="email"
				  value="<?php echo $email;?>"
                />
                <label for="floatingInputGrid">&nbsp Email address</label>
				<span class="mt-2" style="color: #FF0000"> <?php echo $emailErr;?></span>
              </div>

              <div class=" row form-floating  another-div">


              

              









              <input
                  type="password"
                  class="form-control"
                  id="floatingPassword"
                  placeholder="Password"
				  name="password"
				  value="<?php echo $password;?>"
                />
                <label for="floatingPassword">&nbsp Password</label>
				<span class="mt-2" style="color: #FF0000"> <?php echo $passwordErr;?></span>
              </div>

              <div class=" row  another-div">
               <!-- <a href="#" class="btn btn-primary" type="submit" name="submit" value="Submit">Log In</a> !-->
				<button class="btn btn-primary float-left" type="submit" name="submit" value="Submit">Log In</button>
              </div>

              <div class=" row r-div">
                <div class="remember">
                  <label> <input type="checkbox" />   Remember Me</label>
                </div>
				
				<div class = "text-center">
				<span style="color: #FF0000"> <?php echo $reg;?></span>
				<br>Forgot password? <a href="#">Click here</a><br><br>
				</div>
				
              </div>

            </div>
          </div>
        </div>
      </form>
	  </div>
	  
    

    <hr class="container">


    <footer class=" container-fluid n-div ">
      <div class="footer-copyright text-center pt-2">
        <p>&copy; Copyright 2022-2024 by paradise.com All Rights Reserved </p>
      </div>
      <div class="row d-div pb-3">
        <!--<div class="col col-sm-2 col-lg-2 fot-link"> !-->
		<div class="col-sm-4">
		  <a href="http://www.localhost:443/project/help.php" class="l-div">Help & support</a>
        </div>
        <!--<div class="col col-sm-2 col-lg-2 fot-link"> !-->
		<div class="col-sm-4">
          <a href="https://www.who.int/news-room/questions-and-answers/item/blood-products-why-should-i-donate-blood#:~:text=Why%20should%20people%20donate%20blood,and%20surgical%20and%20cancer%20patients."
		  class="l-div">About Blood Donation</a>
        </div>
        <!--<div class="col col-sm-2 col-lg-2 fot-link"> !-->
		<div class="col-sm-4">
          <a href="http://www.localhost:443/project/a_homepage.php" class="l-div">About Us</a>
        </div>
        <!--<div class="col col-sm-2 col-lg-2 fot-link">
          <a href="" class="l-div"> Privacy Policy</a>
        </div> !-->
      </div>

    </footer>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
