<head>
	<link rel="stylesheet" href="../CSSJornalEscola.css">
	<script type="text/javascript" src="../Jquery/jquery-3.3.1.min.js"></script>
</head>
<nav>
	<div id="LeftLinksNavBar">
	    <a id="ButtonMenuNavBar" onclick="openNav()">&#9776;</a>
	    <a id="HomeButton" href="../index.php">Home</a>
	    <form method="GET" action="../Articles/">
		   	<input id="SearchInputNavBar" type="text" name="ContentToSearch">
		   	<input id="SubmitSearchNavBar" type="Submit" value="Search">
		</form>
	</div>
	<div id="RightTitleNavBar">
		<a href="../index.php" id="LinkNavBar">Zhe Pasteur News</a>
	</div>
</nav>
<div id="mySidenav" class="sidenav">
	<a class="closebtn" onclick="closeNav()">&times;</a>
	<a href="../index.php">Home</a>
	<a onclick="openInternationalMenu()">International</a>
	<a onclick="openFranceMenu()">France</a>
	<a onclick="openBresilMenu()">Brésil</a>
	<a onclick="openTechnologieMenu()">Technologie</a>
	<a onclick="openLyceePasteurMenu()">Lycée Pasteur</a>
	<div id="UsersDIVInNavBar">
	<?php
		session_start();
		if (!isset($_SESSION['UsuarioID']) OR !isset($_SESSION['UsuarioNome'])) 
		{
			echo "<div id='LoginUserDisplayNavBar'>
			    <span id='NameDivLoginUserNavBar'>
			    	Invit&#233;
			    </span>
			    <div id='MenuOtherPagesForUserNavBar'>
			    	<a href='index.php'>Rentrer</a>
			  		<a href='NewUserInput.php'>Créer un compte</a>
			    </div>
			</div>";
		}
		else
		{
			echo "<div id='LoginUserDisplayNavBar'>
			    <span id='NameDivLoginUserNavBar'>
			    	".$_SESSION['UsuarioNome']."
			    </span>
			    <div id='MenuOtherPagesForUserNavBar'>
			      <a href='MyAcount.php'>Mon compte</a>
			      <a href='Logout.php'>Sortir</a>
			    </div>
			</div>";
		}

	 	?>
	 </div>
</div>