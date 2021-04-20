<?php
include_once 'header.php';
include_once '../config.php';

$user_id = $_SESSION['id'];
$status = $pack_id = '';

if (isset($_POST['remove'])){

       $pack_id = $_POST['pack_id'];
       $sql = "DELETE FROM cart WHERE user_id = $user_id AND pack_id = '$pack_id'";
      $result = mysqli_query($link,$sql);
      if($result){
          $status='<div class= "alert alert-success">Item deleted from cart</div>';
      }else{
        $status='<div class= "alert alert-danger">Cannot delete from cart</div>';
      }
}
if (isset($_POST['update'])){

    $pack_id = $_POST['pack_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total = (float)$quantity*(float)$price;
    $sql = "UPDATE cart SET quantity=$quantity,total_price=$total WHERE $user_id=$user_id
    AND pack_id=$pack_id";
   $result = mysqli_query($link,$sql);
   if($result){
       $status='<div class= "alert alert-success">Cart updated</div>';
   }else{
     $status='<div class= "alert alert-danger">Cannot update the cart</div>';
   }
}

?>
<div class="container" style="margin-top:20%">
<div class = "row">
<div class= " col-sm-2"></div>
<div class= " col-sm-8">
<span> <?php echo $status; ?></span>
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
    <form method= "post">
    <input type = "hidden" name="pack_id" value="<?php echo $row['pack_id']; ?>">
    <button type = "submit" name ="remove" class="btn btn-sm btn-danger">Remove</button>
    </form>

    
    
    </td>
    <td><?php  echo "&#8360; ".$row['price'];?></td>
<td><form method = "post">
<div class = "form-group">
<input type = "hidden" name="pack_id" value="<?php echo $row['pack_id']; ?>">
<input type = "hidden" name="price" value="<?php echo $row['price']; ?>">
<span class="badge badge-info">
<?php echo $row['quantity']; ?></span>
<select name = "quantity">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>

</select> 
<button type = "submit" name="update" class="btn btn-primary" >update</button>
</div>
</form>

</td>  
<td> <?php echo  "&#8360; ".(float)$row['price']*(float)$row['quantity']; ?></td> 

    
    
    </tr>





<?php }


?>
 </table>
 <div class="total">
 <?php 
 $total_price=0;
 $sql="SELECT * FROM cart WHERE pack_id='$pack_id'";
 $result=mysqli_query($link,$sql);
 while($row = mysqli_fetch_array($result)){
     $total_price = $total_price + $row['total_price'];
 }
 ?>
 <span class="text-primary float-right">
<!-- <h5><?php // echo  "TOTAL PRICE: &#8360; ".$total_price;?></h5> -->
 </span>
 <br><br>
 <a href="checkout.php"><button type="submit" class="btn btn-success float-right">
 <i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbsp;Checkout</button></a>
 </div>
<?php
       }
?>

</div>
<div class= " col-sm-2"></div>
</div>
</div>
