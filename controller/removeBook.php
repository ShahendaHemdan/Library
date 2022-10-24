<?php
include "../models/database.php";
$db = new DataBase('library');

if($db->connect()){
    $bookid = $_GET['edit_bookid'];
    $sql = "DELETE FROM book WHERE book.bookid = '$bookid'";
    $db->query($sql);
    $db->close();
    header('Location: ../index.php');
}else{
    $db->close();
    die('Server Connection Error');
}