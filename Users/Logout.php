<?php
      session_start();
      $servername = "localhost";
      $username = "";
      $password = "";
      $dbname = "";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) 
      {
        die("Connection failed: " . $conn->connect_error);
      } 
        $SetOnline = "UPDATE `usersandadmins` SET `Status`='0' WHERE `id`=".$_SESSION['UsuarioID']."";
        if ($conn->query($SetOnline)) 
      {
      	unset($_SESSION['UsuarioID']);
        unset($_SESSION['UsuarioNome']);
        unset($_SESSION['UsuarioSobreNome']);
        unset($_SESSION['UsuarioNivel']);
        unset($_SESSION['UsuarioEmail']);
        unset($_SESSION['UsuarioLogin']);
        unset($_SESSION['UsuarioCadastro']);
        unset($_SESSION['UsuarioOnline']);
        unset($_SESSION['UsuarioBloqueado']);
        unset($_SESSION);
        session_unset();
        session_destroy();
        header("Location: ../index.php");
      }
      
  ?>
