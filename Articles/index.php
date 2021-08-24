<?php
	session_start();
	if (!isset($_SESSION['UsuarioNivel'])) {
		$_SESSION['UsuarioNivel'] = "0";
	}
	include("PageParts/NavBar.php");
	?>
 	<header style="background-image: url('../Images/SearchEngineImage.jpg');background-repeat: no-repeat;background-size: cover;	color: black;">
		<h1>
			Zhe Pasteur News
		</h1>
	</header>
	<?php
	include("PageParts/Menus.php");
	?>
		<div id='FormInSearchPage'>
			<form method='GET' action='#'>
				<div id="ContentToSearchAndSubmitDIV">
					<input name='ContentToSearch' type='text' id="ContentToSearchDIV">
					<input type='submit' value='Chercher' id="SubmitButtonSearchPage"><br/>
				</div><br/>
				<div id="OptionsDIV">
					<input type='radio' name='ArticleSearchFilter' value='TE'> Technologie<br/>
				  	<input type='radio' name='ArticleSearchFilter' value='FR'> France<br/>
				  	<input type='radio' name='ArticleSearchFilter' value='IN'> International<br/>
				  	<input type='radio' name='ArticleSearchFilter' value='LP'> Licée Pasteur<br/>
				  	<input type='radio' name='ArticleSearchFilter' value='BR'> Brésil<br/>
			  	</div>
			</form>
		</div>
	<?php
	echo "<div id='ResultsDIV'>";
	$Connectdb = new PDO("");
	if (isset($_GET['ContentToSearch'])) 
	{
		if ($_GET['ContentToSearch'] == "" OR $_GET['ContentToSearch'] == NULL) {
			echo "<span id='WhatSearchedSPAN'>Valeur de recherche nule !</span>";
		}
		else
		{
			$ContentToSearch = $_GET['ContentToSearch'];
			if (isset($_GET['ArticleSearchFilter']))
			{
				$GetItems = $Connectdb->prepare("SELECT * FROM `articles` WHERE `Aprouved` = '1' AND `Name` LIKE '%".$ContentToSearch."%' AND `TypeOfArticle` = '".$_GET['ArticleSearchFilter']."';");
				$GetItems->execute();
				echo "<div id='WhatSearchedSPAN'>Résultats pour ".$ContentToSearch." dans la catégorie ".$_GET['ArticleSearchFilter']."</div><br/>";
				while ($row = $GetItems->fetch()) 
				{	
					echo "
					<div id='ResultsSearch'>
						<a href='".$row['Link']."'>".$row['Name']."<br/>Le ".$row['CreationDate']." par ".$row['Autor']."</a>
					</div><br/>";
				}
			}
			else
			{
				$GetItems = $Connectdb->prepare("SELECT * FROM `articles` WHERE `Aprouved` = '1' AND  `Name` LIKE '%".$ContentToSearch."%';");
				$GetItems->execute();
				echo "<div id='WhatSearchedSPAN'>Résultats pour ".$ContentToSearch."</div><br/>";
				while ($row = $GetItems->fetch()) 
				{
					echo "
					<div id='ResultsSearch'>
						<a href='".$row['Link']."'>".$row['Name']."<br/>Le ".$row['CreationDate']." par ".$row['Autor']."</a><br/>
					</div><br/>";
				}
			}
		}
	}
	else
	{
		echo "
		<span id='WhatSearchedSPAN'>Cherchez quelque chose, utilisez notre filtre, ou non, cherchez ce que vous voulez.</span>";
	}
	echo "</div>";
	include("PageParts/Footer.php");
?>	

