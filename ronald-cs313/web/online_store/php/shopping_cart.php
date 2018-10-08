<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesheets/store.css">
    <title>Welcome!</title>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Roanld's Store</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="../../home_page.html">Products</a></li>
            <li><a href="#">Deals</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <a href="#" class="navbar-right">
        </a>
        <a href="#" class="btn btn-default navbar-btn navbar-right">
            <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart
        </a>

    </div>

</nav>


<?php

$myArray = $_POST['kvcArray'];

echo "My array" . $myArray;
?>


<footer class="container-fluid text-center">
    <p>Online Store Copyright</p>
    <form class="form-inline">Get deals:
        <input type="email" class="form-control" size="50" placeholder="Email Address">
        <button type="button" class="btn btn-danger">Sign Up</button>
    </form>
</footer>

</body>
</html>