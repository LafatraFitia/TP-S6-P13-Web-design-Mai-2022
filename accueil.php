<?php
  include('fonction.php');
  $information = getWhatInformation();
?>
<body>

    <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="row">
        <h3>Découvrez plus sur le réchauffement climatique</h3>
        <?php for($i=0; $i<sizeof($information); $i++){ ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
          <div class="icon-box">
          <div class="icon"><img src="icone/<?php echo $information[$i]['icone']; ?>" width="50px" height="50px"></div>
            <h4><a href="<?php echo $information[$i]['typeInformation']; ?>-<?php echo $information[$i]['lien']; ?>-<?php echo $information[$i]['idInformation']; ?>"><?php echo $information[$i]['titre']; ?></a></h4>
          </div>
        </div>
        <?php } ?>

      </div>

    </div>
  </section><!-- End Services Section -->
  