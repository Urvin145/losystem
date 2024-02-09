<?php
 $showalert = false;
//  echo $_SERVER['REQUEST_METHOD'] ;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $err="";
 
  include 'partial/_dbconnect.php';
  $username=$_POST["username"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];

  $exists=false;
  $existSql = "Select * from `user` where username = '$username'";
  $result = mysqli_query($conn,$existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows >0){
    echo "already exist";
  }
  else{
    $exist = false;
    if($password == $cpassword){
      $sql = "INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$password')";
      $result = mysqli_query($conn,$sql);
      
      if($result){
        $showalert=true;
      }
    }else{
      echo "password not match";
    }
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

    <title>signup</title>
  </head>
  <body>
  <?php  require 'partial/_nav.php' ?>


  <div class="container">

<form action="/losystem/signup.php" method="POST">
<?php
  if($showalert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>done!</strong> login sucesssfully done.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"> &times; </span>
    </button>
  </div>';
  }
  ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="cpassword" id="exampleInputPassword1">
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