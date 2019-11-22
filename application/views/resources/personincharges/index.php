 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose">
                    <div class="card-title">
                    <!-- <div class="pull-right"> -->
                    <ul class="navbar-nav pull-left">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">label_important</i> &nbsp Organisasi Perusahaan
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav pull-right nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo site_url('resources/personincharges/add_person');?>">
                                <i class="material-icons">add</i> Tambah
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link">
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item">
                        <a class="nav-link" title="Rak" href="add_model" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person_outline</i>
                            <!-- <div class="ripple-container"></div> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" style="color:black;" href="<?php echo site_url('resources/view_position');?>">Lihat Level Pengguna</a>
                            <a class="dropdown-item" style="color:black;" href="<?php echo site_url('resources/add_position');?>">Tambah Level Pengguna</a>
                        </div>
                      </li>
                    </ul>
                    <!-- </div> -->
                    </div>
                    <!-- <p class="card-category">List kebutuhan person di bulan ini :</p> -->
                    </div>
                <div class="card-body">
                  <div class="card-body text-center">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          No
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>
                          Posisi
                        </th>
                        <th>
                          Telepon
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Alamat
                        </th>
                        <th>
                          Aksi
                        </th>
                      </thead>
                      <?php $no = 1;
                      foreach ($persons as $person) : ?>  
                      <tbody>
                        <tr>
                          <input type="hidden" name="id" value="<?php echo $person['id'];?>">
                          <td>
                            <?php 
                            echo $no;
                            $no++;
                            ?>
                          </td>
                          <td>
                            <?php echo $person['name'];?>
                          </td>
                          <td>
                            <?php echo $person['position'];?>
                          </td>
                          <td>
                            <?php
                              if ($person['telp_alt'] === ''){
                                echo $person['telp_primary'];
                              }else {
                                echo $person['telp_primary'].'/'.$person['telp_alt'];
                              }
                            ?>
                          </td>
                          <td>
                            <?php echo $person['email'];?>
                          </td>
                          <td style="word-wrap:break-word; width:200px"> 
                            <?php echo 'Jl.'.$person['address'];?>
                          </td>
                          <td>
                            <a href="<?php echo site_url('resources/personincharges/edit/'.$person['id']);?>" title="Edit">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                            </a> &nbsp
                            <a onclick="return confirm('Anda yakin akan menghapus <?php echo $person['name'];?> dari list organisai ?')" href="<?php echo site_url('resources/personincharges/delete/'.$person['id']);?>" title="Delete" style="color:#e8021d;">
                                <i class="material-icons">delete</i>
                                <div class="ripple-container"></div>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                      <?php endforeach; ?>
                    </table>
                  </div>
                </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <ul class="navbar-nav pull-left">
                <li class="nav-item dropdown">
                  <a class="nav-link" href="<?php echo site_url('resources')?>">
                    <i title="Kembali" class="material-icons">arrow_back</i> Kembali
                    <p class="d-lg-none d-md-block">
                      Kembali
                    </p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        
          
     