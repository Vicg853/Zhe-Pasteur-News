<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $logedLoginAvatarOutput = '
    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true"
      aria-expanded="false">
      <img src="users/img/'.$_SESSION['userImgLink'].'" class="rounded-circle img-fluid" alt="avatar image" style="width: 50px; height: 50px; margin-left: 20px;">
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
      <p>Vous ete connecté comme '.$_SESSION['userFirstName'].'</p>
      <a  class="nav-link text-info" href="#" data-toggle="modal" data-target="#modalLRForm" >Mon-compte</a>
      <a  class="nav-link text-info" id="logout_button" href="#" >Log-out</a>
    </div>
    <script>
                      $("#logout_button").click(function() {
                          var new_firstName = $("#defaultRegisterFormFirstName").val();
                          var new_lastName = $("#defaultRegisterFormLastName").val();
                          var new_email = $("#defaultRegisterFormEmail").val();
                          var new_login = $("#defaultRegisterFormLogin").val();
                          var new_password = $("#defaultRegisterFormPassword").val();
                          var new_password_verification = $("#defaultRegisterFormPasswordVerification").val();
                          var new_phone = $("#defaultRegisterPhonePassword").val();
                          $.ajax({
                            url : "php/logout.php",
                            type: "POST",
                            success: function( results ){
                              var obj=$.parseJSON(results); 
                              $("#userAvatarDiv").empty();
                              $("#modalLRForm").empty();
                              $("#userAvatarDiv").append(obj.LoginAvatarResult);
                              $("#modalLRForm").append(obj.Login_Account_CreateFormsresult);
                            }
                          });
                      });
                    </script>';
    $logedLoginFormOutput = '
    <div class="modal-dialog cascading-modal" role="document">
        <div class="modal-content">
          <div class="modal-c-tabs">
            <ul class="nav nav-tabs md-tabs tabs-2" role="tablist">
              <li class="nav-item">
                <a class="nav-link blue-gradient active text-white" data-toggle="tab" href="#panel7" role="tab">
                  Mes informations et autres</a>
              </li>
              <li class="nav-item">
                <a class="nav-link blue-gradient text-white" data-toggle="tab" href="#panel8" role="tab">
                  Modifier mes informations</a>
              </li>
            </ul>
            <div class="tab-content">
              <!--Login pannel-->
              <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                <div class="modal-body mb-1 text-center">
                    <div class="avatar mx-auto" style="width: 150px; height: auto;">
                        <img width="180px" height="180px" src="users/img/'.$_SESSION['userImgLink'].'" class="rounded-circle z-depth-1"
                          alt="Sample avatar">
                    </div>
                    <h5 class="font-weight-bold mt-4 mb-3">'.$_SESSION['userFirstName'].' '.$_SESSION['userLastName'].'</h5>
                    <h3 class="font-weight-bold">Admission: <br> '.$_SESSION['userAdmissionDate'].'</h3>
                </div>
                <div class="modal-footer">
                    <button class="btn blue-gradient text-white" data-dismiss="modal">Fermer</button>
                </div>
              </div>
              
              <!--Create account pannel-->
              <div class="tab-pane fade" id="panel8" role="tabpanel">
                <div class="modal-body text-center">
                    <h4 class="font-weight-bold">Modifier mot-de-passe:</h4>
                    <div class="md-form">
                      <input type="text" id="form1" placeholder="Mot-de-passe actuel" class="form-control">
                      <input type="text" id="form1" placeholder="Nouvel mot-de-passe" class="form-control">
                      <input type="text" id="form1" placeholder="Verification du nouvel mot-de-passe" class="form-control">
                      <button class="btn blue-gradient">Modifier</button>
                    </div>
                    <h4 class="font-weight-bold">Modifier autres donnés:</h4>
                    <div class="md-form">
                        <select class="browser-default custom-select">
                          <option value="" disabled selected>Choisises</option>
                          <option value="1">Nom</option>
                          <option value="2">Prènom</option>
                          <option value="3">Adresse mail</option>
                        </select>
                      <input type="text" id="form1" placeholder="Nouvelle donné a etre changé" class="form-control">
                      <button class="btn blue-gradient">Modifier</button>
                    </div>
                    <h4 class="font-weight-bold text-danger">Suprimer compte ?</h4>
                    <div class="md-form">
                      <button class="btn btn-danger">Suprimmer</button>
                    </div>
                </div>
                <div class="modal-footer">
                  <button class="btn blue-gradient text-white" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
         ';
    $data=array("LoginAvatarResult"=>$logedLoginAvatarOutput, "Login_Account_CreateFormsresult"=>$logedLoginFormOutput);
    echo json_encode($data);
    die();
}else{
    $mainLoginAvatarOutput = '
    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <img src="https://img.icons8.com/cotton/64/000000/gender-neutral-user.png" class="rounded-circle img-fluid" alt="avatar image" style="width: 50px; height: 50px; margin-left: 20px;">
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
        <a  class="nav-link text-info" href="#" data-toggle="modal" data-target="#modalLRForm" >Login/Créer un compte</a>
    </div>';
    $mainLoginFormOutput = '
    <div class="modal-dialog cascading-modal" role="document">
            <div class="modal-content">
              <div class="modal-c-tabs">
                <ul class="nav nav-tabs md-tabs tabs-2" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link blue-gradient active text-white" data-toggle="tab" href="#panel7" role="tab">
                      Faire Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link blue-gradient text-white" data-toggle="tab" href="#panel8" role="tab">
                      Créer un compte</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <!--Login pannel-->
                  <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                    <div class="modal-body mb-1 text-center">
                        <p class="h4 mb-4 text-danger"></p>
                      <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Login">
                        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
                        <div class="d-flex justify-content-around">
                          <div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                  <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                              </div>
                          </div>
                          <div>
                              <a href="">Mot-de-passe oblié ?</a>
                          </div>
                      </div>
                      <button class="btn btn-info btn-block my-4 blue-gradient" id="submit_login" type="submit">Sign in</button>
                  </div>
                  <div class="modal-footer">
                      <button class="btn blue-gradient text-white" data-dismiss="modal">Fermer</button>
                  </div>
                  </div>
                  <script>
                    $("#submit_login").click(function() {
                        var user_name = $("#defaultLoginFormEmail").val();
                        var password = $("#defaultLoginFormPassword").val();
                        $.ajax({
                          url : "php/login_verify.php",
                          type: "POST",
                          data:{
                            user_name: user_name,
                            password: password
                          },
                          success: function( results ){
                            var obj=$.parseJSON(results); 
                            $("#userAvatarDiv").empty();
                            $("#modalLRForm").empty();
                            $("#userAvatarDiv").append(obj.LoginAvatarResult);
                            $("#modalLRForm").append(obj.LoginFormresult);
                          }
                        });
                    });
                  </script>
                  <!--Create account pannel-->
                  <div class="tab-pane fade" id="panel8" role="tabpanel">
                  <div class="modal-body">
                    <p class="h4 mb-4 text-danger"></p>
                    <div class="form-row mb-4">
                      <div class="col">
                          <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Prénom">
                      </div>
                      <div class="col">
                          <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Nom">
                      </div>
                    </div>
                    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="Adresse mail">
                    <input type="text" id="defaultRegisterFormLogin" class="form-control mb-4" placeholder="Utilisateur">
                    <input type="password" id="defaultRegisterFormPassword" class="form-control mb-4" placeholder="Mot-de-passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <input type="password" id="defaultRegisterFormPasswordVerification" class="form-control mb-4" placeholder="Mot-de-passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Telefone" aria-describedby="defaultRegisterFormPhoneHelpBlock">
                    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                        Optionel - pour faire connection par deux etapes
                    </small>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choisiser une image</label>
                      </div>
                    </div>
                    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                        Optionel - Image de profil
                    </small>
                    <button id="submit_new_account" class="btn btn-info my-4 btn-block blue-gradient" type="submit">Créer compte</button>
                  </div>
                  <div class="modal-footer">
                    <button class="btn blue-gradient text-white" data-dismiss="modal">Fermer</button>
                  </div>
                  <script>
                    $("#submit_new_account").click(function() {
                        var new_firstName = $("#defaultRegisterFormFirstName").val();
                        var new_lastName = $("#defaultRegisterFormLastName").val();
                        var new_email = $("#defaultRegisterFormEmail").val();
                        var new_login = $("#defaultRegisterFormLogin").val();
                        var new_password = $("#defaultRegisterFormPassword").val();
                        var new_password_verification = $("#defaultRegisterFormPasswordVerification").val();
                        var new_phone = $("#defaultRegisterPhonePassword").val();
                        $.ajax({
                          url : "php/new_account.php",
                          type: "POST",
                          data:{
                            new_firstName : new_firstName,
                            new_lastName : new_lastName,
                            new_email : new_email,
                            new_login : new_login,
                            new_password : new_password,
                            new_password_verification : new_password_verification,
                            new_phone : new_phone
                          },
                          success: function( results ){
                            var obj=$.parseJSON(results); 
                            $("#userAvatarDiv").empty();
                            $("#modalLRForm").empty();
                            $("#userAvatarDiv").append(obj.LoginAvatarResult);
                            $("#modalLRForm").append(obj.Login_Account_CreateFormsresult);
                          }
                        });
                    });
                  </script>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>';
                  $data=array("LoginAvatarResult"=>$mainLoginAvatarOutput, "Login_Account_CreateFormsresult"=>$mainLoginFormOutput);
                  echo json_encode($data);
                  die();
}
?>