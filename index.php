<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="contenedor">
        <label for="titulo" class="titulo">Control de Acceso</label> 
        <form action="control_acceso.php" method="post" class="formulario"  name="formulario" >
  
            <label for="nombre">Nombre de Usuario:</label>
            <input type="text" name="usuario" id="usuario" placeholder="Escriba su nombre de usuario" class="form-control" >
            <span class="error-message" id="nombreError">Nombre no válido, solo puede contener letras, iniciando con una letra mayúscula y debe de tener un caracter mínimo de 3.</span>

            <label for="nombre">Contraseña:</label>
            <input type="password" name="password" id="password" placeholder="Escriba su contraseña" class="form-control" >
            <span class="error-message" id="nombreError">Nombre no válido, solo puede contener letras, iniciando con una letra mayúscula y debe de tener un caracter mínimo de 3.</span>


    
          

            <div class="btn-group">
                <input type="submit" name="iniciar" value="Iniciar Sesión" class="iniciar">
            </div><br>
            <p>¿No tienes una cuenta?<a href="formulario.php">Regístrate gratis</a></p>
          
        </form>
    </div>
    
</body>
</html>