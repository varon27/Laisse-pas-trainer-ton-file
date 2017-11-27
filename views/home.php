<?php
/**
 * Created by PhpStorm.
 * User: valerianearon
 * Date: 26/11/2017
 * Time: 16:48
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Laisse pas trainer ton file</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="views/assets/css/stylesheet.css">
</head>
<body>

<div class="container">
    <div class="header-banner jumbotron header-underline">
        <h1>Laisse pas trainer ton file</h1>
    </div>

    <form action="upload.php" method="post" enctype="multipart/form-data">

        <input type="file" name="files[]" multiple >
        <input type="submit" value="Envoyer le fichier" >
    </form>

    <div class="row">

        <!-- Le bloc ci dessous permet d'afficher les card avec chaque image, ce dernier devra se répéter pour toutes les images -->
        <?php $files = scandir(DIR_PATH);
        foreach ($files as $position => $image) {
            if($image !='.' && $image != '..') { ?>
                <div class="thumbnail col-sm-6 col-md-4">
                    <div class="img-box">
                        <!-- Ici devra s'afficher l'image -->
                        <h2 class="titre_image"><?php echo $image; ?></h2>
                        <img class=" img-border" src="<?php echo DIR_PATH . $image; ?>" alt="<?php echo $image; ?>">
                        <!-- End -->
                    </div>
                    <div>
                        <p class="item-actions">
                        <!-- Lien vers la page de suppression, ce dernier doit avoir une indication dans l'url permettant d'identifier quelle image supprimer -->
                        <a href="index.php?section=delete&id=<?php echo $image; ?>" class="btn btn-delete" role="button">Supprimer</a>
                        </p>
                    </div>
                </div>
        <?php }} ?>
    </div>
</div>


