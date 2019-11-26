</nav>
    <!-- End Navbar -->
    <div class="content">
    <div class="container-fluid">
      <div class="row">
      <input type="hidden" id="date_current" name="date_current" value="">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">person_pin</i>
              </div>
              <p class="card-category">Total Purchase Order</p>
              <h3 class="card-title">
                <?php if (empty($tot_pos)) {
                  echo 'Belum ada PO';
                }else {
                  echo $tot_pos;
                };?><br>
                <small>(<?php echo 'Rp.'.number_format($sum_pos['result']-($sum_pos['result']*$tax),0,',','.');?>)</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i>Bulan <?php echo $date['month'];?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">confirmation_number</i>
              </div>
              <p class="card-category">Total Slip Pengajuan</p>
              <h3 class="card-title"><?php echo $total_sps;?><br>
                <small><?php echo '(Rp.'.number_format($nominal_sps, 0,',','.').')';?></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> Bulan <?php echo $date['month'];?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">attach_money</i>
              </div>
              <p class="card-category">Total Rancangan Anggaran</p>
              <h3 class="card-title"><?php echo 'Rp.'.number_format($tot_cost,0,',','.');?>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> 
                <a href="<?php echo site_url('needs/recap/'.$date['date_id']);?>">lihat bulan <?php echo $date['month'];?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card card-chart">
            <div class="card-header card-header-tabs card-header-primary nav-link">
              Quick Search
            </div>
            <div class="card-body">
              <div class="col-md-12 pull-left"><br>
                <!-- <h4 class="card-title">Cari cetakan</h4> 
                <?php $attributes = array('name' => 'myForm', 'class' => 'navbar-form');
                echo form_open_multipart('', $attributes);?> 
                <form class="navbar-form"> -->
                  <div class="input-group no-border">
                    <input type="text" value="" name="search_text" id="search_text" class="form-control" placeholder="Cari cetakan AB123...">
                    <label for="search_text"></label>
                    <button class="btn btn-primary btn-round btn-just-icon">
                      <i class="material-icons">search</i>
                      <div class="ripple-container"></div>
                    </button>
                  </div>
                <div id="result"></div>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons" title="Rak Cetakan">dns</i> 
                <a href="<?php echo site_url('molds');?>">lihat daftar cetakan</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-danger">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <h4 class="card-title">Deadline Purchase Order</h4>
                      <p class="card-category">Bulan <?php echo $date['month'];?></p>
                    </div>
                  </div>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-danger text-center">
                    <?php 
                      if (!empty($deadline_pos)) {
                        echo '
                        <th>No.PO</th>
                      <th class="text-left">Target Waktu</th>
                      <th>Tujuan</th>
                      <th colspan="2">Nominal</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <tr>';
                      }
                      if (empty($deadline_pos)) {
                          echo '<td colspan="5" class="text-center" style="font-weight: bold;"><br>';
                          echo 'Purchase order kosong';
                          echo '</td>';
                        }
                      ?>
                      <?php foreach ($deadline_pos as $key => $deadline_po) :?>
                      <tr class="text-center">
                        <td><?php echo $deadline_po['no'];?></td>
                        <td class="text-left"><?php echo date('d-m-Y', strtotime($deadline_po['deliv_max']));?></td>
                        <td><?php echo $deadline_po['vendor'];?></td>
                        <td>Rp.</td>
                        <td class="text-right"><?php echo number_format($deadline_po['result']-($deadline_po['result']*$tax),0,',','.');?></td>
                        <td class="text-center">
                          <a href="<?php echo site_url('needs/view_po/'.$deadline_po['po_id']);?>" style="color:#E63C38;" title="View">
                            <i class="material-icons" title="Lihat Purchase Order <?php echo $deadline_po['no'];?>">label_important</i>
                            <div class="ripple-container"></div>
                          </a>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Rekap Bulanan</h4>
                  <p class="card-category">Tahun <?php echo $date['year'];?></p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-info">
                    <?php 
                    if (!empty($needs)) {
                      echo '
                      <th>Bulan</th>
                      <th class="text-center" colspan="2">Nominal</th>
                      <th class="text-center"></th>
                    </thead>
                    <tbody>
                      <tr>';
                      }
                      if (empty($needs)) {
                          echo '<td colspan="5" class="text-center" style="font-weight: bold;"><br>';
                          echo 'Slip pengajuan order kosong';
                          echo '</td>';
                        }
                      ?>
                      <?php foreach ($needs as $key => $need) :?>
                      <tr>
                        <td><?php echo $need['mon'];?></td>
                        <td class="text-right" width="5px">Rp.</td>
                        <td class="text-right" style="padding-right:0px;"><?php echo number_format($need['nominals'],0,',','.');?></td>
                        <td class="text-center">
                          <a href="<?php echo site_url('needs/recap/'.$need['dateneed_id']);?>" style="color:#06B0C5;" title="View">
                            <i class="material-icons" title="Lihat Rekap Bulan <?php echo $need['mon'];?>">label_important</i>
                            <div class="ripple-container"></div>
                          </a>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

