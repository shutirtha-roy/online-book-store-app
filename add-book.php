<?php

include 'Config/connect.php';

session_start();
if($_SESSION['email'] != "admin@gmail.com") {
    header("location: login.php");
    exit;
}



$sql = "SELECT * FROM `categories`";
$category_list = mysqli_query($conn, $sql);

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

    <div class="admin-section">
        <h1 class="heading h1">Add New Book</h1>
    </div>


    <form action="#" method="post" enctype="multipart/form-data" class="p-5">
        <div class="form-group">
            <div class="form-group">
                <label for="name">Book Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name of the book" name="name" required>
            </div>

            <div class="group-content">

                <label for="category">Choose a Category:</label>
                <select name="name" id="category" required>

                    <?php
                        while($row = mysqli_fetch_assoc($category_list)) {
                            echo "<option value = " . $row['id'] . "> ".$row['name']." </option>";
                        }
                    ?>

                </select>
            </div>

            <div class="form-group">
                <label for="name">Author Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name of the author" name="author" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <input type="number" class="form-control" id="name" placeholder="Enter the price" name="price" required>
            </div>
            <div class="form-group">
                <label for="name">Total Books</label>
                <input type="number" class="form-control" id="name" placeholder="Enter the price" name="price" required>
            </div>
            <div class="form-group">
                <label for="fileToUpload" class="d-block h4">Select pdf to upload for preview</label>
                <input type="file" class="h4" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="form-group">
                <label for="fileToUpload" class="d-block h4">Select image to upload:</label>
                <input type="file" class="h4" name="fileToUpload" id="fileToUpload">
            </div>



            <input type="submit" class="btn btn-primary w-25 d-block mx-auto" value="Upload Image" name="submit">
        </div>
    </form>



    
    
    

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/2.0.0-alpha0/date_fns.min.js" integrity="sha512-0kon+2zxkK5yhflwFqaTaIhLVDKGVH0YH/jm8P8Bab/4EOgC/n7gWyy7WE4EXrfPOVDeNdaebiAng0nsfeFd9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    
</body>
</html>