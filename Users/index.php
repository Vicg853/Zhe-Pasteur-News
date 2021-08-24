<?php
		$AlereadyON = "0";
		$PasswordWrongOrNot = "0";
	if (isset($_GET['PasswordFalse'])) {
		$PasswordWrongOrNot = $_GET['PasswordFalse'];
	}
	if (isset($_GET['AlereadyON'])) {
		$AlereadyON = $_GET['AlereadyON'];
	}
	if (isset($_SESSION['UsuarioID'])) {
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ZPN|Login</title>
</head>
<body>
	<?php
		include("PageParts/NavBarAndHeader.php");
		include("PageParts/Menus.php");
	?>
	<div id="LoginDivAdminPage">
		<?php if ($PasswordWrongOrNot == "1") {echo "<span id='BlockMessageError'> Mot de passe ou login incorrects! </span><br/>";}
		if ($AlereadyON == "1") {
			echo "<span id='BlockMessageError'> Cet utilisateur est déjá conécté! </span><br/>";
		}
		?>
		<form method="POST" action="ZPNLoginUserVerify.php">
			<div id="LoginAndPasswordAdminInsert">
				<label id="LabelAndInputAdminLogin">Utilisateur: <input type="text" name="usuario" required id="InputLoginAdminPage"></label>
				<br/>
				<label id="LabelAndInputAdminPassword">Mot de Passe: <input type="password" name="senha" id="InputSenhaAdminPage"></label>
				<br/>
			</div>
			<input type="submit" value="Rentrer" name="entrar" id="SubmitAdminLogin">
		</form>
	</div>
	<div id="LinksUnderLoginDIVLoginNormalUserPage">
		<a href="NewUserInput.php">Vous n'avez pas encore une compte ?</a>
	</div>
	<?php
    include("PageParts/Footer.php");
    ?>
</body>
</html>