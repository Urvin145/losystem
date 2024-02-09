<?php
 $login = false;
 $showerror = false;
//  echo $_SERVER["REQUEST_METHOD"] ;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  //$err="";
 
  include 'partial/_dbconnect.php';
  $username=$_POST["username"];
  $password=$_POST["password"];
  

 
    $sql = "Select * from user where username='$username' AND password='$password' ";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num==1){
      $login=true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
       header("location: home.php");
    }else{
      $showerror = "invalid";
    }
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>login</title>
  </head>
  <body>
  <?php  require 'partial/_nav.php' ?>
  <?php
  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>done!</strong> you are loged in!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"> &times; </span>
    </button>
  </div>';
  }
  // else{
  //   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  //   <strong>done!</strong> you are not loged in!.
  //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  //   <span aria-hidden="true"> &times; </span>
  //   </button>
  // </div>';

  // }
  ?>

  <div class="container">

  <form action="/losystem/login.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>