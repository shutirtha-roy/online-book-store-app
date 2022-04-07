<?php

include 'Config/connect.php';
$id = $_GET['userid'];
session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || $_SESSION['email'] == 'admin@gmail.com') {
  header("location: login.php");
  exit;
}

$cart_book_sql = "SELECT * FROM `book_cart` WHERE user_id=$id";
$cart_book = mysqli_query($conn, $cart_book_sql);
$num_cart_rows = mysqli_num_rows($cart_book);

if($num_cart_rows == 0) {
  header("location: books.php");
    exit;
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

    <div class="alert alert-success" role="alert" hidden>
        Book Purchased Successfully 
    </div>


    <div class="admin-section">
        <h1 class="heading mt-5 p-5 h1">Cart</h1>
    </div>







    <h1 class="heading h2 mb-5">Books Ordered</h1>
    <table class="table table-dark mx-auto" style="text-align: center; width: 80%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Book name</th>
            <th scope="col">Price</th>
            <th scope="col">Remove Product</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $count = 1;
          $total = 0;
           
          while($row = mysqli_fetch_assoc($cart_book)) {
            $cart_id = $row['id'];
            $user_id = $row['user_id'];
            $product_id = $row['product_id'];
            $book_id = $row['product_id'];
            $user_name = $row['user_name'];
            $book_title = $row['product_name'];
            $price = $row['price'];
            $total += $price;
            $delete_id = "cart-delete.php?bookid=".$product_id;

            echo '<tr>
                    <th scope="row">'. $count .'</th>
                    <td>'. $book_title .'</td>
                    <td>'. $price .'Tk</td>
                    <td><a href="'.$delete_id.'" class="btn bg-danger text-white">Delete</a></td>
                  </tr>';

            $count += 1;

          }
        ?>
          <tr>
            <td>
            <td>Total Price</td>
            
            <td colspan="2"> <?php echo $total ?> Taka</td>
          </tr>
          
        </tbody>
      </table>


      <div class="purchase-btn mb-5">
        <?php
          $user_cart_id = "delete-cart-add-purchase.php?userid=".$id;

        ?>
        <a href="<?php echo $user_cart_id ?>" class="btn btn-primary">Purchase Book</a>
      </div>
      


    
    

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/2.0.0-alpha0/date_fns.min.js" integrity="sha512-0kon+2zxkK5yhflwFqaTaIhLVDKGVH0YH/jm8P8Bab/4EOgC/n7gWyy7WE4EXrfPOVDeNdaebiAng0nsfeFd9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    
</body>
</html>