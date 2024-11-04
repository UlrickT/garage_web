<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width= , initial-scale=1.0">
        <link rel="stylesheet" href="../../../styles.css">
        <title>Ajouter un véhicule</title>
    </head>
    <body>
        <header>
            <h1><a class="titre_site" href="../../">Site web Garage - Administrateur<?php echo " ".$_SESSION['username']?></a><h1>
        </header>
        <ul>
            <li><a href="../../">Accueil</a></li>
            <li><a class="active" href="form_ajout_voiture.php">Ajouter</a></li>
            <li><a href="../suppr_voiture/liste_suppr_voiture.php">Supprimer</a></li>
            <li><a href="../modif_voiture/liste_modif_voiture.php">Modifier</a></li>
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
        
        <h1 class="titre">Ajouter un véhicule</h1>
        
        <?php
        include "../../../connexion.php";

        if (isset($_POST['submit'])){
                        
            $marqueVoiture=$_POST['marqueVoiture'];
            $modeleVoiture=$_POST['modeleVoiture'];
            $carburantVoiture=$_POST['carburantVoiture'];
            $couleurVoiture=$_POST['couleurVoiture'];
            $immatVoiture=$_POST['immatVoiture'];
            $prixVoiture=$_POST['prixVoiture'];
            $kmVoiture=$_POST['kmVoiture'];
            $datPremCirc=$_POST['datPremCirc'];
            $datGarage=$_POST['datGarage'];
            $nbChevFisc=$_POST['nbChevFisc'];
            $descVoiture=$_POST['descVoiture'];
            
            $sql ="INSERT INTO voiture(marque_voiture, modele_voiture, carb_voiture, couleur_voiture, num_immat, prix_voiture, km_voiture, date_prem_circu, date_rentree_garage, nb_chev_fisc, description) 
            VALUES ('$marqueVoiture','$modeleVoiture','$carburantVoiture', '$couleurVoiture','$immatVoiture','$prixVoiture','$kmVoiture','$datPremCirc','$datGarage','$nbChevFisc','$descVoiture');";
    
            //echo $sql;
            
            $connexion->query($sql);
            if(!$connexion->error){echo '<p class="texte_reussite">La voiture a bien été enregistré dans la base de données</p><br>';}
            mysqli_close($connexion);

            include "../../../vehicules/images/upload_image.php";
        }

        ?>

        <br><br>
        <a class="bouton" href='form_ajout_voiture.php'>Ajouter un autre véhicule</a>
        <a class="bouton" href='../../'>Retourner à la page d'accueil</a>

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