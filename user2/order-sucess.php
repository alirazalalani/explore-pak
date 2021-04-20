<?php
include_once 'header.php';

include_once '../config.php';

//if(!isset ($_SESSION['order_id']))
////echo "<script> window.location.href = 'index.php'; </script>"}


$total_price =0;
$output ='';
$out = '';
$output ='';
$out = '';
foreach ($_SESSION['order_id'] as $key => $value){


    $sql = "SELECT * FROM orders WHERE user_id = $_SESSION[id] AND order_id ='$value'";

    $result = mysqli_query($link,$sql);

    while($row = mysqli_fetch_array($result)){

        $order_id = $row['order_id'];
        $output = '';
        $output.='<tr><td>'.$row['pack_name'].'</td>';
        $output.='<td> &#8360;'.$row['price'].'</td>';
        $output.='<td>'.$row['quantity'].'</td>';
        $output.='<td> &#8360;'.$row['total_price'].'</td></tr>';
        $total_price +=$row['total_price'];
        $dop = $row['date_of_purchase'];
        $status = $row['status'];
        $payment_method = $row['payment_method'];
        
        $out .= '<div class = "alert-secondary rounded-top p-2">
        <strong> ORDER ID: '.$row['order_id'].'</strong></div>
       <table class ="table table-dark">
       <tr><td> PACKAGE NAME</td>
       <td> PRICE</td>
       <td> QUANTITY</td>
       <td>TOTAL</td></tr>

       '.$output.'
       </table>';
    
    }
}
//unset($_SESSION['order_id']);




?>
<div class ="conatiner" style="margin-top:30%;margin-left:20px">
<div class ="row">
<div class="col-sm-12">

   
<div class = " alert alert-header text-success"> <strong> Thank you <?php echo $_SESSION['name']; ?> 
for shipping with us </strong>
<h6>Your order has been sucesfully placed. Your order details are s follows:</h6>
<br></div>


<br>

<?php echo $out; ?>
<br>
<h6><strong>TOTAL AMOUNT :<?php echo '&#8360;' .$total_price?></strong></h6>
<span class = "badge badge-info"> KEEP THIS ORDER ID SAVED FOR THE FUTURE REFRENCE OF YOUR ORDER
</span>

 



</div>
 


</div>
</div>







