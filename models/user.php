<?php 
class User{
    
    function __construct()
    {
        include_once "database.php";
    }

    function logIn($email, $password){
        $db = new DataBase('library');
        if($db->connect()){
            $sql = "SELECT * FROM customer WHERE customer.username = '$email' AND customer.password = '$password'";
            $result = $db->query($sql);
            if(!$result || mysqli_num_rows($result) !== 1){
                $db->close();
                return false;
            }
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['cid'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['fullname'] = $row['fname']." ".$row['lname'];
            $db->close();
            return true;
        }else{
            $db->close();
            die('Server Connection Error');
        }
    }

    function logOut(){
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);
        unset($_SESSION['fullname']);
        unset($_SESSION['role']);
        session_destroy();
    }

}