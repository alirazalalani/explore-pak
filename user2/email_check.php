s<?php 
require_once '../config.php';
$email=$_POST['email'];
$outputt="";
if(empty($email)){
    $output = '<div class = "alert alert-danger">error occured try again</div>';
}
else{
    $sql="SELECT * FROM login WHERE username= '$email'";
    $result=mysqli_query($link,$sql);
      if(mysqli_num_rows($result)>0){
         $outputt= 1;
    }
  
    else{
        $outputt =0;
    }
   
}
echo $outputt;

?>
