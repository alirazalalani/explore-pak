
<footer class="text-center text-lg-start container-fluid" style="background-color:rgba(0, 0, 0, 0.9); margin-top:3%; width:100%;" >
  <!-- Copyright -->
  <div class="text-center p-3 " style="background-color:rgba(0, 0, 0, 0.9);">
    © 2020 Copyright:
    <a class="text-warning " href="#">ExplorePak.com</a>
  </div>

  <!-- Copyright -->
</footer>


<!-- The Modal -->
<div class="modal" id="loginmodal">
  <div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text">LOGIN TO </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <span id="help" class="text-danger"></span>
      <form class = " " method = "post">
                <div class=" form-group">
                    <i class = "fa fa-envelope"></i><label for = ""> &nbsp; &nbsp; Email </label>
                    <input type = " email" name = "username" id= "username" value = ""class ="form-control" placeholder = "Enter Email">

               <!--     <span class= "text-danger"><?php echo $username_err?></span>  -->
</div>
<div class=" form-group">
                    <i class = "fa fa-key"></i><label for = ""> &nbsp; &nbsp; Password </label>
                    <input type = "password" name = "password" id= "password" value = ""class ="form-control" placeholder = "Enter Password">
                 <!--   <span  class= "text-danger"><?php echo $password_err  ?></span> -->
</div>
<div class = "form-group">
   <input type="submit" id="submit" name="submit" class="btn btn-success" 
   style="width:100%" value="Login">
</div>
<div class = "model-footer text-center">
  <h5>New To ExplorePak? <a href="signup.php">JOIN NOW</h5>
</div>
    </div>
  </div>





<script type ="text/javascript">

$(document).ready(function(){

 

  $('.login').click(function( event){
       
       event.stopPropagation();
       event.stopImmediatePropagation();
       $('#loginmodal').modal('show');
       return false;


  });


 cart_count();

function cart_count(){

    $.ajax({


        url:'count_cart.php',
        method: "POST",
        dataType: "text",
        success:function(data){

            
            $('#countcart').html(data);
           // window.localStorage.setItem('cartItemCount',data);
        }

    });
}

$('button[type=button]').click(function(){
    var id=$(this).attr("id");
    var pack_id=$('#pack_id'+id+'').val();
    var pack_name=$('#pack_name'+id+'').val();
    var pack_img=$('#pack_img'+id+'').val();
    var hotel=$('#hotel'+id+'').val();
    var stay=$('#stay'+id+'').val();
    var guide=$('#guide'+id+'').val();
    var price=$('#price'+id+'').val();
    var quantity=1;
    var action="add_to_cart";

    $.ajax({
        url:"cart_process.php",
        method: "post",
        dataType: "text",
        data: {pack_id:pack_id,pack_name:pack_name,
          pack_img:pack_img,hotel:hotel,stay:stay,guide:guide,price:price,quantity:quantity,action:action},
        success:function(msg){

            cart_count();
            $('#status').html(msg);
            window.setTimeout(function(){
                $(".alert").fadeTo(500,0).slideUp(500,function(){
                    $(this).remove();
                });
            },2000);

        }
    });
    $('.checkout').click(function(){
$('#checkoutform').addClass('was-validated');
});
});
/*
  *$('#login').click(function(){
      var username=$('#username').val();
      var password=$('#password').val();


      if(username=='' || password==''){
         $('#help').html("both fields are required");

      } 
      else{
        $.ajax{
          url:"loginprocess.php",
          method: "POST",
          dataType: "text",
          data:{username:username, password:password},
          success:function(msg){
              if(msg==1){
                  window.location.href= window.location.href;

              }else{
                  $('#help').html("invalid user or password");
              }
          }
      });    
      }
      



});

*/


});
var updateCart = () =>{
  var cartCount = parseInt(window.localStorage.getItem('cartItemCount'));
  window.localStorage.setItem('cartItemCount',cartCount+1);

};
</script>
</body>
</html>