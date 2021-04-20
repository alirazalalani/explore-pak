<?php
require_once '../config.php';
require_once 'header 1.php';

$output ="";
$users="";

if(isset($_POST['q'])) {
	$pack_id = test_input($_POST['pack_id']);
	$sql = "SELECT * FROM packages WHERE pack_id = '$pack_id'";

	$result = mysqli_query($link,$sql);

	if(mysqli_num_rows($result)>0)
	{
		while ($row = mysqli_fetch_array($result)) {
			 $output = ' <table class="table text-white">
       	<tr>
       		<th>Package_id</th>
       		<th>Package Name</th>
       		<th>Hotel</th>
       		<th>Stay Duration</th>
       		<th>Guide</th>
           <th>Price</th>
           <th>Category</th>
           <th>Image</th> 
       	</tr>
       	<tr>
       		<td>'.$row['pack_id'].'</td>
       		<td>'.$row['pack_name'].'</td>
           <td>'.$row['hotel'].'</td>
           <td>'.$row['stay'].'</td>
       		<td>'.$row['guide'].'</td>
       		<td>'.$row['price'].'</td>
           <td>'.$row['category'].'</td>
       		<td><img src="'.$row["pack_img"].'" height="250" width="250"></td>
       	</tr>
       </table>';
		}

	}else{
		$output = '<div class="alert alert-danger">No record found</div>';
	}
}

if(isset($_POST['all'])) {
	$sql = "SELECT * FROM packages";

	$result = mysqli_query($link,$sql);

	$packages = mysqli_num_rows($result);

	if(mysqli_num_rows($result)>0)
	{
        $output .= '
       <h4 class="text-white"> Total Books: '.$packages.'</h4>
        <table class="table text-white">
       	<tr>
         <th>Package_id</th>
         <th>Package Name</th>
         <th>Hotel</th>
         <th>Stay Duration</th>
         <th>Guide</th>
         <th>Price</th>
         <th>Category</th>
         <th>Image</th>
       	</tr>';

		while ($row = mysqli_fetch_array($result)) {
			 $output .= ' 
       	<tr>
         <td>'.$row['pack_id'].'</td>
         <td>'.$row['pack_name'].'</td>
         <td>'.$row['hotel'].'</td>
         <td>'.$row['stay'].'</td>
         <td>'.$row['guide'].'</td>
         <td>'.$row['price'].'</td>
         <td>'.$row['category'].'</td>
         <td> <div class="card-body"> <img height="200px" width="200px" src="'.$row["pack_img"].' "  </div> </td>
       	</tr>';
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
              background-image: url(img/hello.jpg);
              height: 300vh;
              ;"
>
<div
    class="mask"
    style="
      background: linear-gradient(
        45deg,
        rgba(224, 146, 28, 0.1),
        rgba(29, 15, 4, 0.5) 100%
      );
    "
>

</div>
<br> <br> <br>
<div class="container">
    <form class="d-flex input-group w-auto form-inline" method="post" >
      <input type="text" class="form-control" name="pack_id" placeholder="Enter Package Id" aria-label="Search"/>&nbsp;&nbsp;
      <input class="btn btn-outline-light text-white" name="q" type="submit" value="search" data-mdb-ripple-color="dark">
      <button class="btn btn-outline-light text-white" name="all" type="submit" data-mdb-ripple-color="dark"> VieW All </button>
    </form>
    <br> <br>
    
    <?php echo $output; ?>
 
  </div>
</div>

<?php require_once 'footer.php';?>