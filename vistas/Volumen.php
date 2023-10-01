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

    require '../clases/ConvertirVolumen.php';
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['volumenSubmit'])) {
            // Obtener valores del formulario
            $cantidad = (float)$_POST['cantidad'];
            $volumenOrigen = $_POST['volumen'];
            $volumenDestino = $_POST['volumenAConvertir'];
        
            // Llamar a la función convertirMasa con los valores del formulario
            $conversion = new RealizarConversionVolumen();
            $resultado = $conversion->convertirDatos($cantidad, $volumenOrigen, $volumenDestino);
        }
    }
    
    
?>
   
<div class="container">
        <form method="post" action="Volumen.php">
            <div class="row mt-4">
                <div class="col-md-6">
                    <label for="volumen">DE</label>
                    <select name="volumen" id="volumen" class="form-control">
                        <option value="litro">Litros</option>
                        <option value="galon">Galones</option>
                        <option value="onza">Onzas</option>
                        <option value="mililitro">Mililitros</option>
                        <option value="taza">Tazas</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="volumenAConvertir">A</label>
                    <select name="volumenAConvertir" id="volumenAConvertir" class="form-control">
                        <option value="litro">Litros</option>
                        <option value="galon">Galones</option>
                        <option value="onza">Onzas</option>
                        <option value="mililitro">Mililitros</option>
                        <option value="taza">Tazas</option>
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
                    <button type="submit" name="volumenSubmit" class="btn btn-primary btn-block">Calcular</button>
                </div>
            </div>
        </form>

        
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>