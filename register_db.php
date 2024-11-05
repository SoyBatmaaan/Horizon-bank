<?php
    include("connect_db.php");

    if(isset($_POST['registrarse'])){
        if(strlen($_POST['email']) >= 1 && strlen($_POST['contrasena']) >= 1){
            // nombre de variable = post nombre del atributo "name" de la etiqueta
            $email = trim($_POST["email"]);
            $dni = trim($_POST["dni"]);
            $alias = trim($_POST["alias"]); // CORREGIR LARGO DEL ALIAS, SE REGISTRA CORTADO EN LA BASE DE DATOS, PONERLE LIMITE AL INPU
            $contrasena = trim($_POST["contrasena"]);

            // nombre de variable = Query para insertar los datos en la tabla
            $registrar_datos = "INSERT INTO `usuarios`(`id`, `email`, `dni`, `alias`,`contrasena`) VALUES ('','$email','$dni','$alias','$contrasena')";
            // se ejecuta la query hacia la base de datos
            $registrar_datos_query = mysqli_query($conexion,$registrar_datos);
             
            if ($registrar_datos_query){
                $crear_cajadeahorro = "INSERT INTO cuenta (id_usuario) SELECT id FROM usuarios WHERE email = '$email'";
                $crear_cajadeahorro_query = mysqli_query($conexion,$crear_cajadeahorro);
                if($crear_cajadeahorro_query){
                    header("location:iniciar_sesion.php");
                }
                
            }else{
                echo "ERROR AL REGISTRAR CUENTA";
            }
        }
    }
?>