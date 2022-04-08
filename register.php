<?php
include 'Config/connect.php';


$showAlert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $name = $_POST["name"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $role = "user";
  $location = $_POST["location"];
  //$exits = false;


  //Check whether this username Exists
  $existsSql = "SELECT * FROM `users` where email = '$email'";
  $result = mysqli_query($conn, $existsSql);
  $numExistRows = mysqli_num_rows($result);
  echo $numExistRows;

  if($numExistRows > 0) {
    //$exists = true;
    $showError = "Email Already Exists";
  } else {
    if(($password == $cpassword) && $password != "") {
      $sql = "INSERT INTO `users` (`username`, `email`, `name`, `password`, `role`, `location`) VALUES ('$username', '$email', '$name', '$password', '$role', '$location');";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $showAlert = true;
        //header("location: login.php");
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("location: user.php");
      }
    }
    else {
      $showError = "Passwords do not match";
    } 
  }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Roy's Online Book Store</title>
</head>
<body class="bg-dark text-light">


    <?php require 'nav.php'; ?>

    <h1 class="heading mt-5 h1">Register</h1>
    <div class="register">
        <div class="register-form">
            <form class="login-form mx-auto" action="register.php" id="form-input" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                    <p id="alertName" class="text-danger font-weight-bold form-text"></p>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                    <p id="alertUsername" class="text-danger font-weight-bold form-text"></p>
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                  <p id="alertEmail" class="text-danger font-weight-bold form-text"></p>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                  <p id="alertPassword" class="text-danger font-weight-bold form-text"></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" placeholder="Confirm Password" name="cpassword" required>
                    <p id="alertConfirmPassword" class="text-danger font-weight-bold form-text"></p>
                </div>
                <div class="form-group">
                    <label for="location">Delivery Address</label>
                    <input type="text" class="form-control" id="location" placeholder="Enter your location" name="location" required>
                    <p id="alertLocation" class="text-danger font-weight-bold form-text"></p>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>


   
    
    

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/2.0.0-alpha0/date_fns.min.js" integrity="sha512-0kon+2zxkK5yhflwFqaTaIhLVDKGVH0YH/jm8P8Bab/4EOgC/n7gWyy7WE4EXrfPOVDeNdaebiAng0nsfeFd9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/register.js"></script>
    
</body>
</html>