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
<!DOCTYPE html>
<html>
<head>
  <title>Administration</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="style_admin.css">
  <link rel="stylesheet" type="text/css" href="">
</head>
<body>
  <div id="sidebar_admin">
    <span id="adminuser_admin">
      Coucou, <?php echo $_SESSION['UsuarioNome']; ?> !
    </span><br/>
    <a href="http://zhepasteurnews.online" id="sidenav_button_admin" ">
      Home
    </a><br/>
  </div>

  <div id="MenuRedactionAdminPage">
    <p id="response"></p>
    <p id="input_check-msg" style="display: none;">Verifier ci tout est complet</p>
    <p id="wrong_img_format_msg" style="display: none;">L'image de presentation na pas le bon format</p>
    <label>
      Selectioner le type d'article
    </label><br>
    <select id="InputTipeOfArticleRedacAdminPageCSS" name="type_selectarticle">
      <option value="FICHEREV">Fiches revision</option>
      <option value="TE">Technologie</option>
      <option value="DRAW">Dessins / Arts</option>
      <option value="HIST">Histoires / chroniques</option>
      <option value="LP">Lycée Pasteur</option>
    </select><br>
    <label>
      Nom de l'article
    </label><br>
    <input type="text" name="name_select_admin" id="InputArticleNameRedactedAdminPageCSS"><br>
    <label>
      Image de presentation de l'article
    </label><br>
    <input type="file" name="ImageOfTheArticle" id="ImageOfTheArticle"><br>
    <button id="upload_redac_admin">Envoyer</button>
    <textarea name="editor1" id="redac_area_admin"></textarea>
    <script>
      $(document).ready(function() {
        $("#upload_redac_admin").click(function() {
          var artic_type = $("#InputTipeOfArticleRedacAdminPageCSS").val();
          var artic_name = $("#InputArticleNameRedactedAdminPageCSS").val();
          var form_data = new FormData();
          form_data.append("file", property);
          
          if (artic_type == "" || artic_name == "") {
            $("input_check-msg").css("display", "block");
          } else  {
            $("input_check-msg").css("display", "none");
            $.ajax({
              method: "POST",
              url: "../articles/upload_article.php",
              data: {
                type: artic_type,
                name: artic_name,
                form_data
              },
              success: function (response) {
                $("#response").html(response);
                if (response.indexOf("Succes lors de l'enregistrement de l'article") >= 0) {
                  CKEDITOR.replace( 'editor1' , {
                    fullPage: true,
                    allowedContent: true
                  }); 
                }
              }
            });
          }
        })
      });
    </script>
  </div>

</body>
</html>