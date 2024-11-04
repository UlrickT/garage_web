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
        <li><a href="../all/affich_voiture.php">Voir tous les véhicules</a></li>
        <li><a class="active" href="../search/recherche.php">Rechercher un véhicule</a></li>
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

    <h1 class="titre">Rechercher un véhicule</h1>

    <div id="barre_recherche">
        <form action="recherche.php#" method="post" >
            <input type="text" name="saisie" required>
            <input type="submit" name="rechercher" class="bouton_recherche" value="Rechercher">
        </form>
    </div>

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

<?php
    include "../../../connexion.php";
    if(isset($_POST['saisie'])){
        $saisie = $_POST['saisie'];

        if (isset($_POST['rechercher'])){   
            $sql = "SELECT voiture.*, upload.image FROM voiture INNER JOIN upload ON voiture.id_voiture = upload.id_image WHERE voiture.marque_voiture = '$saisie';";
            //echo $sql;
            
            echo '<table border="0">';
            $listeVoiture = $connexion->query($sql);
    
            while ($voiture = $listeVoiture->fetch_assoc()) {
                echo '<div id="voiture_box">';
                echo '<img src="../../../vehicules/images/img/'.$voiture['image'].'"width="150" height="100" style="float:left">';
                echo '<p class="texte">'.$voiture['marque_voiture']." ". $voiture['modele_voiture']."<br>";
                echo 'Prix : '.$voiture['prix_voiture'].' Francs CFP '."<br>";
                echo 'Kilométrage : '.$voiture['km_voiture']." km<br>";
                echo 'Date mise au garage : '.$voiture['date_rentree_garage']."<br>";
                echo "<a href='../all/voiture_info.php?id=".$voiture['id_voiture']."'>En savoir plus</a><br></p>";
                echo '<a class="bouton_modif" href="../modif_voiture/form_modif_voiture.php?id=' . $voiture['id_voiture']. '">Modifier</a>';
                echo " ";
                echo '<a class="bouton_suppr" href="../suppr_voiture/suppr_voiture.php?id=' . $voiture['id_voiture']. '">Supprimer</a>';
                echo '</div><br>';
            }
        }
    }
    else{
        $sql = "SELECT voiture.*, upload.image FROM voiture INNER JOIN upload ON voiture.id_voiture = upload.id_image ORDER BY voiture.id_voiture DESC;";
        //echo $sql;
        
        echo '<table border="0">';
        $listeVoiture = $connexion->query($sql);

        while ($voiture = $listeVoiture->fetch_assoc()) {
            echo '<div id="voiture_box">';
            echo '<img src="../../../vehicules/images/img/'.$voiture['image'].'"width="150" height="100" style="float:left">';
            echo '<p class="texte">'.$voiture['marque_voiture']." ". $voiture['modele_voiture']."<br>";
            echo 'Prix : '.$voiture['prix_voiture'].' Francs CFP '."<br>";
            echo 'Kilométrage : '.$voiture['km_voiture']." km<br>";
            echo 'Date mise au garage : '.$voiture['date_rentree_garage']."<br>";
            echo "<a href='../all/voiture_info.php?id=".$voiture['id_voiture']."'>En savoir plus</a><br></p><br>";
            echo '<a class="bouton_modif" href="../modif_voiture/form_modif_voiture.php?id=' . $voiture['id_voiture']. '"><img src="../icons/modif.png" width="25" height="25"></a>
            <a class="bouton_suppr" href="../suppr_voiture/suppr_voiture.php?id=' . $voiture['id_voiture']. '"><img src="../icons/trash.png" width="25" height="25"></a>';
            echo '</div><br>';
        }
    }

    $connexion->close();
?>