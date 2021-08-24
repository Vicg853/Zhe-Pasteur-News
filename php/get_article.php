<?php
$articleID = $_POST['articleID'];
$articleName = $_POST['articleName'];

if($articleID == NULL && $articleID == ""){
    $articleResult = '
    <div class="row">
        <div class="col text-center text-danger">
          <h1>
            Vous devez selectioner un article avant
          </h1>
        </div>
    </div>
    ';
    $data=array("articleResult"=>$articleResult);
    echo json_encode($data);
    die();
}else{
    if($articleName == NULL && $articleName == ""){
        $articleResult = '
        <div class="row">
            <div class="col text-center text-danger">
              <h1>
                Vous devez selectioner un article avant
              </h1>
            </div>
        </div>
        ';
        $data=array("articleResult"=>$articleResult);
        echo json_encode($data);
        die();
    }else{
        $conn = new PDO();
        $query = $conn->prepare("SELECT * FROM `articles` WHERE `SecondID` = '".$articleID."' AND `Name` = '".$articleName."' AND `Aprouved` = '1';");
        if($query->execute() && $row = $query->fetch()){
            $articleResult = '
            <div class="container miniPadding">
              <div class="row">
                <div class="col">
                  <div class="row">
                    <div class="col">
                      <h3 class="text-center">
                        Par: '.$row['Autor'].'
                      </h3>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col">
                        <h3 class="text-center">
                          Le: '.$row['CreationDate'].'
                        </h3>
                      </div>
                  </div>
                </div>
                <div class="col-lg text-center">
                  <h2>
                    '.$row['Name'].'
                  </h2>
                </div>
                <div class="col text-center">
                </div>
              </div>
              <div class="row">
                '.$row['Content'].'
              </div>
            </div>
            ';
            $data=array("articleResult"=>$articleResult);
            echo json_encode($data);
            die();
        }else{
            $articleResult = '
            <div class="row">
                <div class="col text-center text-danger">
                  <h1>
                    Oups ! On n &#39; a pas trouvé cet article !
                  </h1>
                  <img src="img/fogg-page-not-found-1.png" class="img-fluid">
                </div>
            </div> 
            ';
        }
    }
}
?>
