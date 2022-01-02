<?php
include 'connect.php';
include 'function.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql="insert into student (name,email,mobile,password) values('$name','$email','$mobile','$password')";
    $result = mysqli_query($con, $sql);
    if($result){
        
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database</title>
    <link rel="stylesheet" href=""> 
</head>

<body>
<style type="text/css">
        

        #text{
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin ;
            width:100%;

        }

        .button{

            padding: 10px;
            width: 100px;
            color: white;
            border:none;
        }

        #box{

            background-color: lightblue;
            margin: auto;
            width: 300px;
            padding: 20px;
         
        }

        .blue-btn{
            background-color: blue;
        }

        .red-btn {
            background-color: red;

        }


    </style>

<div class="container">
    <button class ="btn my-5"><a href="user.php"class="text-light">Add user</a></button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
      <?php

      $sql="select * from student";
      $result=mysqli_query($con,$sql);
      if($result){
          
          
          while($row=mysqli_fetch_assoc($result)){
              $id=$row['id'];
              $name=$row['name'];
              $email=$row['email'];
              $mobile=$row['mobile'];
              $password=$row['password'];
              echo ' <tr>
                <th ="row">'.$id.'</th>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$mobile.'</td>
                <td>'.$password.'</td>
                <td>
                <button class = "button blue-btn"><a href="update.php?updateid='.$id.'"class="text-light">Update</a></button>
                <button class ="button red-btn"><a href="delete.php?deleteid='.$id.'"class="text-light">Delete</a></button>
                </td>
            </tr>';
          }
      }

        ?>

      
   
  </tbody>
</table>
</div>
    
</body>
</html>