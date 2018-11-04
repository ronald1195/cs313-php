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
    $username = $_POST['username2'];
    $password = $_POST['password2'];
    $email = $_POST['email'];
    $dateIn = date("Y-m-d");
    $cb = 1001;

    //add_user($username, $password, $email, $first_name, $last_name, $cb, $dateIn, $cb, $dateIn );
    $sql = "INSERT INTO system_user (system_user_id, username, password, email, first_name, last_name, created_by, creation_date, last_updated_by, last_update_date ) 
            VALUES ( nextval('system_user_s1') , '$username', '$password', '$email', '$first_name', '$last_name', 1001, CURRENT_DATE , 1001, CURRENT_DATE )";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    header("Location: logIn.html?logIn=success");
    exit();
} else {
    header("Location: logIn.html?logIn=error1");
    exit();
}
