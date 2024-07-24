<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Site web Garage - Ajouter un véhicule</title>
    <link rel="stylesheet" href="../../../styles.css">
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

    <h2 class="description">Renseignez les informations du véhicule</h2><br>
    <div id="form">
        <form method="POST" action="ajout_voiture.php" enctype="multipart/form-data">

            <div>
                <label class="texte">Marque : </label><br>
                <input type="text" name="marqueVoiture"><br><br>
            </div>

            <div>
                <label class="texte">Modèle : </label><br>
                <input type="text" name="modeleVoiture"><br><br>
            </div>

            <div>
                <label class="texte">Carburant : </label><br>
                <select class="texte" name="carburantVoiture">
                    <option value="Essence">Essence</option>
                    <option value="Diesel">Diesel</option>
                </select><br><br>
            </div>

            <div>
                <label class="texte">Couleur : </label><br>
                <select class="texte" name="couleurVoiture">
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
            </div>

            <div>
                <label class="texte">Numéro d'immatriculation : </label><br>
                <input type="text" placeholder="123456NC" pattern="[1-4]{1}[0-9]{5}[A-Z]{2}" name="immatVoiture"><br><br>
            </div>

            <div>
                <label class="texte">Prix (en francs CFP): </label><br>
                <input type="text" name="prixVoiture"><br><br>
            </div>

            <div>
                <label class="texte">Nombre de kilomètre : </label><br>
                <input type="text" name="kmVoiture">
                <p class="texte">km</p><br><br>
            </div>

            <div>
                <label class="texte">Date de première mise en circulation :</label>
                <input type="date" name="datPremCirc"><br><br>
            </div>

            <div>
                <label class="texte">Date mise en garage :</label>
                <input type="date" name="datGarage"><br><br>
            </div>

            <div>
                <label class="texte">Nombre de chevaux fiscaux : </label><br>
                <input type="text" name="nbChevFisc"><br><br>
            </div>

            <div>
                <label class="texte">Ajouter une image : </label><br>
                <input type="file" id="img_voiture" name="img_voiture" accept=".jpg, .jpeg, .png" required><br><br>
            </div>

            <div>
                <label class="texte">Ajouter une description (256 caractères max): </label><br>
                <textarea name="descVoiture" maxlength="256" cols="20" rows="5"></textarea><br><br>
            </div>

            <input class="bouton_ajout" type="submit" name="submit" value="Ajouter"></a>
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