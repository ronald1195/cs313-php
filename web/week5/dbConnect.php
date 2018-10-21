<?php
/**
 * Created by PhpStorm.
 * User: ronaldmunoz
 * Date: 10/19/18
 * Time: 10:23 PM
 */

try
{
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
    $conn = new mysqli($server, $username, $password, $db);
*/
    echo 'Let\'s display some data from the database: ';

    $statement = $db->prepare("SELECT * FROM system_user");
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        // The variable "row" now holds the complete record for that
        // row, and we can access the different values based on their
        // name
        echo '<p>';
        echo '<strong>' . $row['first_name'] . ' ' . $row['last_name'] . ' : ';
        echo $row['email'] . '</strong>' . ' - ' . $row['username'];
        echo '</p>';
    }

}
catch (PDOException $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
}