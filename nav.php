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
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="books.html">Books</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
        ';
        }
 
        if($loggedin && $_SESSION['email'] == "admin@gmail.com") {
          echo '<li class="nav-item active">
                    <a class="nav-link" href="admin.php">Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="books-admin.html">Books</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
        ';
        } else if($loggedin && $_SESSION['email'] != "admin@gmail.com") {
          echo '<li class="nav-item active">
                    <a class="nav-link" href="user.php">Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="books-user.html">Books</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>';
        }
        echo '
        </ul>
      </div>
  </nav>';

?>