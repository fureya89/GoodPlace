<?php

/*
 * User Registration
 */

class Registration {

    private $username;
    private $email;
    private $password;

    function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function userRegistration() {
        try {
            include 'dbConnect.php';
            $mMysqli = new DataBase;
            $mysqli = $mMysqli->connectDB();
            $statement = $mysqli->prepare("INSERT login (username,password,email) VALUE (?,?,?)");
            $statement->bind_param("sss", $this->username, $this->email, $this->password);
            $statement->execute();
            $statement->close();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}
