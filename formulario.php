<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario  con HTML5 YCSS3</title>
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
        <label for="titulo" class="titulo">Registro de Usuarios</label> 
        <form action="alta_usuario.php" method="post" class="formulario"  name="formulario" >
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Escriba su nombre" class="form-control"  value="<?php echo $nombre;?>"  required>
            

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" placeholder="Escriba sus apellidos" class="form-control"  required>
            

            <label for="genero">Seleccione su género:</label>
            <div class="radio">
                <input type="radio" value="M" name="genero" id="H" required>
                <label for="H" id="mas">Masculino</label>
                <input type="radio" value="F" name="genero" id="M">
                <label for="M" id="fem">Femenino</label>
            </div>
            

            <label for="domicilio">Domicilio</label>
            <input type="text" name="domicilio" id="domicilio" placeholder="Escriba la dirección de tu domicilio" class="form-control" required>
            

            <label for="nombre">Nombre de Usuario:</label>
            <input type="text" name="usuario" id="usuario" placeholder="Escriba su nombre de usuario" class="form-control"  required>
            

            <label for="nombre">Contraseña:</label>
            <input type="password" name="password" id="password" placeholder="Escriba una contraseña" class="form-control"  required>
            


    
            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox" class="form-control"  required>
                <label for="checkbox">Acepto terminos y condiciones</label>
               
            </div>

            <div class="btn-group">
                <input type="reset" value="Cancelar" class="cancelar">
                <input type="submit" value="Registrar" class="guardar">
    
                
            </div>
        </form>
    </div>

</body>
</html>