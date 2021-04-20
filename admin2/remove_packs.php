<?php
require_once '../config.php';
require_once 'header 1.php';

$output ="";

if (isset($_POST['del'])) {

	$pack_id = $_POST['pack_id'];

	$sql = "DELETE FROM packages WHERE pack_id = '$pack_id' ";

	if (mysqli_query($link,$sql)) {
		$output = '<div class="alert alert-success">Books Removed successfully</div>';
	}else {
		$output = '<div class="alert alert-danger">Error occured try again </div>';
	}
}

?>
<html>
	<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&family=Playfair+Display:wght@800&display=swap" rel="stylesheet">  
  <style>
      *{
        font-family: 'Montserrat', sans-serif;

      }
		
			</style>

</head>

 
<div
       id="intro"
       class="bg-image"
       style="
              background-image: url(img/remo.jpg);
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
    <form class="d-flex input-group w-auto form-inline" method="post" >
      <input type="text" class="form-control" name="pack_id" placeholder="Enter Package Id" aria-label="Search"/>&nbsp;&nbsp;
      <input class="btn btn-outline-light text-white" name="del" type="submit" value="Delete" data-mdb-ripple-color="dark" style="background-color:#FF9800";>
      </form>
      <br> <br> 
      <?php echo $output; ?> 
  </div>

</div> 

<?php require_once 'footer.php';?>