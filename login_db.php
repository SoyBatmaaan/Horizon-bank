<?php
    session_start();
    include("connect_db.php");

    if(isset($_POST['logearse'])){
        // nombre de variable = post nombre del atributo "name" de la etiqueta
        $email_login = trim($_POST["email_login"]);
        $email_login_clean = htmlspecialchars($email_login, ENT_QUOTES, 'UTF-8');

        $contrasena_login = trim($_POST["contrasena_login"]); 
        $contrasena_login_hash = md5($contrasena_login); // Hasheamos la contraseña con md5
        // nombre de variable = Query para seleccionar los datos que queremos VALIDAR
        // para el inicio de sesion.
        $comparar_datos = "SELECT id, email, contrasena, alias, dni FROM `usuarios` WHERE `email` = '$email_login_clean' AND `contrasena` = '$contrasena_login_hash'";
        
        $comparar_datos_query = mysqli_query($conexion,$comparar_datos);
        // En el caso de que se haya pasado la validacion, guardamos todos los datos
        // del usuario que inicio sesion en variables $_SESSION[]. y redireccionamos
        // al usuario a la pagina principal.
        if($datos=$comparar_datos_query->fetch_object()){
            $_SESSION["id"] = $datos->id;
            $_SESSION["email"] = $datos->email;
            $_SESSION["pass"] = $datos->contrasena;
            $_SESSION["alias"] = $datos->alias;
            $_SESSION["info"] = $datos->dni;
            
            $email = $_SESSION["email"];

            header("Location: index.php");
        }else{
            $email_login = "";
            $contrasena_login = "";
            $contrasena_login_hash = "";
            // Si la validacion fue incorrecta, mostrara este mensaje de error!
            echo '<b style="color:red;">Usuario o contraseña incorrectos! :(</b>';
        }
    }
?>