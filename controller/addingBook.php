<?php
include "../models/database.php";
include "../models/functions.php";
$db = new DataBase("library");
$file_name = rand(1000, 100000) . "-" . skipSpecialChar($_FILES["bookcover"]["name"]);
$temporaryFileName = skipSpecialChar($_FILES["bookcover"]["tmp_name"]);
$fileType = pathinfo(skipSpecialChar($_FILES["bookcover"]["name"]), PATHINFO_EXTENSION);



if ($db->connect()) {
    $bid = val($_POST['bookid']);
    $name = skipSpecialChar(val($_POST['name']));
    $writer = skipSpecialChar(val($_POST['writer']));
    $category = val($_POST['category']);
    $cost = val($_POST['cost']);

    $sql = "INSERT INTO book(bookid, name, writer, cost, category) VALUES ('$bid', '$name', '$writer', '$cost', '$category');";
    $db->query($sql);

    $uploads_dir = "../images/" . str_replace("''", "'", $file_name);
    $allowedTypes = array('jpg', 'jpeg', 'png', 'webp');
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($temporaryFileName, $uploads_dir)) {
            $sql = "UPDATE book 
                SET book.bookcover ='$file_name'  
                WHERE book.bookid = '$bid'";
            $db->query($sql);
        }
        $db->close();
        header('Location: ../views/editData.php?msg=Done');
    } else {
        $db->close();
        header('Location: ../views/editData.php?msg=Extension not allowed');
    }
} else {
    die('Connection error');
}
