<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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





    <link rel="stylesheet" href="Donor.css">
    <title>trait_exists</title>

</head>

<body>


 <!--   <label>Area Name</label>
       <input type="text" name="search" required value="" class="form-control" placeholder="Area Name">
       <div class="text-center py-3"><button type="submit" name="submit" class="btn btn-primary">search</button></div>
                                                    
    
    -->


   


<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-8 col-sm-4 " style="margin-top:5%">

            <div class="row">
                <?php


                    $con = mysqli_connect('localhost','root','','donorrs') ;
                    if(isset($_POST['search'])){
                        $searchkey = $_POST['search'];
                        $sql = "SELECT * from donor_info WHERE address Like '%$searchkey%' ";
                        $result = mysqli_query( $con, $sql);
                    }
                    
                    
                   



                ?>


                <form action="" method="POST">
                <div class="input-group mb-3">
                         <input type="text" name="search"  required value="<?php if (isset($_GET['search'])) {echo $_GET['search']; } ?>" class= "form-control" placeholder="Area Name" >
                                                          
                                                      
                        <button type="submit" class="btn btn-primary">Search</button>
                </div>

                </form>

            </div>

        </div>
    </div>
</div>
    


    <div class=" col-lg-12 col-mid-12 col-sm-12">
        <div class=" row card mt-4">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>address</th>
                            <th>Blood Group</th>
                            <th>Gender</th>
                        </tr>
                    </thead>


                    <tbody>
                    <?php
                            while($row =mysqli_fetch_object($result))
                            {
                                ?>
                                <tr>
                                <td> <?php echo $row->firstname ?> </td>
                                <td> <?php echo $row->lastname ?> </td>
                                <td> <?php echo $row->email ?> </td>
                                <td> <?php echo $row->mobilenumber ?> </td>
                                <td> <?php echo $row->address ?> </td>
                                <td> <?php echo $row->bloodgroup ?> </td>
                                <td> <?php echo $row->gender ?> </td>

                                </tr>
                                



                                <?php

                            } 
                    ?>


                    </tbody>


                        <?php

                  

                    /*    
                        if(mysqli_num_rows($querry_run)>0)
                        {
                            foreach($querry_run as $items)
                            {
                                ?>
                                <tr>
                                    <td><?= $items['firstname'];?></td>
                                    <td><?= $items['lastname'];?></td>
                                    <td><?= $items['email'];?></td>
                                    <td><?= $items['mobilenumber'];?></td>
                                    <td><?= $items['address'];?></td>
                                    <td><?= $items['bloodgroup'];?></td>
                                    <td><?= $items['gender'];?></td>
                                </tr>

                                <?php

                            }
                        } */

                    
                    ?>

                

                       

                    

                </table>
            </div>

        </div>
    </div>




    <div class="container ">
    <form class="action" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="row  main-div">
        <
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-div">
          <div>
            <div class="row  another-div pt-4">
              <h3 class="fw-light text-center">Log In</h3>
            </div>

            <div class=" row form-floating  another-div">
              <input type="Email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" name="email" value="<?php echo $email; ?>" />
              <label for="floatingInputGrid">&nbsp Email address</label>
              <span class="mt-2" style="color: #FF0000"> <?php echo $emailErr; ?></span>
            </div>

            <div class=" row form-floating  another-div">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="<?php echo $password; ?>" />
              <label for="floatingPassword">&nbsp Password</label>
              <span class="mt-2" style="color: #FF0000"> <?php echo $passwordErr; ?></span>
            </div>

            <div class=" row  another-div">
              <!-- <a href="#" class="btn btn-primary" type="submit" name="submit" value="Submit">Log In</a> !-->
              <button class="btn btn-primary float-left" type="submit" name="submit" value="Submit">Log In</button>
            </div>

              <div class=" row r-div">
              <div class="remember">
                <label> <input type="checkbox" /> Remember Me</label>
              </div>

              <div class="text-center">
                <span style="color: #FF0000"> <?php echo $reg; ?></span>
                <br>Forgot password? <a href="#">Click here</a><br><br>
              </div>

              <div class="row py-3">
                <div class="col  col-lg-7">
                  <p>Log in as Admin </p>

                </div>
                <div class="col-5 col-sm-3 col-lg-3 col-mid-4">
                  <a href="http://www.localhost/admin_login.php" class="btn btn-outline-dark  git-div">Admin</a>

                </div>
              </div>

              <div class="col col-lg-7 pt-1">
                <p>Haven't Joined Us Yet? </p>

              </div>
              <div class="col-5 col-sm-3 col-lg-4 col-mid-4 ">

                <a class="btn btn-outline-dark" role="button" href="http://www.localhost/register.php">
                  SignIn
                </a>

              </div>



            </div>


          </div>
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-4">
          <img src="pic/rer.jpg" alt="photo" class="img-fluid rounded img-div" height="300px" />
        </div>

      </div>
    </form>
  </div>




</body>

</html>