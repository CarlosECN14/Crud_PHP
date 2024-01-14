<?php
    try {

        $conex = new PDO('mysql:host=localhost; dbname=septimo', 'root','');
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conex->exec("SET CHARACTER SEt utf8");

    }catch(PDOException $e){

        die('Error, no se pudo: '. $e->getMessage());
    }



?>