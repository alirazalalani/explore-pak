<!DOCTYPE html>
<html lang="en">
  <head>
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
    <style>
      *{
        font-family: 'Montserrat', sans-serif;

      }
      </style>
  </head>
  <body>
    <!-- Start your header here-->

      <!--Main Navigation-->
<header>
  <!-- Animated navbar-->
  <nav class="navbar navbar-expand-lg fixed-top navbar-scroll " style="background-color:#FF9800 ;" >
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
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 >
          <?php
          if(!isset($_SESSION['aloggedin']))
          {
            echo '<li class="nav-item active">
            <a class="nav-link text-white" aria-current="page" href="#intro">Login</a>
          </li>'; 
          }else{
            echo '<li class="nav-item">
            <a
               class="nav-link text-white"
             
               rel="nofollow"
               target="_blank"
               >My Account</a
              >
          </li>
          <li class="nav-item">
            <a
               class="nav-link text-white"
               href="profile.php"
               target="_blank"
               >Logout</a
              >
          </li>';
          }

          ?>
        </ul>

        <ul class="navbar-nav flex-row">
          <!-- Icons -->
          <li class="nav-item">
            <a style="color: rgb(226, 43, 43);"
               class="nav-link pe-2";
            
               rel="nofollow"
               target="_blank"
               >
              <i class="fab fa-youtube"></i>
            </a>
          </li>
          <li class="nav-item">
            <a
               class="nav-link px-2"
               
               rel="nofollow"
               target="_blank"
               >
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a style="color: cornflowerblue;"
               class="nav-link px-2"
               
               rel="nofollow"
               target="_blank"
               >
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a
               class="nav-link ps-2 text-white"
               
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
  <!-- Animated navbar -->
