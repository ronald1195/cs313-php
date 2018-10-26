<?php
/**
 * Created by PhpStorm.
 * User: ronaldmunoz
 * Date: 10/19/18
 * Time: 9:39 PM
 */

if (isset($_POST['login-submit'])){

    include 'dbConnect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        header("Location: login.html?login=empty");
        exit();

    } else {
        $statement = $db->prepare("SELECT * FROM system_user WHERE username = '$username'");
        $statement->execute();

        if($statement->rowCount() != 1){
            header("Location: login.html?login=error2");
            exit();

        } else {

            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if($username == $row['username']){
                if($password == $row['password']){
                    header("Location: masterCommander.html");
                    exit();
                } else {
                    header("Location: login.html?login=missingMatchingPassword");
                    exit();
                }
            }else{
                header("Location: login.html?login=missingMatchingUsername");
                exit();
            }

        }
    }
} else {
    header("Location: login.html?login=error1");
    exit();
}