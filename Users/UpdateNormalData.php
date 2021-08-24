<?php 
    session_start();
    if (!isset($_SESSION['UsuarioID'])) 
    {
        session_destroy();
        echo"<script language='javascript' type='text/javascript'>alert('Tu dois rentrer avant de faire ceci !');window.location.href='../index.php'</script>";
    }
    $servername = "localhost";
    $username = "";
    $password = "";
    $dbname = "";
    $WichDataToBeChanged = $_POST['KindOfNewData'];
    $NewData = $_POST['NewData'];
    $conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
   	$SaveNewAdminData = "UPDATE `usersandadmins` SET `".$WichDataToBeChanged."`= '".$NewData."' WHERE `id`='".$_SESSION['UsuarioID']."';";
	if ($conn->query($SaveNewAdminData)) 
	{
		echo "<script language='javascript' type='text/javascript'>alert(' ".$WichDataToBeChanged." modifié avec succées pour ".$NewData."!');window.location.href='Logout.php';</script>";
		mysqli_close($conn);
	}
	else
	{
		echo "<script language='javascript' type='text/javascript'>alert('Erreur lors de la modification de votre nouveau ".$WichDataToBeChanged."!');window.location.href='MyAcount.php';</script>";
		mysqli_close($conn);
	}		

?>
