<?php
include "../models/database.php";
$db = new DataBase('library');

if ($db->connect()) {
    session_start();
    $cid = $_SESSION['user_id'];
    $bookid = $_POST['submit'];

    $sql = "INSERT INTO buy(cid, bookid) values ('$cid', '$bookid');";
    $db->query($sql);
    $db->close();
    header('Location: ../index.php');
} else {
    $db->close();
    die('Server Connection Error');
}
