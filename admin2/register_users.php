<?php
require_once '../config.php';
require_once 'header 1.php';

$output ="";
$users="";

if(isset($_POST['q'])) {
	$username = test_input($_POST['username']);
	$sql = "SELECT * FROM login WHERE username = '$username'";

	$result = mysqli_query($link,$sql);

	if(mysqli_num_rows($result)>0)
	{
		while ($row = mysqli_fetch_array($result)) {
			 $output = '<table class="table text-white">
       	<tr>
       		<th>user_id</th>
       		<th>Username</th>
       		<th>name</th>
       		<th>Mobile</th>
       	</tr>
       	<tr>
       		<td>'.$row['user_id'].'</td>
       		<td>'.$row['username'].'</td>
       		<td>'.$row['name'].'</td>
       		<td>'.$row['mobile'].'</td>
       	</tr>
       </table>';
		}

	}else{
		$output = '<div class="alert alert-danger">No record found</div>';
	}
}

if(isset($_POST['all'])) {
	$sql = "SELECT * FROM login";

	$result = mysqli_query($link,$sql);

	$users = mysqli_num_rows($result);

	if(mysqli_num_rows($result)>0)
	{
        $output .= '
       <h4 class="text-white"> Total Users: '.$users.'</h4>
        <table class="table text-white">
       	<tr>
       		<th>user_id</th>
       		<th>Username</th>
       		<th>name</th>
       		<th>Mobile</th>
       	</tr>';

		while ($row = mysqli_fetch_array($result)) {
			 $output .= ' 
       	<tr>
       		<td>'.$row['user_id'].'</td>
       		<td>'.$row['username'].'</td>
       		<td>'.$row['name'].'</td>
       		<td>'.$row['mobile'].'</td>
       	</tr>
      ';
		}
		$output .= ' </table>';

	}else{
		$output = '<div class="alert alert-danger">No record found</div>';
	}
}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
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
              background-image: url(img/register.jpg);
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
<br><br> <br> 
<div class="container">
	<div class="row">
		<!-- <div class="col-sm-1"></div> -->
		<div class="col-12">
			<form class="form-inline" method="post">
    <input class="form-control mr-sm-2" name="username" type="text" placeholder="Enter username" aria-label="Search"> <br>
    <input class="btn btn-success text-white my-2 my-sm-0" name="q" type="submit" value="Search"> &nbsp;&nbsp; 
   <!--  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> &nbsp;&nbsp; -->
    <button class="btn btn-success  text-white my-2 my-sm-0" name="all" type="submit">View All</button> 
  </form> <br>

       <?php echo $output; ?>

		</div>
		<!-- <div class="com-sm-1"></div> -->
	</div>
</div>

</div>
</div>
<br> <br> <br>


<?php require_once 'footer.php';?>