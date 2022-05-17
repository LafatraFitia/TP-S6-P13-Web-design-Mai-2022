<?php
    include('fonction.php');
    $information = getWhatInformation();
    $infoGlobale = getInformationGlobale();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gestion des informations</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets2/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets2/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets2/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets2/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="admin.php">
              <span class="menu-title">Accueil</span>
            </a>
            <a class="nav-link" href="rechauffement-climatique">
              <span class="menu-title">Deconnection</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h1>Gestion des informations</h1><br>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
            <form action="traitementAjoutInformation.php" method="post" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                    <p class="card-title">Ajout Information</p>
                    Titre : <input type="text" name="titre" id=""><br><br>
                   
                    Type : <select name="type" id=""> 
                                <option value="1">cause</option>
                                <option value="2">probleme</option>
                                <option value="3">solution</option>
                                <option value="4">consequence</option>
                            </select> <br><br>
                    Icone : <input type="file" class="bg-success text-white border  rounded-lg" name="fichier" id="" required><br><br>
                    <button type="submit" class="w-25 h-auto p-2 btn btn-primary">Ajouter</button>
                </div>
              </div>
            </form>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <form action="traitementAjoutDetailInformation.php" method="post" enctype="multipart/form-data">
              <div class="card border-bottom-0">
                <div class="card-body pb-0">
                  <p class="card-title">Ajout description information</p>
                    Information : <select name="idInfo" id="">
                                    <?php for($i=0; $i<sizeof($information); $i++){ ?>
                                        <option value="<?php echo $information[$i]['idInformation']; ?>"><?php echo $information[$i]['titre']; ?></option>
                                    <?php } ?>
                                </select> <br><br>
                    Domaine : <select name="idDomaine" id="">
                                    <option value="1">Animaux</option>
                                    <option value="2">Humaine</option>
                                    <option value="3">Agriculture</option>
                            </select> <br><br>
                    Titre : <input type="text" name="titre" id=""><br><br>
                    Description : <input type="textbr" name = "texte"><br><br>
                    Photo : <input type="file" class="bg-success text-white border  rounded-lg" name="fichier" id="" required><br><br>
                    <button type="submit" class="w-25 h-auto p-2 btn btn-primary">Ajouter</button><br><br>
                  </div>
                </div>
              </div>
              </form>
            </div>
            <div class="row">
                <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Liste information</p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Titre</th>
                          <th>Type</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      <?php for($i=0; $i<sizeof($information); $i++) { ?> 
                        <tr>
                          <td><?php echo $information[$i]['titre']; ?></td>
                          <td><?php echo $information[$i]['typeInformation']; ?></td>
                          <td><a href="traitementSupprimerInformation.php?idInfo=<?php echo $information[$i]['idInformation']; ?>"><img src="assets2/icone/supprimer.png" alt="" srcset="" width="10px"  height="10px"></a></td>
                          <td><a href="modifInfo.php?idInfo=<?php echo $information[$i]['idInformation']; ?>"><img src="assets2/icone/modifier.png" alt="" srcset=""></a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <br><br>
            <div class="row">
                <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Liste information</p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Titre</th>
                          <th>Domaine</th>
                          <th>Thème</th>
                          <th>Description</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      <?php for($i=0; $i<sizeof($infoGlobale); $i++) { ?> 
                        <tr>
                          <td><?php echo $infoGlobale[$i]['titreInfo']; ?></td>
                          <td><?php echo $infoGlobale[$i]['domaine']; ?></td>
                          <td><?php echo $infoGlobale[$i]['theme']; ?></td>
                          <td><?php echo $infoGlobale[$i]['descri']; ?></td>
                          <td>
                            <a href="traitementSupprimerDetailInformation.php?idInfo=<?php echo $infoGlobale[$i]['idInfo']; ?>"><img src="assets2/icone/supprimer.png" alt="" srcset=""></a>
                            <a href="modifDetailInfo.php?id=<?php echo $infoGlobale[$i]['id']; ?>"><img src="assets2/icone/modifier.png" alt="" srcset=""></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="assets2/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="assets2/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assets2/js/off-canvas.js"></script>
  <script src="assets2/js/hoverable-collapse.js"></script>
  <script src="assets2/js/template.js"></script>
  <script src="assets2/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets2/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

