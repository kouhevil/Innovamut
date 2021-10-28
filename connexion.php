<?php

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Formulaire - Innovamut</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</head>

<body class="mt-3 container">
    <div class="mb-3">
        <a href="index.php" class="btn btn-outline-warning btn-sm" tabindex="-1" role="button">Retour à l'accueil</a>
    </div>

    <div class="conatiner">
        <h5 class="h5 text-secondary">Connexion</h5>
    </div>

    <!-- Formulaire -->
    <div class="mt-3 mb-3 card">
        <div class="card-body">

            <form action="prediction.php" method="POST">               
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="mdo@example.com" value="<?php if (isset($email)) echo $email; ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Entrez le mot de passe" >
                    </div>
                </div>

                <div >
                    <input type="button" type="submit" value="Connexion" name="connexion" class="btn btn-outline-success float-start">
                </div>

                
            </form>
        </div>
    </div>

</body>

</html>