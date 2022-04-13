<?php


include 'Config/connect.php';
$id = $_GET['userid'];

session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || $_SESSION['email'] == 'admin@gmail.com') {
    header("location: login.php");
    exit;
}


//INSERT
$cart_book_sql = "SELECT * FROM `book_cart` WHERE user_id=$id";
$cart_book = mysqli_query($conn, $cart_book_sql);


while($row = mysqli_fetch_assoc($cart_book)) {
    $cart_id = $row['id'];
    $user_id = $row['user_id'];
    $product_id = $row['product_id'];
    $book_id = $row['product_id'];
    $user_name = $row['user_name'];
    $book_title = $row['product_name'];
    $price = $row['price'];

    $time_now = date("d:m:y");
    

    $sql_purchase = "INSERT INTO `book_purchase` (`user_id`, `product_id`, `user_name`, `product_name`, `price`, `date_purchased`) VALUES ('$user_id', '$product_id', '$user_name', '$book_title', '$price', '$time_now');";
    $result_purchase = mysqli_query($conn, $sql_purchase);

    
}

if($result_purchase) {
    $cart_delete_user = "DELETE FROM `book_cart` WHERE user_id=$id";
    $cart_delete_query = mysqli_query($conn, $cart_delete_user);

    if($cart_delete_query) {
        header("location: user.php");
    }
}


//DELETE ALL ITEMS FROM CART
//$cart_book_sql = "DELETE FROM `book_cart` WHERE userid=$id";
//$all_cart_delete_user = mysqli_query($conn, $cart_book_sql);

/* if($cart_delete) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
 */






?>