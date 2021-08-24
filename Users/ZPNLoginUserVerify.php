<?php
  if (empty($_POST)) 
  {
      echo "<script language='javascript' type='text/javascript'>alert('Vou devez rentrer votre mot de passe et/ou nom d utilisateur!');</script>";
  }
  $servername = "localhost";
  $username = "";
  $password = "";
  $dbname = "";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  } 
  
  $usuario = $conn->real_escape_string($_POST['usuario']);
  $senha = $conn->real_escape_string($_POST['senha']);
  
  $sql = "SELECT * FROM `usersandadmins` WHERE `Login` = '".$usuario."' AND `Password` = '".sha1($senha)."' AND `Block` = 0 LIMIT 1";
  $result = $conn->query($sql);
  $resultado = $result->fetch_array(MYSQLI_ASSOC);
  if ($resultado['Login'] !== $usuario OR $resultado['Password'] !== sha1($senha))
  {
    header("Location: index.php?PasswordFalse=1");
    die();
  }
  else 
  {
      if (!isset($_SESSION)) session_start();
      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNome'] = $resultado['FirstName'];
      $_SESSION['UsuarioSobreNome'] = $resultado['LastName'];
      $_SESSION['UsuarioNivel'] = $resultado['Level'];
      $_SESSION['UsuarioEmail'] = $resultado['Email'];
      $_SESSION['UsuarioCadastro'] = $resultado['Admission'];
      $_SESSION['UsuarioOnline'] = $resultado['Status'];
      $_SESSION['UsuarioBloqueado'] = $resultado['Block'];
      if ($resultado['Status'] == '1') {
        unset($_SESSION);
        session_unset();
        session_destroy();
        header("Location: index.php?AlereadyON=1");
      }
      else
      {
        $SetOnline = "UPDATE `usersandadmins` SET `Status`= '1' WHERE `id`='".$_SESSION['UsuarioID']."';";
        $conn->query($SetOnline);
        if ($_SESSION['UsuarioNivel'] > '0') {
          header("Location: ../Administration/");
        }
        else
        {
          header("Location: ../index.php");
        }
      }
  }
?>
