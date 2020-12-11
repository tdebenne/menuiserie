<?php

    if(isset($_POST['asup'])){
        // Connexion à la database

        $database=$_SERVER['DOCUMENT_ROOT'].'/menuiserie/database.db';
        try{
            $link = new PDO('mysql:host=localhost;dbname=menuiserie;charset=utf8', 'root', '');
            $link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
        } catch(Exception $e) {
            echo "\nImpossible d'accéder à la base de données MySQL : ".$e->getMessage();
            die();
        }

        // Supression du folder d'images
        $dir=$_SERVER['DOCUMENT_ROOT'].'/menuiserie/assets/css/img/'.$_POST['asup'];
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != '..' && $file != '.'){
                    if(unlink($dir."/".$file) == false){
                        echo "<script> alert('Impossible de supprimer l'image '".$file."'');</script>";
                    }
                }
            }
            closedir($dh);
            if(rmdir($dir) == false){
                echo "<script>alert('Erreur lors de la suppression du répertoire d'images.');</script>";
            } else {
                // Supression dans la database
    
                $removeQuery="DELETE FROM realisations where id like ".$_POST['asup'];
    
                $prep=$link->prepare($removeQuery);
                $prep->execute();
    
                echo "Suppression affectuée.";
            }
        } else {
            echo "Impossible d'ouvrir le répertoire d'images pour supprimer cette réalisation. Veuillez réessayer.";
        }
        
        
    }

?>
	
