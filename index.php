<?php session_start();
    
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<meta name="description" content="Index du site.">
<title>Menuiserie Ebenisterie Roettele</title>

<link rel="stylesheet" href="assets/css/index.css">

</head>


<body>
    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/navbar.php');
    ?> 
    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/header_1.php');
    ?> 
   
   <div class="prest_1">
    <h1> Presentation </h1>
    <table class="page_organisation">
        <tr>
            <td>
                <article class="presentation">
				    <h4>Qui suis-je ?</h4>
				    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
    
                </article>
            </td>
        </tr>
        <tr>
            <td>
                <article class="presentation">
				    <h4>Mon parcours</h2>
				    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
    
                </article>
            </td>
            <td>
                <article class="presentation">
				    <h4>Mes engagements</h2>
				    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
    
                </article>
            </td>
        </tr>
    </table>
    </div>
    <div class="prest_2">
        <h1> Mon travail </h2>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
    </div>
    
    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/php/footer.php')
    ?> 

</body>
</html>
