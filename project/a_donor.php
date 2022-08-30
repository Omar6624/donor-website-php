<?php
error_reporting(0);
session_start();
if(isset($_SESSION['login']))
{
  $email = $_SESSION['email'];
  
}else{
  header('location:a_user_login.php');
}



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">


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





  <link rel="stylesheet" href="Donor.css">
  <title>DONOR</title>

</head>

<body>

<?php

$stmt = '';

if(isset($_POST['submit']))
{
  $sd = "NO MATCH FOUND";
  


  $mysqli = new mysqli('localhost', 'root', '', 'donor_db');
 
  if (isset($_POST['search']) && isset($_POST['bloodlist'])) {
    $searchkey = $_POST['search'];
  
    $bloodkey = $_POST['bloodlist'];
    
    global $result;
    $sql = "SELECT * from user3 WHERE address Like '%$searchkey%' && Bloodgroup LIKE '%$bloodkey%'";
    $result =  mysqli_query($mysqli, $sql);
    //$stmt = $mysqli->prepare("SELECT * from user3 WHERE address Like '$searchkey' AND Bloodgroup LIKE '$bloodkey'");
   //$stmt->bind_param('s',$searchkey);Firstname,LastName,Email,address,Number,Bloodgroup,Disease
   //$stmt->execute();
   //$row = $stmt->fetch(PDO::FETCH_ASSOC);
  } else{
   
    echo  $sd ;
  }


}


?>




  <nav class="navbar navbar-expand-sm   bg-danger navbar-dark fixed-top   ">
    <ul class="navbar-nav">

      <img src="pic/blood0.png" alt="Avatar Logo" style="width:33px;" class="rounded-pill navbar-brand">
      <div class="nav-item navbar-brand font">DONOR</div>
      <li class="nav-item active">
        <a class="nav-link" href="http://www.localhost:443/project/a_homepage.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://www.localhost:443/project/a_homepage.php#abcd">About Us</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="http://www.localhost:443/project/help.php" data-toggle="tooltip" data-placement="bottom" title="If you have any complain or suggestion for us please click here & send us your complain / suggestion">Help & support</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <form action="a_logout.php" method="POST">
      <button class="btn bt-div" style="margin-right:1vh">
      Logout

      </button>

      </form>
      
    
    </ul>  
  </nav>


  <div id="home" class="home">
    <div class="landing-text">
      <div class="container">
        <div class="row">
          <div class="col-8">
            <h1 style="color:#4e4e4c;"><b style="color: #FFA400">মানুষ</b> মানুষের জন্যে,<br>
              <b style="color: #FFA400">জীবন </b> জীবনের জন্যে
            </h1>
            <div class="py-3">
              <h5>ভাবুন এমন এক পৃথিবী যেখানে কেউ রক্তের অভাবে মারা যাবে না !</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <section class="head" id="search-id">
    <div class="container py-5">
      <div class="card">
        <div class="card-body" style="background-color:#FFFFF7; color:black">
          <h4 class="text-center py-3 font2">Search for your Blood-group</h4>

          <form action="" method="POST" target="_parent">
            <div class="form-row text-center">
              <div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
                <!--<label>Blood-group</label>
									<input type="text" class="form-control" placeholder="Blood-group">	!-->

                <label for="blood">Blood-group</label>
                <select class="form-control" id="blood" name="bloodlist">
                <option value=""></option>
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
              <div class="form-group col-lg-6 col md-12 col-sm-12 col-12">
                <label>Area Name</label>
                <input type="text" name="search" required value="" class="form-control" placeholder="Area Name">
               


            </div>
              <div class="d-grid gap-2 col-6 mx-auto"><button type="submit" name="submit" class="btn font" href="#search-id">Search </button></div>
            </div> 
          </form>

        </div>
      </div>
    </div>
  </section>



  


  <div class=" col-lg-12 col-mid-12 col-sm-12 " >
    <div class=" row card mt-4">
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Mobile</th>
              <th>Blood Group</th>
              <th>Disease</th>
            </tr>
          </thead>


          <tbody>
            <?php
            while ($row = mysqli_fetch_object($result)) {
            ?>
              <tr>
              <td> <?php echo $row->Firstname ?> </td>
              <td> <?php echo $row->LastName ?> </td>
              <td> <?php echo $row->Email ?> </td>
              <td> <?php echo $row->address ?> </td>
              <td> <?php echo $row->Number ?> </td>
              <td> <?php echo $row->Bloodgroup ?> </td>
              <td> <?php echo $row->Disease ?> </td>

              </tr>


            

            <?php

            }
            ?>


          </tbody>









        </table>
      </div>

    </div>
  </div>



  <div class="container py-5 text-center">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ul class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
        <li data-target="#myCarousel" data-slide-to="6"></li>
      </ul>

      <!-- The slideshow -->
      <div class="carousel-inner">

        <div class="carousel-item active">
          <img src="pic/donorbg.jpg" width="1100" height="400">
          <div class="carousel-caption d-none d-md-block">
            <h5>BLOOD DONATION</h5>
            <p>For Greater Cause</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="pic/don2.png" width="1100" height="400">
        </div>
        <div class="carousel-item">
          <img src="pic/don3.jpg" width="1100" height="400">
          <div class="carousel-caption d-none d-md-block">
            <h5>DONATE TODAY</h5>
            <p>Be the reason for someone's heartbeat</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="pic/don4.jpg" width="1100" height="400">
        </div>
        <div class="carousel-item">
          <img src="pic/don1.jpg" width="1100" height="400">
          <div class="carousel-caption d-none d-md-block">
            <h5>The gift of blood is a gift to someone's life</h5>
            <p>A blood donor is equal to a lifesaver</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="pic/don5.jpg" width="1100" height="400">
          <div class="carousel-caption d-none d-md-block">
            <h5>Be a part of a great Journey</h5>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>

  <!--<div id="developers">
	<section class="head ">
	<div class="container py-5">
		<div class="card">
			<div class="card-body  border g-0 rounded shadow-sm" style="background-color:#F0F8FF; color:black">
			<h1 class="text-center py-3 font2">Developers</h1>
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="row">
						<div class="col-lg-1 offset-1 col-md-2 col-sm-2 col-2">
						
						</div>
						<div class="col-lg-10 col-md-9 col-sm-9 col-9 py-5">
						<p class="font">
						Hi, I am Piyal Datta, a student from Ahsanullah University of Science and Technology, Department of Computer Science & Engineering. For my Portfolio click the button below
						</p>
							<div class="py-3">
				<a href = "http://www.localhost/Piyal_pf/Piyal%20Datta.html">
				<button type="button" class="btn btn-secondary">Portfolio</button>
				</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="pic/piyal.jpg" class="img-thumbnail dimension" style="width:600px; height:300px">
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="row">
						<div class="col-lg-1 offset-1 col-md-2 col-sm-2 col-2">
						
						</div>
						<div class="col-lg-10 col-md-9 col-sm-9 col-9 py-5">
						<p class="font">
						Hi, I am Omar Faruk, a student from Ahsanullah University of Science and Technology, Department of Computer Science & Engineering. For my Portfolio click the button below
						</p>
							<div class="py-3">
							<button type="button" class="btn btn-secondary" href="#">Portfolio</button>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="pic/Faruk.jpg" class="img-thumbnail dimension" style="width:600px; height:300px">
				</div>
			</div>
			
			</div>
		</div>
	</div>
	</section>	
</div> -->

  <footer class="bg-dark text-white pt-2 pb-4 text-center">

    <div class="footer-copyright text-center pt-2">
      <p>&copy; Copyright 2022-2024 by Donor.com All Rights Reserved </p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <a href="http://www.localhost:433/project/help.php">Help & support</a>
        </div>
        <div class="col-sm-4">
          <a href="http://www.localhost:443/project/a_homepage.php#abcd">About Us</a>
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