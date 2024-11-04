<?php
    include "../../../connexion.php";  

    if (isset($_POST['submit'])){

        $id=$_GET['id'];

        $imgName =  $_FILES['img_voiture']['name'];
        $imgSize = $_FILES['img_voiture']['size'];
        $tmp_name = $_FILES['img_voiture']['tmp_name'];

        $imgExt = pathinfo($imgName, PATHINFO_EXTENSION);

        if ($imgExt == 'png' or $imgExt == 'jpg' or $imgExt == 'jpeg'){

            $img_name = uniqid();
            $newImgName = $img_name. '.'.$imgExt;

            $cheminImages = $_SERVER['DOCUMENT_ROOT'] . '/garage_web/vehicules/images/img/';
            move_uploaded_file($tmp_name, $cheminImages . $newImgName);
            $sql = "UPDATE upload SET `image`='$newImgName' WHERE id_image=$id;";

            $connexion->query($sql);
            
        }
      
    }
?>