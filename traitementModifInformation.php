<?php
      require("fonction.php");
      
      $err = -1;
      

      //
      $target_dir = "assets2/images/";
      $target_file =basename($_FILES["fichier"]["name"]);
      echo "nom du fichier = ". $target_file;
      echo "<br>";
      $fil = $target_file;
      $target_file = $target_dir . $target_file;
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
      // Check if image file is a actual image or fake image

      $check = getimagesize($_FILES["fichier"]["tmp_name"]);
      if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
      } else {
            echo "File is not an image.";
            $uploadOk = 0;
      }

      
      // Check if file already exists
      if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
      }
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
            
            if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
                  echo "The file ". htmlspecialchars( basename( $_FILES["fichier"]["name"])) . " has been uploaded.";

                  $id = $_GET['idInfo'];
                  $titre = $_POST['titre'];
                  $type = $_POST['type'];
                  $icone = $fil;
                  updateInformation($id, $titre, $type, $icone);
                
                  header("Location: admin.php");             
            } else {
                  echo "Sorry, there was an error uploading your file.";
            }
      }
?>