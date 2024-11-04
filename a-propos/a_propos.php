<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Site web Garage</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>

    <header>
        <h1><a class="titre_site" href="../">Site web Garage</a><h1>

    </header>
    <ul>
        <li><a href="../">Accueil</a></li>
        <li><a href="../vehicules/all/affich_voiture.php">Voir tous les véhicules</a></li>
        <li><a href="../vehicules/search/recherche.php">Rechercher un véhicule</a></li>
        <li><a href="../contact/contact.php">Contact</a></li>
        <li><a class="active" href="a_propos.php">A propos</a></li>
        <li style="float:right">
            <form action="a_propos.php" method="post">
                <input id="btn_conn" type="submit" name="connexion" value="Se connecter">
            </form>
        </li>
    </ul>

    <h1 class="titre">A propos</h1>

    <div id="a_propos">
        <p class="texte">Ce site web répertorie tous les véhicules proposés par le garage</p>
    </div>


    <br><br>

    <div class="footer">
        Copyright 2024
    </div>


</body>

</html>

<?php

if (isset($_POST['connexion'])) {
    header("Location: ../admin/login.php");
}

?>