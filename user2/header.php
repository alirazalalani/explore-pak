<?php
 session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- CDN -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- font awesome link -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"/>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Admin Login</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your header here-->

      <!--Main Navigation-->
<header>
  <!-- Animated navbar-->
  <nav class="navbar navbar-expand-lg fixed-top navbar-scroll " style="background-color:rgba(0, 0, 0, 0.9) ;" >
    <div class="container">
      <button
              class="navbar-toggler ps-0 text-white"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarExample01"
              aria-controls="navbarExample01"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
        <span
              class="navbar-toggler-icon d-flex justify-content-start align-items-center"
              >
          <i class="fas fa-bars"></i>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" >

        <?php
                          if(isset($_SESSION['loggedin'])){
                            echo '
                            <a class="nav-link" href="cart.php">
                            <b>Bag<i class="fas fa-shopping-cart"></i><span class="Badge badge-warning"
                            style="border-radius: 50%; height: 20px; " id="countcart"></span></a></b>&nbsp;
                             
                            
                            
                            &nbsp;<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navBardropdown"
                        role="button" data-toggle="dropdown" aria haspopyp="true"
                        aria ecpanded="false">
                        My account
                    </a>  
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i>
                            My Profile</a>
                        <a class="dropdown-item" href="change_password.php"><i class="fas fa-key"></i>
                            Change Password</a>
                        <a class="dropdown-item" href="orders.php"><i class="fas fa-cube"></i>
                            Bookings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdrown-item" href="logout.php"><i class="fas fa-sign-out"</li>Logout</a>
                        </div>
                    </li>';
                        }
                          
                    else{
                        echo '<li class="navbar-item">
                                <a href="login.php" class="nav-link">Login</a>
                            </li>
                            <li class="navbar-item">
                            <a href="signup.php" class="nav-link">Signup</a>
                        </li>';
                
                    }

                          
                        
                   
                    ?>
                            
                
        
        </ul>

        <ul class="navbar-nav flex-row">
          <!-- Icons -->
          <li class="nav-item">
            <a style="color: rgb(226, 43, 43);"
               class="nav-link pe-2"
               href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA"
               rel="nofollow"
               target="_blank"
               >
              <i class="fab fa-youtube"></i>
            </a>
          </li>
          <li class="nav-item">
            <a
               class="nav-link px-2"
               href="https://www.facebook.com/mdbootstrap"
               rel="nofollow"
               target="_blank"
               >
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a style="color: cornflowerblue;"
               class="nav-link px-2"
               href="https://twitter.com/MDBootstrap"
               rel="nofollow"
               target="_blank"
               >
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a
               class="nav-link ps-2 text-white"
               href="https://github.com/mdbootstrap/mdb-ui-kit"
               rel="nofollow"
               target="_blank"
               >
              <i class="fab fa-github"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  </nav>
  </header>

