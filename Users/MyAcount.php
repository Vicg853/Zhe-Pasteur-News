<!DOCTYPE html>
<html>
<head>
	<title>ZPN|Mon compte</title>
</head>
<body>
	<?php include("PageParts/NavBarAndHeader.php");
        include("PageParts/Menus.php"); ?>
        <div id="ContentMyAccountPage">
          <div id="UserDataMyAcountPage">
            <div id="TextNameDataUserMyAcountPage">
            -Prénom et/ou nom: <br/>
            <?php echo $_SESSION['UsuarioNome']." ".$_SESSION['UsuarioSobreNome']; ?><br/>

            </div>
            <div id="TextDateDataUserMyAcountPage">
            -Date d'inscription: <br/>
            <?php echo $_SESSION['UsuarioCadastro']; ?><br/>
            </div>
            <div id="TextMailDataUserMyAcountPage">
            -Votre adresse mail: <br/>
            <?php echo $_SESSION['UsuarioEmail']; ?><br/>
            </div>
          </div>
          <div id="UserUpdateDataMyAcountPage">
            <div id="UserUpdatePasswordMyAcountPage">
              <span>Changer votre mot-de-passe</span><br/>
              <form method="POST" action="UpdatePassword.php">
                <label>-Acient mot de passe:</label><br/>
                <input type="Password" name="OldPasswordVerify"><br/>
                <label>-Nouvau mot-de-passe:</label><br/>
                <input type="Password" name="NewPassword1UpdatePassword"><br/>
                <label>-Verifier le nouveau mot-de-passe:</label><br/>
                <input type="Password" name="NewPassword2UpdatePassword"><br/>
                <input type="Submit" name="Submit" value="Sauvegarder"><br/>
              </form>
            </div>
            <div id="UserUpdateNormalDataMyAcountPage">
              Changer d'autres données
              <form method="POST" action="UpdateNormalData.php">
                <label>-Que voulez vous changer:</label><br/>
                <select name="KindOfNewData">
                  <option value=""></option>
                  <option value="FirstName">Prénom</option>
                  <option value="LastName">Nom</option>
                  <option value="Email">Adresse mail</option>
                  ";
                  ?>
                </select><br/>
                <label>-Inserer ici:</label><br/>
                <input type="text" name="NewData"><br/>
                <input type="Submit" name="Submit" value="Sauvegarder"><br/>
              </form>
            </div>
          </div>
        </div>
    <?php include("PageParts/Footer.php") ?>
</body>
</html>
<?php
  if (!isset($_SESSION['UsuarioID'])) 
  {
    session_destroy();
    echo"<script language='javascript' type='text/javascript'>alert('Tu dois rentrer avant de faire ceci !');window.location.href='index.php'</script>";
  }
?>