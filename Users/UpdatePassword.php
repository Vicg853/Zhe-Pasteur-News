<?php
  session_start();
  if (!isset($_SESSION['UsuarioID'])) 
  {
    session_destroy();
    echo"<script language='javascript' type='text/javascript'>alert('Tu dois rentrer avant de faire ceci !');window.location.href='../index.php'</script>";
  }
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";
    $OldPasswordVerify = sha1($_POST['OldPasswordVerify']);
    $NewPassword1 = sha1($_POST['NewPassword1UpdatePassword']);
    $NewPassword2 = sha1($_POST['NewPassword2UpdatePassword']);
    $conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
    mysqli_close($conn);
	}
    if ($NewPassword1 == $NewPassword2) 
    {
    	$VerifyAdminPassword = "SELECT * FROM `usersandadmins` WHERE `id` = '".$_SESSION['UsuarioID']."' AND `Password` = '".$OldPasswordVerify."' AND `Block` = 0 LIMIT 1";
      $query = $conn->query($VerifyAdminPassword);
      $result = $query->fetch_array(MYSQLI_ASSOC);
      echo $result['Password'];
  		if ($result['Password'] == $OldPasswordVerify) 
    	{   
      	$SaveNewPassword = "UPDATE `usersandadmins` SET `Password`= '".$NewPassword1."' WHERE `id`='".$_SESSION['UsuarioID']."';";
        if ($conn->query($SaveNewPassword)) 
        {
          echo "<script language='javascript' type='text/javascript'>alert('Mot de passe modifié avec succès');window.location.href='Logout.php';</script>";
          mysqli_close($conn);
        }
        else
        {
          echo "<script language='javascript' type='text/javascript'>alert('Erreur lors de la modification');window.location.href='MyAcount.php';</script>";
          mysqli_close($conn);
        }
    	}
    	else
    	{ 
        echo "<script language='javascript' type='text/javascript'>alert('Acient mot de passe incorect incorect!');window.location.href='MyAcount.php';</script>";
        mysqli_close($conn);
			}
    }
    else
    {
    	echo "<script language='javascript' type='text/javascript'>alert('Les mots de passe ne correspondent pas');window.location.href='MyAcount.php'</script>";
      mysqli_close($conn);
    }
?>
