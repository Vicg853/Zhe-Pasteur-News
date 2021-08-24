<?php
  if (!isset($_SESSION)) session_start();
  
  if (!isset($_SESSION['UsuarioID'])) {
    session_destroy();
    header("Location: ../index.php?NotLogedIn=1"); exit;
  }
  else
  {
    if ($_SESSION['UsuarioNivel'] < 1) 
    {
      session_destroy();
      header("Location: ../index.php?AutorizationAdmin=1"); exit;
    }
  }
    
?>

<!DOCTYPE html>
<html>
<head>
  <title>ZPN|Administration</title>
  <link rel="stylesheet" href="../CSSJornalEscola.css">
  <script src="ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="../Jquery/jquery-3.3.1.min.js">
  </script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
</head>
<body>
  <div id="CustomHeader1">ZHE PASTEUR NEWS</div>
  <script type="text/javascript" src="../JSJornalEscola.js"></script>
  <div id="NavigationMenuAdministration">
    <span id="HelloMessageAdminPage">Coucou, <?php echo $_SESSION['UsuarioNome']; ?> !</span>
    <a href="../index.php" id="ButtonsMenusAdmin">Home</a><br/>
    <span onclick="$('.close').animate({width: '0px'},500);$('#MenuRedactionAdminPage').animate({width: '80%'},0.0000005);" id="ButtonsMenusAdmin">R&#233;daction</span>
    <div id="MenuRedactionAdminPage" class="close">
      <div id="InputTextAndImageDIVRedacteAdminPage">
          <form method="POST" action="../Articles/NewArticleGenerator.php" enctype="multipart/form-data">
            <label>
              R&#233;daction de l'article
              <textarea name="editor1"></textarea>
              <script>
                CKEDITOR.replace( 'editor1' );
                config.height = 500; 
              </script>
            </label>
            <label>
              Titre de pr&#233;sentation de l'article
              <input type="text" name="TitleOfTheArticle" id="InputArticleNameRedactedAdminPageCSS">
            </label>
            <label><br/>
              Image de pr&#233;sentation de l'article*
              <input type="file" name="ImageOfTheArticle" id="InputArticleImagePresentationRedactedAdminPageCSS">
            </label><br/>
            <label>
              Tipe d'article:
              <select type="" name="TipeOfArticle" id="InputTipeOfArticleRedacAdminPageCSS">
                <option value="TE">Technologie</option>
                <option value="FR">France</option>
                <option value="IN">International</option>
                <option value="BR">Bresil</option>
                <option value="LP">Licee Pasteur</option>
              </select>
            </label>
            <label><br/>
              <input type="submit" name="Submit" value="EVOYER" id="SubmitImageAndTextRedactedAdminPageCSS">
            </label>
          </form>
          *L'image de pr&#233;sentation aparaitrera seulement dans la partie de pr&#233;sentation de l'article dans les menus et pas sur l'article lui même.
      </div>
    </div><br/>
    <span id="ButtonsMenusAdmin" onclick="$('.close').animate({width: '0px'},500);$('#MenuArticlesExistantsAdminPage').animate({width: '80%'},0.0000005);">Articles Existants</span>
    <div id="MenuArticlesExistantsAdminPage" class="close" >
      <div id="BarTypesArticlesTopMenuArticlesExistantsAdminPage">
        <span id="ButtonsMenusAdmin" onclick="$('.close2').animate({height: '0px'},500);$('#SubMenuInterArticles').animate({height: '90%'},0.0000005);">International</span>
           <div id="SubMenuInterArticles" class="close2">
            <form method='POST' action='../Articles/AprouverArticle.php'>
              <?php
              $ConnectInterdb = new PDO();
              $GetInterArticles = $ConnectInterdb->prepare("select * from `articles` WHERE `TypeOfArticle` = 'IN'");
              $GetInterArticles->execute();
              while ($rowInter = $GetInterArticles->fetch())
              {
                echo "
                <div id='ArticlesList'>
                  <span>".$rowInter['Name']."</span>
                  <a href='../articles/".$rowInter['Link']."'>Voir l'article</a>
                  ";
                  if (!$rowInter['Aprouved'] == "0") {
                    echo "Article Aprouvé";
                  }
                  else
                  {
                    echo "Article Non Aprouvé";
                  }
                  if ($_SESSION['UsuarioNivel'] >= 3) {
                    if ($rowInter['Aprouved'] == "1") 
                    {
                      echo " Désapprouver l'article";
                    }
                    else
                    {
                      echo " Aprouver l'article";
                    }

                  echo "
                  <input id='RemoveAdminAdminList' type='radio' name='SelectArticleToBeAprouvedOrNot' value='".$rowInter['SecondID']."'>
                </div>
                
              

              <input type='submit' name='submit' id='AprouveArticleInput' value='Aprouver'>";
                  }
              }
              ?>
              <?php echo "</form>"; ?>
            </div>
            <span id="ButtonsMenusAdmin" onclick="$('.close2').animate({height: '0px'},500);$('#SubMenuFRArticles').animate({height: '90%'},0.0000005);">France</span>
            <div id="SubMenuFRArticles" class="close2">
              <form method='POST' action='../Articles/AprouverArticle.php'>
              <?php
              $ConnectFRdb = new PDO();
              $GetFRArticles = $ConnectFRdb->prepare("select * from `articles` WHERE `TypeOfArticle` = 'FR'");
              $GetFRArticles->execute();
              while ($rowFR = $GetFRArticles->fetch())
              {
                echo "
                <div id='ArticlesList'>
                  <span>".$rowFR['Name']."</span>
                  <a href='../articles/".$rowFR['Link']."'>Voir l'article</a>
                  ";
                  if (!$rowFR['Aprouved'] == "0") {
                    echo "Article Aprouvé";
                  }
                  else
                  {
                    echo "Article Non Aprouvé";
                  }
                  if ($_SESSION['UsuarioNivel'] >= 3) {
                    if ($rowFR['Aprouved'] == "1") 
                    {
                      echo " Désapprouver l'article";
                    }
                    else
                    {
                      echo " Aprouver l'article";
                    }
                  echo "
                  <input id='RemoveAdminAdminList' type='radio' name='SelectArticleToBeAprouvedOrNot' value='".$rowFR['SecondID']."'>
                </div>
                <input type='submit' name='submit' id='AprouveArticleInput' value='Aprouver'>";
                 }
              }
              ?>
              <?php echo "</form>"; ?>
          </div>
            <span id="ButtonsMenusAdmin" onclick="$('.close2').animate({height: '0px'},500);$('#SubMenuBRArticles').animate({height: '90%'},0.0000005);">Brésil</span>
            <div id="SubMenuBRArticles" class="close2">
              <form method='POST' action='../Articles/AprouverArticle.php'>
              <?php
              $ConnectBRdb = new PDO();
              $GetBRArticles = $ConnectBRdb->prepare("select * from `articles` WHERE `TypeOfArticle` = 'BR'");
              $GetBRArticles->execute();
              while ($rowBR = $GetBRArticles->fetch())
              {
                echo "
                <div id='ArticlesList'>
                  <span>".$rowBR['Name']."</span>
                  <a href='../articles/".$rowBR['Link']."'>Voir l'article</a>
                  ";
                  if (!$rowBR['Aprouved'] == "0") {
                    echo "Article Aprouvé";
                  }
                  else
                  {
                    echo "Article Non Aprouvé";
                  }
                  if ($_SESSION['UsuarioNivel'] >= 3) {
                    if ($rowBR['Aprouved'] == "1") 
                    {
                      echo " Désapprouver l'article";
                    }
                    else
                    {
                      echo " Aprouver l'article";
                    }
                    echo "
                    <input id='RemoveAdminAdminList' type='radio' name='SelectArticleToBeAprouvedOrNot' value='".$rowBR['SecondID']."'>
                  </div>
                <input type='submit' name='submit' id='AprouveArticleInput' value='Aprouver'>";
                  }
                }
                ?>
              <?php echo "</form>"; ?>
          </div>
            <span id="ButtonsMenusAdmin" onclick="$('.close2').animate({height: '0px'},500);$('#SubMenuTEArticles').animate({height: '90%'},0.0000005);">Technologie</span>
            <div id="SubMenuTEArticles" class="close2">
              <form method='POST' action='../Articles/AprouverArticle.php'>
              <?php
              $ConnectTECHdb = new PDO();
              $GetTECHArticles = $ConnectTECHdb->prepare("select * from `articles` WHERE `TypeOfArticle` = 'TE'");
              $GetTECHArticles->execute();
              while ($rowTECH = $GetTECHArticles->fetch())
              {
                echo "
                <div id='ArticlesList'>
                  <span>".$rowTECH['Name']."</span>
                  <a href='../articles/".$rowTECH['Link']."'>Voir l'article</a>
                  ";
                  if (!$rowTECH['Aprouved'] == "0") {
                    echo "Article Aprouvé";
                  }
                  else
                  {
                    echo "Article Non Aprouvé";
                  }
                  if ($_SESSION['UsuarioNivel'] >= 3) {
                    if ($rowTECH['Aprouved'] == "1") 
                    {
                      echo " Désapprouver l'article";
                    }
                    else
                    {
                      echo " Aprouver l'article";
                    }
                    echo "
                    <input id='RemoveAdminAdminList' type='radio' name='SelectArticleToBeAprouvedOrNot' value='".$rowTECH['SecondID']."'>
                  </div>
                  <input type='submit' name='submit' id='AprouveArticleInput' value='Aprouver'>";
                }
              }
              ?>
              <?php echo "</form>"; ?>  
          </div>
          <span id="ButtonsMenusAdmin" onclick="$('.close2').animate({height: '0px'},500);$('#SubMenuLPArticles').animate({height: '90%'},0.0000005);">Licée Pasteur</span>
          <div id="SubMenuLPArticles" class="close2">
              <form method='POST' action='../Articles/AprouverArticle.php'>
              <?php
              $ConnectLPdb = new PDO();
              $GetLPArticles = $ConnectLPdb->prepare("select * from `articles` WHERE `TypeOfArticle` = 'LP'");
              $GetLPArticles->execute();
              while ($rowLP = $GetLPArticles->fetch())
              {
                echo "
                <div id='ArticlesList'>
                  <span>".$rowLP['Name']."</span>
                  <a href='../articles/".$rowLP['Link']."'>Voir l'article</a>
                  ";
                  if ($rowLP['Aprouved'] == "0") {
                    echo "Article Aprouvé";
                  }
                  else
                  {
                    echo " Article Non Aprouvé";
                  }
                  if ($_SESSION['UsuarioNivel'] >= 3) {
                    if ($rowLP['Aprouved'] == "1") 
                    {
                      echo " Désapprouver l'article";
                    }
                    else
                    {
                      echo "Aprouver l'article";
                    }
                    echo "
                    <input id='RemoveAdminAdminList' type='radio' name='SelectArticleToBeAprouvedOrNot' value='".$rowLP['SecondID']."'>
                  </div>
                  <input type='submit' name='submit' id='AprouveArticleInput' value='Aprouver'>";
                }
              }
              ?>
              <?php echo "</form>"; ?>
        </div>
        <span id="ButtonsMenusAdmin" onclick="$('.close2').animate({height: '0px'},500);">Fermer les 'petits' menus</span>
      </div>
    </div><br/>
    <?php
    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] > 1)) 
    {
      $JQueryForAdminPage = '$(".close").animate({width: "0px"},500);$("#MenuAdministrationAdminPage").animate({width: "80%"},0.0000005);';
    echo "
    
      <span id='ButtonsMenusAdmin' onclick='".$JQueryForAdminPage."'>Administration</span><br/>
      <div id='MenuAdministrationAdminPage' class='close'>
        <div id='SubMenuCadastroAdminMenuAdminPage'>
          <label>Enregistrement d'utilisateur.<br/></label>
          <form method='POST' action='NewAdmin.php'>
            <label>Prenom</label>
            <input type='text' name='FirstName' id='InputNomeDeCadastramentoUsuario'><br/>
            <label>Nom</label>
            <input type='text' name='LastName' id='InputNomeDeCadastramentoUsuario'><br/>
            <label>Utilisateur: </label>
            <input type='text' name='login' id='InputLoginDeCadastramentoUsuario'><br/>
            <label>Adresse mail: </label>
            <input type='text' name='email' id='InputEmailDeCadastramentoUsuario'><br/>
            <label>Mot-de-passe: </label>
            <input type='password' name='password' id='InputSenhaDeCadastramentoUsuario'><br/>
            <label>Autorization: </label>
            <select name='level' id='SelectPoderDeCadastramentoUsuario'>
              <option value='4'>Administration de sist&#233;mes</option>
              <option value='3'>Administration Ecole</option>
              <option value='2'>Administrateur</option>
              <option value='1'>Rédacteur</option>
            </select><br/>
            <input type='submit' value='Enregistrer' id='InputCadastrarUsuario' name='cadastrar'>
          </form>
        </div>
        <div id='SubMenuUsersAdminMenuAdminPage'> 
          <div id='UsersListInSubMenuUsersAdminPage'>
          <form method='POST' action='RemoveAdmin.php'>";
          $Connect = new PDO();
          $GetUsers = $Connect->prepare("select * from `usersandadmins` WHERE `Level` > 0;");
          $GetUsers->execute();
          while ($rowUsers = $GetUsers->fetch())
          {
            echo "
              <span id='AdminNameAdminsList'>".$rowUsers['FirstName'].$rowUsers['LastName']."</span>
              <span id='AdminEmailAdminsList'>".$rowUsers['Email']."</span>
              <span id='AdminStatusAdminsList'>";if ($rowUsers['Status'] == 1) {echo "Online"; }else{echo "Offline";}echo "</span>
              <span id='AdminLevelAdminsList'>";if ($rowUsers['Level'] == 1) {echo "Rédacteur";}elseif ($rowUsers['Level'] == 2) {echo "Administrateur";}elseif ($rowUsers['Level'] == 3) {echo "Administration école";}elseif ($rowUsers['Level'] == 4) {echo "Administrtion de systémes";}echo "</span>
              ";
              if ($_SESSION['UsuarioNivel'] < $rowUsers['Level']) 
              {
                echo "
                <div id='InputDivSubMenuAdminListAdminMenuAdminPage'>
                  <label><strike>Suprimer Admin</strike></label>
                  <input id='RemoveAdminAdminList' type='radio' name='SelectAdminToBeRemoved' value='0'>
                </div>";
              }
              else
              {
                echo"
              <div id='InputDivSubMenuAdminListAdminMenuAdminPage'>
               <label id='LabelInputRemoveAdminAdminsList'>Suprimer Admin</label>
               <input id='RemoveAdminAdminList' type='radio' name='SelectAdminToBeRemoved' value='".$rowUsers['id']."'><br/>
              </div>"; 
              }
          }
        }
    ?>
          
              <input type='Submit' name='Submit' value='Suprimer Utilisateur'>
          </form>
        </div>
      </div>
    </div>
    <?php
    if ($_SESSION['UsuarioNivel'] > 3) {
      $JQueryForAdminPage2 = "$('.close').animate({width: '0px'},500);$('#ITMenuAdminPage').animate({width: '80%'},500);";
      echo '
    
    <span id="ButtonsMenusAdmin" onclick="'.$JQueryForAdminPage2.'">IT</span>
    <div id="ITMenuAdminPage" class="close">
      <div id="accordion">
        ';
         $Connect = new PDO();
          $GetUsers = $Connect->prepare("select * from `usersandadmins` WHERE `Level` > 0;");
          $GetUsers->execute();
          while ($rowUsers = $GetUsers->fetch())
          {
            echo '
        <h3>'.$rowUsers['FirstName'].'</h3>
        <div>
          <p>
            <form>
              <input value="">
            </form>
          </p>
        </div>
    ';
         }
        echo '
      </div>
    </div>';
    }
    ?>
    <span id="ButtonsMenusAdmin" onclick="$('.close').animate({width: '0px'},500);$('.close2').animate({height: '0px'},500);">Fermer tout les menus</span>
    <a href="../Users/MyAcount.php" id="ButtonsMenusAdmin">Mon Compte</a>
    <a href="../Users/Logout.php" id="ButtonsMenusAdmin">Logout</a>
  </div>
  <script type="text/javascript" src="../JSJornalEscola.js"></script>
</body>
</html>
