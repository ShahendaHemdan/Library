<?php
include "../models/user.php";

$user = new User();
$user->logOut();

header('Location: ../index.php');