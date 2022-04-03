<?php

include 'Config/connect.php';
$id = $_GET['editid'];
session_start();

if($_SESSION['email'] != "admin@gmail.com") {
  header("location: login.php");
  exit;
} else {
    
}

$sql_category = "SELECT * FROM `categories`";
$category_list = mysqli_query($conn, $sql_category);


$sql_book = "SELECT * FROM `books` where id=$id";
$book_list = mysqli_query($conn, $sql_book);
$row = mysqli_fetch_assoc($book_list);


$name = $row['name'];
$category_id = $row['category_id'];

$sql_specific_category = "SELECT `name` FROM `categories` WHERE id=$category_id";
$category_query =  mysqli_query($conn, $sql_specific_category);
$category_name = mysqli_fetch_assoc($category_query)['name'];

$author = $row['author'];
$description = $row['description'];
$price = $row['price'];
$total_products = $row['total_products'];


if($_SERVER["REQUEST_METHOD"] == "POST") {
    //$appointment_mechanic = $_POST['mechanic_name'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $total_products = $_POST['total_products'];

    $sql_update_book = "UPDATE `books` SET `name` = '$name', `category_id` = '$category_id', `author` = '$author', `description` = '$description', `price` = '$price', `total_products` = '$total_products' WHERE `books`.`id` = $id;";
    $result = mysqli_query($conn, $sql_update_book);
    if($result)
    {
        header("location: books.php"); 
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

    <div class="alert alert-success" role="alert" hidden> 
        Updated Successfully
    </div>


    <h1 class="heading mt-5 h1">Edit Book</h1>
    <div class="register">
        <div class="register-form">
            <form class="login-form mx-auto" method="post">
                <div class="form-group">
                    <label for="name">Book Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $name ?>" required>
                </div>
                <div class="form-group">
                    <label for="name">Author Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name of the author" name="author" value="<?php echo $author ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?php echo $description ?></textarea>
                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="number" class="form-control" id="price" placeholder="Enter the price" name="price" value="<?php echo $price ?>" required>
                </div>
                <div class="form-group">
                    <label for="name">Total Books</label>
                    <input type="number" class="form-control" id="total_products" placeholder="Enter the amount of Books" name="total_products" value="<?php echo $total_products ?>" required>
                </div>

                <?php echo $category_name; ?>
                <label for="select">Category</label>
                <select name="category_id" class="custom-select mt-2 mb-4" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <?php
                        echo "<option selected='$category_name' value = " . $category_id . " selected> ".$category_name." </option>";
                        while($row = mysqli_fetch_assoc($category_list)) {
                            if($category_id != $row['id']) {
                                echo "<option value = " . $row['id'] . "> ".$row['name']." </option>";
                            }
                            
                        }
                    ?>
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>






    
    

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/2.0.0-alpha0/date_fns.min.js" integrity="sha512-0kon+2zxkK5yhflwFqaTaIhLVDKGVH0YH/jm8P8Bab/4EOgC/n7gWyy7WE4EXrfPOVDeNdaebiAng0nsfeFd9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    
</body>
</html>