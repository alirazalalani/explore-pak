<?php
    require_once 'header 1.php';
    // require_once 'login_check.php';
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

<div
       id="intro"
       class="bg-image"
       style="
              background-image: url(img/book1.jpg);
              height: 100vh;"
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

</div>
<br> <br> <br>
<div class="container">
    <form class="d-flex input-group w-auto">
      <input type="search" class="form-control" placeholder="Enter Username" aria-label="Search"/>&nbsp;&nbsp;
      <button class="btn btn-outline-light text-white" type="button" data-mdb-ripple-color="dark"> Search </button>
      <!-- <button class="btn btn-outline-light text-white" type="button" data-mdb-ripple-color="dark"> VieW All </button> -->
    </form>
  </div>

</div>

<?php
    require_once 'footer.php';
    ?>