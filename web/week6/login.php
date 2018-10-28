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
        header("Location: logIn.html?login=empty");
        exit();

    } else {
        $statement = $db->prepare("SELECT * FROM system_user WHERE username = '$username'");
        $statement->execute();

        if($statement->rowCount() != 1){
            header("Location: logIn.html?login=error2");
            exit();

        } else {

            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if($username == $row['username']){
                if($password == $row['password']){
                    header("Location: masterCommander.php");
                    exit();
                } else {
                    header("Location: logIn.html?logIn=missingMatchingPassword");
                    exit();
                }
            }else{
                header("Location: logIn.html?logIn=missingMatchingUsername");
                exit();
            }

        }
    }
} else {
    header("Location: logIn.html?logIn=error1");
    exit();
}