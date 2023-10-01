<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Conversor de longitud</title>
</head>
<body>

<?php include 'NavBar.php' ?>

<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require '../clases/ConvertirLongitud.php';
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['longitudSubmit'])) {
            // Obtener valores del formulario
            $cantidad = (float)$_POST['cantidad'];
            $longitudOrigen = $_POST['longitud'];
            $longitudDestino = $_POST['longitudAConvertir'];
        
            // Llamar a la función convertirMasa con los valores del formulario
            $conversion = new RealizarConversionLongitud();
            $resultado = $conversion->convertirLongitud($cantidad, $longitudOrigen, $longitudDestino);
        }
    }
    
    
?>
   
<div class="container">
        <form method="post" action="Longitud.php">
            <div class="row mt-4">
                <div class="col-md-6">
                    <label for="longitud">DE</label>
                    <select name="longitud" id="longitud" class="form-control">
                        <option value="kilometro">Kilometro</option>
                        <option value="metro">Metro</option>
                        <option value="centimetro">Centimetro</option>
                        <option value="milimetro">Milimetro</option>
                        <option value="pulgada">Pulgada</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="longitudAConvertir">A</label>
                    <select name="longitudAConvertir" id="longitudAConvertir" class="form-control">
                        <option value="kilometro">Kilometro</option>
                        <option value="metro">Metro</option>
                        <option value="centimetro">Centimetro</option>
                        <option value="milimetro">Milimetro</option>
                        <option value="pulgada">Pulgada</option>
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
                    <button type="submit" name="longitudSubmit" class="btn btn-primary btn-block">Calcular</button>
                </div>
            </div>
        </form>

        
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
