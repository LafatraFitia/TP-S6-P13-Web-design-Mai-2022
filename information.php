<?php
    include('fonction.php');
    $idInfo = $_GET['idInfo'];
    $detInfo = getInformationAbout($idInfo);
?>
<section id="about" class="about">
<?php for($i=0; $i<sizeof($detInfo); $i++) { ?>
      <div class="container">
      
        <div class="row">
        
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
            <img src="image/<?php echo $detInfo[$i]['photo']; ?>" class="img-fluid" alt="">
            
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3><?php echo $detInfo[$i]['titre']; ?></h3>
            <p class="fst-italic">
            <?php echo $detInfo[$i]['texteInformation']; ?>
            </p>
          </div>
        </div>
      </div>
      <br><br><br>
      <?php } ?>
    </section><!-- End About Section -->