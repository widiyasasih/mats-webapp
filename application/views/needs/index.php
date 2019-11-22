 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">
                    <!-- <div class="pull-right"> -->
                    <ul class="navbar-nav pull-left">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">update</i> &nbsp Periode
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav pull-right nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo site_url('needs/create_card');?>">
                                <i class="material-icons">add</i> Tambah
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                    <!-- </div> -->
                    </div>
                    <!-- <p class="card-category">List kebutuhan vendor di bulan ini :</p> -->
                </div>
                <div class="card-body">
                  <div class="card-body text-left">
                  <?php if (empty($cards)) {
                    echo '<br><br><p class="title text-center" style="font-weight:bold">Belum ada periode yang terdaftar</p><br>';
                  }else {
                    echo '<h4 class="title text-primary">Periode yang terdaftar :</h4><br>';
                  }?>
                  <?php foreach ($cards as $card) : ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card card-plain">
                          <div class="card-header card-header-primary">
                            <a href="<?php echo site_url('/needs/view/'.$card['date_id']) ;?>"> 
                            <h4 class="card-title ">
                            <div class="nav-item">
                              <i class="material-icons">label_important</i>&nbsp &nbsp<?php echo $card['month']." ".$card['year'] ;?>
                              <div class="ripple-container"></div>
                              <span class="pull-right"><?php if ($card['mn_id'] === NULL) {
                                echo '<small style="font-style:italic;">Belum ada model</small>';
                              }?></span>
                            </div>  
                            </h4></a>
                            <!-- <p class="card-category">List kebutuhan vendor di bulan ini :</p> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          


 