<?php

include 'Config/connect.php';
session_start();

function limit_words($text, $limit) {
  $words = explode(" ",$text);
  return implode(" ",array_splice($words,0,$limit));
}




$sql_books = "SELECT * FROM `books`";
$book_list = mysqli_query($conn, $sql_books);
$numExistRows = mysqli_num_rows($book_list);


$sql_category = "SELECT * FROM `categories`";
$category_list = mysqli_query($conn, $sql_category);

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $category_id = $_POST['category_id'];

  $category_book_sql = "SELECT * FROM `books` WHERE category_id=$category_id";
  $individual_category_books_query = mysqli_query($conn, $category_book_sql);
  $book_list = $individual_category_books_query;

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

    <div class="alert alert-danger" role="alert" hidden>
        Book Deleted
    </div>

    
    <div class="alert alert-success w-50 mx-auto" role="alert">
        Added To Cart <b>2 Book Added</b> <a type="submit" href="#" class="btn btn-outline-secondary bg-dark text-white ml-5 font-weight-bold" value="" name="submit" type="button">Proceed To Checkout</a>
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    

    <div class="book-heading">
        <h1 class="heading">Category</h1>
        <form action="books.php" method="post" class="input-group w-50 mx-auto mt-4">
            <select name="category_id" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
              <?php
                  while($row = mysqli_fetch_assoc($category_list)) {
                      echo "<option value = " . $row['id'] . "> ".$row['name']." </option>";
                  }
              ?>
            </select>
            <div class="input-group-append">
              <input type="submit" class="btn btn-outline-secondary bd-white text-white" value="Select_Category" name="submit" type="button"></input>
            </div>
        </form>
    </div>


      
    <div class="container mt-5">
      <div class="row">
        <?php
          while($row = mysqli_fetch_assoc($book_list)) {
            $book_id = $row['id'];
            $img_link = $row['product_image_link'];
            $book_title = $row['name'];
            $book_price = $row['price'];
            if(strlen($book_title) < 10) {
              $book_title .= " Limited Series";
            }

            $category_id = $row['category_id'];
            $sql_specific_category = "SELECT `name` FROM `categories` WHERE id=$category_id";
            $category_query =  mysqli_query($conn, $sql_specific_category);
            $category_name = mysqli_fetch_assoc($category_query)['name'];

            $book_author = $row['author'];
            $book_description = limit_words($row['description'],9);
            $book_preview_pdf = $row['product_preview_link'];
            $preview_id = "individual-book.php?bookid=".$book_id;
            $edit_id = "book-edit.php?editid=".$book_id;

            echo 
                '<div class="col-sm col-3 mt-3">
                    <div class="card" style="width: 18rem;">
                      <img src="'.$img_link.'" class="card-img-top" alt="...">
                      <div class="card-body text-dark">';
                      if($loggedin && $_SESSION['email'] == "admin@gmail.com") {
                        echo '
                          <h5 class="card-title">'.$book_title.' ('.$category_name.')</h5>
                          ';
                      } else if($loggedin && $_SESSION['email'] != "admin@gmail.com") {
                        echo '
                          <h5 class="card-title"><a href="'.$preview_id.'">'.$book_title.'</a> ('.$category_name.')</h5>
                          ';
                      } else {
                        echo '
                          <h5 class="card-title"><a href="login.php">'.$book_title.'</a> ('.$category_name.')</h5>
                          ';
                      }
                      
                      echo'
                        <p class="card-title">'.$book_author.'</p>
                        <p class="card-title font-weight-bold">'.$book_price.' Tk</p>
                        <p class="card-text">'.$book_description.'</p>';
                        if(!$loggedin) {
                          echo '
                                <a href="login.php" class="btn btn-primary">Add To Cart</a>
                                <a href="'.$book_preview_pdf.'" class="btn btn-primary" target="_blank">Preview Book</a>
                              ';
                        } 
                        if($loggedin && $_SESSION['email'] == "admin@gmail.com") {
                          echo '
                                <a href="'.$edit_id.'" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-primary btn-danger">Delete</a>
                              ';
                        } else if($loggedin && $_SESSION['email'] != "admin@gmail.com") {
                          echo '
                                <a href="#" class="btn btn-primary">Add To Cart</a>
                                <a href="'.$book_preview_pdf.'" class="btn btn-primary" target="_blank">Preview Book</a>
                              ';
                        }
                        
                        echo'
                      </div>
                    </div>
                  </div>';
          }
        ?>
      </div>
    </div>
        

      </div>
    

    
    
    

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/2.0.0-alpha0/date_fns.min.js" integrity="sha512-0kon+2zxkK5yhflwFqaTaIhLVDKGVH0YH/jm8P8Bab/4EOgC/n7gWyy7WE4EXrfPOVDeNdaebiAng0nsfeFd9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    
</body>
</html>