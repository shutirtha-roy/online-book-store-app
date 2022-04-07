<?php


include 'Config/connect.php';
$id = $_GET['bookid'];

session_start();


if($_SESSION['email'] != 'admin@gmail.com') {
    header("location: login.php");
    exit;
}

$cart_book_delete = "DELETE FROM `book_cart` WHERE product_id=$id";
$cart_delete = mysqli_query($conn, $cart_book_delete);
$product_book_delete = "DELETE FROM `book_purchase` WHERE product_id=$id"; 
$product_delete = mysqli_query($conn, $product_book_delete);

$book_sql = "DELETE FROM `books` WHERE id=$id";
$book_delete = mysqli_query($conn, $book_sql);
print_r($book_delete);

if($book_delete) {
    $mydir_image = 'Assets/BookImages/'; 
    $myfiles_image = array_diff(scandir($mydir_image), array('.', '..')); 
    foreach ($myfiles_image as $value) {
        $first_half = explode(".", $value)[0];
        $format = explode(".", $value)[1];

        if($first_half == $id) {
            unlink($mydir_image . $first_half . "." . "$format");
        }
    }

    $mydir_book_preview = 'Assets/BookPreviews/';
    $myfiles_preview = array_diff(scandir($mydir_book_preview), array('.', '..')); 
    print_r($myfiles_preview);
    foreach ($myfiles_preview as $value) {
        $first_half = explode(".", $value)[0];
        $format = explode(".", $value)[1];

        if($first_half == $id) {
            unlink($mydir_book_preview . $first_half . "." . "$format");
        }
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}










?>