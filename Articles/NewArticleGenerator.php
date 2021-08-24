<?php
session_start();
if (!isset($_SESSION['UsuarioID'])) 
{
  	session_destroy();
    echo"<script language='javascript' type='text/javascript'>alert('Tu dois rentrer avant de faire ceci !');window.location.href='../index.php'</script>";
}

$TextWriten = $_POST['editor1'];
$ArticleName = $_POST['TitleOfTheArticle'];
$ArticleImagePresentation = $_FILES['ImageOfTheArticle'];
$ImageName = $_FILES['ImageOfTheArticle']['name'];
$ImageTmpName = $_FILES['ImageOfTheArticle']['tmp_name'];
$ImageError = $_FILES['ImageOfTheArticle']['error'];
$ImageType = $_FILES['ImageOfTheArticle']['type'];
$ImageExtractEndName1 = explode(".", $ImageName);
$ImageExtractEndName2 = strtolower(end($ImageExtractEndName1));
$TypeOfArticle = $_POST['TipeOfArticle'];
$DateArticlePosted = date("Y/m/d");

if ($TextWriten == "" || $TextWriten == null) 
{
	echo "<script language='javascript' type='text/javascript'>alert('Tu as besoin d ecrire quelque chose avant de publier cet article !');window.location.href='../Administration/ZPNAdministration.php';</script>";
}
else
{
	if ($ArticleName == "" || $ArticleName == null) 
	{
		echo "<script language='javascript' type='text/javascript'>alert('Tu as besoin de donner un nom a ton article avant de le publier !');window.location.href='../Administration/ZPNAdministration.php';</script>";		
	}
	else
	{
		if ($TypeOfArticle == "" || $TypeOfArticle == null) 
		{
			echo "<script language='javascript' type='text/javascript'>alert('Tu as besoin de donner quel tipe d article tu est entraint decrire avant de le publier !');window.location.href='../Administration/ZPNAdministration.php';</script>";
		}
		else
		{
			
			echo "<script language='javascript' type='text/javascript'>alert('Article en procés de création. Atendez une seconde !');</script>";
			$UniqueID = uniqid('', true);
			$NewFileName = "ReadArticle.php?ArticleID=".$UniqueID."&ArticleName=".$ArticleName."&TypeOfArticle=".$TypeOfArticle."";
			$AllowedTypesOfImage = array('jpg' , 'jpeg', 'png'); 
			if (in_array($ImageExtractEndName2, $AllowedTypesOfImage)) 
			{
				
				if ($ImageError == 0) 
				{
					$NewImageName = $UniqueID.".".$ImageExtractEndName2;
					$ImageForUpload = 'ImagesPresentation/'.$NewImageName;
					move_uploaded_file($ImageTmpName, $ImageForUpload);

					$servername = "localhost";
	                $username = "";
	                $password = "";
	                $dbname = "";
	                $connect = new mysqli($servername, $username, $password, $dbname);
						
					$query = "INSERT INTO `articles` VALUES (NULL ,'".$UniqueID."','".$ArticleName."','".$NewFileName."', '".$TextWriten."', '".$_SESSION['UsuarioNome']."', NOW(), '".$TypeOfArticle."', '0', '".$ImageForUpload."');";
					
					if ($connect->query($query)) 
					{
						header("Location: ../index.php");
					}	
					else
					{
						
						echo "<script language='javascript' type='text/javascript'>alert('Erreur dans la création de l article!');window.location.href='../index.php';</scrip>";
					}
				}
				else
				{
					echo "<script language='javascript' type='text/javascript'>alert('Erreur lors de l enregistrement de l image de presentation ! Erreur: ".$ImageError."');window.location.href='../Administration/';</script>";
						
				}
			}
			else
			{
				echo "<script language='javascript' type='text/javascript'>alert('Ce format d image n est pas accépté!');window.location.href='../Administration/';</scrip>";
				
			}
			
		}
	}
}

?>
