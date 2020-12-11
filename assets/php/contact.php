<?php session_start();
    var_dump(mail('testmen@mailinator.fr','Mon sujet de mon site','Mon message de mon site'));
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<meta name="description" content="Page de contact.">
<title>Menuiserie Ebenisterie Roettele</title>

<link rel="stylesheet" href="/menuiserie/assets/css/contact.css">

</head>


<body>
    
    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/header_2.php');
    ?>

    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/navbar.php');
    ?>  

    <table id="infos">
        <tr>
            <td>
                <article id="contact">
				    <h4>Me contacter</h4>
				    <p>Vous pouvez me contacter par téléphone du lundi au vendredi de 8h à 12h et de 13h30 à 18h30.</p>
                </article>
            </td>
            <td>
                <article id="coordonnees">
				    <h4>Mes coordonnées</h4>
				    <p>Téléphone : 06 XX XX XX XX</p>
                    <p>Mail : thibaut.roettele@gmail.com</p>
                </article>
            </td>   
        </tr>
        <tr>
            <td>
                <article id="zone">
				    <h4>Ma zone d'intervention</h2>
				    <p>Je travaille et me déplace dans toute l'Alsace </p>
                </article>
            </td>
            <td>
                <article id="devis">
				    <h4>Devis</h2>
				    <p>Devis 100% gratuits et valables 1 mois.</p>
                </article>
            </td>
        </tr>
    </table>

    <article id="div_map">
        <h1> Me trouver </h1>
        <table>
            <tr>
                <td>
                    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2652.998443201657!2d7.695664850724786!3d48.322111179136634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4791370cda3158a7%3A0xf2356129eae73fdd!2sRoettele%20Fils!5e0!3m2!1sfr!2sfr!4v1593353973995!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </td>
                <td>
                    <p>Mon atelier se situe à la Ferme des Tuileries, 1 rue des Tuileries, 67860 Rhinau.</p>
                </td>
            <tr>
        </table>
    
    </article>

        <table id="div_fb">
            <tr>
                <td id="td1"> 
                    <a href="https://www.facebook.com/Menuiserie-Eb%C3%A9nisterie-Roettele-Thibaut-351315138789659"><img src="/menuiserie/assets/css/02_facebook.png" id="fb"></a>
                </td>
                <td id="td2">        
                    <p>Je partage l'essentiel de mon actualité et les photos de mes dernières réalisations sur ma page Facebook, n'hésitez pas à la suivre !</p>
                </td>
            </tr>
        </table>

    <table id="partners">
        <p>Je me suis récemment lancé dans la production de bière artisanale et de d'huile. N'hésitez âs à jeter un coup d'oeil aux pages Facebook dediées.</p>
    </table>
    
    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/footer.php')
    ?> 

</body>
</html>