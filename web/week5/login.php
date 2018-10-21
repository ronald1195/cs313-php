<?php
/**
 * Created by PhpStorm.
 * User: ronaldmunoz
 * Date: 10/19/18
 * Time: 9:39 PM
 */

if (isset($_POST['submit'])){

    include 'dbConnect.php';
/*
    $username = $_POST['lg_username'];
    $password = $_POST['lg_password'];

    if(empty($username) || empty($password)){
        header("Location: logIn.html?login=empty");
        exit();

    } else {
        $sql = "SELECT * FROM system_user WHERE username = '$username'";

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck < 1){
            //header("Location: logIn.html?login=error2");
            echo 'User name used: '. $username . ' resultCheck = ' . $resultCheck;

            exit();

        } else {
            if($row = mysqli_fetch_assoc($result)){
                //echo $row['system_user_id'];

                $hashedPwdCheck = password_verify($password, $row['password']);

                if($hashedPwdCheck == false){
                    header("Location: logIn.html?login=error3");
                    exit();
                } elseif ($hashedPwdCheck == true){
                    $_SESSION['u_id'] = $row['system_user_id'];
                    $_SESSION['u_username'] = $row['username'];

                    header("Location: masterCommander.html?login=success");
                    exit();
                }

            }
        }
    }
*/
} else {
    header("Location: logIn.html?login=error1");
    exit();
}