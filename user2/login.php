<?php
require_once 'header1.php';
require_once '../config.php';

$username = $password = "";
$username_err = $password_err = $error ="";

if(isset($_POST['submit'])){
    if(empty($_POST['username'])){
    $username_err="please enter username";        
}
else{
    $username=mysqli_real_escape_string($link,$_POST['username']);

}
if(empty($_POST['password'])){
$password_err="please enter password ";
}
else{
    $password= mysqli_real_escape_string($link,$_POST['password']);
    
}
if(empty($username_err) &&  empty($password_err)){
    $sql="SELECT * FROM login WHERE username = '$username'";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            if(password_verify($password,$row['password'])){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['id']=$row['user_id'];
                $_SESSION['name']=$row['name'];
                header('location: index.php');
            }
            else {
                $error="Invalid username or password ";

            }
            
        }
    }
    else{
        $error="Invalid username or password ";
    }
}

}

?>

<hr>

<section class="static about-sec">
        <div class="container" style="margin-top:13%">
            <span id="help"> </span>
            <h1>My Account / Login</h1>
            <hr>
            <span class= "text-danger"><?php echo $error;
            ?>
            </span>
            <form class = " " method = "post">
                <div class=" form-group">
                    <i class = "fa fa-envelope"></i><label for = ""> &nbsp; &nbsp; Email </label>
                    <input type = " text" name = "username" id= "email" value = ""class ="form-control" placeholder = "Enter Email">

                    <span class= "text-danger"><?php echo $username_err?></span>
</div>
<div class=" form-group">
                    <i class = "fa fa-key"></i><label for = ""> &nbsp; &nbsp; Password </label>
                    <input type = "password" name = "password" id= "password" value = ""class ="form-control" placeholder = "Enter Password">
                    <span  class= "text-danger"><?php echo $password_err  ?></span>
</div>
<div class = "form-group">
    <input type = "submit" id ="submit" name = "submit" class ="btn btn-success"
    style = "width : 100%" value="Login"></input>
</div>
<hr>

                    </div>
</form>
</div>

<div class ="col-sm-4"> </div>
                    
    </section>

<footer class="text-center text-lg-start py-5 " style="background-color:rgba(0, 0, 0, 0.9); margin-top:5%;" >
  <!-- Copyright -->
  <div class="text-center p-3 " style="background-color:rgba(0, 0, 0, 0.9);">
    © 2020 Copyright:
    <a class="text-warning " href="#">ExplorePak.com</a>
  </div>

  <!-- Copyright -->
</footer>


</body>
    </html>


