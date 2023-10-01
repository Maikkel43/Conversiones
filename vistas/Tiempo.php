<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Conversor de Datos</title>
</head>
<body>

<?php include 'NavBar.php' ?>

<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require '../clases/ConvertirTiempo.php';
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['tiempoSubmit'])) {
            // Obtener valores del formulario
            $cantidad = (float)$_POST['cantidad'];
            $tiempoOrigen = $_POST['tiempo'];
            $tiempoDestino = $_POST['tiempoAConvertir'];
        
            // Llamar a la función convertirMasa con los valores del formulario
            $conversion = new RealizarConversionTiempo();
            $resultado = $conversion->convertirDatos($cantidad, $tiempoOrigen, $tiempoDestino);
        }
    }
    
    
?>
   
<div class="container">
        <form method="post" action="Tiempo.php">
            <div class="row mt-4">
                <div class="col-md-6">
                    <label for="tiempo">DE</label>
                    <select name="tiempo" id="tiempo" class="form-control">
                        <option value="segundos">Segundos</option>
                        <option value="minutos">Minutos</option>
                        <option value="horas">Horas</option>
                        <option value="dias">Dias</option>
                        <option value="semanas">Semanas</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="tiempoAConvertir">A</label>
                    <select name="tiempoAConvertir" id="tiempoAConvertir" class="form-control">
                        <option value="segundos">Segundos</option>
                        <option value="minutos">Minutos</option>
                        <option value="horas">Horas</option>
                        <option value="dias">Dias</option>
                        <option value="semanas">Semanas</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <div class="col-md-6">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" required>
                </div>
                <div class="col-md-6">
                <div class="imprimirResultado">
                        <?php if (isset($resultado)): ?>
                            <h2>Resultado:</h2>
                            <p><?php echo $resultado; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <button type="submit" name="tiempoSubmit" class="btn btn-primary btn-block">Calcular</button>
                </div>
            </div>
        </form>

        
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>