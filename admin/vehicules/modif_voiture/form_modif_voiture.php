<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Site web garage - Modifier un véhicule</title>
    <link rel="stylesheet" href="../../../styles.css">
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
    <h1 class="titre">Modifier</h1>
    <h2 class="description">Modifier les informations du véhicule</h2><br>

    <div id="form">
        <form method="POST" action="modif_voiture.php?id=<?php echo $id=$_GET['id']; ?>" enctype="multipart/form-data">

            <label class="texte">Marque : </label><br>
            <input type="text" name="marqueVoiture" value=<?php
                                                            include "../../../connexion.php";

                                                            $id = $_GET['id'];
                                                            $sql = "SELECT `marque_voiture` FROM voiture WHERE id_voiture = $id;";
                                                            $recup = $connexion->query($sql);
                                                            $valeur = $recup->fetch_assoc();
                                                            echo $valeur['marque_voiture'];
                                                            ?>>
            <br><br>

            <label class="texte">Modèle : </label><br>
            <input type="text" name="modeleVoiture" value=<?php
                                                            include "../../../connexion.php";

                                                            $id = $_GET['id'];
                                                            $sql = "SELECT `modele_voiture` FROM voiture WHERE id_voiture = $id;";
                                                            $recup = $connexion->query($sql);
                                                            $valeur = $recup->fetch_assoc();
                                                            echo $valeur['modele_voiture'];
                                                            ?>>
            <br><br>

            <div>
                <label class="texte">Carburant : </label><br>
                <select class="texte" name="carburantVoiture">
                    <option value="<?php include "../../../connexion.php"; $id = $_GET['id'];
                        $sql = "SELECT `carb_voiture` FROM voiture WHERE id_voiture = $id;";
                        $recup = $connexion->query($sql);
                        $valeur = $recup->fetch_assoc();
                        echo $valeur['carb_voiture']; ?>>">
                    
                    <?php include "../../../connexion.php"; $id = $_GET['id'];
                        $sql = "SELECT `carb_voiture` FROM voiture WHERE id_voiture = $id;";
                        $recup = $connexion->query($sql);
                        $valeur = $recup->fetch_assoc();
                        echo $valeur['carb_voiture'];?>
                        </option>
                    <option value="Essence">Essence</option>
                    <option value="Diesel">Diesel</option>
                </select><br><br>
            </div>



            <label class="texte">Couleur : </label><br>
            <select name="couleurVoiture">
                <option value="<?php
                    include "../../../connexion.php";
                    $id = $_GET['id'];
                    $sql = "SELECT `couleur_voiture` FROM voiture WHERE id_voiture = $id;";
                    $recup = $connexion->query($sql);
                    $valeur = $recup->fetch_assoc();
                    echo $valeur['couleur_voiture'];
                    ?>
                ">
                <?php
                include "../../../connexion.php";
                $id = $_GET['id'];
                $sql = "SELECT `couleur_voiture` FROM voiture WHERE id_voiture = $id;";
                $recup = $connexion->query($sql);
                $valeur = $recup->fetch_assoc();
                echo $valeur['couleur_voiture'];
                ?></option>
                <option value="rouge">Rouge</option>
                <option value="blanc">Blanc</option>
                <option value="vert">Vert</option>
                <option value="noir">Noir</option>
                <option value="rose">Rose</option>
                <option value="gris">Gris</option>
                <option value="jaune">Jaune</option>
                <option value="marron">Marron</option>
                <option value="bleu">Bleu</option>
            </select><br><br>

            <label class="texte">Numéro d'immatriculation : </label><br>
            <input type="text" name="immatVoiture" value=<?php
                                                            include "../../../connexion.php";

                                                            $id = $_GET['id'];
                                                            $sql = "SELECT num_immat FROM voiture WHERE id_voiture= $id;";
                                                            $recup = $connexion->query($sql);
                                                            $valeur = $recup->fetch_assoc();
                                                            echo $valeur['num_immat'];
                                                            ?>>
            <br><br>

            <label class="texte">Prix (en francs CFP): </label><br>
            <input type="text" name="prixVoiture" value=<?php
                                                        $id = $_GET['id'];
                                                        $sql = "SELECT prix_voiture FROM voiture WHERE id_voiture= $id;";
                                                        $recup = $connexion->query($sql);
                                                        $valeur = $recup->fetch_assoc();
                                                        echo $valeur['prix_voiture'];
                                                        ?>>
            <br><br>

            <label class="texte">Nombre de kilomètre : </label><br>
            <input type="text" name="kmVoiture" value=<?php
                                                        $id = $_GET['id'];
                                                        $sql = "SELECT `km_voiture` FROM voiture WHERE id_voiture = $id;";
                                                        $recup = $connexion->query($sql);
                                                        $valeur = $recup->fetch_assoc();
                                                        echo $valeur['km_voiture'];
                                                        ?>>
            <p class="texte">km</p><br><br>


            <label class="texte">Date de première mise en circulation :</label>
            <input type="date" name="datPremCirc" value=<?php
                                                        $id = $_GET['id'];
                                                        $sql = "SELECT `date_prem_circu` FROM voiture WHERE `id_voiture`= $id;";
                                                        $recup = $connexion->query($sql);
                                                        $valeur = $recup->fetch_assoc();
                                                        echo $valeur['date_prem_circu'];
                                                        ?>>
            <br><br>

            <label class="texte">Date mise en garage :</label>
            <input type="date" name="datGarage" value=<?php
                                                        $id = $_GET['id'];
                                                        $sql = "SELECT `date_rentree_garage` FROM voiture WHERE id_voiture= $id;";
                                                        $recup = $connexion->query($sql);
                                                        $valeur = $recup->fetch_assoc();
                                                        echo $valeur['date_rentree_garage'];
                                                        ?>>
            <br><br>

            <label class="texte">Nombre de chevaux fiscaux : </label><br>
            <input type="text" name="nbChevFisc" value=<?php
                                                        $id = $_GET['id'];
                                                        $sql = "SELECT `nb_chev_fisc` FROM voiture WHERE id_voiture= $id;";
                                                        $recup = $connexion->query($sql);
                                                        $valeur = $recup->fetch_assoc();
                                                        echo $valeur['nb_chev_fisc'];
                                                        ?>><br><br>
                                                        

            <div>
                <label class="texte">Changer d'image : </label><br>
                
                <!-- Ajouter une nouvelle photo qui va remplacer celle actuelle-->
                <input type="file" name="img_voiture" accept=".jpg, .jpeg, .png">

                <!-- Affiche l'image actuelle -->
                <p>Image actuelle</p>
                <img src ="<?php
                $id = $_GET['id'];
                $sql = "SELECT voiture.*, upload.image FROM voiture INNER JOIN upload ON voiture.id_voiture = upload.id_image WHERE voiture.id_voiture=$id;";
                $recup = $connexion->query($sql);
                $valeur = $recup->fetch_assoc();
                $image = $valeur['image'];
                $filename = '../../../vehicules/images/img/'.$image;
                echo $filename;
                ?>" width='150' height='100'><br>

                <br><br>
            </div>

            <label class="texte">Ajouter une description (256 caractères max): </label><br>
            <textarea name="descVoiture" maxlength="256" cols="20" rows="5"><?php include "../../../connexion.php";
            $id = $_GET['id'];
            $sql = "SELECT description FROM voiture WHERE voiture.id_voiture= $id;";
            $recup = $connexion->query($sql);
            $valeur = $recup->fetch_assoc();
            echo $valeur['description'];?></textarea><br><br>
            <a href="modif_voiture.php?id=<?php echo $id=$_GET['id']; ?>"><input class="bouton_modif" type="submit" name="submit" value="Mettre à jour"></a>
        </form>
    </div>

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