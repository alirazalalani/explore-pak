<?php
  require_once 'header 1.php';
  require_once '../config.php';

  $pack_name_err = $hotel_name_err = $guide_name_err = $price_err = $category_err = $stay_err = $image_err ="";
  $package_name = $guide_name = $price = $category = $image = $hotel_name = $stay = $temp_name = $status = "";

  if(isset($_POST['submit']))
  {
    // validate package name
    if(empty($_POST['pack_name']))
    {
      $pack_name_err = "please enter package name";
    }
    else{
      $package_name = test_input($_POST['pack_name']);
      $name_pattern = '/^[a-zA-Z ]+$/';
      if(!preg_match($name_pattern , $package_name))
      {
        $pack_name_err = "please enter valid package name";
      }
    }

    // validate hotel name
    if(empty($_POST['hotel']))
    {
      $hotel_name_err = "please enter hotel name";
    }
    else{
      $hotel_name = test_input($_POST['hotel']);
      $hotel_name_pattern = '/^[a-zA-Z ]+$/';
      if(!preg_match($hotel_name_pattern , $hotel_name))
      {
        $hotel_name_err = "please enter valid hotel name";
      }
    }

    //validate stay
    if(empty($_POST['stay']))
    {
      $stay_err = "please enter stay duration";
    }
    else{
      $stay = test_input($_POST['stay']);
      $stay_pattern = '/^[a-zA-z 0-9]+$/';
      if(!preg_match($stay_pattern , $stay))
      {
        $stay_err = "please enter valid stay duration";
      }
    }

    // validate guide name
    if(empty($_POST['guide']))
    {
      $guide_name_err = "please enter guide name";
    }
    else{
      $guide_name = test_input($_POST['guide']);
      $guide_pattern = '/^[a-zA-Z ]+$/';
      if(!preg_match($guide_pattern , $guide_name))
      {
        $guide_name_err = "please enter valid guide name";
      }
    }


    //validate price
    if(empty($_POST['price']))
    {
      $price_err = "please enter price";
    }
    else{
      $price = test_input($_POST['price']);
      $price_pattern = '/^[0-9]+$/';
      if(!preg_match($price_pattern , $price))
      {
        $price_err = "please enter valid price";
      }
    }

    // validate category
    if(empty($_POST['category']))
    {
      $category_err = "please enter category";
    }
    else{
      $category = test_input($_POST['category']);
      $category_pattern = '/^[a-zA-Z 0-9]+$/';
      if(!preg_match($category_pattern , $category))
      {
        $category_err = "please enter valid category";
      }
    }

    // validate package image
    if(!isset($_FILES['pack_img']))
    {
      $image_err = "please select an image";
    }
    else
    {
      $target  = "img/";
          $file_name = $_FILES['pack_img']['name'];
          $file_type = $_FILES['pack_img']['type'];
          $file_size = $_FILES['pack_img']['size'];
          $temp_name = $_FILES['pack_img']['tmp_name'];
          $allowed = array('jpg' => 'image/jpg' , 'jpeg' => 'image/jpeg' );

      if(!in_array($file_type , $allowed))
      {
        $image_err = "please select jpg/jpeg file";
      }

      $maxsize = 1 * 1024 * 1024;
      if($file_size > $maxsize)
      {
        $image_err = "file size is greater than 1 MB";
      }

      if(in_array($file_type , $allowed) && ($file_size < $maxsize) && $_FILES['pack_img']['error']===0)
      {
        $new_name = rand().$file_name;
        $target = $target.$new_name;
        $image = $target;

        move_uploaded_file($temp_name , $target);

      }
  
    }

    if(empty($pack_name_err) && empty($guide_name_err) && empty($price_err) && empty($category_err) && empty($image_err) )
    {
      $sql = "INSERT INTO packages values('' , '$package_name' , '$image', '$guide_name' , '$price' , '$category' , '$hotel_name' , '$stay')";

      if(mysqli_query($link , $sql))
      {
        $status = '<div class="alert alert-success"> Package Is Successfully Added </div>';
      }
      else
      {
        $status = '<div class="alert alert-success"> Error Occured In Adding Package </div>';
      }
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
      h2{
        width:110%;
        margin-bottom:25px;
        font-size:40px;
        margin-left:-23px;
      }
      </style>
      </head>

<div
       id="intro"
       class="bg-image"
       style="
              background-image: url(img/ll.jpg);
              height: 130vh;
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
  <!-- form starts -->
  <div style="margin-top:100px;" class="container">
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  <br>
  <h2 class="text-white text-center font-weight-bold " >Provide Details To Add Package</h1>
  <span> <?php echo $status;  ?> </span>
  <!-- form content starts -->
  <form style="color:white;" class="form" method="post" enctype="multipart/form-data" >
  <!-- package name -->
  <div class="form-group">
    <label for="">Package Name</label>
    <input style="background-color: rgba(0, 0, 0, 0.471)" type="text" name="pack_name" value="" class="form-control text-white">
    <span class="text-danger" > <?php  echo $pack_name_err; ?> </span>
  </div>
  <!-- hotel name -->
  <div class="form-group">
    <label for="">Hotel Name</label>
    <input style="background-color: rgba(0, 0, 0, 0.471)" type="text" name="hotel" value="" class="form-control text-white">
    <span class="text-danger" > <?php  echo $hotel_name_err; ?> </span>
  </div>
  <!-- stay -->
  <div class="form-group">
    <label for="">Stay Duration</label>
    <input style="background-color: rgba(0, 0, 0, 0.471)" type="text" name="stay" value="" class="form-control text-white">
    <span class="text-danger" > <?php  echo $stay_err; ?> </span>
  </div>
  <!-- guide name -->
  <div class="form-group">
    <label for="">Guide Name:</label>
    <input style="background-color: rgba(0, 0, 0, 0.471)" type="text" name="guide" value="" class="form-control text-white">
    <span class="text-danger" > <?php  echo $guide_name_err; ?> </span>
  </div>

  <!-- price -->
  <div class="form-group">
    <label for="">Price</label>
    <input style="background-color: rgba(0, 0, 0, 0.471)" type="text" name="price" value="" class="form-control text-white">
    <span class="text-danger" > <?php  echo $price_err; ?> </span>
  </div>

  <!-- Category -->
  <div class="form-group">
    <label for="">Category</label>
    <input style="background-color: rgba(0, 0, 0, 0.471)" type="text" name="category" value="" class="form-control text-white">
    <span class="text-danger" > <?php  echo $category_err; ?> </span>
  </div>

  <!-- Package Image -->
  <div class="form-group">
    <label for="">Upload Package Image</label>
    <input style="background-color: rgba(0, 0, 0, 0.471);" type="file" name="pack_img" value="" class="form-control text-white" >
    <span class="text-danger" > <?php  echo $image_err; ?> </span>
  </div>
  
  <br>
  <div class="form-group">
  <input type="submit" name="submit" value="Add Pack" style=" color:white; background-color:#FF9800; padding:6px; width:100px; border:1px solid black; border-radius:7px">

  </div>
  
</form>
  </div>
  <div class="col-sm-3"></div>
  </div>
  </div>
  <!-- form ends -->
      </div>
    </div>

</html>
<?php
    require_once 'footer.php';
?>