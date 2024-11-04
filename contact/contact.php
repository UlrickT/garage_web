<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Site web garage Contact</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <header>
        <h1><a class="titre_site" href="../">Site web Garage</a>
            <h1>

    </header>
    <ul>
        <li><a href="../">Accueil</a></li>
        <li><a href="../vehicules/all/affich_voiture.php">Voir tous les véhicules</a></li>
        <li><a href="../vehicules/search/recherche.php">Rechercher un véhicule</a></li>
        <li><a class="active" href="contact.php">Contact</a></li>
        <li><a href="../a-propos/a_propos.php">A propos</a></li>
        <li style="float:right">
            <form action="contact.php" method="post">
                <input id="btn_conn" type="submit" name="connexion" value="Se connecter">
            </form>
        </li>
    </ul>

    <h1 class="titre">Contacter le garage</h1>

    <div id="form">
        <form action="contact.php#" method="post">
            <label class="texte">Nom :</label><br>
            <input type="text" name="nom_user"><br>
            <label class="texte">Prénom :</label><br>
            <input type="text" name="prenom_user"><br>
            <label class="texte">Adresse e-mail :</label><br>
            <input type="email" name="mail_user" required><br>
            <label class="texte">Message (256 caractères max):</label><br>
            <textarea name="message_user" maxlength="256" cols="20" rows="5"></textarea><br>
            <input type="submit" class="bouton_modif" name="envoyer">
        </form>

        <?php
        include "../connexion.php";

        if (isset($_POST['envoyer'])) {

            $nom_user = filter_input(INPUT_POST, "nom_user", FILTER_SANITIZE_SPECIAL_CHARS);
            $prenom_user = filter_input(INPUT_POST, "prenom_user", FILTER_SANITIZE_SPECIAL_CHARS);
            $mail_user = filter_input(INPUT_POST, "mail_user", FILTER_SANITIZE_EMAIL);
            $message_user = filter_input(INPUT_POST, "message_user", FILTER_SANITIZE_SPECIAL_CHARS);

            $sql = "INSERT INTO contact(nom, prenom, email, message) VALUES ('$nom_user','$prenom_user','$mail_user', '$message_user');";

            $connexion->query($sql);
            if (!$connexion->error) {
                echo '<h3 class="texte_reussite">Message envoyé</h3><br>';
            }

            mysqli_close($connexion);
        }
        ?>

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