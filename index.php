<?php
/**
 * Created by PhpStorm.
 * User: valerianearon
 * Date: 26/11/2017
 * Time: 16:54
 */

include 'controlers/fileControler.php';


//Définition de la constante DIR_PATH qui renvoie au chemin du dossier des uploads
define("DIR_PATH", 'uploads/');

// Si aucun parametre n'est défini dans l'url, on appelle la fonction du fileControleur permettant de renvoyer la page d'accueil avec toutes les images contenues dans le dossier "uploads"
if (empty($_GET)){
    indexAction();
}

elseif ($_GET['section'] === 'delete') {
    deleteImage();
}
