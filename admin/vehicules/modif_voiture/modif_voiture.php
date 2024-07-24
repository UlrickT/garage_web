<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width= , initial-scale=1.0">
        <link rel="stylesheet" href="../../../styles.css">
        <title>Modifier un véhicule - Informations</title>
    </head>
    <body>
    
    <header>
        <h1><a class="titre_site" href="../../">Site web Garage - Administrateur<?php echo " ".$_SESSION['username']?></a><h1>
    </header>
    <ul>
        <li><a href="../../">Accueil</a></li>
        <li><a href="../ajout_voiture/form_ajout_voiture.php">Ajouter</a></li>
        <li><a href="../suppr_voiture/liste_suppr_voiture.php">Supprimer</a></li>
        <li><a class="active" href="liste_modif_voiture.php">Modifier</a></li>
        <li><a href="../all/affich_voiture.php">Voir tous les véhicules</a></li>
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

        <?php
            include "../../../connexion.php";

            if (isset($_POST['submit'])){

                include "../../../vehicules/images/update_image.php";
                
                $id=$_GET['id'];
                
                //INFOS VEHICULES
                $marqueVoiture=$_POST['marqueVoiture'];
                $modeleVoiture=$_POST['modeleVoiture'];
                $couleurVoiture=$_POST['couleurVoiture'];
                $immatVoiture=$_POST['immatVoiture'];
                $prixVoiture=$_POST['prixVoiture'];
                $kmVoiture=$_POST['kmVoiture'];
                $datPremCirc=$_POST['datPremCirc'];
                $datGarage=$_POST['datGarage'];
                $nbChevFisc=$_POST['nbChevFisc'];
                $descVoiture=$_POST['descVoiture'];
                
                $sql = "UPDATE `voiture` INNER JOIN `upload` ON voiture.id_voiture = upload.id_image SET 
                `marque_voiture`='$marqueVoiture',
                `modele_voiture`='$modeleVoiture',
                `couleur_voiture`='$couleurVoiture',
                `num_immat`='$immatVoiture',
                `prix_voiture`='$prixVoiture',
                `km_voiture`='$kmVoiture',
                `date_prem_circu`='$datPremCirc',
                `date_rentree_garage`='$datGarage',
                `nb_chev_fisc`='$nbChevFisc',
                `description`='$descVoiture' WHERE id_voiture=$id;";

                $connexion->query($sql); 
                if(!$connexion->error){echo '<p class="texte_reussite">Les informations du véhicule ont été modifiées de la base de données</p><br>';}
                $connexion->close();
            }
        ?>
        
        <a class="bouton" href='liste_modif_voiture.php'>Modifier un autre véhicule</a>
        <a class="bouton" href='../../'>Retourner à la page d'accueil</a><br>

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