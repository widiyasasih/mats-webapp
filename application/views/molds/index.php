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
                        <div class="input-group no-border">
                          <input type="text" value="" style="border-radius:20px; border:0px; padding-left:10px;" name="search_text" id="search_text" class="" maxlength="100" size="40" placeholder="cari cetakan AB123...">
                          <label for="search_text"></label>&nbsp;
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </div>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" title="Tambah Cetakan" href="<?php echo site_url('molds/add');?>">
                            <i class="material-icons">add</i>
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
                      <li class="nav-item">
                        <a class="nav-link" title="Rak" href="add_model" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">dns</i>
                            <!-- <div class="ripple-container"></div> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" style="color:black;" href="<?php echo site_url('racks');?>">Lihat Rak</a>
                            <a class="dropdown-item" style="color:black;" href="<?php echo site_url('racks/add');?>">Tambah Rak</a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="card-body text-left">
                  <div class="row">
                    <!-- <p class="card-category result-molds">
                    <span class="text-primary"><i class="fa fa-long-arrow-right"></i></span><small> hasil pencarian cetakan</small> -->
                    <div id="result"></div>
                    <!-- </p> -->
                    <!-- <div style="clear:both"></div> -->
                    <div class="table-responsive">
                      <table id="result" class="table">
                          <?php
                          if (!empty($molds)) {
                            echo'
                            <thead class=" text-primary">
                            <th class="text-center">
                              No.
                            </th>
                            <th>
                              Kode Cetakan
                            </th>
                            <th class="text-center">
                              Rak
                            </th>
                            <th class="text-center">
                              Model
                            </th>
                            <th class="text-center">
                              Kondisi
                            </th>
                            <th class="text-center">
                              Gambar
                            </th>
                            <th class="text-center">
                              Aksi
                            </th>
                          </thead>
                          <tbody>';
                            }
                          if (empty($molds)) {
                              echo '<tr><td colspan="5" class="text-center" style="font-weight: bold;">';
                              echo 'Belum ada cetakan yang terdaftar';
                              echo '</td></tr>';
                            }
                          ?>
                          <?php $no=1;
                          foreach ($molds as $key => $mold) : ?>
                          <tr>
                            <td class="text-center">
                            <?php echo $no++;?>
                            </td>
                            <td>
                            <?php echo $mold['code'];?>
                            </td>
                            <td class="text-center">
                            <?php echo $mold['rack'];?>
                            </td>
                            <td class="text-center" style="word-wrap:break-word;width:150px">
                            <?php echo $mold['models']; ?>
                            </td>
                            <td class="text-center" style="word-wrap:break-word;width:150px">
                            <?php echo $mold['condition']; ?>
                            </td>
                            <td class="text-center">
                            <?php 
                            if (empty($mold['image'])) {
                                echo '-';
                            }else {?>
                                <img src="<?php echo base_url('assets/img/molds/'.$mold['image']);?>" alt="<?php echo 'Cetakan'.$mold['code'];?>" width="200" height="200">
                            <?php } ?>
                            </td>
                            <td class="text-center">
                              <a href="<?php echo site_url('molds/view/'.$mold['id']);?>" title="Lihat detail" style="color:#22bab0;">
                                <i class="material-icons">visibility</i>
                                <div class="ripple-container"></div>
                              </a>&nbsp &nbsp
                              <a href="<?php echo site_url('molds/edit/'.$mold['id']);?>" title="Edit">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>&nbsp &nbsp
                              <a href="<?php echo site_url('molds/delete/'.$mold['id']);?>" onclick="return confirm('Anda akan menghapus <?php echo 'cetakan '.$mold['code'];?> ?');" title="Hapus" style="color:#e8021d;">
                                <i class="material-icons">delete</i>
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
                </div>
                </div>
            </div>
