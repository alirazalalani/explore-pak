<?php
require_once '../config.php';
$username = $password = "";
$username_err=$password_err = $error="";

if(isset($_POST['submit'])){

    if(empty($_POST['username'])){
        $username_err= "please enter username";

    }else{
        $username = test_input($_POST['username']);
    }
 if(empty($_POST['password'])){
    $password_err = "please enter password";
 }else{
    $password = test_input($_POST['password']);
 }

 if(empty($username_err) && empty($password_err))
 {
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($link,$sql);

    if(mysqli_num_rows($result)>0){
        session_start();
        $_SESSION['aloggedin'] = true;
        header('location: profile.php');
    }else{
        $error = "invalid login credentials";
    }
 }
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
require_once 'header.php';
?>
<html>
  <head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&family=Playfair+Display:wght@800&display=swap" rel="stylesheet">    <style>
      *{
        font-family: 'Montserrat', sans-serif;

      }
      </style>
      </head>
 <!-- Background image -->
 <div
       id="intro"
       class="bg-image"
       style="
              background-image: url(img/back1.jpg);
              height: 100vh;
              ">


                 <!-- <div class="mask text-white" style="background-color: rgba(0, 0, 0, 0.671)"> -->
      <div
    class="mask"
    style="
      background: linear-gradient(
        45deg,
        rgba(224, 146, 28, 0.4),
        rgba(29, 15, 4, 0.5) 100%
      );
    "
  >

<br> <br> <br> <br> <br> <br> <br>

<div class="header">
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-5">
            <h1 class="text-white text-center font-weight-bold"  style="margin-top:10px; font-size:50px;">Admin Login Panel</h2>
             <span class="text-danger"> <?php echo $error; ?></span> 
            <form class="" action="" method="post">
                <div class="form-group">
                    <label class="text-white " style="font-size:20px; margin-top:10px"for="">Username</label>
                    <input style="background-color: rgba(0, 0, 0, 0.471); " type="text" name="username" value="" class="form-control" placeholder="Enter UserName">
                    <span class="text-danger"><?php echo $username_err; ?> </span>
    </div>
            <div class="form-group">
                    <label class="text-white" for="" style="font-size:20px;">Password</label>
                    <input style="background-color: rgba(0, 0, 0, 0.471);" type="password" name="password" value="" class="form-control" placeholder="Enter Passowrd">
                    <span class="text-danger"> <?php echo $password_err; ?></span>
    </div>  <br>
    <div class="form-group">
                
                    <input type="submit" name="submit" value="Login"  style=" color:white; background-color:#FF9800; padding:6px; width:100px; border:1px solid black; border-radius:7px">
                </div>
                    
</form>
</div>
<div class="col-sm-3"></div>
</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br>
<?php
    require_once 'footer.php';
?>

