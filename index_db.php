<?php   
    include("connect_db.php");
    include("login_db.php");

    // Si la variable $_SESSION["user"] NO esta vacia, se ejecuta el siguiente codigo
    //Si no esta vacia, el form de la pagina principal va a mostrar los datos
    //del usuario logeado junto a un boton para cerrar la sesion...
    if(!empty($_SESSION["email"])){
        $email = mysqli_real_escape_string($conexion, $_SESSION["email"]);
        $conseguir_cajadeahorro = "SELECT cajadeahorro FROM cuenta JOIN usuarios ON usuarios.id = cuenta.id_usuario WHERE usuarios.email = '$email'";
        $conseguir_cajadeahorro_query = mysqli_query($conexion,$conseguir_cajadeahorro); 
        if ($datos = $conseguir_cajadeahorro_query->fetch_object()) {
            $_SESSION["caja"] = $datos->cajadeahorro; // Guardar en la sesión
        } else {
            echo "CAJA INEXISTENTE / SESION NO INICIADA / ERROR BASE DE DATOS " . mysqli_error($conexion);
        }

        $mostrar_cajadeahorro = $_SESSION["caja"];
        $mostrar_cajadeahorro_ultimos4 = substr($mostrar_cajadeahorro, -4);
        $mostrar_cajadeahorro_censurado = str_repeat("*", 6) . $mostrar_cajadeahorro_ultimos4; 
        //VISTA que solo se podra ver si la SESION esta iniciada.
        ?>
        <div class="bg-secondary d-flex text-left align-items-center justify-content-center logoff-container">
            <div class="container border border-dark login-container shadow-container justify-content-center">
                 <div class="row border border-danger h-10">
                    <div class="col-sm-3 d-flex bg-danger align-items-center"><h1>Horizon Bank</h1></div>
                    <div class="col-sm-9 d-flex align-items-center justify-content-evenly">
                        <h5>Bienvenido</h5> <h5 class="text-danger" ><?php echo $_SESSION["alias"] ?></h5>
                        <h5>Caja de ahorro:  <?php echo $mostrar_cajadeahorro_censurado ?> </h5>
                        <form method="POST">
                            <input type="submit" class="btn btn-sm btn-outline-secondary text-dark" value="CERRAR SESIÓN" name="deslogearse">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        if(isset($_POST['deslogearse'])){
            session_destroy();//destruye la sesión vaciando los valores de _SESSION
            header("location: index.php");// me devuelve a la vista index.php
        }
    }else{
        // Caso contrario, si la variable $_SESSSION["user"] esta vacia, quiere decir
        // que no hay sesion iniciada, ejecutando el siguiente ECHO insitando
        // a que el usuario, inicie su sesión.
        echo '
        <div class="d-flex bg-secondary text-center text-light align-items-center justify-content-center logoff-container">
            <div>
                <h1 class="text-glow">HORIZON BANK</h1>
                <h5 class="text-glow">Crecimiento y Visión</h5>
                <p>Para obtener su información: <a href="iniciar_sesion.php" class="text-dark">Inicie sesión!</a></p>
            </div>
        </div>
        ';
    }
?>