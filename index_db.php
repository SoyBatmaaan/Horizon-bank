<?php   
    include("connect_db.php");
    include("login_db.php");
    // Si la variable $_SESSION["user"] NO esta vacia, se ejecuta el siguiente codigo
    //Si no esta vacia, el form de la pagina principal va a mostrar los datos
    //del usuario logeado junto a un boton para cerrar la sesion...
    if(!empty($_SESSION["email"])){
        // CODIGO OBTENER CAJA DE AHORRO
        $email = $_SESSION["email"];

        $conseguir_cajadeahorro = "SELECT cajadeahorro FROM cuenta JOIN usuarios ON usuarios.id = cuenta.id_usuario WHERE usuarios.email = '$email'";
        $conseguir_cajadeahorro_query = mysqli_query($conexion, query: $conseguir_cajadeahorro); 
        if ($datos = $conseguir_cajadeahorro_query->fetch_object()) {
            $_SESSION["caja"] = $datos->cajadeahorro; // Guardar en la sesión
        } else {
            echo "CAJA INEXISTENTE / SESION NO INICIADA / ERROR BASE DE DATOS " . mysqli_error($conexion);
            session_destroy();
        }

        $cajaorigen = $_SESSION["caja"];
        $caja_ultimos_4 = substr($cajaorigen, -4);
        $caja_censurada = str_repeat("*", 6) . $caja_ultimos_4;

        //CODIGO OBTENER SALDO
        $conseguir_saldo = "SELECT saldo FROM cuenta JOIN usuarios ON usuarios.id = cuenta.id_usuario WHERE usuarios.email = '$email'";
        $conseguir_saldo_query = mysqli_query(mysql: $conexion, query: $conseguir_saldo);
        if ($datos = $conseguir_saldo_query->fetch_object()) {
            $_SESSION["saldo"] = $datos->saldo; // Guardar en la sesión
        } else {
        echo "SALDO INEXISTENTE / SESION NO INICIADA / ERROR BASE DE DATOS " . mysqli_error($conexion);
        session_destroy();
        }
        



        ?>
        <div class="bg-secondary d-flex text-left align-items-center justify-content-center logoff-container">
            <div class="container border border-dark login-container shadow-container justify-content-center">
                <div class="row h-10">
                    <div class="col-sm-3 d-flex align-items-center"><h1>Horizon Bank</h1></div>
                    <div class="col-sm-9 d-flex align-items-center justify-content-evenly">
                        <h5>Bienvenido <?php echo $_SESSION["alias"] ?></h5>
                        <h5>Caja de ahorro: <?php echo $caja_censurada ?></h5>
                        <h5>Saldo: $<?php echo $_SESSION["saldo"] ?></h5>
                        <form action="#" method="POST">
                            <input type="submit" class="btn btn-sm btn-outline-secondary text-dark" value="CERRAR SESIÓN" name="deslogearse">
                        </form>
                        <?php 
                        if(isset($_POST['deslogearse'])){
                        session_destroy();//destruye la sesión vaciando los valores de _SESSION
                        header("Location: index.php");// me devuelve a la vista index.php
                        }
                        ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 m-3 ">
                        <div class="bg-primary text-light p-3 rounded-4 mb-3">
                            <h3 class="mb-4" >Transferir</h3>
                            <form action="#" method="POST">
                                <label for="" class="form-label">Cantidad:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-success">$</span>
                                    <input type="text" class="form-control"  name="saldoAtransferir">
                                    <span class="input-group-text">.00</span>
                                </div>
                                <label for="" class="form-label">Destino:</label>
                                <input class="form-control" type="text" placeholder="CAJA DE AHORRO" maxlength="10" name="cuentadestino">
                                <div class="form-text mb-2 text-dark">Asegurarse de que los datos son correctos.</div>
                                <label for="" class="form-label">Descripción:</label>
                                <input class="form-control mb-3 " type="text" value="ej: pago" name="descripcion">
                                <input type="submit" value="TRANSFERIR" class="btn btn-sm btn-outline-dark text-dark bg-light" name="transferir">
                                
                            </form>
                        </div>
                        <?php 
                        if(isset($_POST['transferir'])){
                            if(strlen($_POST['saldoAtransferir']) >= 1 && strlen($_POST['cuentadestino']) >= 1 && strlen($_POST['descripcion']) >= 1){
                                $saldoAtransferir = trim($_POST["saldoAtransferir"]);
                                $cajadestino = trim($_POST["cuentadestino"]);
                                $tipo = "transferencia";
                                $descripcion = $_POST["descripcion"];
                                

                                $enviar_transferencia = "INSERT INTO `transacciones`(`cajadeahorro`, `caja_destino`, `tipo`, `monto`, `descripcion`, `fecha`) 
                                                            VALUES ('$cajaorigen','$cajadestino','$tipo','$saldoAtransferir','$descripcion', CURRENT_DATE)";
                                $enviar_transferencia_query = mysqli_query($conexion,$enviar_transferencia);

                                $actualizar_saldo_sesion = "UPDATE `cuenta` SET `saldo`= `saldo` - '$saldoAtransferir' WHERE cajadeahorro = '$cajaorigen';";
                                $cactualizar_saldo_sesion_query = mysqli_query($conexion,$actualizar_saldo_sesion);

                                $actualizar_saldo_destino = "UPDATE `cuenta` SET `saldo`= `saldo` + '$saldoAtransferir' WHERE cajadeahorro = '$cajadestino';";
                                $actualizar_saldo_destino_query = mysqli_query($conexion,$actualizar_saldo_destino);

                                $descripcion = null;
                                $cajadestino = null;
                                $saldoAtransferir = null;

                                header("location: index.php");
                            }
                        }
                        ?>
                    <div class="bg-secondary text-light p-3 rounded-4">
                        <h3 class="mb-4">Ingresar saldo</h3>

                        <form action="#" method="POST">
                            <label for="" class="form-label">Cantidad:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text text-success">$</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="saldodeseado">
                                <span class="input-group-text">.00</span>
                            </div>
                        
                            <input type="submit" value="PAGAR" class="btn btn-sm btn-outline-dark text-dark bg-light" name="comprarsaldo">
                        </form>
                        <?php 
                        if(isset($_POST['comprarsaldo'])){
                            if(strlen($_POST['saldodeseado']) >= 1){
                                $saldoDeseado = trim($_POST["saldodeseado"]);
                                $cajaorigen = $_SESSION["caja"];
                                
                                $añadir_saldo = "UPDATE `cuenta` SET `saldo`=`saldo`+$saldoDeseado WHERE cajadeahorro = '$cajaorigen';";
                                $añadir_saldo_query= mysqli_query($conexion,$añadir_saldo);;
                                $saldoDeseado = 0;
                                header("location: index.php");
                            }
                        }
                        ?>
                    </div>
                    </div>
                    <div class="col-sm-6  m-3">
                        <div class="bg-dark text-light p-3 rounded-4 h-100">
                            <h3 class="mb-4">Transacciones</h1>
                            <?php
                                $obtener_transacciones = "SELECT `cajadeahorro`, `caja_destino`, `tipo`, `monto`, `descripcion`, `fecha` 
                                                            FROM `transacciones` WHERE cajadeahorro = '$cajaorigen' 
                                                            ORDER BY fecha DESC LIMIT 10
                                                            ;";
                                $obtener_transacciones_query = mysqli_query($conexion,$obtener_transacciones);

                                $_SESSION['transacciones'] = []; // ARRAY PARA GUARDAR LAS 10 TRANSACCIONES

                                while ($datos = $obtener_transacciones_query->fetch_object()) {
                                    $_SESSION['transacciones'][] = [
                                        'tipo' => $datos->tipo,
                                        'monto' => $datos->monto,
                                        'descripcion' => $datos->descripcion,
                                        'fecha' => $datos->fecha,
                                        'caja_destino' => $datos->caja_destino
                                    ];
                                }

                                if (!empty($_SESSION['transacciones'])) {

                                    if (!empty($_SESSION['transacciones'])) {
                                        echo '<table class="table table-dark table-striped" >';
                                        echo '<tr>
                                                <th>Destino</th>
                                                <th>Tipo</th>
                                                <th>Monto</th>
                                                <th>Descripción</th>
                                                <th>Fecha</th>
                                              </tr>';
                                    
                                        // Recorrer cada transacción y mostrar sus detalles en una fila de la tabla
                                        foreach ($_SESSION['transacciones'] as $transaccion) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($transaccion['caja_destino']) . '</td>';
                                            echo '<td>' . htmlspecialchars($transaccion['tipo']) . '</td>';
                                            echo '<td> $' . htmlspecialchars($transaccion['monto']) . '</td>';
                                            echo '<td>' . htmlspecialchars($transaccion['descripcion']) . '</td>';
                                            echo '<td>' . htmlspecialchars($transaccion['fecha']) . '</td>';
                                            echo '</tr>';
                                        }
                                    
                                        echo '</table>';
                                    } else {
                                        // Mostrar mensaje si no hay transacciones
                                        echo '<b style="color:red;">NO HAY TRANSACCIONES PARA MOSTRAR</b>';
                                    }
                                } else {
                                    echo '<b style="color:red;">ERROR AL CARGAR TRANSACCIONES o NO HAY TRANSACCIONES PARA MOSTRAR</b>';
                                }

                                
                            ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    <?php
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