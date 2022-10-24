<?php
include "../models/functions.php";
include "../models/user.php";

$username = val($_POST['username']);
$password = val($_POST['password']);

$user = new User();
if($user->logIn($username,$password)){
    header('Location: ../index.php');
}else{
    header('Location: ../views/signIn.html?msg=Not valid account');
}
