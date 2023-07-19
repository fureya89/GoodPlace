<?php

class DataBase {

    private $dbServer;
    private $dbUser;
    private $dbPassword;
    private $dbName;
    // You could add a variable here that is from the connection itself.
    private $mMysqli;

    public function connectDB() {

        // Here is a recommendation for you: since you have already defined the variables as private above,
        // there is no need to define them again. You can pass them as $this as they are from the same class.
        
        /*
        $dbServer = 'localhost';
        $dbUser = 'root';
        $dbPassword = '';
        $dbName = 'good_place';
        */

        // And when calling it, it is done in the same way with $this because it is private.

        $this->mMysqli = new mysqli($this->dbServer, $this->dbUser, $this->dbPassword, $this->dbName);
        
        $this->mMysqli->set_charset("utf8");

        if (mysqli_connect_errno()) {
            echo "Błąd połączenia z bazą danych!";
        }
        return $this->mMysqli;
    }

    public function prepare($text) {
        $this->mMysqli->prepare($text);
    }

}
