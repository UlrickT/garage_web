<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>Site web garage - Liste des véhicules au garage</title>
</head>

<body>
    <header>
        <h1><a class="titre_site" href="../../">Site web Garage</a><h1>
    </header>

    <ul>
        <li><a href="../../">Accueil</a></li>
        <li><a href="../all/affich_voiture.php">Voir tous les véhicules</a></li>
        <li><a class="active" href="recherche.php">Rechercher un véhicule</a></li>
        <li><a href="../../contact/contact.php">Contact</a></li>
        <li><a href="../../a-propos/a_propos.php">A propos</a></li>
        <li style="float:right">
            <form action="recherche.php" method="post">
                <input id="btn_conn" type="submit" name="connexion" value="Se connecter">
            </form>
        </li>
    </ul>

    <h1 class="titre">Rechercher un véhicule</h1>


    <div id="barre_recherche">
        <form action="recherche.php#" method="post">
            <input type="text" name="saisie" required>
            <input type="submit" name="rechercher" class="bouton_recherche" value="Rechercher">
        </form>
    </div>

    <div class="footer">Copyright 2024</div>

</body>

</html>

<?php
if (isset($_POST['connexion'])) {
    header("Location: ../../admin/login.php");
}
?>

<?php
include "../../connexion.php";
if (isset($_POST['saisie'])) {
    $saisie = filter_input(INPUT_POST, "saisie", FILTER_SANITIZE_SPECIAL_CHARS);

    if (isset($_POST['rechercher'])) {
        echo "<p class='texte'>Résultats pour : " . $saisie . "</p>";
        $sql = "SELECT voiture.*, upload.image FROM voiture INNER JOIN upload ON voiture.id_voiture = upload.id_image WHERE voiture.marque_voiture = '$saisie';";
        //echo $sql;

        $listeVoiture = $connexion->query($sql);

        while ($voiture = $listeVoiture->fetch_assoc()) {
            echo '<div id="voiture_box">';
            echo '<img src="../images/img/' . $voiture['image'] . '"width="150" height="100" style="float:left">';
            echo '<p class="texte">' . $voiture['marque_voiture'] . " " . $voiture['modele_voiture'] . "<br>";
            echo 'Prix : ' . $voiture['prix_voiture'] . ' Francs CFP ' . "<br>";
            echo 'Kilométrage : ' . $voiture['km_voiture'] . " km<br>";
            echo 'Date mise au garage : ' . $voiture['date_rentree_garage'] . "<br>";
            echo "<a href='../all/voiture_info.php?id=" . $voiture['id_voiture'] . "'>En savoir plus</a></p>";
            echo '</div><br>';
        }
    }
} else {
    $sql = "SELECT voiture.*, upload.image FROM voiture INNER JOIN upload ON voiture.id_voiture = upload.id_image ORDER BY voiture.id_voiture DESC;";
    //echo $sql;

    $listeVoiture = $connexion->query($sql);

    while ($voiture = $listeVoiture->fetch_assoc()) {
        echo '<div id="voiture_box">';
        echo '<img src="../images/img/' . $voiture['image'] . '"width="150" height="100" style="float:left">';
        echo '<p class="texte">' . $voiture['marque_voiture'] . " " . $voiture['modele_voiture'] . "<br>";
        echo 'Prix : ' . $voiture['prix_voiture'] . ' Francs CFP ' . "<br>";
        echo 'Kilométrage : ' . $voiture['km_voiture'] . " km<br>";
        echo 'Date mise au garage : ' . $voiture['date_rentree_garage'] . "<br>";
        echo "<a href='../all/voiture_info.php?id=" . $voiture['id_voiture'] . "'>En savoir plus</a></p>";
        echo '</div><br>';
    }

    echo '<br>';
}
$connexion->close();
?>