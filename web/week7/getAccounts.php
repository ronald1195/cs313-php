<?php
/**
 * Created by PhpStorm.
 * User: ronaldmunoz
 * Date: 10/27/18
 * Time: 6:02 PM
 */

include 'dbConnect.php';

$statement = $db->prepare("SELECT * FROM system_user");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    // The variable "row" now holds the complete record for that
    // row, and we can access the different values based on their
    // name
    $username = $row['username'];
    echo '<hr>';
    echo '<form  method="POST" action="deleteAccount.php">';
        echo '<div class="container">';
            echo '<p>';
            echo '<strong>' . $row['first_name'] . ' ' . $row['last_name'] . ' : ';
            echo $row['email'] . '</strong>' . ' - ' . '<input type="text" name="username" id="username" value="'. $username . '" readonly>';
            echo '<button type="submit" action="deleteAccount.php" class="btn btn-danger" style="margin-right: 120px; float: right; ">Delete</button>';
            echo '<button type="button" class="btn btn-primary" style="float: right; margin-right: 20px;">Edit</button>';
            echo '</p>';
        echo '</div>';
    echo '</form>';


}

echo '<hr>';