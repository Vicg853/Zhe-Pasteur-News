<!DOCTYPE html>
<html>
<head>
	<title>Zhe Pasteur News</title>
	<link rel="stylesheet" href="CSSJornalEscola.css">
	<script type="text/javascript" src="JSJornalEscola.js"></script>
	<script type="text/javascript" src="Jquery/jquery-3.3.1.min.js">
  	</script>
</head>
<body>
	<?php 
	include("PageParts/NavBarAndHeader.php");
	include("PageParts/Menus.php"); 
	$NotLogedIn = 0;
	$InsuficientAutorization = 0;
	if (isset($_GET['AutorizationAdmin'])) {
		$InsuficientAutorization = $_GET['AutorizationAdmin'];
	}
	if (isset($_GET['NotLogedIn'])) {
		$NotLogedIn = $_GET['NotLogedIn']; 
	}
	?>
	<?php

	if ($InsuficientAutorization == 1) {
		echo "
	<div id='AutorationOrNotMainPage'>
		Vous n'avez pas l'autorization necessaire pour faire cela !
	</div>";
	}
	if ($NotLogedIn == 1) {
		echo "
	<div id='AutorationOrNotMainPage'>
		Vous devez rentrer avant de faire cela !
	</div>";
	}
	?>
	<div id="MenuChoises">
		<div id="MenuChoiseLink">
			<div id="ImageMenuChoise">
				<span onclick="openInternationalMenu()">
				    <img src="Images/International.jpeg">
				</span>
			</div>
			<div id="TextMenuChoise">
		        <span onclick="openInternationalMenu()">
					Nouvelles <br/> Internationales
				</span>
			</div>
		</div>
		<div id="MenuChoiseLink">
			<div id="ImageMenuChoise">
				<span onclick="openFranceMenu()">
					<img src="Images/FotoFranceFlag.jpg">
				</span>
			</div>
			<div id="TextMenuChoise">
				<span onclick="openFranceMenu()">
					Nouvelles sur la<br/> France
				</span>
			</div>
		</div>
		<div id="MenuChoiseLink">
			<div id="ImageMenuChoise">
				<span onclick="openBresilMenu()">
					<img src="Images/FotoBrasilFlag.jpg">
				</span>
			</div>
			<div id="TextMenuChoise">
				<span onclick="openBresilMenu()">
					Nouvelles sur le <br/> Brésil
				</span>
			</div>
		</div>
		<div id="MenuChoiseLink">
			<div id="ImageMenuChoise">
				<span onclick="openTechnologieMenu()">
					<img src="Images/FotoTechnologyFlag.jpeg">
				</span>
			</div>
			<div id="TextMenuChoise">
				<span onclick="openTechnologieMenu()">
					Nouvelles sur la <br/> Technologie
				</span>
			</div>
		</div>
		<div id="MenuChoiseLink">
			<div id="ImageMenuChoise">
				<span onclick="openLyceePasteurMenu()">
					<img src="Images/FotoLyceePasteur.jpg">
				</span>
			</div>
			<div id="TextMenuChoise">
				<span onclick="openLyceePasteurMenu()">
					Nouvelles sur le <br/> Lycée Pasteur Unité Vergueiro
				</span>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		setTimeout(function RemoveMessage() {
			console.log($('#AutorationOrNotMainPage'));
			$('#AutorationOrNotMainPage').remove();
		}, 3000);
	</script>
	<?php include("PageParts/Footer.php") ?>
</body>
</html>