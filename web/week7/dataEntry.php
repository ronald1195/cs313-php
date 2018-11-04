<?php

    function dbConnect(){
        try {
            $url = getenv('DATABASE_URL');
            $opts = parse_url($url);
            $server = $opts["host"];
            $database = ltrim($opts["path"],'/');
            $user = $opts["user"];
            $password = $opts["pass"];
            $port = $opts["port"];
            $dsn = "pgsql:host=$server; port=$port;dbname=$database";
            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $db = new PDO($dsn, $user, $password, $options);
            return $db;
        }
        catch (PDOException $ex) {
            echo $ex;
            exit;
        }
    }

    function getProjects()
    {
        $db = dbConnect();
        $sql = "select project_name, treatment, project_variable, project_detail_id from project, project_detail WHERE project.project_id = project_detail.project_id";
        $statement = $db->prepare($sql);
        $statement->execute();

        while ($col = $statement->fetch(PDO::FETCH_ASSOC))
        {
            echo '<option value="'. $col['project_detail_id'] .'">' . $col['project_name'].' / ' . $col['treatment'] . ' - ' .$col['project_variable'].'</option>';
        }
    }

    function getNames()
    {

        $db = dbConnect();
        $sql = "select first_name, system_user_id, last_name from system_user";
        $statement = $db->prepare($sql);
        $statement->execute();

        while ($col = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="'.$col['system_user_id'].'">' . $col['first_name'] . ' ' . $col['last_name'].'</option>';

        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Entry</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
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
        <h1>Data Entry:</h1>
    </div>
    <div>
        <form method="post" action="sendObservation.php">
            <div class="form-group">
                <label for="projects">Project: </label>
                <select class="form-control" id="projects" name="projects">
                    <?php
                        getProjects();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">User: </label>
                <select class="form-control" id="name" name="name">
                    <?php
                        getNames();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="text" class="form-control" id="data" name="data">
            </div>
            <div class="form-group">
                <label for="comments">Comments</label>
                <textarea class="form-control" id="coments" rows="3"></textarea>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="submit" id="submit" class="form-control btn" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
