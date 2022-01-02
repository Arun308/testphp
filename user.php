<?php

include 'connect.php';
include 'function.php';

$name = $email = $mobile = $password = "";
  $errors = array();
  $nameval = "/^[a-zA-Z-' ]*$/";
  $emailval = 'kamalthapa645@gmail.com';
  $mob = "/[0-9 -()+]+$/"; 
  
  if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $password = $_POST['password'];
      $isValid = true;
      
      if (empty($name)){
          $errors['name'] = "Enter your name";
          $isValid = false;
      }
      elseif(!preg_match($nameval, $name)){
          $errors['name'] = "enter validate name";
      } 
      if (empty($email)){ 
          $errors['email'] = "Enter your email";
          $isValid = false;
      }
      elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors['email'] = "enter validate email";
      } 
      if (empty($mobile)){
          $errors['mobile'] = "Enter your mobile";
          $isValid = false;
      }
      elseif(!preg_match($mob, $mobile)){
          $errors['mobile'] = "enter validate mobile";
      } 
      if (empty($password)){
          $errors['password'] = "Enter your password";
          $isValid = false;
      }
      if ($isValid){
          $sql="insert into student (name,email,mobile,password) values('$name','$email','$mobile','$password')";
          $result = mysqli_query($con, $sql);
          if($result){
              header('location:display.php');
          }else{
              die(mysqli_error($con));
          }
      }
  }

?>
 
<?php if (count($errors) > 0): ?>  
            <div class = "alert alert-danger" >
                <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
            </div>
            <?php endif;?>

<!doctype html>
<html lang = "en">

  <head>
    
    <meta charset="utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href = ""> 

    <title>Student database</title>
  </head>
  
  <body>

    <div class="container">
        <div class ="row">
            <div class = "col-md-4 offset-md-4 form-div">
            <form method = "POST" action="user.php"> 
           
            <div class ="form-group">
                <label for = "name">Name *</label><br>
                <input type="text" placeholder="Enter your name" value= "<?php echo $name;?>"name="name"autocomplete="off">
            </div>
            <div class ="form-group">
                <label for = "name">Email *</label><br>
                <input type="text" placeholder="Enter your email" value= "<?php echo $email;?>"name="email"autocomplete="off">
            </div>
            <div class ="form-group">
                <label for = "name">Mobile *</label><br>
                <input type="text" placeholder="Enter your mobile" value= "<?php echo $mobile;?>"name="mobile"autocomplete="off">
            </div>
            <div class ="form-group">
                <label for = "Password">Password *</label><br>
                <input type="Password" placeholder="Enter your password" value= "<?php echo $password;?>"name="password"autocomplete="off">
            </div>
           
            <button type="submit" name="submit" >Submit</button>
            </form>
            </div>
        </div>
  </div> 
 </body>
</html>