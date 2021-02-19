<?php

class Database {

    public static function connect() {

        $server_name = 'localhost';
        $db_name = 'hospitale2n';
        $dsn = "mysql:host=$server_name;dbname=$db_name";
        $server_user = 'hospitale2n';
        $server_password = 'dl6X1gnJpveIGaSh';

        $pdo = new PDO(
            $dsn, $server_user, $server_password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]
        );

        // message connexion OK !!
        //echo 'Connexion BDD OK !!';

        return $pdo;
    }

}