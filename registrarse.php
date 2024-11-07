<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Register | Horizon Bank</title>
</head>
<body>
    <div class="bg-secondary d-flex text-left align-items-center justify-content-center logoff-container">
        <div class="container">
            <div class="row text-dark ms-5 me-5">
                <div class="col"></div>
                <div class="col-sm-10 col-md-6 col-lg-4 bg-light shadow-container rounded-3 p-4"> 
                    <h2 class="mb-5">Register</h2>
                    <div class="text-left">
                        <form action="#" method="post">
                            <input type="email" class="form-control border-dark" name="email" id="" placeholder="Correo Electronico" required>
                            <div id="emailHelp" class="form-text mb-3">El que usaras para iniciar sesión.</div>
                            <input type="text" class="form-control border-dark mb-3" name="dni" id="" placeholder="Documento" required>
                            <input type="text" class="form-control border-dark mb-3" name="alias" id="" placeholder="Alias (máx. 12 caracteres)." required>
                            <input type="password" class="form-control border-dark mb-3" name="contrasena" id="" placeholder="Contraseña" pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{10,15}$" title="La contraseña debe tener entre 10 y 15 caracteres, incluir al menos una mayúscula, un número y un símbolo." required>
                            <button type="submit" class="btn btn-primary mb-1" name="registrarse">REGISTRARSE</button>
                            <div class="d-flex mb-4">
                                <p class="me-2">Ya tenes cuenta?</p><a href="iniciar_sesion.php">Ingresa acá</a>
                            </div>
                            <div class="fs-4 text-center">
                                <a href="index.php" class="text-dark text-decoration-none">Inicio</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>

    <?php
        include("register_db.php");
    ?>
</body>
</html>