<?php

  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
  } else {
    $loggedin = false;
  }

  echo 
  '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="collapse navbar-collapse container" id="navbarSupportedContent">
        <a class="navbar-brand" href="#">Roy</a>
          
        <ul class="navbar-nav ml-auto">
        ';

        if(!$loggedin) {
          echo '<li class="nav-item active">
                    <a class="nav-link link-effect" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link link-effect" href="general-books.php">Books</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link link-effect" href="register.php">Register</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link link-effect" href="login.php">Login</a>
                </li>
        ';
        }
 
        if($loggedin && $_SESSION['email'] == "admin@gmail.com") {
          echo '<li class="nav-item active">
                    <a class="nav-link link-effect" href="admin.php">Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link link-effect" href="books.php">Books</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link link-effect" href="logout.php">Logout</a>
                </li>
        ';
        } else if($loggedin && $_SESSION['email'] != "admin@gmail.com") {
          echo '<li class="nav-item active">
                    <a class="nav-link link-effect" href="user.php">Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link link-effect" href="books.php">Books</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link link-effect" href="logout.php">Logout</a>
                </li>';
        }
        echo '
        </ul>
      </div>
  </nav>';

?>