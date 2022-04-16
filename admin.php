<?php

include 'Config/connect.php';

session_start();

if($_SESSION['email'] != "admin@gmail.com") {
  header("location: login.php");
  exit;
} else {
    
}


$purchase_book = "SELECT * FROM `book_purchase`";
$purchase_list = mysqli_query($conn, $purchase_book);
$purchase_rows = mysqli_num_rows($purchase_list);




$months = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'];

function total_days($year, $month, $day) {
  return $year * 365 + $month * 30 + $day;
}


function time_difference($time_day_now, $time_day_past) {
  return $time_day_now - $time_day_past;
}

function delivery_time($date_remaining) {
  if($date_remaining >= 5) {
    return "<button class='btn btn-success'>Delivered</button>";
  } else {
    $delivery_remaining = 5 - $date_remaining;
    return $delivery_remaining . " days remaining";
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


    <div class="admin-section">
        <h1 class="heading mt-5 p-5 h1">Admin Panel</h1>
    </div>



    <a href="add-book.php" class="btn btn-lg btn-outline-secondary bd-white text-white d-block w-25 mx-auto">Add New Books</a>



    <h1 class="heading mt-5 p-5 h2">Books Ordered</h1>

    <?php
      if($purchase_rows > 0) {
        echo '
              <table class="table table-dark mx-auto" style="text-align: center; width: 80%;">
                <thead>';
                echo '<tr>
                        <th scope="col">#</th>
                        <th scope="col">Book name</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Date Ordered</th>
                        <th scope="col">Order Status</th>
                      </tr>
                </thead>
                <tbody>';

                $count = 1;
                while($row = mysqli_fetch_assoc($purchase_list)) {
                  $book_id = $row['product_id'];
                  $book_title = $row['product_name'];
                  $price = $row['price'];
                  $user_name = $row['user_name'];
                  $date = $row['date_purchased'];

                  $time_split = explode(':', $date);
                  $day = (int)$time_split[0];
                  $month = (int)$time_split[1];
                  $month_name = $months[$month];
                  $year = (int)$time_split[2];
                  $total_day_then = total_days($year, $month, $day);



                  $time_now = date("d:m:y");
                  $time_now_split = explode(':', $time_now);
                  $day_now = (int)$time_now_split[0];
                  $month_now = (int)$time_now_split[1];
                  $year_now = (int)$time_now_split[2];
                  $total_day_now = total_days($year_now, $month_now, $day_now);
                  
                  $delivery_status = delivery_time(time_difference($total_day_now, $total_day_then));


                  echo '<tr>
                          <th scope="row">'.$count.'</th>
                          <td>'.$book_title.'</td>
                          <td>'.$user_name.'</td>
                          <td>'.$price.' Tk</td>
                          <td>'.$day .' '.  $month_name.' 20' .  $year.'</td>
                          <td>'.$delivery_status.'</td>
                        </tr>';
                    $count += 1;
                  }
                  echo '</tbody>
                </table>';
      }
    ?>
    
    

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/2.0.0-alpha0/date_fns.min.js" integrity="sha512-0kon+2zxkK5yhflwFqaTaIhLVDKGVH0YH/jm8P8Bab/4EOgC/n7gWyy7WE4EXrfPOVDeNdaebiAng0nsfeFd9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    
</body>
</html>