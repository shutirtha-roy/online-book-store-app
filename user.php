<?php

include 'Config/connect.php';

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || $_SESSION['email'] == 'admin@gmail.com') {
  header("location: login.php");
  exit;
} else {
    
}


//USER
$user_email = $_SESSION['email'];
$sql_user  = "SELECT * FROM `users` WHERE email='$user_email'";
$user_list = mysqli_query($conn, $sql_user);
$user_row = mysqli_fetch_assoc($user_list);
$user_id = $user_row['id'];


$purchase_book = "SELECT * FROM `book_purchase` WHERE user_id=$user_id";
$purchase_list = mysqli_query($conn, $purchase_book);
$purchase_rows = mysqli_num_rows($purchase_list);

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


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse container" id="navbarSupportedContent">
          <a class="navbar-brand" href="#">Welcome <?php echo  ucfirst(explode("@",$_SESSION['email'])[0]) ?></a>
            
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="user.php">Dashboard</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="books.php">Books</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
    </nav>

    

    <?php
      $cart_book_sql = "SELECT * FROM `book_cart` WHERE user_id=$user_id";
      $cart_book = mysqli_query($conn, $cart_book_sql);
      $num_cart_rows = mysqli_num_rows($cart_book);

      if($num_cart_rows > 0) {
        $book_cart_user = "SELECT * FROM `book_cart` WHERE user_id=$user_id";
        $user_cart_list = mysqli_query($conn, $book_cart_user);
        $num_cart_user_rows = mysqli_num_rows($user_cart_list);

        $user_cart_id = "cart.php?userid=".$user_id;
        echo '<div class="alert alert-success w-50 mx-auto" role="alert">
                Added To Cart <b><span>' . $num_cart_user_rows . '</span> Book Added</b> 
                <a type="submit" href="'.$user_cart_id.'" class="btn btn-outline-secondary bg-dark text-white ml-5 font-weight-bold" value="" name="submit" type="button">Proceed To Checkout</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
      }


      if($purchase_rows > 0) {
        
        

          echo '<div class="admin-section">
                    <h1 class="heading mt-5 p-5 h1">Products Purchased</h1>
                </div>

                <h1 class="heading mt-5 p-5 h2">Books Ordered</h1>
                <table class="table table-dark mx-auto" style="text-align: center; width: 80%;">
                        <thead>';
                        echo '<tr>
                                <th scope="col">#</th>
                                <th scope="col">Book name</th>
                                <th scope="col">Book id</th>
                                <th scope="col">Price</th>
                              </tr>
                        </thead>
                        <tbody>';

                        $count = 1;
                        while($row = mysqli_fetch_assoc($purchase_list)) {
                          $book_id = $row['product_id'];
                          $book_title = $row['product_name'];
                          $price = $row['price'];
                          echo '<tr>
                              <th scope="row">'.$count.'</th>
                              <td>'.$book_title.'</td>
                              <td>'.$book_id.'</td>
                              <td>'.$price.' Tk</td>
                            </tr>';
                            $count += 1;
                          }
                    echo '</tbody>
                  </table>';
      } else {
        echo '<div class="admin-section">
                  <h1 class="heading mt-5 p-5 h1">Order Books At Resonable Prices</h1>
              </div>
              <a class="btn btn-info mx-auto w-50 d-block" href="books.php">Click Here To Order Books At Resonable Prices</a>';
      }

    ?>
    
    
    

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/2.0.0-alpha0/date_fns.min.js" integrity="sha512-0kon+2zxkK5yhflwFqaTaIhLVDKGVH0YH/jm8P8Bab/4EOgC/n7gWyy7WE4EXrfPOVDeNdaebiAng0nsfeFd9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    
</body>
</html>