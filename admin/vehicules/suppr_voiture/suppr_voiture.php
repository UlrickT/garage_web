<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width= , initial-scale=1.0">
        <link rel="stylesheet" href="../../../styles.css">
        <title>Site web garage - Supprimer un véhicule</title>
    </head>
    <body>
        <header>
            <h1><a class="titre_site" href="../../">Site web Garage - Administrateur<?php echo " ".$_SESSION['username']?></a><h1>
        </header>
        <ul>
            <li><a href="../../">Accueil</a></li>
            <li><a href="../ajout_voiture/form_ajout_voiture.php">Ajouter</a></li>
            <li><a class="active" href="liste_suppr_voiture.php">Supprimer</a></li>
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

        <h1 class="titre">Supprimer un véhicule</h1>

        <?php
            include "../../../connexion.php";
            $id = $_GET['id'];

            $sql="DELETE FROM voiture WHERE id_voiture='$id';";

            $connexion->query($sql); 
            if(!$connexion->error){echo '<p class="texte_reussite">La voiture a bien été supprimé de la base de données</p><br>';}
            $connexion->close();
        ?>
    
    <br><br>
    <a class="bouton" href='liste_suppr_voiture.php'>Supprimer un autre véhicule</a>
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