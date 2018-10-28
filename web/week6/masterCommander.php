<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Master Commander</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="logIn.html">RBDC</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="jumbotron">
        <h1>Master Commander:</h1>
    </div>
    <div class="subtitle">
        <h3>Account Manager:</h3>

        <?php
            include 'getAccounts.php';
        ?>

    </div>
    <div class="subtitle">
        <h3>Project Manager:</h3>
    </div>
</div>

</body>
</html>