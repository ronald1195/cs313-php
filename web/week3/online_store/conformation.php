<?php

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheets/store.css">
    <title>Welcome!</title>
</head>
<body>

<nav class="navbar navbar-inverse" style="bottom: 0; margin-bottom: 0;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Roanld's Store</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="../store.html">Products</a></li>
            <li><a href="deals.html">Deals</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <a href="#" class="navbar-right">
        </a>
        <a href="php/shopping_cart.php" class="btn btn-default navbar-btn navbar-right">
            <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart
        </a>

    </div>

</nav>

<div class="jumbotron" style="border: 0; margin: 0; padding-top: 50px; height: 650px">
    <div class="container text-center">
        <h1>Your purchase is being processed.</h1>
        <p>Thanks for buying with us.</p>
    </div>
</div>



<footer class="container-fluid text-center">
    <p>Online Store Copyright</p>
    <form class="form-inline">Get deals:
        <input type="email" class="form-control" size="50" placeholder="Email Address">
        <button type="button" class="btn btn-danger">Sign Up</button>
    </form>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>