<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../CSSJornalEscola.css">
  <script type="text/javascript" src="../Jquery/jquery-3.3.1.min.js"></script>
</head>
<body>
<nav>
  <div id="LeftLinksNavBar">
      <a id="ButtonMenuNavBar" onclick="openNav()">&#9776;</a>
      <a id="HomeButton" href="index.php">Home</a>
      <form method="GET" action="Articles/">
        <input id="SearchInputNavBar" type="text" name="ContentToSearch">
        <input id="SubmitSearchNavBar" type="Submit" value="Search">
    </form>
  </div>
  <div id="RightTitleNavBar">
    <a href="index.php" id="LinkNavBar">Zhe Pasteur News</a>
  </div>
</nav>
<div id="mySidenav" class="sidenav">
  <a class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Home</a>
  <a onclick="openInternationalMenu()">International</a>
  <a onclick="openFranceMenu()">France</a>
  <a onclick="openBresilMenu()">BrÃ©sil</a>
  <a onclick="openTechnologieMenu()">Technologie</a>
  <a onclick="openLyceePasteurMenu()">LycÃ©e Pasteur</a>
  <div id="UsersDIVInNavBar">
  <?php
    session_start();
    if (!isset($_SESSION['UsuarioID']) OR !isset($_SESSION['UsuarioNome'])) 
    {
      echo "<div id='LoginUserDisplayNavBar'>
          <div id='ImageDivUserLoginNavBar' style='background-image: url()'>

          </div>
          <span id='NameDivLoginUserNavBar'>
            Invit&#233;
          </span>
          <div id='MenuOtherPagesForUserNavBar'>
            <a href='Users'>Rentrer</a>
            <a href='Users/NewUserInput.php'>CrÃ©er un compte</a>
          </div>
      </div>";
    }
    else
    {
      echo "<div id='LoginUserDisplayNavBar'>
          <div id='ImageDivUserLoginNavBar' style='background-image: url();'>
          </div>
          <span id='NameDivLoginUserNavBar'>
            ".$_SESSION['UsuarioNome']."
          </span>
          <div id='MenuOtherPagesForUserNavBar'>
            <a href='Users/MyAcount.php'>Mon compte</a>
            <a href='Users/Logout.php'>Sortir</a>
          </div>
      </div>";
    }

    ?>
    </div>
</div>
  <div id="ErrorDiv">
    <div id="ZPNLogoErrorPage">
      <div id="LettersErrorPage">ZPN</div>
    </div>
    <div id="ErrorCode">
      404
    </div>
    <div id="ErrorLittleMSG">
      Oups ! - ce n'est pas bien!
      DÃ©solÃ©, sauf si vous espÃ©riez vraiment trouver notre message 404, la page que vous cherchiez
      a Ã©tÃ© ou supprimÃ© ou dÃ©placÃ© ou nexiste pas  !
    </div>
    <div id="ErrorAudio">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/iqztd7uMvVI?rel=0&amp;controls=0&amp;showinfo=0;autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
  </div>
  <script type="text/javascript" src="JSJornalEscola.js"></script>
</body>
</html>
