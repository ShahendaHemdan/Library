<?php
include "../models/database.php";
$db = new DataBase('library');

if ($db->connect()) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO customer(username, password, fname, lname, gender) values ('$username', '$password', '$fname', '$lname', '$gender');";
    $db->query($sql);
    $db->close();
    header('Location: ../index.php?msg=Record Added Successfully');
} else {
    $db->close();
    die('Server Connection Error');
}
