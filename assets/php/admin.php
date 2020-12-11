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

    $requete="SELECT * FROM admin";
    foreach($link->query($requete) as $resultat){
        echo $resultat['username'];
        echo $resultat['password'];
    }
    
    // Session administrateur

    if( (isset($_POST["identifiant"])) && (isset($_POST["mdp"])) ){
        if( ($_POST['identifiant']==$resultat['password']) && ($_POST['mdp'] == $resultat['password'])){
            $_SESSION["admin"]="connected";
        } else {
            if( ($_POST['identifiant'] != "") && ($_POST['mdp'] !="")  ){
                echo "<script type='text/javascript'> alert('Identifiant ou mot de passe incorrect');</script>";
            }
        }
    }
    
    if(isset($_POST["Deconnexion"]))
    {
        $_SESSION["admin"]="disconnected";
    }
    
    if(!isset($_SESSION["admin"])) {
        $_SESSION["admin"]="disconnected";
    }

    if($_SESSION["admin"]=="disconnected"){
        echo "disconnected";
    } else {
        echo "connected";
    }

    

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<meta name="description" content="Page d'administration du site.">
<title>Menuiserie Ebenisterie Roettele</title>

<link rel="stylesheet" href="/menuiserie/assets/css/admin.css">

</head>


<body>

<?php
        include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/header_2.php');
    ?>

    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/navbar.php');
    ?> 


    <?php
        if(isset($_SESSION["admin"]) && $_SESSION["admin"] == "disconnected"){
            include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/assets/php/connexionForm.php');
        } else {
            include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/assets/php/logOutForm.php');
        }
    ?>

    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/footer.php')
    ?> 

</body>
</html>
<script type="text/javascript" src="/menuiserie/assets/js/admin.js"></script>
