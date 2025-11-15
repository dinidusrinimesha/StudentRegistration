<?php
class Database{
    private $servername = "localhost";
    private $username = "root";
    private $pwd = "";
    private $dbname = "sms_db";

    protected function connect() {
        $conn = new mysqli($this->servername, $this->username, $this->pwd, $this->dbname);

        if ($conn -> connect_error) {
          die("Connection failed: " . $conn -> connect_error);
        }

        return $conn;
    }
}