<?php
require 'db-config.php';

try {
    $conn = new PDO($db_dsn, $db_user, $db_pass);
    // set the PDO error mode to exception
    //echo "Connected successfully";

    if (isset($_POST['valider'])) {
        if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['poids']) AND !empty($_POST['taille']) AND !empty($_POST['age']) AND !empty($_POST['region']) AND !empty($_POST['email']))
           
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $poids = htmlspecialchars($_POST['poids']);
            $taille = htmlspecialchars($_POST['taille']);
            $age = htmlspecialchars($_POST['age']);
            $sexe = htmlspecialchars($_POST['sexe']);
            $region = htmlspecialchars($_POST['region']);
            $email = htmlspecialchars($_POST['email']);
            $idMat = null;

            if ($_POST['consentement'] == true) {
                if (empty($_POST['idMat']))
                    $msg_error = 'Si vous nous autoriser à utiliser vos données, vous devez entrez votre n° adhérent de la MATMUT !';
                else {
                    $idMat = htmlspecialchars($_POST['idMat']);
                }
            }

            // Requête mysql pour insérer des données
            $sql = "INSERT INTO personnes ('nom', 'prenom', 'poids', 'taille', 'age', 'sexe' , 'region' , 'email' , 'idMatmut' ) VALUES (?,?,?,?,?,?,?,?)";
            $res = $pdo->prepare($sql);
            $exec = $res->execute(array($nom, $prenom, $poids, $taille, $age, $sexe, $region, $email, $idMat));
            // vérifier si la requête d'insertion a réussi
            if ($exec) {
                $_SESSION['msg_suc'] = 'Données insérées avec succès !';
                header("Location:prediction.php");
            } else {
                $msg_error = "Échec de l'opération d'insertion";
            }
        } 

        else {
            $msg_error = 'Vous devez remplir tous les champs requis !';
        }
    
} catch (PDOException $e) {
    $msg_error = "Connection failed: " . $e->getMessage();
}
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
        <a href="index.php" class="btn btn-outline-warning btn-sm" tabindex="-1" role="button">Retour</a>
    </div>

    <div class="conatiner">
        <h5 class="h5 text-secondary">Entrez vos données</h5>
    </div>

    <!-- Formulaire -->
    <div class="mt-3 mb-3 card">
        <?php if (isset($msg_error)) {  ?>
            <div class="container mt-3">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $msg_error; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php }  ?>

        <div class="card-body">

            <form action="" method="POST">
                <div class="mb-2 row">
                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nom" name="nom" value="<?php if (isset($nom)) {
                                                                                                                echo $nom;
                                                                                                            } ?>">
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="prenom" name="prenom" value="<?php if (isset($prenom)) {
                                                                                                                        echo $prenom;
                                                                                                                    } ?>">
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="poids" class="col-sm-2 col-form-label">Poids(en kg)</label>
                    <div class="col-sm-8">
                        <input type="number" min="1" class="form-control form-control-sm" id="poids" name="poids" value="<?php if (isset($poids)) {
                                                                                                                                echo $poids;
                                                                                                                            } ?>">
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="taille" class="col-sm-2 col-form-label">Taille(en cm)</label>
                    <div class="col-sm-8">
                        <input type="number" min="1" class="form-control form-control-sm" id="taille" name="taille" value="<?php if (isset($taille)) {
                                                                                                                                echo $taille;
                                                                                                                            } ?>">
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="age" class="col-sm-2 col-form-label">Age</label>
                    <div class="col-sm-8">
                        <input type="number" min="1" class="form-control form-control-sm" id="age" name="age" value="<?php if (isset($age)) {
                                                                                                                            echo $age;
                                                                                                                        } ?>">
                    </div>
                </div>

                <div class="mb-2 row">
                    <label class="col-sm-2 col-form-label">Sexe</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexe" id="s_masculin" value="M">
                            <label class="form-check-label" for="s_masculin">Masculin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexe" id="s_feminin" value="F">
                            <label class="form-check-label" for="s_feminin">Féminin</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="region" class="col-sm-2 col-form-label">Region</label>
                    <div class="col-sm-10">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select form-select-sm" id="region" aria-label="Region" name="region" value="<?php if (isset($region)) {
                                                                                                                                    echo $region;
                                                                                                                                } ?>">
                                    <option value="rouen">Rouen</option>
                                    <option value="paris">Paris</option>
                                    <option value="rennes">Rennes</option>
                                    <option value="nantes">Nantes</option>
                                    <option value="marseille">Marseille</option>
                                    <option value="lille">Lille</option>
                                </select>
                                <label for="floatingSelectGrid">Selectionnez votre région de résidence</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="mdo@example.com" value="<?php if (isset($email)) echo $email; ?>">
                    </div>
                </div>

                <div class="mb-3 form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="consentement" name="consentement" value="true">
                    <label class="form-check-label" for="consentement">Autorisez l'application à utiliser vos données personnelles chez la MATMUT </label>
                </div>

                <div class="mb-3 row">
                    <label for="idMat" class="col-sm-2 col-form-label">N° d'adhérent MATMUT</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="idMat" name="idMat" placeholder="Entrez votre n° adhérent de la MATMUT" value="<?php if (isset($idMat)) {
                                                                                                                                                                        echo $idMat;
                                                                                                                                                                    } ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <input type="submit" value="Valider" name="valider" class="btn btn-outline-success float-start">
                    <input type="reset" value="Tout effacer" class="btn btn-outline-danger float-end">
                </div>
            </form>
        </div>
    </div>

</body>

</html>