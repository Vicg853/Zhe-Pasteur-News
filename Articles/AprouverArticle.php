<?php
session_start();

$servername = "localhost";
$username = "";
$password = "";
$dbname = "";
$ArticleNameToAprouveOrNot = $_POST['SelectArticleToBeAprouvedOrNot'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
    mysqli_close($conn);
}

$sql = "SELECT * FROM `articles` WHERE `SecondID`='".$ArticleNameToAprouveOrNot."';";
if ($_SESSION['UsuarioNivel'] > 0) {
	if (!$result = $conn->query($sql)) {
		 echo"<script language='javascript' type='text/javascript'>alert('Erreur !');window.location.href='../Administration';</script>";
		mysqli_close($conn);
	}
	else
	{
		$result2 = $result->fetch_array(MYSQLI_ASSOC);
		if ($result2['Aprouved'] == "0") {
			$sql2 = "UPDATE `articles` SET `Aprouved`= '1' WHERE `SecondID`='".$ArticleNameToAprouveOrNot."';";
			if ($conn->query($sql2)) {
				echo"<script language='javascript' type='text/javascript'>alert('Article aprouvé!');window.location.href='../Administration';</script>";
			}
		}
		elseif ($result2['Aprouved'] == "1") {
			$sql3 = "UPDATE `articles` SET `Aprouved`= '0' WHERE `SecondID`='".$ArticleNameToAprouveOrNot."';";
			if ($conn->query($sql3)) {
				echo"<script language='javascript' type='text/javascript'>alert('Article désaprouvé!');window.location.href='../Administration';</script>";
			}	
		}
	}
}
else
{
	echo"<script language='javascript' type='text/javascript'>alert('Vous navez pas l autorization pour cela!'');window.location.href='../Administration';</script>";
	mysqli_close($conn);
}
?>
