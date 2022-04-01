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

    <div class="book-heading">
        <h1 class="heading">Category</h1>
        <div class="input-group w-50 mx-auto mt-4">
            <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
              <option selected>Choose...</option>
              <option value="1">Fantasy</option>
              <option value="2">Horror</option>
              <option value="3">Comedy</option>
            </select>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary bd-white text-white" type="button">Select Category</button>
            </div>
          </div>
    </div>


    <div class="container mt-5">
        <div class="row">
          <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img src="images/example-book.PNG" class="card-img-top" alt="...">
                <div class="card-body text-dark">
                  <h5 class="card-title">Thornton</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Add To Cart</a>
                  <a href="#" class="btn btn-primary">Preview Book</a>
                </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img src="images/example-book.PNG" class="card-img-top" alt="...">
                <div class="card-body text-dark">
                  <h5 class="card-title">Otto</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Add To Cart</a>
                  <a href="#" class="btn btn-primary">Preview Book</a>
                </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img src="images/example-book.PNG" class="card-img-top" alt="...">
                <div class="card-body text-dark">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Add To Cart</a>
                  <a href="#" class="btn btn-primary">Preview Book</a>
                </div>
            </div>
          </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm">
              <div class="card" style="width: 18rem;">
                  <img src="images/example-book.PNG" class="card-img-top" alt="...">
                  <div class="card-body text-dark">
                    <h5 class="card-title">The Bird</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Add To Cart</a>
                    <a href="#" class="btn btn-primary">Preview Book</a>
                  </div>
              </div>
            </div>
            <div class="col-sm">
              <div class="card" style="width: 18rem;">
                  <img src="images/example-book.PNG" class="card-img-top" alt="...">
                  <div class="card-body text-dark">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Add To Cart</a>
                    <a href="#" class="btn btn-primary">Preview Book</a>
                  </div>
              </div>
            </div>
            <div class="col-sm">
              <div class="card" style="width: 18rem;">
                  <img src="images/example-book.PNG" class="card-img-top" alt="...">
                  <div class="card-body text-dark">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Add To Cart</a>
                    <a href="#" class="btn btn-primary">Preview Book</a>
                  </div>
              </div>
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