<?php
include_once 'header.php';
include_once '../config.php';
$user_id=$_SESSION['id'];
$checkout_id=$_SESSION['checkout_id'];
$output='';
$sql="select * from address where user_id=$user_id and checkout_id='$checkout_id'";
$result=mysqli_query($link,$sql);
if($result){
    while($row= mysqli_fetch_array($result)){
        $output .= '<h5>'.$row['name'].'</h5>
                    <br>
                    <h5>'.$row['address'].'</h5>  
                    <br>
                    <h5>Mobile Num:- '.$row['mobile'].'</h5>';
    }
}



if(isset($_POST['pay'])){
    $sql="SELECT * from cart where user_id=$user_id";
    $result=mysqli_query($link,$sql);
    if(!$result){
        echo "Error Occured";
    }
    else{
        $q="select * from address where checkout_id='$checkout_id'";
        $res=mysqli_query($link,$q);
        while($row=mysqli_fetch_array($res)){
            $address_id=$row['address_id'];  // address id of address table id done

        }
        $_SESSION['address_id']=$address_id;  // address id of address table id done
        $i=0;

        while($row=mysqli_fetch_array($result)){
            $q1="INSERT into orders(`sno`, `order_id`, `pack_id`,
             `pack_name`, `img`, `price`, `quantity`, `total_price`,
              `user_id`, `date_of_purchase`, `status`, `payment_method`, `paid`) values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $q2="INSERT into order_address (id,address_id,order_id) values(?,?,?)";    
            $q3="DELETE FROM cart where user_id=?";
            
            $stmt1=mysqli_prepare($link,$q1);
            $stmt2=mysqli_prepare($link,$q2);
            $stmt3=mysqli_prepare($link,$q3);

            mysqli_stmt_bind_param($stmt1,'isssssissssss',$param_sno,$param_order_id,  $param_pack_id,$param_packname,
        $param_img,$param_price,$param_quantity,$param_total_price,$param_user_id,$param_dop,$param_status,$param_payment_method,
        $param_paid);

            mysqli_stmt_bind_param($stmt2,'iis',$param_id,$param_address_id,$param_order_id); 
            
            mysqli_stmt_bind_param($stmt3,'i',$param_user_id);

            $param_sno='';
            $param_order_id=rand().$user_id;
            $_SESSION['order_id'][$i]=$param_order_id;
            $param_pack_id=$row['pack_id'];
            $param_packname=$row['pack_name'];
            $param_img=$row['pack_img'];
            $param_price=$row['price'];
            $param_quantity=$row['quantity'];
            $param_total_price=$row['total_price'];
            $param_user_id=$user_id;
            $param_dop= date('Y-m-d H:i:s');
            $param_status="order placed";
            $param_payment_method="COD";
            $param_paid='no';
            $param_id=''; // address id of address table id
            $param_address_id=$address_id;


            if(mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2) && mysqli_stmt_execute($stmt3)){
                unset($_SESSION['checkout_id']);
                echo "<script>  window.location.href='order-sucess.php'; </script>";
            }
            $i++;

        }
    }
}

?>

<div class="container" style="margin-top:100px">
<div class="row">
<div class="col-sm-5 p-4 mr-5" style="height: 300px; box-shadow: 5px 5px 10px;">
<h4 class="text-success">Delivery Address</h4>
<br>
<?php echo $output; ?>
</div>
<div class="col-sm-6" style="height: 300px;
 box-shadow: 5px 5px 10px; overflow-y: scroll;">
 <?php
       $sql="SELECT *FROM cart WHERE user_id=$user_id";
       $result=mysqli_query($link,$sql);
       if(mysqli_num_rows($result)<1) {
           echo "<h3 class='text-success'>YOUR CART IS EMPTY</h3>";
           echo"<img src='images/empty1.gif'>";
       }
       else{
?>
<h3 class= "text-success">MY SHOPPING CART</h3>
<table class="table">
<tr>
<td>PRODUCT</td>
<td>PRICE</td>
<td>QUANTITY</td>
<td>TOTAL</td>
</tr>
<?php 

while($row=mysqli_fetch_array($result)){
    ?>
    <tr>
    <td><?php echo '<img src ="'.$row['pack_img'].'" height = "100" width="100" >';
    echo "<br>" .$row['pack_name'];?>
    <br>
    

    
    
    </td>
    <td><?php  echo "&#8360; ".$row['price'];?></td>
<td>
<?php echo $row['quantity']; ?>
</td>  
<td> <?php echo  "&#8360; ".(float)$row['price']*(float)$row['quantity']; ?></td> 
    
    
    </tr>





<?php }


?>
 </table>
 <div class="total">
 <?php 
 $total_price=0;
 $sql="SELECT * FROM cart WHERE $user_id=$user_id";
 $result=mysqli_query($link,$sql);
 while($row = mysqli_fetch_array($result)){
     $total_price=$total_price + $row['total_price'];
 }
 ?>
 <span class="text-primary float-right">
 <h5><?php echo  "TOTAL PRICE: &#8360; ".$total_price;?></h5>
 </span>
 
 </div>
<?php
       }
?>  
</div>
</div>

<div class="row mt-5">
<div class="col-sm-5 p-3" style="height:200px; box-shadow:5px 5px 10px;">
          <h4 class="text-success">Payment Method</h4>
          <br>
          <h5>Cash On Delivary</h5>
          <form method="post">
          <button type="submit" class="btn btn-success" name="pay">Pay</button>
          </form>

</div>
</div>


</div>


