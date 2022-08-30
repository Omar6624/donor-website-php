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
  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
  
  
  
  <link rel="stylesheet" href="Donor.css">
  <title>User Account</title>
  
</head>
<body>

<!-- PHP !-->




<!-- HTML !-->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <ul class="navbar-nav">

	<img src="blood0.png" alt="Avatar Logo" style="width:33px;" class="rounded-pill navbar-brand"> 
	<div class="nav-item navbar-brand font">DONOR</div>		
    <li class="nav-item active">
      <a class="nav-link" href="http://www.localhost/HOMEPAGE.html">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://www.localhost/HOMEPAGE.html">About Us</a>
    </li>

	<li class="nav-item">
      <a class="nav-link" href="http://www.localhost/help.php">Help & support</a>
    </li>
  </ul>      
</nav>

<div id="help" style="margin:14vh">
<section class="head">
	<div class="container py-5">
		<div class="card">
			<div class="card-body" style="background-color:#F0F8FF; color:black">
			<h1 class="text-center py-3 font2">USER Account Details</h1>
			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12 col-12 text-center">
					
					<img src="logo2.jpg" style="width:90%; height:90%">
				</div>
				
				<div class="col-lg-8 col-md-12 col-sm-12 col-12">
				<form>
					<div class="form-row">
						<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
							<label>First Name</label>
							<input type="text" class="form-control" placeholder="First Name" name="fname" >
							
						</div>
						<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
							<label>Last Name</label>
							<input type="text" class="form-control" placeholder="Last Name" name="lname">
							
						</div>
						
						<label>Email Address</label> 
						<input type="Email" class="form-control" placeholder="Email Address" name="email">
						
						<label class="mt-2">Mobile Number</label> 
						<input type="text" class="form-control" placeholder="Mobile Number" name="mblnumber">
						
						<label class="mt-2">Address</label>
						<input type="text" class="form-control" placeholder="Address" name="mblnumber">
						
						<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
							<label class="mt-2">Blood Group</label>
							<input type="text" class="form-control" placeholder="First Name" name="fname">
							
						</div>
						<div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
							<label class="mt-2">Gender</label>
							<input type="text" class="form-control" placeholder="Last Name" name="lname">
							
						</div>

					</div>
				</form>
				
				<div>
						<button class="btn btn-primary float-left" data-toggle="modal" data-target="#myModal">Delete Account</button>
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

</body>
</html>