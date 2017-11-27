<?php
/**
 * Created by PhpStorm.
 * User: valerianearon
 * Date: 26/11/2017
 * Time: 17:00
 */

/**
 * Renvoie la page d'accueil avec toutes les images
 */
function indexAction(){

    // Inclusion de la page d'accueil (home.php)
    include('views/home.php');
}
/**
 * Suppression d'une image
 */
function deleteImage(){
    // Récupération de l'id de l'image à supprimer

    if (file_exists(DIR_PATH . $_GET ['id'])) {
//        echo "Le fichier "DIR_PATH . $_GET ['id']" existe.";
        unlink(DIR_PATH . $_GET ['id']);
    } else {
//        echo "Le fichier DIR_PATH . $_GET ['id'] n'existe pas.";

    }
    // On redirige vers la page d'accueil
    header('Location: index.php');

}