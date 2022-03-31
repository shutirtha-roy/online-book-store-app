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
          <a class="navbar-brand" href="#">Roy</a>
            
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="admin.html">Dashboard</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="books-admin.html">Books</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Logout</a>
            </li>
 

          </ul>
        </div>
    </nav>

    <div class="alert alert-success" role="alert" hidden> 
        Updated Successfully
    </div>


    <h1 class="heading mt-5 h1">Edit Book</h1>
    <div class="register">
        <div class="register-form">
            <form class="login-form mx-auto">
                <div class="form-group">
                    <label for="name">Book Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" value="Thornton">
                </div>
                <div class="form-group">
                    <label for="username">Author Name</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" value="Author">
                </div>
                <div class="form-group">
                    <label for="username">Description</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" value="This is a description">
                </div>
                <div class="form-group">
                    <label for="username">Price</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" value="$20">
                </div>


                <label for="select">Category</label>
                <select class="custom-select mt-2 mb-4" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option selected>Choose...</option>
                    <option value="1">Fantasy</option>
                    <option value="2">Horror</option>
                    <option value="3">Comedy</option>
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