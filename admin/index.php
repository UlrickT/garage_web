<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Site web garage - Administrateur</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>       
    <header>
        <h1><a class="titre_site" href="index.php">Site web Garage - Administrateur<?php echo " ".$_SESSION['username']?></a><h1>
    </header>
    <ul>
        <li><a class="active" href="../admin/">Accueil</a></li>
        <li><a href="vehicules/ajout_voiture/form_ajout_voiture.php">Ajouter</a></li>
        <li><a href="vehicules/suppr_voiture/liste_suppr_voiture.php">Supprimer</a></li>
        <li><a href="vehicules/modif_voiture/liste_modif_voiture.php">Modifier</a></li>
        <li><a href="vehicules/all/affich_voiture.php">Voir tous les véhicules</a></li>
        <li><a href="vehicules/search/recherche.php">Rechercher un véhicule</a></li>
        <li style="float:right">
            <form action="index.php" method="post" >
                <input id="btn_deconn" type="submit" onclick="return confirmDeconn();" name="deconnexion" value="Déconnexion">

                <script>
                    function confirmDeconn(){
                        return window.confirm("Voulez-vous vous déconnecter ?");
                    }
                </script>
            </form>
        </li>
    </ul>

    <?php
    if (isset($_POST['deconnexion'])){
        session_destroy();
        header("Location: login.php"); 
    }
    ?>

    <p id="buttonTest"></p>
     
    <h1 class="titre">Derniers véhicules au garage</h1>

    <div id="barre_recherche">
        <form action="search/recherche.php#" method="post" >
            <input type="text" name="saisie" required>
            <input type="submit" name="rechercher" class="bouton_recherche" value="Rechercher">
        </form>
    </div>

    <?php
        include "../connexion.php";
        
        $sql = "SELECT * FROM voiture INNER JOIN upload ON voiture.id_voiture = upload.id_image ORDER BY id_voiture DESC;";

        $listeVoiture = $connexion->query($sql);

        while ($voiture = $listeVoiture->fetch_assoc()) {
            echo '<div id="voiture_box">';
            echo '<img src="../vehicules/images/img/'.$voiture['image'].'"width="150" height="100" style="float:left">';
            echo '<p class="texte">'.$voiture['marque_voiture']." ". $voiture['modele_voiture']."<br>";
            echo 'Prix : '.$voiture['prix_voiture'].' Francs CFP '."<br>";
            echo 'Kilométrage : '.$voiture['km_voiture']." km<br>";
            echo 'Date mise au garage : '.$voiture['date_rentree_garage']."<br>";
            echo "<a href='vehicules/all/voiture_info.php?id=".$voiture['id_voiture']."'>En savoir plus</a></p><br>";
            echo '
            <a class="bouton_modif" href="vehicules/modif_voiture/form_modif_voiture.php?id=' . $voiture['id_voiture']. '"><img src="vehicules/icons/modif.png" width="25" height="25"></a>
            <a class="bouton_suppr" href="vehicules/suppr_voiture/suppr_voiture.php?id=' . $voiture['id_voiture']. '"><img src="vehicules/icons/trash.png" width="25" height="25"></a>';
            echo '</div><br>';
        }

    ?>

    <br><br>

    <div class="footer">
        Copyright 2024
    </div>

</body>
</html>