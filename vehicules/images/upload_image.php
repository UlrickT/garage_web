<?php
    include "../../../connexion.php";  

    if (isset($_POST['submit'])){
        $imgName =  $_FILES['img_voiture']['name'];
        $imgSize = $_FILES['img_voiture']['size'];
        $tmp_name = $_FILES['img_voiture']['tmp_name'];

        $imgExt = pathinfo($imgName, PATHINFO_EXTENSION);

        if ($imgExt == 'png' or $imgExt == 'jpg' or $imgExt == 'jpeg'){

            $img_name = uniqid();
            $newImgName = $img_name. '.'.$imgExt;
            
            //echo "Répertoire racine du serveur : " . $_SERVER['DOCUMENT_ROOT'];

            $cheminImages = $_SERVER['DOCUMENT_ROOT'] . '/garage_web/vehicules/images/img/';
            move_uploaded_file($tmp_name, $cheminImages . $newImgName);

            $sql = "INSERT INTO upload(image) VALUES ('$newImgName');";

            $connexion->query($sql);
            
        }
        else{
            echo "<script>
            alert ('Les images doivent être en .png, .jpg ou en .jpeg')
            </script>";
        }      
    }
?>