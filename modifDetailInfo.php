<?php
    include('fonction.php');
    $id = $_GET['id'];
    $info = getDetailInformationWhere($id);
    $information = getWhatInformation();
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
              <form action="traitementModifDetailInfo.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
              <div class="card border-bottom-0">
                <div class="card-body pb-0">
                  <p class="card-title">Modification description information</p>
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
                    <?php for($i=0; $i<sizeof($info); $i++){ ?>                  
                    Titre : <input type="text" name="titre" id="" value="<?php echo $info[$i]['theme']; ?>"><br><br>
                    Description : <input type="textbr" name = "texte" value="<?php echo $info[$i]['descri']; ?>"><br><br>
                    <?php } ?>
                    Photo : <input type="file" class="bg-success text-white border  rounded-lg" name="fichier" id="" required><br><br>
                    <button type="submit" class="w-25 h-auto p-2 btn btn-primary">Ajouter</button><br><br>
                  </div>
                </div>
              </div>
              </form>
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

