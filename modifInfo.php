<?php
    include('fonction.php');
    $id = $_GET['idInfo'];
    $info = getInformationWhere($id);
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
            <form action="traitementModifInformation.php?idInfo=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                    <p class="card-title">Modification Information</p>
                    Titre : 
                    <?php for($i=0; $i<sizeof($info);$i++){ ?>
                        <input type="text" name="titre" id="" value="<?php echo $info[$i]['titre']; ?>">
                    <?php } ?>
                    <br><br>
                   
                    Type : <select name="type" id=""> 
                                <option value="1">cause</option>
                                <option value="2">probleme</option>
                                <option value="3">solution</option>
                                <option value="4">consequence</option>
                            </select> <br><br>
                    Icone : <input type="file" class="bg-success text-white border  rounded-lg" name="fichier" id="" required><br><br>
                    <button type="submit" class="w-25 h-auto p-2 btn btn-primary">Modifier</button>
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

