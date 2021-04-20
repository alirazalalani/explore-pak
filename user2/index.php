<?php
require_once 'header.php';
require_once '../config.php';

$output = "";

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
<div class="container-fluid" style="margin-top:10%;">
    <div class="row">
        <div class="col-sm-12 text-center" style=" font-size:35px;" >
            PACKAGES AVAILABLE
        </div>
<div class="col-sm-12">
    <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link "   href="#3" style="color: black; font-size:20px;">3 STAR PACKAGES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#4" style="color: black;  font-size:20px;">4 STAR PACKAGES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#5" style="color: black; font-size:20px;">5 STAR PACKAGES</a>
        </li>
     
      </ul>
    </div>
    </div>
    </div>
    <br><br>
    <br> 
  <div class = "container-fluid">
      <div class ="heading" id="3" style="margin-top:3%; font-size: 30px;
          text-align: center; font-size:35px;">3 STAR PACKAGES</div>
      <div class="row text-center" style="margin-top:5%">
          <?php
          $output='';
          $sql = "SELECT* FROM packages WHERE category ='3 Star Package' ORDER BY pack_id ASC";
          $result=mysqli_query($link,$sql);
          while($row=mysqli_fetch_array($result)){
              $output .='
              <div class ="col-sm-4 text-center " id = "product">
                  <img src="'.$row['pack_img'].'" width=70% height="220" id="img">
                  <h3 style = "font-size:large; font-size:35px">'.$row['pack_name'].'</h3>
                  <h4 style = "font-size:medium; font-size:20px">'.$row['hotel'].'</h4>
                  <h4 style = "font-size:medium; font-size:20px">'.$row['stay'].'</h4>
                  <h5 style = "font-size:medium; font-size:20px">By'.$row['guide'].'</h5>
                  <h6 style = "font-size:larger;color:red;
                  font-family:Verdana ">Rs: '.$row['price'].'</h6>
                  <form method = "post" class="form-item">
                      <input type = "hidden" name ="pack_id" id="pack_id'.$row['pack_id'].'"
                       value = "'.$row['pack_id'].'">
                 <input type = "hidden" name ="pack_name" id="pack_name'.$row['pack_id'].'" value = "'
                      .$row['pack_name'].'"> 
                      <input type = "hidden" name ="pack_img" id="pack_img'.$row['pack_id'].'" value = "
                      '.$row['pack_img'].'">
                      <input type = "hidden" name ="hotel" id="hotel'.$row['pack_id'].'" value = "
                      '.$row['hotel'].'">
                      <input type = "hidden" name ="stay" id="stay'.$row['pack_id'].'" value = "
                      '.$row['stay'].'">
                      <input type = "hidden" name ="guide" id="guide'.$row['pack_id'].'" value = "
                      '.$row['guide'].'">
                      <input type = "hidden" name ="price" id="price'.$row['pack_id'].'" value = "'
                      .$row['price'].'">';
                      if(!isset($_SESSION['loggedin'])){
                          $output .= '<h5><input type = "submit" name = "submit"
                          value="BOOK ORDER"  class="btn btn-primary login"  style="width:80%;background-color:#FF9800 "></h5>';
                         
                        }
                        else{
                            $output .=' <button type="button" id="'.$row['pack_id'].'" name="add_to_cart" class="btn btn-primary" 
                            style="width:80%;background-color:#FF9800"><h5>BOOK ORDER</h5></button>';
                        }
                        $output.='</form></div>';
                      
        
          }
          echo $output;
                  
          ?>

        <br>
        

        
 </div>

 <div class ="heading" id="4" style="margin-top:3%; font-size: 30px;
          text-align: center; font-size:35px;">4 STAR PACKAGES</div>
      <div class="row text-center" style="margin-top:5%">
          <?php
          $output='';
          $sql = "SELECT* FROM packages WHERE category ='4 Star Package' ORDER BY pack_id ASC";
          $result=mysqli_query($link,$sql);
          while($row=mysqli_fetch_array($result)){
              $output .='
              <div class ="col-sm-4 text-center " id = "product">
                  <img src="'.$row['pack_img'].'" width=70% height="220" id="img">
                  <h3 style = "font-size:large; font-size:35px">'.$row['pack_name'].'</h3>
                  <h4 style = "font-size:medium; font-size:20px">'.$row['hotel'].'</h4>
                  <h4 style = "font-size:medium; font-size:20px">'.$row['stay'].'</h4>
                  <h5 style = "font-size:medium; font-size:20px">By'.$row['guide'].'</h5>
                  <h6 style = "font-size:larger;color:red;
                  font-family:Verdana ">Rs: '.$row['price'].'</h6>
                  <form method = "post" class="form-item">
                      <input type = "hidden" name ="pack_id" id="pack_id'.$row['pack_id'].'"
                       value = "'.$row['pack_id'].'">
                      <input type = "hidden" name ="pack_name" id="pack_name'.$row['pack_id'].'" value = "'
                      .$row['pack_name'].'">
                      <input type = "hidden" name ="pack_img" id="pack_img'.$row['pack_id'].'" value = "
                      '.$row['pack_img'].'">
                      <input type = "hidden" name ="hotel" id="hotel'.$row['pack_id'].'" value = "
                      '.$row['hotel'].'">
                      <input type = "hidden" name ="stay" id="stay'.$row['pack_id'].'" value = "
                      '.$row['stay'].'">
                      <input type = "hidden" name ="guide" id="guide'.$row['pack_id'].'" value = "
                      '.$row['guide'].'">
                      <input type = "hidden" name ="price" id="price'.$row['pack_id'].'" value = "'
                      .$row['price'].'">';
                      if(!isset($_SESSION['loggedin'])){
                          $output .= '<h5><input type = "submit" name = "submit"
                          value="BOOK ORDER"  class="btn btn-primary login"  style="width:80%;background-color:#FF9800 "></h5>';
                         
                        }
                        else{
                            $output .=' <button type="button" id="'.$row['pack_id'].'" name="add_to_cart" class="btn btn-primary" 
                            style="width:80%;background-color:#FF9800"><h5>BOOK ORDER</h5></button>';
                        }
                        $output.='</form></div>';
                      
        
          }
          echo $output;
                  
          ?>

        <br>
        

        
 </div>
 
 <div class ="heading" id="5" style="margin-top:3%; font-size: 30px;
          text-align: center; font-size:35px;">5 STAR PACKAGES</div>
      <div class="row text-center" style="margin-top:5%">
          <?php
          $output='';
          $sql = "SELECT* FROM packages WHERE category ='5 Star Package' ORDER BY pack_id ASC";
          $result=mysqli_query($link,$sql);
          while($row=mysqli_fetch_array($result)){
              $output .='
              <div class ="col-sm-4 text-center " id = "product">
                  <img src="'.$row['pack_img'].'" width=70% height="220" id="img">
                  <h3 style = "font-size:large; font-size:35px">'.$row['pack_name'].'</h3>
                  <h4 style = "font-size:medium; font-size:20px">'.$row['hotel'].'</h4>
                  <h4 style = "font-size:medium; font-size:20px">'.$row['stay'].'</h4>
                  <h5 style = "font-size:medium; font-size:20px">By'.$row['guide'].'</h5>
                  <h6 style = "font-size:larger;color:red;
                  font-family:Verdana ">Rs: '.$row['price'].'</h6>
                  <form method = "post" class="form-item">
                      <input type = "hidden" name ="pack_id" id="pack_id'.$row['pack_id'].'"
                       value = "'.$row['pack_id'].'">
                      <input type = "hidden" name ="pack_name" id="pack_name'.$row['pack_id'].'" value = "'
                      .$row['pack_name'].'">
                      <input type = "hidden" name ="pack_img" id="pack_img'.$row['pack_id'].'" value = "
                      '.$row['pack_img'].'">
                      <input type = "hidden" name ="hotel" id="hotel'.$row['pack_id'].'" value = "
                      '.$row['hotel'].'">
                      <input type = "hidden" name ="stay" id="stay'.$row['pack_id'].'" value = "
                      '.$row['stay'].'">
                      <input type = "hidden" name ="guide" id="guide'.$row['pack_id'].'" value = "
                      '.$row['guide'].'">
                      <input type = "hidden" name ="price" id="price'.$row['pack_id'].'" value = "'
                      .$row['price'].'">';
                      if(!isset($_SESSION['loggedin'])){
                          $output .= '<h5><input type = "submit" name = "submit"
                          value="BOOK ORDER"  class="btn btn-primary login"  style="width:80%;background-color:#FF9800 "></h5>';
                         
                        }
                        else{
                            $output .=' <button type="button" id="'.$row['pack_id'].'" name="add_to_cart" class="btn btn-primary" 
                            style="width:80%;background-color:#FF9800"><h5>BOOK ORDER</h5></button>';
                        }
                        $output.='</form></div>';
                      
        
          }
          echo $output;
                  
          ?>

        <br>
        

        
 </div>
        

        
 </div>

          
        </div>
     
        
 
       

<?php  require 'footer.php'; ?>








          
          

