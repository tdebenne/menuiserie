<?php
    if (isset($_GET['rea'])){


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

        $realisationQuery="SELECT fr_desc,ger_desc,title, img_folder FROM realisations WHERE id LIKE ".$_GET['rea'];
        $sttmt=$link->query($realisationQuery)->fetch();
        
        
    }
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <meta name="description" content="Réalisations.">

        <link href="https://fonts.googleapis.com/css2?family=Rouge+Script&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="/menuiserie/assets/css/realisation.css">

        <title><?php echo $sttmt['title'] ?></title>
    </head>
    <body>
        <?php
            echo "<article class='showMore'>";
            $fold =$_SERVER['DOCUMENT_ROOT'].$sttmt['img_folder'].$_GET['rea'];
            if(($doss = opendir($fold)) == true){
                while(($file = readdir($doss)) !== false){
                    if($file != '..' && $file != '.'){
                        echo "<img src='".$sttmt['img_folder'].$_GET['rea']."/".$file."' class ='imgVp'>";
                    }
                }
            } else {
                echo "Erreur à l'ouverture du dossier contenant les images de cette réalisation";
            }
            echo "</article>";
        ?>
    </body>
</html>