<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Site web garage</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1><a class="titre_site" href="../garage_web/">Site web Garage</a><h1>
    </header>
    <ul>
        <li><a class="active" href="../garage_site/">Accueil</a></li>
        <li><a href="vehicules/all/affich_voiture.php">Voir tous les véhicules</a></li>
        <li><a href="vehicules/search/recherche.php">Rechercher un véhicule</a></li>
        <li><a href="contact/contact.php">Contact</a></li>
        <li><a href="a-propos/a_propos.php">A propos</a></li>
        <li style="float:right">
            <form action="../garage_web/index.php" method="post" >
                <input id="btn_conn" type="submit" name="connexion" value="Se connecter">
            </form>
        </li>
    </ul>
        
    <h1 class="titre">Derniers véhicules</h1>
    
    <div id="barre_recherche">
        <form action="vehicules/search/recherche.php#" method="post" >
            <input type="text" name="saisie" required>
            <input type="submit" name="rechercher" class="bouton_recherche" value="Rechercher">
        </form>
    </div>

    <?php
        include "connexion.php";
        
        $sql = "SELECT voiture.*, upload.image FROM voiture INNER JOIN upload ON voiture.id_voiture = upload.id_image ORDER BY voiture.id_voiture DESC;";

        $listeVoiture = $connexion->query($sql);

        while ($voiture = $listeVoiture->fetch_assoc()) {
            echo '<div id="voiture_box">';
            echo '<img src="vehicules/images/img/'.$voiture['image'].'"width="150" height="100" style="float:left">';
            echo '<p class="texte">'.$voiture['marque_voiture']." ". $voiture['modele_voiture']."<br>";
            echo 'Prix : '.$voiture['prix_voiture'].' Francs CFP '."<br>";
            echo 'Kilométrage : '.$voiture['km_voiture']." km<br>";
            echo 'Date mise au garage : '.$voiture['date_rentree_garage']."<br>";
            echo "<a href='vehicules/all/voiture_info.php?id=".$voiture['id_voiture']."'>En savoir plus</a></p>";
            echo '</div><br>'; 
        }
    ?>

    <br><br>

    <div class="footer">Copyright 2024</div>
</body>

</html>

<?php
    if (isset($_POST['connexion'])){
        header("Location: admin/login.php");
    }  
?>

<?php
    include "connexion.php";

    if(isset($_POST['saisie'])){
 
        $saisie = filter_input(INPUT_POST,"saisie",FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($_POST['rechercher'])){

            echo "Liste des véhicules ".$saisie."<br><br>";
    
            $sql = "SELECT * FROM voiture INNER JOIN upload ON voiture.id_voiture = upload.id_image WHERE marque_voiture = '$saisie';";
    
            echo '<table border="0">';
            $listeVoiture = $connexion->query($sql);
    
            while ($voiture = $listeVoiture->fetch_assoc()) {
                echo '<div id="voiture_box">'; 
                echo '<img src="../admin/images/img/'.$voiture['image'].'"width="150" height="100" style="float:left">';
                echo $voiture['marque_voiture']." ". $voiture['modele_voiture']."<br>";
                echo 'Prix : '.$voiture['prix_voiture'].' Francs CFP '."<br>";
                echo 'KilomÃ©trage : '.$voiture['km_voiture']." km<br>";
                echo 'Date mise au garage : '.$voiture['date_rentree_garage']."<br>";
                echo "<a href='../afficher_voiture/voiture_info.php?id=".$voiture['id_voiture']."'>En savoir plus</a><br><br>";
                echo '</div><br>';
            }
        }
        else{
            echo 'Aucune voiture trouvée.';
        }
    }   

    $connexion->close();
?>