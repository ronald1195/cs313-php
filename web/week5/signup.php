<?php
/**
 * Created by PhpStorm.
 * User: ronaldmunoz
 * Date: 10/25/18
 * Time: 7:42 PM
 */

if (isset($_POST['register-submit'])){

    include 'dbConnect.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $statement = $db->prepare("INSERT INTO system_user 
                                         VALUES (
                                           nextval('system_user_s1')
                                         , '$username'
                                         , '$password'
                                         , '$email'
                                         , '$first_name'
                                         , '$last_name'
                                         , 1001
                                         , current_date
                                         , 1001
                                         , current_date )");

    $statement->execute();

    header("Location: login.html?login=success");
    exit();

} else {
    header("Location: login.html?login=error1");
    exit();
}
