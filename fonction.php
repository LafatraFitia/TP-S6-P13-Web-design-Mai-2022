<?php
    session_start();
    function getWhatInformation(){
        require("connection.php");
        $requete = "SELECT * FROM informationTypeGeneral";
        $res = mysqli_query($bdd, $requete);
        if(is_bool($res)) {
              return null;
        }
        $resultat = array();
        
        while ($fafana = mysqli_fetch_assoc($res)){
              $resultat [] = $fafana;
        }
        return $resultat;
    }

    function getInformationAbout($idI){
        require("connection.php");
        $sql="select * from detailInformation where idInformation=%d";
            $sql=sprintf($sql,$idI);
            $res=mysqli_query($bdd,$sql);
        if(is_bool($res)) {
                    return null;
            }
            $resultat = array();

            while ($fafana = mysqli_fetch_assoc($res)){
                    $resultat [] = $fafana;
            }
            return $resultat;
    }

    function getInformationGlobale(){
        require("connection.php");
        $requete = "SELECT * FROM informationGlobale";
        $res = mysqli_query($bdd, $requete);
        if(is_bool($res)) {
              return null;
        }
        $resultat = array();
        
        while ($fafana = mysqli_fetch_assoc($res)){
              $resultat [] = $fafana;
        }
        return $resultat;
    }

    function slugify($text)
    {
        // Strip html tags
        $text=strip_tags($text);
        // Replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // Transliterate
        setlocale(LC_ALL, 'en_US.utf8');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // Trim
        $text = trim($text, '-');
        // Remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // Lowercase
        $text = strtolower($text);
        // Check if it is empty
        if (empty($text)) { return 'n-a'; }
        // Return result
        return $text;
    }

    function ajoutInformation($titre, $idType, $icone){
        require("connection.php");
        $lien = slugify($titre);
        $requete = "INSERT INTO information(titre, idTypeInformation, icone, lien) VALUES ('".$titre."',".$idType.",'".$icone."','".$lien."')";
        $requete=sprintf($requete, $idType, $titre, $icone);
        var_dump($requete);
        mysqli_query($bdd, $requete);
    }

    function ajoutDetailInformation($idInfo, $idDomaine, $photo, $texte, $titre){
        require("connection.php");
        $requete = "INSERT INTO detailInformation(idInformation, idDomaine, photo, texteInformation, titre) VALUES (".$idInfo.",".$idDomaine.",'".$photo."','".$texte."','".$titre."')";
        $requete=sprintf($requete, $idInfo, $idDomaine, $photo, $texte, $titre);
        echo $requete;
        var_dump($requete);
        mysqli_query($bdd, $requete);
    }

    function supprimerInformation($idInfo){
        require("connection.php");
        $requete = "DELETE FROM information where id = ".$idInfo;
        $requete = sprintf($requete, $idInfo);
        mysqli_query($bdd, $requete);
    }

    function supprimerDetailInformation($idInfo){
        require("connection.php");
        $requete = "DELETE FROM detailInformation where id = ".$idInfo;
        $requete = sprintf($requete, $idInfo);
        mysqli_query($bdd, $requete);
    }

    function getInformationWhere($id){
        require("connection.php");
        $requete = "SELECT * FROM informationTypeGeneral where idInformation =".$id;
        $res = mysqli_query($bdd, $requete);
        if(is_bool($res)) {
              return null;
        }
        $resultat = array();
        
        while ($fafana = mysqli_fetch_assoc($res)){
              $resultat [] = $fafana;
        }
        return $resultat;
    }

    function getDetailInformationWhere($id){
        require("connection.php");
        $requete = "SELECT * FROM informationGlobale where id =".$id;
        $res = mysqli_query($bdd, $requete);
        if(is_bool($res)) {
              return null;
        }
        $resultat = array();
        
        while ($fafana = mysqli_fetch_assoc($res)){
              $resultat [] = $fafana;
        }
        return $resultat;
    }

    function updateInformation($id, $titre, $idType, $icone){
        require("connection.php");
        $lien = slugify($titre);
        $requete = "UPDATE information SET titre ='".$titre."', idTypeInformation = ".$idType.", icone = '".$icone."',lien = '".$lien."' WHERE id = ".$id;
        $requete=sprintf($requete,$id, $idType, $titre, $icone);
        var_dump($requete);
        mysqli_query($bdd, $requete);
    }

    function updateDetailInfo($id, $idInfo, $idDomaine, $photo, $texte, $titre){
        require("connection.php");
        $requete = "UPDATE detailInformation SET idInformation=".$idInfo.", idDomaine = ".$idDomaine.", photo = '".$photo."', texteInformation = '".$texte."', titre ='".$titre."' WHERE id =".$id;
        $requete=sprintf($requete,$id, $idInfo, $idDomaine, $photo, $texte, $titre);
        echo $requete;
        var_dump($requete);
        mysqli_query($bdd, $requete);
    }

    function login($mail,$mdp){
        require("connection.php");
        $sql="SELECT*from admini where mail='%s' and mdp=Sha1('%s') ";
        $sql=sprintf($sql,$mail,$mdp);
        $resultat=mysqli_query($bdd,$sql);
        $ref=mysqli_fetch_assoc($resultat);
        $nb=mysqli_num_rows($resultat);
        if($nb>0){
                $_SESSION['mail']=$ref['mail'];				
                $_SESSION['nom']=$ref['nom'];				
                $_SESSION['id']=$ref['id'];				
                header('Location:admin.php');
        }else{
                header('location:login.php');
        }
    }
?>