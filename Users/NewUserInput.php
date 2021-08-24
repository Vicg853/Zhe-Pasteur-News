<!DOCTYPE html>
<html>
<head>
  <title>ZPN|Créer un compte</title>
</head>
<body>
  <?php include("PageParts/NavBarAndHeader.php");
        include("PageParts/Menus.php"); ?>
        <div id='SubMenuCadastroAdminMenuAdminPage'>
          <label>Enregistrement d'utilisateur.<br/></label>
          <form method='POST' action='NewUser.php'>
            <label>Prénom </label>
            <input type='text' name='FirstName' id='InputNomeDeCadastramentoUsuario'><br/>
            <label>Nom</label>
            <input type='text' name='LastName' id='InputNomeDeCadastramentoUsuario'><br/>
            <label>Utilisateur: </label>
            <input type='text' name='login' id='InputLoginDeCadastramentoUsuario'><br/>
            <label>Adresse mail: </label>
            <input type='text' name='email' id='InputEmailDeCadastramentoUsuario'><br/>
            <label>Mot-de-passe: </label>
            <input type='password' name='password' id='InputSenhaDeCadastramentoUsuario'><br/>
            <input type='submit' value='Enregistrer' id='InputCadastrarUsuario' name='cadastrar'>
          </form>
        </div>
    <?php include("PageParts/Footer.php") ?>
</body>
</html>