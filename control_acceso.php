<?php
  if (isset($_POST["iniciar"])){
    require("conexion.php");

    $user = htmlentities(addslashes($_POST["usuario"]));
    $pwd = htmlentities(addslashes($_POST["password"]));
    $contador = 0;

    if (!empty($user) && !empty($pwd)) {
        $sql = "SELECT *FROM usuarios WHERE username = :username";
        $result = $conex->prepare($sql);
        $result->bindValue(":username" , $user);
        $result->execute();
        $numero_registro = $result->rowCount();

        if ($numero_registro > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if ($user === $row['username'] && password_verify($pwd, $row['contrasena'])) {
                $contador++;
            }

            if ($contador > 0){
                $contador = 0;

                session_start();
                $_SESSION["usuario"] = $row['username'];
                header("location: consulta_usuarios.php");
            }else{
                require("index.php");
                echo("<script>alert('El usuario y/o contraseña son incorrectos!');</script>");
            }

            $result->closeCursor();
        }else{
            require("index.php");
            echo("<script>alert('El usuario y/o contraseña son incorrectos!');</script>");       
        }

    }else {
        require("index.php");
        echo("<script>alert('Los campos estan vacios!');</script>");
    }
    echo"<meta http-equiv='Refresh' content='2;url=index.php>";
  }else{
    header("location:index.php");
  }
?>