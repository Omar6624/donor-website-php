<!DOCTYPE html>
<html lang="en">
<head>
  <title>DONOR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font !-->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500&family=Lobster&family=Lobster+Two:ital,wght@1,700&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&family=Eczar&family=Kanit:wght@400;500&family=Lobster&family=Lobster+Two:ital,wght@1,700&family=Proza+Libre:ital,wght@0,400;1,800&display=swap" rel="stylesheet"> 
  
  
  
  
  
  <link rel="stylesheet" href="Donor.css">
  <title>Donor</title>
  
</head>
<body>

<!-- PHP !-->

<?php
// define variables and set to empty values
$fnameErr = $lnameErr = $emailErr = $commentErr = "";
$fname = $lname = $email = $comment = $reg ="";
$boolean1 = $boolean2 = $boolean3 = $boolean4 = "false";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
	else{
		$boolean1="true";
	}
  }
  
  if (empty($_POST["lname"])) {
    $lnameErr = "Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
	else{
		$boolean2="true";
	}
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "&nbsp &nbsp &nbsp Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "&nbsp &nbsp &nbsp Invalid email format";
    }
	else{
		$boolean3="true";
	}
  }
    
  if (empty($_POST["comment"])) {
    $commentErr = "&nbsp &nbsp &nbsp Enter your comment";
  } else {
    $comment = test_input($_POST["comment"]);
	$boolean4="true";
  }
  
  if($boolean4 == "true" && $boolean3 == "true" && $boolean2 == "true" && $boolean1 == "true"){
	  
	$file_open = fopen("report_data.csv", "a");
	$no_rows = count(file("report_data.csv"));
	  if($no_rows > 1)
	  {
	   $no_rows = ($no_rows - 1) + 1;
	  }
	  $form_data = array(
	   'No.'  => $no_rows,
	   'First Name'  => $fname,
	   'Last Name'  => $lname,
	   'Email'  => $email,
	   'Message' => $comment
	  );
	  fputcsv($file_open, $form_data);
	  $error = '<label class="text-success">Thank you for contacting us</label>';
	  $fname = '';
	  $lname = '';
	  $email = '';
	  $comment = '';  
	  
	  
	  
	$reg = "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Message Sent";
	$fname = $lname = $email = $comment = "";
	$boolean1 = $boolean2 = $boolean3 = $boolean4 = "false";
	
  }
  else{
	$reg = "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Message Failed to Sent !";  
  }

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!-- HTML !-->

<nav class="navbar navbar-expand-sm bg-danger navbar-dark fixed-top">
  <ul class="navbar-nav">

	<img src="pic/blood0.png" alt="Avatar Logo" style="width:33px;" class="rounded-pill navbar-brand"> 
	<div class="nav-item navbar-brand font">DONOR</div>		
    <li class="nav-item active">
      <a class="nav-link" href="http://www.localhost/HOMEPAGE.html">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://www.localhost:443/project/a_homepage.php#abcd">About Us</a>
    </li>

	<li class="nav-item">
      <a class="nav-link" href="#help">Help & support</a>
    </li>
  </ul>    
  <ul class="navbar-nav ml-auto">
      <a href="http://www.localhost:443/project/a_reg.php"><button type="button" class="btn btn-outline-primary py-1" style="margin-right:1vh">Create Account</button></a>
      
  </ul>  
</nav>

<div id="help" style="margin: 20vh">
<section class="head">
	<div class="container py-5">
		<div class="card">
			<div class="card-body" style="background-color:#F0F8FF; color:black">
			<h1 class="text-center py-3 font2">Help & Supports</h1>
			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12 col-12 text-center">
					<!--<div class="row">
						<div class="col-lg-1 offset-1 col-md-2 col-sm-2 col-2">
						
						</div> 
						<div class="col-lg-10 col-md-9 col-sm-9 col-9 ">
						<img src="logo2.jpg" style="width:40%" class="rounded-pill">
						</div>
					</div>!-->
					
					<img src="pic/1123.jpg" style="width:90%; height:90%">
				</div>
				
				<div class="col-lg-8 col-md-12 col-sm-12 col-12">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form-row">
						<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
							<label>First Name</label>
							<input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo $fname;?>" >
							<span style="color: #FF0000"> <?php echo $fnameErr;?></span>
						</div>
						<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
							<label>Last Name</label>
							<input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $lname;?>" >
							<span style="color: #FF0000"> <?php echo $lnameErr;?></span>
						</div>
						
						<label>Email Address</label> <span style="color: #FF0000"> <?php echo $emailErr;?></span>
						<input type="Email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $email;?>">
						
						
						<label class="mt-2">Message</label><span class="mt-2" style="color: #FF0000"><?php echo $commentErr;?></span>
						<textarea class="form-control mb-3" placeholder="Message" name="comment" cols="7" rows="3"><?php echo $comment;?></textarea>
						
						<button class="btn btn-primary float-left" type="submit" name="submit" value="Submit">Send Message</button>
					<!--	<input type="submit" name="submit" value="Submit">  !-->
					<span class="mt-2" style="color: #FF0000"><?php echo $reg;?></span>
					</div>
				</form>
				</div>
				
			</div>
			</div>
		</div>
	</div>
	</section>
</div>

</body>
</html>