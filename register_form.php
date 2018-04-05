<?php
  include "config.php";
  $method = $_POST;   

  if (isset($method['submit']) && !empty($method)) {   
    $fname = $method['fname'];  
    $password = $method['password'];  
    $gender = $method['gender'];  
    $mobile = $method['mobile'];  
    $email = $method['emailId'];
    $address = $method['address'];  
    $hobbies = $method['hobbies'];
    $hobbies = implode(",", $hobbies);
    //echo "<pre>";print_r($_POST);die;
    $select = mysqli_query($con, "SELECT `register_email` FROM `registers` WHERE `register_email` = '".$method['emailId']."'") or exit(mysqli_error());
    if(mysqli_num_rows($select)) {
      // echo "<script> alert('This Email already exists'); </script>";
        exit('<h3>This Email already exists</h3>');
        // exit("<script> window.alert('This Email already exists'); window.location.href='register_form.php'; </script>");
    }

    $sql = mysqli_query($con, "insert into registers (register_name,register_password,register_gender,register_mobile,register_email,register_address,hobbies) values ('$fname','$password','$gender','$mobile','$email','$address','$hobbies')");   

    // echo "<pre>";print_r($sql);die;

    if ($sql) {   
      
      header("Location: index.php?success='Register Succesfully'");   
    
    } else {   

      echo ("Error INSERT QUERY" . mysqli_error($con));   

    }

  }

?>
<!DOCTYPE html>
<html>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="validation.js"></script>
<!------ Include the above in your HEAD tag ---------->
  <title> Register Form </title>
</head>
<body>

<div class="container">
  <div class="row">
  <form class="form-horizontal" action="register_form.php" name="register_form_validate" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Register Form</legend>  

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Name">Name</label>     
  <div class="col-md-5">
  <input id="vr_fname" name="fname" type="text" placeholder="Full Name" class="form-control input-md" >
  <span id="name_err"> </span>
  </div>
</div>


<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Password</label>  
  <div class="col-md-5">
    <input id="vr_password" name="password" type="password" placeholder="Password" class="form-control input-md" >
    <span id="password_err"> </span>
    <!-- <span class="help-block">max 16 characters</span> -->
  </div>
</div>


<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="gender">Gender</label>     
  <div class="col-md-4"> 
    <label class="radio-inline" for="gender-0">
      <input type="radio" name="gender" id="gender1" class="gender_cs" value="Male"> Male  
    </label> 
    <label class="radio-inline" for="gender-1">
      <input type="radio" name="gender" id="gender2" class="gender_cs" value="Female"> Female  
    </label>
    <span id="gender_err"> </span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mobilenumber">Mobile Number</label>    
  <div class="col-md-5">
  <input id="vr_mobile" name="mobile" type="number" placeholder="Mobile Number" class="form-control input-md" >
  <span id="mobile_err">  </span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="emailId">Email Address</label>     
  <div class="col-md-6">
  <input id="vr_email" name="emailId" type="text" placeholder="example@mail.com" class="form-control input-md" >
  <span id="email_err"> </span>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Address</label>   
  <div class="col-md-4">                     
    <textarea class="form-control" id="vr_address" name="address" placeholder="Address..."> </textarea>
    <span id="address_err"> </span>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="emailId">Hobbies</label>     
  <div class="col-md-6"> 
    <input type="checkbox" name="hobbies[]" value="Playing" id="hobbies1"> Playing &nbsp;
    <input type="checkbox" name="hobbies[]" value="Movie" id="hobbies2"> Movie &nbsp;
    <input type="checkbox" name="hobbies[]" value="Cricket" id="hobbies3"> Cricket &nbsp;
    <span id="hobbies_err"> </span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>   
  <div class="col-md-4">
    <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
  </div>
</div>

</fieldset>
</form>
  </div>
</div>
<script type="text/javascript">
$( "form" ).submit(function( event ) {
    var name = $('#vr_fname').val();
    var password = $('#vr_password').val();
    var gender1 = $('#gender1').val();
    var gender2 = $('#gender2').val();
    var mobile = $('#vr_mobile').val();
    var email_id = $('#vr_email').val();
    var address = $('#vr_address').val();
    var hobbies1 = $('#hobbies1').val();
    var hobbies2 = $('#hobbies2').val();
    var hobbies3 = $('#hobbies3').val();
    if (name == '') {
        $('#name_err').css('color','red');
        $('#name_err').html('Name is required').show();
        return false;
    }else{
      $('#name_err').hide();
    }
    if (password == '') {
        $('#password_err').css('color','red');
        $('#password_err').html('Password is required').show();
        return false;
    }
    if (!$('input[name=gender]:checked').val()) {          
        $('#gender_err').css('color','red');
        $('#gender_err').html('Gender is required').show();
        return false;
    }else{
        $('#gender_err').hide();
    }
    if (mobile == '') {
        $('#mobile_err').css('color','red');
        $('#mobile_err').html('Mobile is required').show();
        return false;
    }
    if (email_id == '') {
        $('#email_err').css('color','red');
        $('#email_err').html('Email is required').show();
        return false;
    }
    if (address == '') {
        $('#address_err').css('color','red');
        $('#address_err').html('Address is required').show();
        return false;
    }
    if (hobbies1 == '' || hobbies2 == '' || hobbies3 == '') {
        $('#hobbies_err').css('color','red');
        $('#hobbies_err').html('Hobbies is required').show();
        return false;
    }
});
</script>
</body>
</html>