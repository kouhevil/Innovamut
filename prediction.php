<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $poids = $_POST['poids'];
    $taille = $_POST['taille'];
    $age = $_POST['age'];
    $sexe = $_POST['sexe'];
    $region = $_POST['region'];
    $email = $_POST['email'];

    echo $nom . " " . $prenom . " ";

    // Envoie de mail
    $url = 'https://innovamut-mail-server.herokuapp.com/email/sendMail';

    $postdata = http_build_query(
        array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        )
    );
    $opts = array('http' =>
        array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
        )
    );
    $context = stream_context_create($opts);
    $result = file_get_contents($url, false, $context);

}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Prédictions - Innovamut</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</head>

<body class="container">
    <!-- Barre de navigation -->
    <nav class="navbar mt-2 navbar-expand-sm navbar-dark bg-dark mb-3">
        <div class="container-sm">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand disabled">
                <img src="https://www.coover.fr/wp-content/uploads/2019/08/matmut-logo.gif" alt="https://www.coover.fr/wp-content/uploads/2019/08/matmut-logo.gif" class="rounded float-end" width="40" height="34">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Assistant
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="kit_assistant.php">Kit assistant</a></li>
                            <li><a class="dropdown-item" href="#">Assistant virtuel - Chatbot</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <a href="logout.php" class="btn btn-outline-danger btn-sm mt-3" tabindex="-1" role="button" aria-disabled="false">Se déconnecter</a>

    <?php if (isset($_SESSION['msg_suc'])) {  ?>
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['msg_suc']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php }  ?>

    <div class="card container-sm my-3">
        <div class="container card-body">
            <div>
                <p class="text-secondary">Bienvenue sur le carnet de santé prédictif</p>
                <a href="#" class="btn btn-success btn-sm" tabindex="-1" role="button" aria-disabled="false">Recevoir vos suggestions par mail</a>
            </div>
        </div>
    </div>
    <p> Bonjour <?php echo $nom ?> <?php echo $prenom ?></p>
    <p id="prediction1" name="nom"></p>
    <p id="prediction2" name="nom"></p>
    <p id="prediction3" name="nom"></p>

    <script type="text/javascript">
        var prediction = new Array();
        var poids1 = <?php echo $poids ?>;
        var taille1 = <?php echo $taille ?>;
        var age1 = <?php echo $age ?>;

        function IMC(monpoids, mataille) {
            var imc = monpoids / (mataille * mataille);
            return imc;
        }
        var imc1 = IMC(poids1, taille1);

        function predict(imc, age) {
            if (imc < 18.5) {
                prediction.push("Vous etes en insuffisance pondérale. Prenez rdv dès que possible avec votre médécin traitant.");
            } else if (imc > 30) {
                prediction.push("Vous etes potentiellement atteint d'obésité. Prenez rdv dès que possible avec votre médécin traitant.");
            } else {
                prediction.push(" Du point de vue, indice masse corporelle tout va bien")
            }
            if (age > 50) {
                prediction.push(" Pensez à la Coléoscopie, et à verifier votre tension. ");
            }else 
            {
                prediction.push(" C'est le moment ideal pour prendre un rdv avec votre dentiste ");
            }
            if (age > 25) {
                prediction.push(" Il serait sage, de songer à faire le rappel de votre vaccin contre la coqueluche. ");
            }else {
                prediction.push(" Il serait sage, de songer à faire le rappel de votre vaccin contre la grippe ");
            }

            return prediction;
        }
        var prediction1 = predict(imc1, age1);

        document.getElementById('prediction1').innerHTML = prediction[0];

        document.getElementById('prediction2').innerHTML = prediction[1];

        document.getElementById('prediction3').innerHTML = prediction[2];

    </script>
</body>


</html>