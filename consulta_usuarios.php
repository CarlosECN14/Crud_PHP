<?php 
include("seguridad.php");
include_once("conexion.php");
    $sql = "SELECT * FROM usuarios ORDER BY id_usuario ASC";
    $result = $conex->prepare($sql);
    $result->execute();
    $row = $result->fetchAll();
    $tot_registros = $result->rowCount();


?>

        


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <title>Panel de Control</title>
</head>
<body>
    <header>
        <h2>Bienvenido @<?php $user = $_SESSION["usuario"]; echo $user;?></h2>
        <input type="search" placeholder="¿A quién buscaremos hoy? ">
    </header>

    <ul>
        <li><a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i></a></li>
        <li><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
       
    </ul>


    <div class="contenedor">
        <h1>Consulta General de Usuarios</h1>
        <h5>Total:<?php echo $tot_registros;?></h5>
        <a style="position:relative; left:80%; top:-10%; text-decoration:none; color:#fff; background-color:#000; padding:2px; border-radius:8px;" class="nuevo" href="formulario2.php">+Nuevo usuario</a>
        
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Genero</th>
                    <th>Domicilio</th>
                    <th>Nombre de Usuario</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($row as $fila):?>
                <tr>
                    <td><?php echo $fila['id_usuario'];?></td>
                    <td><?php echo $fila['nombre'];?></td>
                    <td><?php echo $fila['apellidos'];?></td>
                    <td><?php if ($fila['genero'] == "M") {echo("Masculino");}else{echo ("Femenino");}?></td>
                    <td><?php echo $fila['domicilio'];?></td>
                    <td><?php echo $fila['username'];?></td>

                <?php endforeach ?>

                </tr>
            </tbody>
        </table>
    </div>

   
 
</body>
</html>