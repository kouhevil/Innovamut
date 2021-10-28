<?php 
    require 'db-config.php';
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Page d'accueil - Innovamut</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</head>

<body class="container">
    <!-- Barre de navigation -->
    <nav class="navbar mt-2 navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand disabled">
                <img src="https://www.coover.fr/wp-content/uploads/2019/08/matmut-logo.gif" alt="https://www.coover.fr/wp-content/uploads/2019/08/matmut-logo.gif" class="rounded float-end" width="40" height="34">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="kit_assistant.php">Kit assistant</a>
                    </li>
            </div>
        </div>
    </nav>

    <div class="container my-3">
        <h1 class="h1 text-secondary">Kit assistant </h1>
        <div class="row">
            <div class="col-sm-12">

            </div>
        </div>
            <div class="">
                <p class="text-secondary">Une prédiction</p>
                <p class="text-secondary">Une prédiction</p>
                <p class="text-secondary">Une prédiction</p>
                <p class="text-secondary">Une prédiction</p>
            </div>        
    </div>
</body>

</html>