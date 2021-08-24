<?php
session_start();
if (isset($_SESSION['UsuarioNivel'])) {
	if ($_SESSION['UsuarioNivel'] > 0) {
		$type = $_POST['type'];
		$name = $_POST['name'];
		$img = $_FILES['img'];

		$artic_uniq_id = uniqid('', true);
		$artic_link = "ReadArticle.php?ArticleID=".$artic_uniq_id."&ArticleName=".$name."&TypeOfArticle=".$type."";

		$target_dir = "../articles/ImagesPresentation";
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$before_target_file = $artic_uniq_id . $imageFileType;
		$target_file =  $target_dir . $before_target_file;
		$uploadOk = 1;
		if(isset($_POST["submit"])) {
    		$check = getimagesize($_FILES["img"]["tmp_name"]);
    		if($check !== false) {
        		$uploadOk = 1;
    		} else {
        		$uploadOk = 0;
    		}
		}
		if (file_exists($target_file)) {
    		echo "Sorry, file already exists.";
    		$uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Cela n'est pas une image ou na pas le bon format. On accepte seulement .jpg, .png, .jpeg, .gif. Cette image a le format ".$imageFileType .".";
    		$uploadOk = 0;
		}
		if ($uploadOk == 0) {
			    	

		} else {
    		if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
    			/*Succes uploading img*/
    			$conn = new PDO();
    			$artic_upload_query = $conn->prepare("INSERT INTO `articles` VALUES (NULL ,'".$artic_uniq_id."','".$name."','".$artic_link."', 'Rien encore ! :(', '".$_SESSION['UsuarioNome']."', NOW(), '".$type."', '0', 'ImagesPresentation/".$before_target_file.";");
    			if ($artic_upload_query->execute()) {
    				exit("Succes lors de l'enregistrement de l'article");
    				/*Succes uploading the article*/
    			} else {
    				/*Error uploading the article*/
    				exit("Erreur lors de l'enregistrement de l'article");
    			}
    		} else {
        		exit("Erreur lors de l'enregistrement de l'image de presentation");
        		/*Error uploading img*/
    		}
		}
	} else {
		header("Location: zhepasteurnews.online");
		exit();
	}
} else {
	header("Location: zhepasteurnews.online");
	exit();
}
?>
