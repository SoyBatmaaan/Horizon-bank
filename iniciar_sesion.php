<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Log in | Horizon Bank</title>
<style>
</style>
</head>
<body>
    <div class="bg-secondary d-flex text-left align-items-center justify-content-center logoff-container">
        <div class="container">
            <div class="row text-dark ms-5 me-5">
                <div class="col"></div>
                <div class="col-sm-10 col-md-6 col-lg-4 bg-light shadow-container rounded-3 p-4"> 
                    <h2 class="mb-5">Log in</h2>
                    <div class="text-left">
                        <form action="#" method="post">
                            <input type="email" class="form-control border-dark mb-3" name="email" id="" placeholder="Correo Electronico" required>
                            <input type="password" class="form-control border-dark mb-3" name="contrasena" id="" placeholder="Contraseña" required>
                            <button type="submit" class="btn btn-primary mb-1" name="logearse">INGRESAR</button>
                            <div class="d-flex mb-4">
                                <p class="me-2">No tenes cuenta?</p><a href="registrarse.php">Registrate acá</a>
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
            include("login_db.php");
    ?>
    
</body>
</html>