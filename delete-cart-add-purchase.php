<?php


include 'Config/connect.php';
$id = $_GET['userid'];

session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || $_SESSION['email'] == 'admin@gmail.com') {
    header("location: login.php");
    exit;
}


//INSERT






//DELETE ALL ITEMS FROM CART
//$cart_book_sql = "DELETE FROM `book_cart` WHERE userid=$id";
//$all_cart_delete_user = mysqli_query($conn, $cart_book_sql);

/* if($cart_delete) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
 */






?>