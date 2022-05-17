<?php 
    require("fonction.php");

    $id = $_GET['idInfo'];
    supprimerDetailInformation($id);

    header("Location: admin.php");
?>