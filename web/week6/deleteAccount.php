<?php
/**
 * Created by PhpStorm.
 * User: ronaldmunoz
 * Date: 10/27/18
 * Time: 6:45 PM
 */

    include 'dbConnect.php';

    $username = $_POST['username'];

    $statement = $db->prepare("DELETE FROM system_user WHERE username = '$username'");
    $statement->execute();

header("Location: masterCommander.php?status=accountDeleted");
exit();
