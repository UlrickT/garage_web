<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles.css">
    <title>Site web garage - Liste des véhicules au garage</title>
</head>

<body>
    <header>
        <h1><a class="titre_site" href="../../">Site web Garage - Administrateur<?php echo " ".$_SESSION['username']?></a><h1>
    </header>
    <ul>
        <li><a href="../../">Accueil</a></li>
        <li><a href="../ajout_voiture/form_ajout_voiture.php">Ajouter</a></li>
        <li><a href="../suppr_voiture/liste_suppr_voiture.php">Supprimer</a></li>
        <li><a href="../modif_voiture/liste_modif_voiture.php">Modifier</a></li>
        <li><a class="active" href="affich_voiture.php">Voir tous les véhicules</a></li>
        <li><a href="../search/recherche.php">Rechercher un véhicule</a></li>
        <li style="float:right">
            <form action="../../index.php" method="post" >
                <input id="btn_deconn" type="submit" onclick="return confirmDeconn();" name="deconnexion" value="Déconnexion">

                <script>
                    function confirmDeconn(){
                        return window.confirm("Voulez-vous vous déconnecter ?");
                    }
                </script>
            </form>
        </li>
    </ul>

    <h1 class="titre">Liste des véhicules au garage</h1>

    <?php
    include "../../../connexion.php";

    $sql = "SELECT * FROM voiture INNER JOIN upload ON voiture.id_voiture = upload.id_image ORDER BY id_voiture DESC;";
    //echo $sql;

    echo '<table border="0">';
    $listeVoiture = $connexion->query($sql);
    echo '<tr>
        <th>Photo</th>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Carburant</th>
        <th>Couleur</th>
        <th>N° immatriculation</th>
        <th>Prix</th><th>Kilométrage</th>
        <th>1ère mise en circulation</th>
        <th>Date rentrée au garage</th>
        <th>Nb chevaux fiscaux</th>
        <th>Description</th>
        <th>Opération</th>
        </tr>';
    while ($voiture = $listeVoiture->fetch_assoc()) {
        echo '<tr>';
        echo '
            <td><img src="../../../vehicules/images/img/' . $voiture['image'] . ' " width="125" height="75"></td>
            <td>' . $voiture['marque_voiture'] . '</td>
            <td>' . $voiture['modele_voiture'] . '</td>
            <td>' . $voiture['carb_voiture'] . '</td>
            <td>' . $voiture['couleur_voiture'] . '</td>
            <td>' . $voiture['num_immat'] . '</td>
            <td>' . $voiture['prix_voiture'] . ' F</td>
            <td>' . $voiture['km_voiture'] . ' km</td>
            <td>' . $voiture['date_prem_circu'] . '</td>
            <td>' . $voiture['date_rentree_garage'] . '</td>
            <td>' . $voiture['nb_chev_fisc'] . '</td>
            <td>' . $voiture['description'] . '</td>
            <td><a class="bouton_modif" href="../modif_voiture/form_modif_voiture.php?id=' . $voiture['id_voiture']. '"><img src="../icons/modif.png" width="25" height="25"></a>
            <a class="bouton_suppr" href="../suppr_voiture/suppr_voiture.php?id=' . $voiture['id_voiture']. '"><img src="../icons/trash.png" width="25" height="25"></a>
            </td>';
        echo '</tr>';
    }

    echo '</table>';
    $connexion->close();
    ?>
    <br><br>

    <div class="footer">
        Copyright 2024
    </div>
</body>

</html>

<?php
    if (isset($_POST['deconnexion'])){
        session_destroy();
        header("Location: ../../login.php");
    }
?>