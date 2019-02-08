<?php

class DataBase {

    private $dbServer;
    private $dbUser;
    private $dbPassword;
    private $dbName;

    public function connectDB() {
        $dbServer = 'localhost';
        $dbUser = 'root';
        $dbPassword = '';
        $dbName = 'good_place';

        $mMysqli = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
        $mMysqli->set_charset("utf8");

        if (mysqli_connect_errno()) {
            echo "Błąd połączenia z bazą danych!";
        }
        return $mMysqli;
    }

    public function prepare($text) {
        $mMysqli->prepare($text);
    }

}
