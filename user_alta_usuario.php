<?php 

    require("conexion.php");
    $nombre = $_POST['nombre'];
    echo($nombre);

    $apellidos = $_POST['apellidos'];
    echo($apellidos);

    $genero = $_POST['genero'];
    echo($genero);

    $domicilio = $_POST['domicilio'];
    echo($domicilio);

    $username = $_POST['usuario'];
    echo($username);

    $pass = $_POST['password'];
    $cifrado_pass = password_hash($pass, PASSWORD_DEFAULT, array("cost"=>12));
    echo($cifrado_pass);

    $sql = "INSERT INTO usuarios (id_usuario, nombre, apellidos, genero, domicilio, username, contrasena) VALUES (NULL, :nombre, :apellidos, :genero, :domicilio, :username, :contrasena)";
    $result = $conex->prepare($sql);
    $result->execute(array(":nombre"=>$nombre, ":apellidos"=>$apellidos, ":genero"=>$genero, ":domicilio"=>$domicilio, ":username"=>$username, ":contrasena"=>$cifrado_pass));


    if ($result){
        $si = "¡Usuario registrado exitosamente!";
        echo"<script type='text/javascript'>alert('$si');</script>";
        header("location:consulta_usuarios.php");
      

    }else {
        $no = "¡No se pudo registrar el usuario!";
        echo"<script type='text/javascript'>alert('$no');</script>";
        header("location:formulario2.php");
       

    }

    $result->closeCursor();


?>