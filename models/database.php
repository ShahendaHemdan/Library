<?php
class DataBase
{
    private $conn = null;
    private $data_base;
    private $server_name;
    private $username;
    private $password;

    function __construct($db, $server = "localhost", $user = "root", $pass = "")
    {
        $this->server_name = $server;
        $this->username = $user;
        $this->password = $pass;
        $this->data_base = $db;
    }

    function connect()
    {
        $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->data_base);
        if ($this->conn->connect_error) {
            return false;
        } else {
            return $this->conn;
        }
    }

    function query($sql)
    {
        $result = $this->conn->query($sql);
        if ($result && $this->conn !== null) {
            return $result;
        } else {
            return false;
        }
    }

    function close()
    {
        $this->conn->close();;
    }
}
