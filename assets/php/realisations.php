<?php session_start();
    
    


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

    
    // Insertion de l'article dans la database avec upload de l'image
    
    if(isset($_FILES['image']) && isset($_POST['fr_desc']) && isset($_POST['ger_desc']) && isset($_POST['title'])){
        
        $fr=$_POST['fr_desc'];
        $ger=$_POST['ger_desc'];
        $title=$_POST['title'];
        
        //Traitement du fichier

        $taille_maxi = 500000;
        $taille = filesize($_FILES['image']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['image']['name'], '.'); 

        if(!in_array($extension, $extensions)) { //Si l'extension n'est pas dans le tableau
            $erreur = 'Vous devez uploader un fichier de type .png, .gif, .jpg ou .jpeg.';
        }
        if($taille>$taille_maxi){
            $erreur = 'Le fichier est trop gros...';
        }

        if(!isset($erreur)){ 
            
            // Traitement des informations de la publication puis insertion dans la database

            $query=$link->prepare("INSERT INTO realisations (title,fr_desc,ger_desc,img_folder) VALUES (:title,:fr_desc,:ger_desc,:img_folder);");
            $query->execute(array(
                'title' =>$title,
                'fr_desc'=>$fr,
                'ger_desc'=>$ger,
                'img_folder'=>'/menuiserie/assets/css/img/'
            ));

            // Récupération de l'id généré pour créer le folder d'images
            $idQuery="SELECT id FROM realisations WHERE title LIKE '".$title."'";
            $sttmt=$link->query($idQuery)->fetch();
            $id=$sttmt['id'];

            // Création du folder d'images (Pas de doublon possible car id auto incrémenté par la db).

            $dossier =$_SERVER['DOCUMENT_ROOT'].'/menuiserie/assets/css/img/';
            $fichier = basename($_FILES['image']['name']);


            $folder=$dossier.$id;

            if(!mkdir($folder,0777)){
                echo "<script> alert('Impossible de créer le repertoire pour les images.');</script>";

                // Suppression des données de la db à cause de l'impossibilité de mkdir.
                $rmQuery="DELETE FROM realisations WHERE id LIKE '".$sttmt["id"]."'";
                $sttmt=$link->query($rmQuery);
            }

            if(move_uploaded_file($_FILES['image']['tmp_name'], $folder ."/". $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
               echo "<script> alert('Publication effectuée avec succès !')</script>";
            } else { // Sinon (la fonction renvoie FALSE).
            
                echo "<script> alert('Echec de publication (upload) !')</script>";
            }

        } else {
            echo "<script> alert('".$erreur."')</script>";
        }


    }
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<meta name="description" content="Réalisations.">
<title>Menuiserie Ebenisterie Roettelé</title>

<link href="https://fonts.googleapis.com/css2?family=Rouge+Script&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="/menuiserie/assets/css/realisations.css">

<script type="text/javascript" src="/menuiserie/assets/js/realisations.js"></script>


</head>


<body>

    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/header_2.php');
    ?>

    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/navbar.php');
    ?>  

    <?php 
        if(isset($_SESSION["admin"]) && $_SESSION["admin"]=="connected"){
            echo "
            <form method='POST' action=".$_SERVER['REQUEST_URI']." enctype='multipart/form-data' class='form'>
                <h3>Formulaire d'ajout d'un article</h3> 
                
                <label for='title' class='formElem'> Titre :</label>
                <input type='text' id='title' class='formElem' name='title' maxlength='50' required>
                <br>
                <label for='fr_desc' class='formElem'> Description en français : </label>
                <textarea required id='fr' class='formElem' name='fr_desc' maxlength='500'  rows='5' cols='33'></textarea>
                <br>
                <label for='ger_desc' class='formElem'> Description en allemand : </label>
                <textarea  required id='ger' class='formElem' name='ger_desc' maxlength='500'  rows='5' cols='33'  > </textarea>
                <br>
                <label for='add_images' class='formElem'> Ajoutez des images :
                </label>
                
                <input type='hidden' name='MAX_FILE_SIZE' value='500000'>
                <input type='file' name='image' class='formElem' required id='file'>
                <br>
                <input type='submit' class='formElem' name='envoyer' value='Publier l&#145;article' id='validation' required>
            </form>
            ";
        }
    ?>


    <h3 id="mainTitle"> Quelques unes de mes réalisations ...</h3>

    <?php
    
    // Affichage des réalisations

        // Comptage du nombre de réalisations
        $query="SELECT * FROM realisations";
        $nb_real=0;
        foreach($link->query($query) as $result){
            $nb_real++;
        }



        // Affichage en fonction du nombre de réalisations
        if($nb_real > 0){
            $position=1;
            echo"<table class='realisations_list' cellspacing='20'>";
            foreach($link->query($query) as $realisations){
                 // Image de fond
                $img;
                if($dir=opendir('/opt/lampp/htdocs/'.$realisations['img_folder'].$realisations['id'])){
                    do{
                        if(($fichier = readdir($dir)) !== false){
                            $img=$fichier;
                        }
                    } while(($img == "..") || ($img == "."));
                }

                // Création de l'article
                
                if($position%2 != 0){
                    echo "<tr class ='row'>";
                }
                        echo"<td class='cell'>
                                <article class='realisation'>
                                    <img src='/menuiserie/assets/css/img/".$realisations['id']."/".$img."' class='img'>
                                    <p class='title'>".$realisations['title']." </p>
                                    <button type='button' class='button' onclick='voirPLus(".$realisations['id'].")'>Voir plus</button>";
                                    if(isset($_SESSION["admin"]) && $_SESSION["admin"]=="connected"){
                                        echo"	
                                            <form id='formRemove' method='post'>
                                                <input type='button' value='X' class='suppr_button' onclick='remove_event(".$realisations['id'].")'>
                                            </form>";
                                    }
                                echo"</article>
                            </td>
                            ";
                if($position%2 == 0){
                    echo"</tr>";
                }            
                
                if($position == $nb_real){
                    if($nb_real == 1){
                        echo "<td></td>";
                    }
                    echo"</table>";
                }
                $position++;
            }

        } else {
            echo "Cette rubrique est vide pour le moment.";
        }
    ?>

    


    


    				   
    <?php
       include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/footer.php')
    ?>

</body>

</html>