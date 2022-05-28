<?php
        $dbName = "memory";
        $dbUser = "sebastien";
        $dbPwd = "sebastien";
        if (self::$instance === null) {
            self::$instance = $pdo = new PDO('mysql:host=localhost;dbname=' . $dbName . ';charset=utf8', "$dbUser", "$dbPwd", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }