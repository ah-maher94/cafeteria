<?php
            $dsn="mysql:dbname=cafeteria-php-project;dbhost=127.0.0.1;dbport=3306";
            Define("DB_USER","root");
            Define("DB_PASS","1894");
    
            try{
            $db= new PDO($dsn,DB_USER,DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die("ERROR: Could not connect. " . $e->getMessage());
            }
?>
