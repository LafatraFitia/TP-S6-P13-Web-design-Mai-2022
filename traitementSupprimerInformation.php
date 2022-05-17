<?php 
    require("fonction.php");

    $id = $_GET['idInfo'];
    supprimerInformation($id);

    header("Location: admin.php");
?>