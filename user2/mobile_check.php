<?php 
require_once '../config.php';
$mobile=$_POST['mobile'];
$outputt="";
if(empty($mobile)){
    $outputt = '<div class = "alert alert-danger">error occured try again</div>';
}
else{
    $sql="SELECT * FROM login WHERE mobile= '$mobile'";
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