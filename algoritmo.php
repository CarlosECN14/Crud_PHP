<?php
    // $tiempo = 0.05;
    // $costo = 12;
    

    // do {
    //     $costo ++;
    //     $inicio = microtime(true);
    //     password_hash("test", PASSWORD_BCRYPT,["cost"=>$costo]);
    //     $fin = microtime(true);
    // }

    // while(($fin- $inicio)<$tiempo);
    //     echo "El costo apropiado encontrado es:".$costo."\n";



    $nombre = "Carlos";
    $nombre_cifrado = password_hash($nombre, PASSWORD_DEFAULT, array("cost"=>12));
    echo $nombre;
    echo $nombre_cifrado;

    $hash = '$2y$12$aPZKsIokkr7MEoTFApaCheEVOr0j5/jH8iu3vuC8AXlBxh3kuZV6m';
    if(password_verify('Carlos',$hash)){
        echo "Valido";
    }else {
        echo "Error";
    }

    //CIFRADOD DE NOMBRE DE USUARIO Y CONTRASEÑA
    
    $usuario = "";
    $usuario_cifrado = password_hash($usuario, PASSWORD_DEFAULT, array("cost"=>12));


    



?>