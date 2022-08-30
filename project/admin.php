<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  
  
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
  <!--  icon  !-->
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
  
  
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>  
  
  
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="bio.css">

<title>ADMIN</title>
  
</head>


<body>


<?php

$email = "";

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

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if ($row["login"] == "no") {
  // output data of each row
	header('Location: http://'.$_SERVER['HTTP_HOST'].'/project/admin_login.php');
		}
	}
}

$conn->close();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (($_GET["submit"]) == "Submit") {
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

			$sql = "UPDATE login SET login='no' ";

			if ($conn->query($sql) === TRUE) {
			  echo "Record updated successfully";
			  
			  header('Location: http://'.$_SERVER['HTTP_HOST'].'/project/admin_login.php');
			  
			} else {
			  echo "Error updating record: " . $conn->error;
			}

			$conn->close();
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (($_POST["submit"]) == "Submit") {
		if (empty($_POST["email"])) {
    $emailErr = "&nbsp &nbsp &nbsp Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "&nbsp &nbsp &nbsp Invalid email format";
    }
	else{
		
		$servername = "localhost";
		$username = "root";
		$DBpassword = "";
		$dbname = "donor_db";

		// Create connection
		$conn = new mysqli($servername, $username, $DBpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM user3 WHERE Email = $email";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$fname = $row["Firstname"];
			}
		} else {
			echo "0 results";
		}

		$conn->close();
		
		}
	 }
		
   }
}

					
?>
		



<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <ul class="navbar-nav">

	<img src="pic/blood0.png" alt="Avatar Logo" style="width:33px;" class="rounded-pill navbar-brand">  
	<a href="http://localhost:443/project/a_homepage.php"><div class="nav-item navbar-brand font" href="http://localhost:443/project/a_homepage.php">DONOR</div></a>		
    <li class="nav-item active">
      <a class="nav-link" href="http://localhost:443/project/a_homepage.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#tab">Reports</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#tab">Accounts</a>
    </li>
  </ul>    
</nav>

<div id="home">
<div class="landing-text">
	<div class="container">
	<div class="row">
		<div class="col-8" style = "margin-top: 15vh">
			<h1><b style = "color: #FFA400">Admin Panel</b><br></h1>
			<div>
			<h4 class = "py-3" style="color:#4e4e4c"><b><span class="type"></span></b></h4>
			</div>
			
			<script src="typed.js"></script>
			<script>
				var typed = new Typed(".type", {
			  strings: ["WELCOME ADMIN", "HERE YOU CAN SEE ALL REPORTS","YOU CAN HAVE ACCESS OF USER PROFILE","YOU CAN DELETE AND UPDATE USER-PROFILE HERE","HAVE A NICE DAY"],
			  typeSpeed: 60,
			  backSpeed: 60,
			  loop: true
			});
			</script>
		
		<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<button class="btn btn-secondary col-2 float-left" type="submit" name="submit" value="Submit">Log Out</button>
		</form>
		
		</div>
	</div>
	</div>
</div>
</div>

<div id="tab" class = "container mt-5">
	<ul class="nav nav-tabs">
				<li class="nav-item">
				<a class="nav-link active " data-toggle="tab" href="#report" style="color:#464646">REPORTS</a>
				</li>
				<li class="nav-item">
				<a class="nav-link " data-toggle="tab" href="#PERSONAL_INTEREST" style="color:#464646">USER ACCOUNT</a>
				</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane text-center active" id="report">
		<div class="row border g-0 rounded shadow-sm">
		
			<table border='3'>
			<tr>
			
				<td class="col-2" style="background:#FFA400; font-family: 'Kanit', sans-serif;font-family: 'Lobster', cursive;">Serial No.</td>
				<td class="col-2" style="background:#FFA400;font-family: 'Kanit', sans-serif;font-family: 'Lobster', cursive;">First Name</td>
				<td class="col-2" style="background:#FFA400;font-family: 'Kanit', sans-serif;font-family: 'Lobster', cursive;">Last name</td>
				<td class="col-3" style="background:#FFA400;font-family: 'Kanit', sans-serif;font-family: 'Lobster', cursive;">Email</td>
				<td class="col-3" style="background:#FFA400;font-family: 'Kanit', sans-serif;font-family: 'Lobster', cursive;">Message</td>
							
			</tr>
			<?php
			
				$fp = fopen ( "report_data.csv" , "r" );
				while (( $data = fgetcsv ( $fp , 1000 , "," )) !== FALSE ) {
					
					$i = 1;
					echo "<tr>";
					
					foreach($data as $row) { 
					echo "<td> " . $row ."</td>";
					echo "	";
					   $i++ ;
					}
					
					echo " &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </tr>";
				}
				
				fclose ( $fp );
				
				?>
				</table>
		</div>		
		</div>
		<!-- NEW !-->
		<div class="tab-pane " id="PERSONAL_INTEREST">
		<div class="row border g-0 rounded shadow-sm">
		
		<form class="col-lg-12 col-md-12 col-sm-12 col-12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
				<input type="text" class="form-control" placeholder="User Id" name="id">	
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3 text-center">
				<button type="submit" name="submit" value="Submit" class="btn btn-primary" data-toggle="collapse" data-target="#help">Search </button>
			</div>
		</form>	
					
		
		<!--
		<div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
			<input type="text" class="form-control" placeholder="User Id" name="id">	
		</div>
		 <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3 text-center">
			<button type="submit" name="search" class="btn btn-primary" data-toggle="collapse" data-target="#help">Search </button>
		 </div>
         !-->
		<hr>
		
		<!-- USER INFO !-->
		
			<div id="help" class="m-5 collapse">
				<section class="head">
					<div class="container">
						<div class="card">
							<div class="card-body" style="background-color:#F0F8FF; color:black">
							<h1 class="text-center py-3 font2">USER Account Details</h1>
							<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
								<form>
									
									<div class="form-row">
										<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
											<label>First Name</label>
											<input type="text" class="form-control" value="<?php echo $fname;?>" name="fname" >
											
										</div>
										<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
											<label>Last Name</label>
											<input type="text" class="form-control" placeholder="<?php echo $row->LastName; ?>" name="lname">
											
										</div>
										
										<label>Email Address</label> 
										<input type="Email" class="form-control" placeholder="<?php echo $row->Email; ?>" name="email">
										
										<label class="mt-2">Password</label> 
										<input type="password" class="form-control" placeholder="<?php echo $row->Email; ?>" name="password">
										
										<label class="mt-2">Mobile Number</label> 
										<input type="text" class="form-control" placeholder="<?php echo $row->Email; ?>" name="mblnumber">
										
										<label class="mt-2">Address</label>
										<input type="text" class="form-control" placeholder="<?php echo $row->Email; ?>" name="mblnumber">
										
										<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
											<label class="mt-2">Blood Group</label>
											<input type="text" class="form-control" placeholder="<?php echo $row->Email; ?>" name="fname">
											
										</div>
										<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
											<label class="mt-2">User ID</label>
											<input type="text" class="form-control" placeholder="<?php echo $row->Email; ?>" name="id">
										</div>
										
										<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
											<label>Blood Diseases</label>
											<input type="text" class="form-control" placeholder="<?php echo $row->Email; ?>" name="Diseases">
										</div>
										<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
											<label>Log-in</label>
											<input type="text" class="form-control" placeholder="<?php echo $row->verified; ?>" name="login">
										</div>
										
										<label class="mt-2">Message</label>
										<textarea class="form-control mb-4" placeholder="Message" name="comment" placeholder="<?php echo $row->Email ?>" cols="7" rows="3"></textarea>
										
										<div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2 text-center ">
											<button class="btn btn-primary">Update Account</button>
										</div>
									</div>
									
								</form>
								
								<div class = "text-center m-3">
										<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Delete Account</button>
									<!--	<input type="submit" name="submit" value="Submit">  !-->
									
										<!-- The Modal -->
										<div class="modal" id="myModal">
										  <div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">

											  <!-- Modal Header -->
											  <div class="modal-header">
												<h4 class="modal-title" style="color: #FF0000">DELETING ACCOUNT!</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											  </div>

											  <!-- Modal body -->
											  <div class="modal-body">
												Are you sure you want to DELETE this account?
											  </div>

											  <!-- Modal footer -->
											  <div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
											  </div>

											</div>
										  </div>
										</div>
										</div>
								
								</div>
								
							</div>
							</div>
						</div>
					</div>
				</section>
			</div>

				<!-- USER INFO !-->

		</div>
		</div>
	</div>
</div>



<footer id="footer" class = "bg-dark text-white pt-2 pb-4 text-center">
	
	<div class="footer-copyright text-center pt-2">
        <p>&copy; Copyright 2022-2024 by paradise.com All Rights Reserved </p>
    </div>    
	<div class="container">  
	  <div class="row">
        <div class="col-sm-4">
		  <a href="http://www.localhost/help.php">Help & support</a>
		</div>
		<div class="col-sm-4">
		  <a href="#myCarousel">About Us</a>
		</div>
		<div class="col-sm-4">
		  <a href="https://www.who.int/news-room/questions-and-answers/item/blood-products-why-should-i-donate-blood#:~:text=Why%20should%20people%20donate%20blood,and%20surgical%20and%20cancer%20patients.">
		  About Blood Donation</a>
		</div>
	  </div>
	</div>

    </footer> 

	
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>