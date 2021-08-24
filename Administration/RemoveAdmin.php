<?php
  session_start();
  if (!isset($_SESSION['UsuarioID']) OR $_SESSION['UsuarioNivel'] < 1 ) 
  {
    session_destroy();
    echo"<script language='javascript' type='text/javascript'>alert('Tu dois rentrer avant de faire ceci !');window.location.href='../index.php'</script>";
  }
    $servername = "localhost";
    $username = "";
    $password = "";
    $dbname = "";
    $IdAdminToRemove = $_POST['SelectAdminToBeRemoved'];

  if ($IdAdminToRemove == 0) 
  {
  	echo "<script language='javascript' type='text/javascript'>alert('J ai prévenu que vous ne pouviez pas faire cela, vous n avez pas le niveau minimum nécessaire ".$_SESSION['UsuarioNome']."!');window.location.href='index.php';</script>";
  }
  else
  {
  	$conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) 
      {
        die("Connection failed: " . $conn->connect_error);
      } 
      $RemoveUser = "DELETE FROM `usersandadmins` WHERE `id`=".$IdAdminToRemove.";";
      if ($conn->query($RemoveUser))
      {
        if ($IdAdminToRemove == $_SESSION['UsuarioID']) 
        {
          echo "<script language='javascript' type='text/javascript'>alert('Utilisateur suprimé avec succées!');window.location.href='../Users/Logout.php';</script>"; 
        }
        else 
        {
          echo "<script language='javascript' type='text/javascript'>alert('Utilisateur suprimé avec succées!');window.location.href='index.php';</script>";
        }
      }
  }
?>
