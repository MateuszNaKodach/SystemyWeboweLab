<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Free mobile app makes your decisions easily.">
    <meta name="keywords"
          content="decily, decide, easily, outfit, fashion, brand, new, look, stylization, moda, ciuchy, stylizacja, łatwiej, decyzja">
    <meta name="author" content="Mateusz Nowak">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decily - Registration result</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"/>
</head>
<body>
<div class="container center-align">
    <div class="row center-align">
        <div class="col s12 m7 center-align">
            <div class="card">
                <div class="card-image">
                    <img src="images/DecilyCardViewLogo.png" width="50%" height="50%">
                    <span class="card-title">Registration</span>
                </div>
                <div class="card-content">
                    <?php
                    require_once 'service-registration.php';
                    ?>
                </div>
                <div class="card-action">
                    <a href="fashion_blog.php">Fashion blog</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>