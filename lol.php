<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
    $nombreErr = "";
    $nombre = "";
    $appErr = "";
    $apellidos = "";
    $domErr = "";
    $domicilio = "";
    if($_SERVER["REQUEST_METHOD"] =="POST"){
        if(empty($_POST["nombre"])){
            $nombreErr = "El campo nombre es requerido";
        }else {
            $nombre = test_input($_POST["nombre"]);
            if(!preg_match("/^[A-Z][a-zA-Záéíóú]{2,}([ ]?[A-Z][a-zA-Záéíóúñ]{2,})?$/",$nombre)){
                $nombreErr="Solo se aceptan letras y espacios";
            }
        }

        if(empty($_POST["apellidos"])){
            $appErr = "El campo apellidos es requerido";
        }else {
            $apellidos = test_input($_POST["apellidos"]);
            if(!preg_match("/^[A-Z][a-zA-Záéíóú]+ [A-Z][a-zA-Záéíóúñ]+$/",$apellidos)){
                $appErr="Solo se aceptan letras y espacios";
            }
        }


        if(empty($_POST["domicilio"])){
            $domErr = "El campo domicilio es requerido";
        }else {
            $domicilio = test_input($_POST["domicilio"]);
            if(!preg_match("/^[a-zA-Z0-9áéíóúüñÁÉÍÓÚÜÑ\s\.,'-]+$/",$domicilio)){
                $domErr="Solo se aceptan letras, espacion y números";
            }
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlentities($data);
    return $data;
    }

    ?>
    <div class="contenedor">
        <label for="titulo" class="titulo">Iniciar Sesión</label> 
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="formulario"  name="formulario" >
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Escriba su nombre" value="<?php echo $nombre;?>" class="form-control">
            <p class="error" style="color:red"><?php echo $nombreErr; ?></p>
           
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" placeholder="Escriba sus apellidos" value="<?php echo $apellidos;?>" class="form-control">
            <p class="error" style="color:red"><?php echo $appErr; ?></p>
            

            <label for="domicilio">Domicilio</label>
            <input type="text" name="domicilio" id="domicilio" placeholder="Escriba la dirección de tu domicilio"  value="<?php echo $domicilio;?>" class="form-control">
            <p class="error" style="color:red"><?php echo $domErr; ?></p>

    

            <label for="genero">Seleccione su género:</label>
            <div class="radio">
                <input type="radio" name="genero" id="H" required>
                <label for="H" id="mas">Masculino</label>
                <input type="radio" name="genero" id="M">
                <label for="M" id="fem">Femenino</label>
            </div>
            <span class="error-message" id="generoError">Selecciona un género.</span>

            <label for=""></label>
            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox" class="form-control"  required>
                <label for="checkbox">Acepto terminos y condiciones</label>
                <span class="error-message" id="terminosError">Acepta los términos y condiciones.</span>
            </div>

        
            <div class="btn-group">
                <input type="submit" value="Registrar" class="guardar">
                
            </div>
        </form>
    </div>

</body>
</html>