<?php
require_once 'header1.php';
require_once '../config.php';
?>
 <!-- Animated navbar -->

<hr>
<div class  = "container" style="margin-top:7%;">
<div class= "row">
<div class = "col-sm-4"> </div>
<div class = "col-sm-4">
    <span id = "help"></span>
<h4>REGISTER YOURSELF !!</h4>
<br>
<form class = ""action = "" method = "post">
<div class = "form-group">
<i class = "fa fa-envelope"></i> <label for = "">&nbsp;&nbsp;Email</label>
<input type = "text" name ="email" id = "email" value = "" class = "form-control" placeholder = "Enter Email" required>
<span id ="email-help"></span>
</div>
<div class = "form-group">
<i class = "fa fa-key"></i> <label for = "">&nbsp;&nbsp;Password</label>
<input type = "password" name ="password" id = "password" value = "" class = "form-control" placeholder = "Enter Password" required>
<span id ="pass-help"></span>
</div>
<div class = "form-group">
<i class = "fa fa-key"></i> <label for = "">&nbsp;&nbsp;Confirm Password</label>
<input type = "password" name ="cpassword" id = "cpassword" value = "" class = "form-control" placeholder = "Confirm password" required>
<span id ="cpass-help"></span>
</div>
<div class = "form-group">
<i class = "fa fa-user"></i> <label for = "">&nbsp;&nbsp;Full Name</label>
<input type = "text" name ="name" id = "name" value = "" class = "form-control" placeholder = "Enter Full Name" required>
<span id ="name-help"></span>
</div>
<div class = "form-group">
<i class = "fas fa-mobile"></i> <label for = "">&nbsp;&nbsp;Mobile</label>
<input type = "text" name ="mobile"  id="mobile"value = "" class = "form-control" placeholder = "Enter Mobile Number" required>
<span id ="mob-help"></span>
</div>
<div class = "form-group" style="margin-top:3%;">
<input type = "submit" id = "submit" value="Signup" class = " btn btn-block mybtn btn-primary tx-tfm" style = "width : 100%"></div>
</form>
</div>
<div class = "col-sm-4"></div>
</div>
</div>


<footer class="text-center text-lg-start py-5" style="background-color:rgba(0, 0, 0, 0.9); margin-top:3%;" >
  <!-- Copyright -->
  <div class="text-center p-3 " style="background-color:rgba(0, 0, 0, 0.9);">
    © 2020 Copyright:
    <a class="text-warning " href="https://mdbootstrap.com/">ExplorePak.com</a>
  </div>

  <!-- Copyright -->
</footer>

<script type = "text/javascript">
$(document).ready(function(){
    var validname=false;
    var validpass=false;
    var validcnfpass=false;
    var validemail=false;
    var validmob=false;  
    var email = "";
    var password="";
    var cpassword="";
    var mobile="";
    var name="";

   $('#email').blur(function(){
         email = $(this).val();
        var regex = /^\w+[\w\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/;
        if(email == ""||email == null){
            $('#email-help').html('<img src = "img/giphy.gif" height="50" width="50">');
            window.setTimeout(function(){
                $('#email-help').css("color","red");
            $('#email-help').html('&#10005; Please enter email');
            },500)
            validemail=false;
        }else{
            if(!regex.test(email)){
                $('#email-help').html('<img src = "img/giphy.gif" height="50" width="50">');
                window.setTimeout(function(){

                $('#email-help').css("color","red");
            $('#email-help').html('&#10005 ;invalid email address');},500);
            validemail=false;
            }
            else{
                $.ajax({
           url: 'email_check.php',
           method: 'post',
           data:{email:email},
           dataType:"text",
           success:function(data){
            if(data==1){
                $('#email-help').html('<img src = "img/giphy.gif" height="50" width="50">');
                window.setTimeout(function(){

                $('#email-help').css("color","red");
            $('#email-help').html('&#10005;  email address already register');},500);
            validemail=false;
            }
            else{
                $('#email-help').html('<img src = "img/giphy.gif" height="50" width="50">');
                window.setTimeout(function(){

                $('#email-help').css("color","green");
            $('#email-help').html('&#10003; valid email address');},500);
            validemail=true;
            }
            }
               
           });
                $('#email-help').html('<img src = "img/giphy.gif" height="50" width="50">');
                window.setTimeout(function(){

                $('#email-help').css("color","green");
            $('#email-help').html('&#10003; valid email address');},500);
            validemail=true;
            }
        }
   });
        $('#password').blur(function(){
         password = $(this).val();
        if(password==""||password==null){
        $('#pass-help').html('<img src = "img/giphy.gif" height="50" width="50">');
        window.setTimeout(function(){

         $('#pass-help').css("color","red");
         $('#pass-help').html('&#10005; please enter password');},500);
         validpass=false;
    }
    else if(password.length<5){
        $('#pass-help').html('<img src = "img/giphy.gif" height="50" width="50>');
        window.setTimeout(function(){

          $('#pass-help').css("color","red");
        $('#pass-help').html('&#10005; password  must be of 5 character');},500);
        validpass=false;
    }
    else{
        $('#pass-help').html('<img src = "img/giphy.gif" height="50" width="50">');
        window.setTimeout(function(){

                  $('#pass-help').css("color","green");
               $('#pass-help').html('&#10003; valid password');},500);
            validpass=true;
            }

});
       $('#cpassword').blur(function(){
            cpassword=$(this).val();
        var password = $('#password').val();
         if(cpassword==""||cpassword==null){
        $('#cpass-help').html('<img src = "img/giphy.gif" height="50" width="50">');
        window.setTimeout(function(){

         $('#cpass-help').css("color","red");
         $('#cpass-help').html('&#10005; please confirm the password');},500);
         validcnfpass=false;
    }
    else if((password !=cpassword) || (cpassword.length<5)){
        $('#cpass-help').html('<img src="img/giphy.gif" height="50" width="50">');
        window.setTimeout(function(){

           $('#cpass-help').css("color","red");
          $('#cpass-help').html('&#10005; confirm password  must be of 5 character');},500);
          validcnfpass=false;
    }
    else{
        $('#cpass-help').html('<img src = "images/giphy.gif" height="50" width="50">');
        window.setTimeout(function(){
                      $('#cpass-help').css("color","green");
                      $('#cpass-help').html('&#10003; password matched');},500);
                      validcnfpass=true;
    }
});
       $('#name').blur(function(){
            name=$(this).val();
        var regex= /^[a-zA-Z ]+$/;
         if(name=="" || name==null){
        $('#name-help').html('<img src = "img/giphy.gif" height="50" width="50">');
        window.setTimeout(function(){

         $('#name-help').css("color","red");
         $('#name-help').html('&#10005; please enter name');},500);
         validname=false;
    }
    else if(!regex.test(name)){
        $('#name-help').html('<img src="img/giphy.gif" height="50" width="50">');
        window.setTimeout(function(){

           $('#name-help').css("color","red");
          $('#name-help').html('&#10005; only character and spaces allowed');},500);
          validname=false;
    }
    else{
        $('#name-help').html('<img src = "img/giphy.gif" height="50" width="50">');
        window.setTimeout(function(){
                      $('#name-help').css("color","green");
                      $('#name-help').html('&#10003; valid name');},500);
                      validname=true;
    }
});
       $('#mobile').blur(function(){
           mobile= $(this).val();
        //var regex = /^[6-9]\d{9}$/;
        var regex = /^\d{11}$/;
         if(mobile=="" || mobile==null){
        $('#mob-help').html('<img src = "img/giphy.gif" height="50" width="50">');
        window.setTimeout(function(){

         $('#mob-help').css("color","red");
         $('#mob-help').html('&#10005; please enter mobile');},500);
         validname=false;
    }
    else if(!regex.test(mobile)){
        $('#mob-help').html('<img src="img/giphy.gif" height="50" width="50">');
        window.setTimeout(function(){

           $('#mob-help').css("color","red");
          $('#mob-help').html('&#10005; invalid mobile number');},500);
          validmob=false;

    }
    else{
        
        $('#mob-help').html('<img src = "img/giphy.gif" height="50" width="50">');
        window.setTimeout(function(){
                      $('#mob-help').css("color","green");
                      $('#mob-help').html('&#10003; valid mobile');},500);
                      validmob=true;
    }
});
$('#submit').click(function(){
    if(validmob==false || validname==false || validpass==false || validcnfpass==false || validemail==false)
    {
        $('#help').html('<div class = "alert alert-danger">fill all fields correctly</div>');
        window.setTimeout(function(){
            $('.alert').fadeTo(500,0).slideUp(500,function(){
                $(this).remove();
            });
        },1000);
    }
    else{
       $.ajax({
           url:'signuphandler.php',
           method: 'post',
           data:{email:email,password:password,name:name,mobile:mobile},
           dtatType:"text",
           success:function(data){
               $('#help').html(data);
               window.setTimeout(function(){
                   window.location.href=window.location.href},2000);
               }
           });
       
    }
    });

 });
</script>

</body>
    </html>


