<?php

if(isset($_POST["valor"])) {
    $valor= floatval($_POST["valor"]);
    $apiUrl="https://v6.exchangerate-api.com/v6/215a82bd9662e3f5a2cb058a/pair/USD/GTQ/{$valor}";
    $iniciarCURL = curl_init($apiUrl);
    curl_setopt( $iniciarCURL, CURLOPT_RETURNTRANSFER, true);
    $respuesta= curl_exec($iniciarCURL);
    if(curl_errno($iniciarCURL)) {
        echo "Error al realizar la solicitud". curl_error($iniciarCURL);
        exit;
    }
    curl_close($iniciarCURL);
    $datos=json_decode($respuesta,true);
    $conversion_quetzal=$datos['conversion_rate'];
    $conversion=$datos['conversion_result'];
}
?>



<!doctype html>
<html lang="en">

<head>
    <title>Api-cambio de precios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        
        <div class="container-sm">
        <br>
        <?php if(isset($conversion)){?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                <strong>Datos de la converción:</strong> <?php echo "<br> {$valor} USD equivale a {$conversion} quetzal. <br> Un dolar equivale a {$conversion_quetzal} quetzal"; ?>
            </div>
            <?php }?>
            
            <div class="card">
                <div class="card-header ">Aplicación para convertir USD a GTQ </div>
                <div class="card-body">

                    <form action="?" method="post">

                        <br/>
                        <label  class="form-label">Convertir de USD a GTQ:</label>
                        <input name="valor" id="valor" class="form-control" type="text" aria-describedby="helpId" placeholder="Escriba la camtidad a comvertir en EUR" />
                        <br/>

                        <input type="submit" class="btn btn-success" value="Convertir a GTQ (quetzal)">

                    </form>

                </div>
                <div class="card-footer text-muted danger">coder-crunch</div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>