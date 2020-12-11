<form id="connexion" method="post" action="<?php echo $_SERVER["REQUEST_URI"] ?>">
    <h4>Pour pouvoir modifier le contenu du site, vous devez vous connecter en tant qu'administrateur via ce formulaire.</h4>
    <div class="form_elem">
        <label for="name" id="name">Identifiant :</label>
        <br>
        <input type="text" id="name_text"  name="identifiant" >
    </div>
    <div class="form_elem">
        <label for="mdp" >Mot de passe : </label>
        <br>
        <input type="password" id="mdp"  name="mdp" >
    </div>
        <input class="button"  type="button"  value="Connexion" id="validation" onclick="myFunctionAdmin();">
    </form>