 </nav>
        <!-- End Navbar -->
        <div class="content">
          <div class="container-fluid">

            <div><?= $title ?></div>
            <div>
              <?php foreach($needs as $need) :?>
                <h3><?php echo $need['item']; ?></h3>
                Prices : <?php echo $need['price']; ?> /
                <?php echo $need['idUnitType']; ?>
                <p><a href="<?php echo site_url('/needs/'.$need['idItem']);?>">yolo</a></p>                
              <?php endforeach; ?>
            </div>