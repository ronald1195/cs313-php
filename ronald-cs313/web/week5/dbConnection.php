<?php
/**
 * Created by PhpStorm.
 * User: ronaldmunoz
 * Date: 10/16/18
 * Time: 11:08 AM
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

    //Print all the values inside the system_user table.
    //
    foreach ($db->query('SELECT system_user_id, first_name, last_name, username FROM system_user') as $row)
    {
        echo 'User ID: ' . $row['system_user_id'] . '<br/>';
        echo 'Name: ' . $row['first_name'] . ' ' .$row['last_name'] .'<br/>';
        echo 'Username: ' . $row['username'] . '<br/>';
        echo '<br/>';
    }
}
catch (PDOException $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
}