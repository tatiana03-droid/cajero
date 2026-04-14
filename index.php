<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cajero Automatico</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        
    </style>
</head>
<body>
   <div class="container d-flex justify-content-center">
    <div class="card atm-card shadow p-4  ">
        <div class="text-center mb-4">
            <h2 class="text-primary fw-bold">Bienvenido a PHP Bank</h2>
        </div>

        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label fw-bold">PIN</label>
                <input type="password" name="pin" class="form-control" placeholder="****" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Monto a retirar</label>
                <div class="input-group">
                    <span class="input-group-text">$</span> <!-- Agrega un simbolo y lo muestra -->
                    <input type="number" name="monto" class="form-control" min="1" placeholder="0.00" required>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-outline-secondary">Realizar retiro</button>
                <!-- Hacemos que la pagina se llame a ella misma o se recargue -->
                <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='index.php'">Finalizar</button>
            </div>
        </form>

        <div class="mt-4">
            <!-- Aqui viene la programacion PHP  -->
            <?php
                //Utilizamos las variables de entorno $_SERVER
                if($_SERVER["REQUEST_METHOD"]=="POST"){   //Preguntamos por el metodo de envio
                    //Capturamos las variables del formulario
                    $pinTngresado = $_POST['pin'];
                    $montoRetirar = $_POST['monto'];
 
                    // Simulamos que los datos estan en una DB
                    $cliente = "Aprendiz"; 
                    $saldoInicial = 50000; //String
                    $pinCorrecto = 12345;  //integer
                    $saldoRetirado = $montoRetirar;

                     //Logica de la validacion
                    if($pinTngresado == $pinCorrecto){
                        echo "<div class='alert alert-info py-2 small'>"; 
                        echo "Tu saldo actual es: <strong>$saldoInicial</strong><br/>";
                        echo "Tu monto a retirar es: <strong>$saldoRetirado</strong></div>";
                                              
                        if($montoRetirar <= $saldoInicial){
                            $nuevoSaldo = $saldoInicial - $montoRetirar;
                            echo "<div class='alert alert-success'><strong>¡Éxito!</strong><br>Tu nuevo saldo es: $nuevoSaldo</div>";
                        }
                        else{
                            echo "<div class='alert alert-primary text-center'>Saldo insuficiente</div>";
                        }
                    }
                    else{
                        echo "<div class='alert alert-danger text-center'>¡Pin incorrecto!</div>";
                    }
                }
            ?>
        </div>
    </div>
</div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>