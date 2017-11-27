<?php
/**
 * Created by PhpStorm.
 * User: valerianearon
 * Date: 26/11/2017
 * Time: 14:13
 */
//Définition de la constante DIR_PATH qui renvoie au chemin du dossier des uploads
define("DIR_PATH", 'uploads/');

if(!empty($_FILES['files']['name'][0])){

    $files = $_FILES ['files'];
    $uploaded = array();
    $failed = array();

//    Tableau des extensions autorisées
    $allowed = array('png', 'jpg', 'gif');

    foreach ($files ['name'] as $position => $file_name) {

        $file_tmp = $files['tmp_name'] [$position];
        $file_size = $files ['size'] [$position];
        $file_error = $files ['error'] [$position];

//        Récupération de l'extension des $file_name
        $file_ext = explode('.', $file_name);
//        print_r($file_ext);
        $file_ext = strtolower (end ($file_ext));

//        Si l'extension du fichier figure dans le tableau des extensions autorisées
        if (in_array($file_ext,$allowed)) {
            //Si le fichier ne contient pas d'erreur
            if($file_error === 0) {
                //Si le poids du fichier est inférieur à 1 MO
                if($file_size <= 1048576) {
                    //On crée un nouveau nom de fichier avec le préfixe image, puis un uniqid, suivi de l'extension de fichier
                    $file_name_new = 'image' . uniqid('') . '.' . $file_ext;
                    $file_destination = DIR_PATH . $file_name_new;

                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        $uploaded[$position] = $file_destination;
                    } else {
                        $failed [$position] = "[{$file_name}] n'a pas pu être uploadé.\n";
                    }
                } else {
                    $failed [$position] = "[{$file_size}] est trop grand. Le fichier uploadé doit être inférieur à 1 MO.\n";
                }
            } else {
                $failed [$position] = "[{$file_name}] comporte une erreur'{$file_error}'\n";
            }
        } else {
            $failed [$position] = "[{$file_name}] l'extension '{$file_ext}' n'est pas prise en charge\n";
        }
    }

//    if (!empty($uploaded)) {
//        print_r($uploaded);
//    }

//    Si il y a des erreurs de fichiers, les afficher
    if (!empty($failed)){
        print_r($failed);
    }
//    Si le répertoire est le DIR_PATH et renvoie donc vers le dossier des uploads
    if (is_dir(DIR_PATH))
    {
//        Scanner le répertoire
        $files = scandir(DIR_PATH);
//        Boucle for de $files
        for($i = 0; $i < count ($files); $i++)
        {
//            Exclure les noms de fichiers . et .. et pour le reste
            if($files [$i] !='.' && $files[$i] != '..')
            {
//                Afficher le nom du fichier
//                echo "Nom du fichier (image / id unique / extension)-> $files[$i] <br>";

//                Si l'extension du fichier figure dans le tableau des extensions autorisées
                if(in_array($file_ext, $allowed))
                {
//                    Renvoyer l'image du DIR_PATH
                    echo "<img src=" . DIR_PATH . $files[$i] . " style='width: 200px; height: auto;'><br>";
                }
            }
        }
    }
}