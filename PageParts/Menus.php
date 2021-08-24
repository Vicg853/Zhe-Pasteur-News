<div id="Menus">
	<?php
	$Connectdb = new PDO();
	?>
	<div id="InternationalMenu">
		<span id="CloseButton" onclick="CloseMenu()">&times;</span>
		<div id="ArticlesChoisesInMenu">
			<?php
				$GetItems = $Connectdb->prepare("select * from `articles` WHERE `Aprouved` = '1' AND  `TypeOfArticle` = 'IN' LIMIT 6");
				$GetItems->execute();
				while ($row = $GetItems->fetch())
				{
		      echo "<div id='ArticleChoisesLinkDIV'>
					    <a id='ArticlesChoisesLinkImage' href='articles/".$row['PresentationImage']."' style='background-image: url(articles/".$row['PresentationImage'].");background-repeat: no-repeat;background-size: cover;'></a>
                        <a id='ArticleChoisesLinkText' href='articles/".$row['Link']."'>".$row['Name']."</a>
					</div>";
				}
				?>
		</div>
	</div>
	<div id="FranceMenu">
		<span id="CloseButton" onclick="CloseMenu()">&times;</span>
		<div id="ArticlesChoisesInMenu">
				<?php
				$GetItems = $Connectdb->prepare("select * from `articles` WHERE `Aprouved` = '1' AND  `TypeOfArticle` = 'FR' LIMIT 6");
				$GetItems->execute();
				while ($row = $GetItems->fetch())
				{
			      	echo 
			      	"<div id='ArticleChoisesLinkDIV'>
						    <a id='ArticlesChoisesLinkImage' href='articles/".$row['Link']."' style='background-image: url(articles/".$row['PresentationImage'].");background-repeat: no-repeat;background-size: cover;'></a>
	                        <a id='ArticleChoisesLinkText' href='articles/".$row['Link']."'>".$row['Name']."</a>
						</div>";
				}
				?>
		</div>
	</div>
	<div id="BresilMenu">
		<span id="CloseButton" onclick="CloseMenu()">&times;</span>
		<div id="ArticlesChoisesInMenu">
				<?php
				$GetItems = $Connectdb->prepare("select * from `articles` WHERE `Aprouved` = '1' AND  `TypeOfArticle` = 'BR' LIMIT 6");
				$GetItems->execute();
				while ($row = $GetItems->fetch())
				{
		     		 echo "<div id='ArticleChoisesLinkDIV'>
					    <a id='ArticlesChoisesLinkImage' href='articles/".$row['Link']."' style='background-image: url(articles/".$row['PresentationImage'].");background-repeat: no-repeat;background-size: cover;'></a>
                        <a id='ArticleChoisesLinkText' href='articles/".$row['Link']."'>".$row['Name']."</a>
					</div>";
				}
				?>
		</div>
	</div>
	<div id="TechnologieMenu">
		<span id="CloseButton" onclick="CloseMenu()">&times;</span>
		<div id="ArticlesChoisesInMenu">
				<?php
				$GetItems = $Connectdb->prepare("select * from `articles` WHERE `Aprouved` = '1' AND  `TypeOfArticle` = 'TE' LIMIT 6");
				$GetItems->execute();
				while ($row = $GetItems->fetch())
				{
		     		 echo "<div id='ArticleChoisesLinkDIV'>
					    <a id='ArticlesChoisesLinkImage' href='articles/".$row['Link']."' style='background-image: url(articles/".$row['PresentationImage'].");background-repeat: no-repeat;background-size: cover;'></a>
                        <a id='ArticleChoisesLinkText' href='articles/".$row['Link']."'>".$row['Name']."</a>
					</div>";
				}
				?>
		</div>
	</div>
	<div id="LyceePasteurMenu">
		<span id="CloseButton" onclick="CloseMenu()">&times;</span>
		<div id="ArticlesChoisesInMenu">
				<?php
				$GetItems = $Connectdb->prepare("select * from `articles` WHERE `Aprouved` = '1' AND  `TypeOfArticle` = 'LP' LIMIT 6");
				$GetItems->execute();
				while ($row = $GetItems->fetch())
				{
		     		 echo "<div id='ArticleChoisesLinkDIV'>
					    <a id='ArticlesChoisesLinkImage' href='articles/".$row['Link']."' style='background-image: url(articles/".$row['PresentationImage'].");background-repeat: no-repeat;background-size: cover;'></a>
                        <a id='ArticleChoisesLinkText' href='articles/".$row['Link']."'>".$row['Name']."</a>
					</div>";
				}
				?>
		</div>
	</div>
</div>
