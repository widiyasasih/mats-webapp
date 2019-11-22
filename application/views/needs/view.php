 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12" id="">
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="card-title">
                    <ul class="navbar-nav pull-left">
                      <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">update</i> &nbsp; Bulan  <?php echo $date['month'].' '.$date['year'];?>
                            <div class="ripple-container"></div>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" title="Tambah Model" href="add_model" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">add</i>
                            <!-- <div class="ripple-container"></div> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                          <?php foreach ($model_unselected as $unselected) { ?>
                            <a class="dropdown-item" style="color:black;" href="<?php echo site_url('needs/add_items_model/'.$unselected['id'].'/'.$date['date_id']);?>"><?php echo $unselected['model'];?></a>
                          <?php } ?>
                        </div>
                      </li>
                    </ul>
                    </ul><ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link">
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        </a>
                      </li>
                    </ul>
                    </ul><ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" onclick="return confirm('Anda yakin akan menghapus periode <?php echo $date['month'].' '.$date['year'];?> ?')" href="<?php echo site_url('needs/delete_card/'.$date['date_id']);?>">
                          <i title="Hapus Periode" class="material-icons">delete</i>
                          <p class="d-lg-none d-md-block">
                            Hapus
                          </p>
                        </a>
                      </li>
                    </ul>
                    </ul><ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link">
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="#purchase-order">
                          <i title="Purchase Order" class="material-icons">person_pin</i>
                          <p class="d-lg-none d-md-block">
                            Output
                          </p>
                        </a>
                      </li>
                    </ul>
                    </ul><ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link">
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo site_url('needs/recap/'.$date['date_id']);?>" id="navbarDropdownProfile" aria-haspopup="true" aria-expanded="false">
                          <i title="Lihat Rekapan" class="material-icons">list_alt</i>
                          <p class="d-lg-none d-md-block">
                            Lihat Rekapan
                          </p>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="card-body text-left">
                  <br>
                  <?php 
                    if (empty($models)) {
                      echo '<div class="row">';
                      echo '<div class="col-md-12 text-center" style="font-weight: bold;">';
                      echo 'Belum ada model yang ditambah';
                      echo '</div>';
                      echo '</div>';
                    }
                  ?>
                  <?php foreach ($models as $model) : ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card card-plain">
                          <div class="card-header-primary">
                            <h4 class="card-title">
                            <div class="nav-item">
                            <a href="<?php echo site_url('needs/edit_items/'.$date['month_id'].'/'.$date['year'].'/'.$date['date_id'].'/'.$model['id']);?>"> 
                              <i class="material-icons">label_important</i>&nbsp; &nbsp;<?php echo $model['model'];?>
                              <div class="ripple-container"></div>
                            </a>
                            <a href="#" class="pull-right" id="navbarDropdownProfile" title="Hapus Model" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="material-icons">more_vert</i>
                              <div class="ripple-container"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                              <a class="dropdown-item" style="color:black;" href="<?php echo site_url('needs/delete_model/'.$model['id'].'/'.$date['date_id']);?>">Hapus Model</a>
                            </div>
                            </div>  
                            </h4>
                          </div>
                        </label>
                      </div>
                    </div>
                  </div>
                  <?php endforeach;?>
                  </div>
                </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" id="purchase-order">
              <div class="card">
                <div class="card-header card-header-success">
                  <div class="card-title">
                    <ul class="navbar-nav pull-left">
                      <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person_pin</i> &nbsp; Purchase Order
                            <div class="ripple-container"></div>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" title="Tambah Purchase Order" href="<?php echo site_url('needs/add_po/'.$date['date_id']);?>">
                            <i class="material-icons">add</i>
                            <!-- <div class="ripple-container"></div> -->
                        </a>
                      </li>
                    </ul>
                    </ul><ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link">
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        </a>
                      </li>
                    </ul>
                    </ul><ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo site_url('needs/delete_pos/'.$date['date_id'])?>" onclick="return confirm('Anda yakin akan menghapus semua purchase order ?')">
                          <i title="Hapus Semua Purchase Order" class="material-icons">delete</i>
                          <p class="d-lg-none d-md-block">
                            Hapus
                          </p>
                        </a>
                      </li>
                    </ul>
                    </ul><ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link">
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        </a>
                      </li>
                    </ul>
                    <!-- <ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="#print">
                          <i title="Cetak Semua Purchase Order" onclick="return confirm('Cetak semua slip pengajuan ?')" class="material-icons">print</i>
                          <p class="d-lg-none d-md-block">
                            Print
                          </p>
                        </a>
                      </li>
                    </ul> -->
                  </div>
                </div>
                <div class="card-body">
                  <div class="card-body text-left">
                  <div class="row">
                    <div class="table-responsive">
                    <table class="table">
                      <?php 
                      if (!empty($pos)) {
                        echo '
                        <thead class=" text-primary">
                          <th class="text-center">
                            No. PO
                          </th>
                          <th>
                            Supplier
                          </th>
                          <th class="text-center">
                            Maksimal Delivery
                          </th>
                          <th class="text-center">
                            Dibuat
                          </th>
                          <th class="text-center">
                            Jumlah SP
                          </th>
                          <th class="text-center">
                            Aksi
                          </th>
                        </thead>
                        
                        <tbody>
                          <tr>';
                      }
                      ?>
                
                      <?php 
                      if (empty($pos)) {
                          echo '<td colspan="5" class="text-center" style="font-weight: bold;">';
                          echo 'Purchase order kosong';
                          echo '</td>';
                        }
                      ?>
                        </tr>
                      <?php foreach ($pos as $key => $po) : ?>
                        <tr>
                          <td class="text-center">
                            <?php echo $po['no'];?>
                          </td>
                          <td>
                            <?php echo $po['supplier_name'];?>
                          </td>
                          <td class="text-center">
                            <?php echo date('d-m-Y', strtotime($po['delivery']));?>
                          </td>
                          <td class="text-center">
                            <?php echo date('d-m-Y', strtotime($po['date_sender']));?>
                          </td>
                          <td class="text-center">
                            <b style="font-weight:bold"><?php if ($po['ss'] < 0) {
                              echo '0';
                            }else {
                              echo $po['ss'];
                            };?></b>&nbsp;
                            <span class="nav-item dropdown">
                            <a href="" style="color:#E94743;" title="Slip Pengajuan" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="material-icons">confirmation_number</i>
                              <div class="ripple-container"></div>
                            </a> &nbsp; &nbsp;
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                              <a class="dropdown-item" style="color:black;" href="<?php echo site_url('needs/add_sp/'.$po['id']);?>">Tambah SP</a>
                              <a class="dropdown-item" style="color:black;" href="<?php echo site_url('needs/list_sp/'.$po['id']);?>">Lihat list SP</a>
                            </div>
                            </span>
                          </td>
                          <td class="text-center">
                            <a href="<?php echo site_url('needs/view_po/'.$po['id']);?>" style="color:#22bab0;" title="View">
                              <i class="material-icons">visibility</i>
                              <div class="ripple-container"></div>
                            </a> &nbsp; &nbsp;
                            <a href="<?php echo site_url('needs/print_po/'.$po['id']);?>" title="Print PO"  target="_BLANK">
                                <i class="material-icons">print</i>
                                <div class="ripple-container"></div>
                            </a> &nbsp; &nbsp;
                            <span class="nav-item dropdown">
                            <a class="dropdown" title="Aksi Lain" href="add_model" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                            <p class="d-lg-none d-md-block">
                            More
                            </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" style="color:black;" href="<?php echo site_url('needs/edit_po/'.$date['date_id'].'/'.$po['id']);?>">Edit</a>
                                <a class="dropdown-item" style="color:black;" href="<?php echo site_url('needs/delete_po/'.$date['date_id'].'/'.$po['id']);?>">Delete</a>
                            </div>
                            </span>
                          </td>
                        </tr>
                      </tbody>
                      <?php endforeach;?>
                    </table>
                    </div> 
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <ul class="navbar-nav pull-left">
                <li class="nav-item dropdown">
                  <a class="nav-link" href="<?php echo site_url('needs')?>">
                    <i title="Kembali" class="material-icons">arrow_back</i> Kembali
                    <p class="d-lg-none d-md-block">
                      Kembali
                    </p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <a href="#top" class="float">
          <i class="material-icons my-float">keyboard_arrow_up</i>
          </a>
          <div class="label-container">
          <div class="label-text">Go to Top</div>
          <i class="fa fa-play label-arrow"></i>
          </div>
          
          
        
          
     