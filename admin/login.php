<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Site web Garage</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>

    <header>
        <h1><a class="titre_site" href="../">Site web Garage</a><h1>
        
    </header>
    <ul>
        <li><a href="../">Accueil</a></li>
        <li><a href="../vehicules/all/affich_voiture.php">Voir tous les véhicules</a></li>
        <li><a href="../vehicules/search/recherche.php">Rechercher un véhicule</a></li>
        <li><a href="../contact/contact.php">Contact</a></li>
        <li><a href="../a-propos/a_propos.php">A propos</a></li>
        <li style="float:right">
            <form action="login.php" method="post" >
                <input id="btn_conn" type="submit" name="connexion" value="Se connecter">
            </form>
        </li>
    </ul>
    <h1 class="titre">Connexion - Admininistrateur</h1>

    <div id="form_connexion">
        <form action="login.php#" method="post">
            <label class="texte">Nom d'utilisateur</label><br>
            <input type="text" name="username"><br>
            <label class="texte">Mot de passe</label><br>
            <input type="password" name="password"><br><br>
            <input class="bouton_modif" type="submit" name="login" value="Connexion"><br>
        </form>
        <?php
            include "../connexion.php";

            if (isset($_POST['login'])){

                //On récupère le nom d'utilisateur et le mot de passe
                $_SESSION['username'] = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
                $_SESSION['password'] = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);

                //Pour la requete SQL
                $username = $_SESSION['username'];
                $password = $_SESSION['password'];
                $sql = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password';";

                $result = $connexion->query($sql);

                if($result->num_rows >= 1){
                    header("Location: ../admin/index.php");
                }
                else{
                    echo "<h3 class='texte_echec'>Mauvais nom d'utilisateur / mot de passe</h3>";
                }   
                $connexion->close();
            }
        ?>
    </div>
    

    <br><br>

    <div class="footer">
        Copyright 2024
    </div>
</body>

</html>

