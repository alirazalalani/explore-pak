<?php
session_start();
include_once '../config.php';
$var=$_POST['action'];
switch ($var){ 
    case 'add_to_cart':
        $pack_id=$_POST['pack_id'];
        $pack_name=$_POST['pack_name'];
        $pack_img=$_POST['pack_img'];
        $hotel=$_POST['hotel'];
        $stay=$_POST['stay'];
        $guide=$_POST['guide'];
        $price=$_POST['price'];
        $user_id=$_SESSION['id'];
        $quantity=$_POST['quantity'];

    // $book_id= 1;
    //     $book_name='lali';
    //     $image="alal";
    //     $price=400;
    //     $user_id=$_SESSION['id'];
    //     $quantity=1;
                $sql="SELECT * from cart where user_id=$user_id and pack_id=$pack_id";
     $result=mysqli_query($link,$sql);
     if(mysqli_num_rows($result)==1){
         $status='<div class="alert alert-danger" role="alert" >Already Added</div>';
     }
     else{
         $sql="INSERT into cart(pack_id,pack_name,pack_img,price,total_price,quantity,user_id) VALUES('$pack_id','$pack_name','$pack_img','$price','$price','$quantity',$user_id)";

         if(mysqli_query($link,$sql)){
            $status='<div class="alert alert-success" role="alert">Package Added</div>';
         }
         else{
            $status='<div class="alert alert-danger" role="alert" 
            data-auto-dismiss="2000">Cannot Add</div>';
         }
     }
     echo $status; 
        break;
    default:
    break;    

}

?>
