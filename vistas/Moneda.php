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

    require '../clases/ConvertirMoneda.php';
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['monedaSubmit'])) {
            // Obtener valores del formulario
            $cantidad = (float)$_POST['cantidad'];
            $monedaOrigen = $_POST['moneda'];
            $monedaDestino = $_POST['monedaAConvertir'];
        
            // Llamar a la función convertirMasa con los valores del formulario
            $conversion = new RealizarConversionMoneda();
            $resultado = $conversion->convertirDatos($cantidad, $monedaOrigen, $monedaDestino);
        }
    }
    
    
?>
   
<div class="container">
        <form method="post" action="Moneda.php">
            <div class="row mt-4">
                <div class="col-md-6">
                    <label for="moneda">DE</label>
                    <select name="moneda" id="moneda" class="form-control">
                        <option value="usd">Dolar Estadounidenes</option>
                        <option value="euro">Euro</option>
                        <option value="libra">Libra Esterlina</option>
                        <option value="yen">Yen Japones</option>
                        <option value="dolarCanadiense">Dolar Canadiense</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="monedaAConvertir">A</label>
                    <select name="monedaAConvertir" id="monedaAConvertir" class="form-control">
                        <option value="usd">Dolar Estadounidenes</option>
                        <option value="euro">Euro</option>
                        <option value="libra">Libra Esterlina</option>
                        <option value="yen">Yen Japones</option>
                        <option value="dolarCanadiense">Dolar Canadiense</option>
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
                    <button type="submit" name="monedaSubmit" class="btn btn-primary btn-block">Calcular</button>
                </div>
            </div>
        </form>

        
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>