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
                        <a class="nav-link">
                        <div class="input-group no-border">
                            <i class="material-icons">confirmation_number</i> &nbsp; &nbsp;List Slip Pengajuan
                        </div>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" title="Tambah Slip Pengajuan" href="add_sp" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">add</i>
                            <!-- <div class="ripple-container"></div> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                          <?php foreach ($pos as $po) { ?>
                            <a class="dropdown-item" style="color:black;" href="<?php echo site_url('needs/add_sp/'.$po['po_id']);?>"><?php echo 'No.PO : '.$po['no'].'/'.$po['initial'].'/'.$po['romawi'].'/'.$po['year'].' - Supplier : '.$po['supplier_name'];?></a>
                          <?php } ?>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="card-body text-left">
                  <div class="row">
                    <!-- <p class="card-category result-sps">
                    <span class="text-primary"><i class="fa fa-long-arrow-right"></i></span><small> hasil pencarian cetakan</small> -->
                    <div id="result"></div>
                    <!-- </p> -->
                    <!-- <div style="clear:both"></div> -->
                    <div class="table-responsive">
                      <table id="result" class="table">
                          <?php
                          if (!empty($sps)) {
                            echo'
                            <thead class=" text-primary">
                            <th class="text-center">
                              No.
                            </th>
                            <th class="text-left">
                              No. PO
                            </th>
                            <th>
                              Tanggal Pengajuan
                            </th>
                            <th colspan="2" class="text-center">
                            Total Nominal
                            </th>
                            <th class="text-center">
                            Total Pcs
                            </th>
                            <th class="text-center">
                              Deskripsi
                            </th>
                            <th class="text-center">
                              Modified by
                            </th>
                            <th class="text-center">
                              Aksi
                            </th>
                          </thead>
                          <tbody>';
                            }
                          if (empty($sps)) {
                              echo '<tr><td colspan="5" class="text-center" style="font-weight: bold;">';
                              echo 'Belum ada slip pengajuan yang terdaftar';
                              echo '</td></tr>';
                            }
                          ?>
                          <?php $no=1;
                          foreach ($sps as $key => $sp) : ?>
                          <tr>
                            <td class="text-center">
                            <?php echo $no++;?>
                            </td>
                            <td class="text-left">
                            <?php echo $sp['no'].'/'.$sp['initial'].'/'.$sp['romawi'].'/'.$sp['year'];?>
                            </td>
                            <td>
                            <?php echo date('d/m/Y', strtotime($sp['date_submission']));?>
                            </td>
                            <td class="text-left" style="width:5px">
                            Rp.
                            </td>
                            <td class="text-right" >
                            <?php echo number_format($sp['nominals'], 0,',','.'); ?>
                            </td>
                            <td class="text-center" style="word-wrap:break-word;width:150px">
                            <?php echo $sp['pcs'].' ('.$sp['items'].' jenis barang)'; ?>
                            </td>
                            <td class="text-center" style="">
                            <?php echo $sp['description'];?>
                            </td>
                            <td class="text-center" style="">
                            <?php echo $sp['created_by_nm']; ?>
                            </td>
                            <td class="text-center">
                              <a href="<?php echo site_url('needs/view_sp/'.$sp['sp_id']);?>" title="Lihat detail" style="color:#22bab0;">
                                <i class="material-icons">visibility</i>
                                <div class="ripple-container"></div>
                              </a>&nbsp &nbsp
                              <a href="<?php echo site_url('needs/print_sp/'.$sp['sp_id']);?>" title="Print" target="_BLANK">
                                <i class="material-icons">print</i>
                                <div class="ripple-container"></div>
                              </a>&nbsp &nbsp
                              <span class="nav-item dropdown">
                              <a class="dropdown" title="Aksi Lain" href="add_model" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="material-icons">more_vert</i>
                              <p class="d-lg-none d-md-block">
                              More
                              </p>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                  <a class="dropdown-item" style="color:black;" href="<?php echo site_url('needs/edit_sp/'.$sp['sp_id']);?>">Edit</a>
                                  <a class="dropdown-item" style="color:black;" href="<?php echo site_url('needs/delete_sp/'.$sp['sp_id']);?>">Delete</a>
                              </div>
                              </span>
                            </td>
                          </tr>
                          <?php endforeach;?>
                        </tbody>
                      </table>
                    </div> 
                  </div>
                  </div>
                </div>
                </div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <ul class="navbar-nav pull-left">
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="<?php echo site_url('needs/view/'.$date)?>">
                        <i title="Kembali" class="material-icons">arrow_back</i> Kembali
                        <p class="d-lg-none d-md-block">
                          Kembali
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
              </div>
            </div>
