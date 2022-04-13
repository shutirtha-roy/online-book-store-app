<?php

include 'Config/connect.php';
$id = $_GET['bookid'];
session_start();



$book_sql = "SELECT * FROM `books` WHERE id=$id";
$book = mysqli_query($conn, $book_sql);

$showAlert = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $book_cart = "SELECT * FROM `book_cart`";
    $cart_list = mysqli_query($conn, $book_cart);
    $numExistRows = mysqli_num_rows($cart_list);

    $cart_id = $numExistRows + 1;
    //$user_id;
    $product_id = $_POST['book_id'];
    //$user_name
    $book_title = $_POST['book_title'];
    $book_price = $_POST['book_price']; 

    $sql_cart = "INSERT INTO `book_cart` (`user_id`, `product_id`, `user_name`, `product_name`, `price`) VALUES ('$user_id', '$product_id', '$user_name', '$book_title', '$book_price');";
    $result_cart = mysqli_query($conn, $sql_cart);
    if ($result_cart) {
        $showAlert = true;
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

    <?php

    if($showAlert) {
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

    ?>

    <?php
        while($row = mysqli_fetch_assoc($book)) {
            $book_id = $row['id'];
            $img_link = $row['product_image_link'];
            $book_title = $row['name'];
            $price = $row['price'];
            if(strlen($book_title) < 10) {
              $book_title .= " Limited Series";
            }

            $category_id = $row['category_id'];
            $sql_specific_category = "SELECT `name` FROM `categories` WHERE id=$category_id";
            $category_query =  mysqli_query($conn, $sql_specific_category);
            $category_name = mysqli_fetch_assoc($category_query)['name'];

            $book_author = $row['author'];
            $book_description = $row['description'];
            $book_preview_pdf = $row['product_preview_link'];
            $preview_id = "individual-book.php?bookid=".$book_id;

            echo '<div class="book-img m-5">
                <img src="'.$img_link.'" class="card-img-top" alt="...">
                <h1 class="h1">'.$book_title.'</h1>
                <h5 class="card-title">Category: '.$category_name.'</h5>
                <h5 class="card-title">Author: '.$book_author.'</h5>
                <h5 class="card-title">Book Price: '.$price.' Tk</h5>
                <p class="card-text h4 font-weight-light text-left">'.$book_description.'</p>
                <form action="books.php" method="post" class="d-inline">
                    <input type="number" name="book_id" value="'.$book_id.'" hidden>
                    <input type="text" name="book_title" value="'.$book_title.'" hidden>
                    <input type="number" name="book_price" value="'.$price.'" hidden>
                    <input type="submit" class="btn btn-primary" value="Add_To_Cart" name="submit" type="button"></input>
                </form>
                <a href="'.$book_preview_pdf.'" class="btn btn-primary" target="_blank">Preview Book</a>
            </div>';
        }
    ?>


    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/2.0.0-alpha0/date_fns.min.js" integrity="sha512-0kon+2zxkK5yhflwFqaTaIhLVDKGVH0YH/jm8P8Bab/4EOgC/n7gWyy7WE4EXrfPOVDeNdaebiAng0nsfeFd9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>
</html>