<?php 
 
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$login = $_POST['login'];
$password = $_POST['password'];
$level = $_POST['level'];
$Email = $_POST['email'];

$servername = "localhost";
$username = "";
$password = "";
$dbname = "";
$connect = new mysqli($servername, $username, $password, $dbname);

 
  if($login == "" || $login == null)
  {
    echo"<script language='javascript' type='text/javascript'>alert('Le champ de login doit être rempli !');window.location.href='index.php';</script>";
  }
  else
  {
    if ($FirstName == "" || $FirstName == null) 
    {
      echo"<script language='javascript' type='text/javascript'>alert('Le champ de Nom doit être rempli !');window.location.href='index.php';</script>";
    }
    else
    {
      if(!$login)
      {
 
        echo"<script language='javascript' type='text/javascript'>alert('Ce Login existe dejá !');window.location.href='index.php';</script>";
      }
      else
      {
        $query = "INSERT INTO `usersandadmins` VALUES(NULL , '".$FirstName."', '".$LastName."', '".$login."', sha1('".$password."'), '".$Email."', '".$level."', '0', '0', NOW());";
        if($connect->query($query))
        {
          echo"<script language='javascript' type='text/javascript'>alert('Utilisateur enregistré avec succés!');window.location.href='../Users/Logout.php'</script>";
        }
        else
        {
          echo"<script language='javascript' type='text/javascript'>alert('Il na pas été possible d enregistrer cet utilisateur !);window.location.href='index.php'</script>";
        }
      }  
    }
  }
?>

