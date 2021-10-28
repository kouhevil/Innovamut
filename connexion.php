<?php
require 'db-config.php';
session_start();

try {
    $conn = new PDO($db_dsn, $db_user, $db_pass);

    if (isset($_POST['connexion'])) {
        if (!empty($_POST['email']) and !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `Personnes` WHERE `email`=? and `password`=?";
            $requser = $conn->prepare($sql);
            $requser->execute(array($email, $password));
            $userexist = $requser->rowCount();
            var_dump($userexist);
            if ($userexist <= 0)
                $msg_error = 'Les identifiants ne corespondent pas !';
            else {
                $userinfo = $requser->fetch();
                $_SESSION['email'] = $userinfo['email'];
                header("Location:prediction.php");
            }
        } else
            $msg_error = 'Entrez les identifiants de connexions !';
    }
} catch (PDOException $e) {
    $msg_error = "Connection failed: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Connexion - Innovamut</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</head>

<body class="mt-3 container">

    <nav class="navbar mt-2 mb-3 navbar-expand-sm navbar-dark bg-dark">
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
                    <li class="nav-item">
                        <a class="nav-link" href="kit_assistant.php">Kit assistant</a>
                    </li>
            </div>
        </div>
    </nav>


    <div class="mb-3">
        <a href="index.php" class="btn btn-outline-warning btn-sm" tabindex="-1" role="button">Retour à l'accueil</a>
    </div>

    <div class="conatiner">
        <h5 class="h5 text-secondary">Connexion</h5>
    </div>

    <!-- Formulaire -->
    <div class="mt-3 mb-3 card">
        <div class="card-body">

            <?php if (isset($msg_error)) {  ?>
                <div class="container mt-3">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo $msg_error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php }  ?>

            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="mdo@example.com" value="<?php if (isset($email)) echo $email; ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Entrez le mot de passe">
                    </div>
                </div>

                <div>
                    <input type="submit" value="Connexion" name="connexion" class="btn btn-outline-success float-start">
                </div>
            </form>
        </div>
    </div>

</body>

</html>