<?php

	$langue="";
	if(isset($_POST["langue"])) {
		$_SESSION["lang"] = $_POST["langue"];
	}

	if(isset($_SESSION["lang"])) {
		$langue = $_SESSION["lang"];
	}
	else{
		$langue="fr";
	}


	if($langue == "en")
	{
		include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/lang/en.php');
		$selectedFR="";
		$selectedEN="selected";
		$selectedDE="";
	}
	else if($langue == "de")
	{
		include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/lang/de.php');
		$selectedFR="";
		$selectedEN="";
		$selectedDE="selected";
	} else {
		include($_SERVER['DOCUMENT_ROOT'].'/menuiserie/templates/lang/fr.php');
		$selectedFR="selected";
		$selectedEN="";
		$selectedDE="";	
	}

	// Soulignage de l'onglet actuel
	
	if($_SERVER["REQUEST_URI"] == "/menuiserie/index.php"){
		$border_index="border-style:solid; border-width:0px 0px 0.2vw 0px; border-color:rgb( 249, 224, 184 );";
		$border_contact="";
		$border_real="";
	} else if($_SERVER["REQUEST_URI"] == "/menuiserie/assets/php/contact.php"){
		$border_index="";
		$border_contact="border-style:solid; border-width:0px 0px 0.2vw 0px; border-color:rgb( 249, 224, 184 );";
		$border_real="";
	} else if($_SERVER["REQUEST_URI"] == "/menuiserie/assets/php/realisations.php"){
		$border_index="";
		$border_contact="";
		$border_real="border-style:solid; border-width:0px 0px 0.2vw 0px; border-color:rgb( 249, 224, 184 );";
	} else {
		$border_index="";
		$border_contact="";
		$border_real="";

	}

?>
<link rel="stylesheet" href="/menuiserie/templates/css/navbar.css">
<nav class="navbar">
	<a href="/menuiserie/index.php" class="nav_element" style="<?php echo $border_index; ?>"><?php echo $indLabel ?></a>
	<a href="/menuiserie/assets/php/realisations.php" class="nav_element" style="<?php echo $border_real; ?>"><?php echo $repLabel ?></a>
	<a href="/menuiserie/assets/php/contact.php" class="nav_element" style="<?php echo $border_contact; ?>"><?php echo $contLabel ?></a>
	<form id="formLang" method="post" action="<?php echo $_SERVER["REQUEST_URI"] ?>" >
		<select name="langue" size="1" id="lg_select" onChange="myFunction()" >
			<option value="fr" id="fr" <?php echo $selectedFR ?>> FR ▼</option>
			<option value="en" id="en"  <?php echo $selectedEN ?>> EN ▼</option>
			<option value="de" id="de"<?php echo $selectedDE ?>> DE ▼</option>
		</select>
	</form>
</nav>
<script type="text/javascript" src="/menuiserie/templates/js/navbar.js"></script>
