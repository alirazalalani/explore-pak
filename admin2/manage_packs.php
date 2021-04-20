<?php
    require_once 'header 1.php';
    require_once '../config.php';
    // require_once 'login_check.php';
?>
<html>
  <head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&family=Playfair+Display:wght@800&display=swap" rel="stylesheet">    <style>
      *{
        font-family: 'Montserrat', sans-serif;

      }
      .card{
        text-align: center;
            transition-property: all;
            transition-duration: 1s;
            transition-timing-function: ease-in-out;
      }
      .card:hover{
        transform:rotate(360deg)
      }
      </style>
</head>

<div
       id="intro"
       class="bg-image"
       style="
              background-image: url(img/kk.jpg);
              height: 93vh;"
>
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
<div class="container">
<div style="margin-top:90px "  class="text-center text-warning ">
      <h1 style="color:white; font-weight:bold; margin-top:120px;">Welcome To Packages Management Section</h1> <br>
  </div>
      
      <div class="container" style="margin-top:50px">
      <div class="row">
      <div class="col-sm-4">
      <div class="card" style="width: 18rem;margin-left:10px;">
  <img class="card-img-top" src="img/add.jpg" alt="Card image cap">
  <div class="card-body">
  <button style="width:100%;" type="button"  class="btn btn-dark" data-mdb-ripple-color="dark"> <a href="add_packs.php" class="text-white" > add packages </a>  
  <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  </div>
</div>
      </div>
      <div class="col-sm-4" >
      <div class="card" style="width: 18rem; margin-left:50px;">
  <img class="card-img-top" src="img/view.jpg" alt="Card image cap">
  <div class="card-body">
  <button style="width:100%;" type="button"  class="btn btn-dark" data-mdb-ripple-color="dark"> <a href="view_packs.php" class="text-white" > view packages </a> </button>
  
  <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  </div>
</div>
</div>

      <div class="col-sm-4">
      <div class="card" style="width: 18rem;margin-left:100px;">
  <img class="card-img-top" src="img/rem.jpg" alt="Card image cap">
  <div class="card-body">
  <button style="width:100%;" type="button"  class="btn btn-dark" data-mdb-ripple-color="dark"> <a href="remove_packs.php" class="text-white" > remove packages </a> </button>

  <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  </div>
</div>
</div>
      </div>
      </div>
      </div>

  </div>

</div>

</div>
</html>

<?php
require_once 'footer.php';
?>