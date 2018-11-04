<?php
/**
 * Created by PhpStorm.
 * User: ronaldmunoz
 * Date: 11/2/18
 * Time: 7:31 PM
 */

include 'dbConnect.php';

$pd_id = (int)$_POST['projects'];
$data = $_POST['data'];
$user_id = (int)$_POST['name'];

$sql = "INSERT INTO observation VALUES( nextval('observation_s1'), '$pd_id','$data', 1001, current_date, 1001, current_date)";

$statement = $db->prepare($sql);
$statement->execute();

header("Location: dataEntry.php/Success!");
exit();
