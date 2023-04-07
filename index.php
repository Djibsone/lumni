<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Nom</label><br><br>
        <input type="text" name="nom" id=""><br><br>
        <label for="">Photo</label><br><br>
        <input type="file" name="photo" id=""><br><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
<br><br>
<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = htmlspecialchars($_POST['nom']);

        $photo = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];

        //var_dump('$nom');

        // le chemin du dossier où on stocke les images avant l'envoie dans la db
        $uploads_dir = './photo/'.$photo;

        //deplacement du fichier temporaire vers le dossier du projet
        move_uploaded_file($tmp, "$uploads_dir");
        if (isset($_POST['nom']) && !empty($nom)) {
            //importation de la configuration de la db
            require 'config.php';
            //insertion dans la db
            $qry = $db->prepare('insert into sql_1(nom,photo) values(?,?)');
            $qry->execute(array($nom, $uploads_dir));
        } else {
            // si les champs sont vides
            echo 'Champs vide';
        }
        
    }

?>