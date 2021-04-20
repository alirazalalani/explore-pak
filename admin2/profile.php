<?php
  require_once 'header 1.php';
  require_once '../config.php';
  //require_once 'login_check.php';
?>
<html>
	<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&family=Playfair+Display:wght@800&display=swap" rel="stylesheet">  
  <style>
      *{
        font-family: 'Montserrat', sans-serif;

      }
      input, button{
        margin-top:70px
      }
		
			</style>

</head>
 

  <!-- Background image -->
  <div
       id="intro"
       class="bg-image"
       style="
              background-image: url(img/back1.jpg);
              height: 103vh;
              ">
    <!-- <div class="mask text-white" style="background-color: rgba(0, 0, 0, 0.671)"> -->
      <div
    class="mask"
    style="
      background: linear-gradient(
        45deg,
        rgba(224, 146, 28, 0.3),
        rgba(29, 15, 4, 0.7) 100%
      );
    "
  >
  <div style="margin-top:90px;"  class="text-center text-warning">
      <h1 class="font-weight-bold">Welcome To Admin Panel</h1> <br>
  </div>
      
      <div class="container">
      <div class="row">
      <div class="col-sm-4">
      <div class="card">
  <img src="img/reg1.jpg" class="card-img-top" alt="...">
  <div class="card-body text-center">
    <h5 class="card-title">Registered Users</h5>
    <button style="width:100%;" type="button"  class="btn btn-dark" data-mdb-ripple-color="dark"> <a href="register_users.php" class="text-white" > View </a> </button>
    </div>
</div>
      </div>
      <div class="col-sm-4">
      <div class="card">
  <img src="img/tour.jpg" class="card-img-top" alt="...">
  <div class="card-body text-center">
    <h5 class="card-title">Manage Packages</h5>
    <button style="width:100%;" type="button"  class="btn btn-dark" data-mdb-ripple-color="dark"> <a href="manage_packs.php" class="text-white" > view and manage Packages </a> </button>
          </div>
</div>
      </div>
      <div class="col-sm-4">
      <div class="card">
  <img src="img/book.jpg" class="card-img-top" alt="...">
  <div style="box-shadow: 0px 2px 10px rgba(0,0,0,0.9);" class="card-body">
    <h5 class="card-title text-center">Booking details</h5>
    <button style="width:100%;" type="button"  class="btn btn-dark" data-mdb-ripple-color="dark"> <a href="bookings.php" class="text-white" > bookings </a> </button>
    </div>
</div>
      </div>
      </div>
      </div>
        
            
      </div>
    </div>

<?php
    require_once 'footer.php';
?>