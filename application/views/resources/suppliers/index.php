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
                                <i class="material-icons">label_important</i> &nbsp Supplier
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav pull-right nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo site_url('resources/suppliers/add_supplier');?>">
                                <i class="material-icons">add</i> Tambah
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                    <!-- </div> -->
                    </div>
                    <!-- <p class="card-category">List kebutuhan supplier di bulan ini :</p> -->
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
                          Attn
                        </th>
                        <th>
                          Bidang Jasa
                        </th>
                        <th>
                          Telepon
                        </th>
                        <th>
                          Fax
                        </th>
                        <th>
                          Alamat
                        </th>
                        <th>
                          Aksi
                        </th>
                      </thead>
                      <?php $no = 1;
                      foreach ($suppliers as $supplier) : ?>  
                      <tbody>
                        <tr>
                          <input type="hidden" name="id" value="<?php echo $supplier['id'];?>">
                          <td>
                            <?php 
                            echo $no;
                            $no++;
                            ?>
                          </td>
                          <td>
                            <?php echo $supplier['supplier'];?>
                          </td>
                          <td>
                            <?php echo $supplier['attn'];?>
                          </td>
                          <td>
                            <?php echo $supplier['field'];?>
                          </td>
                          <td>
                            <?php
                              if ($supplier['telp_alt'] === ''){
                                echo $supplier['telp_primary'];
                              }else {
                                echo $supplier['telp_primary'].'/'.$supplier['telp_alt'];
                              }
                            ?>
                          </td>
                          <td>
                            <?php
                              if ($supplier['fax'] === ''){
                                echo '-';
                              }else {
                                echo $supplier['fax'];
                              }
                            ?>
                          </td>
                          <td style="word-wrap:break-word; width:200px">
                            <?php echo 'Jl.'.$supplier['address'];?>
                          </td>
                          <td>
                            <a href="<?php echo site_url('resources/suppliers/edit/'.$supplier['id']);?>" title="Edit">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                            </a> &nbsp
                            <a onclick="return confirm('Anda yakin akan menghapus supplier <?php echo $supplier['supplier'];?> ?')" href="<?php echo site_url('resources/suppliers/delete/'.$supplier['id']);?>" title="Delete" style="color:#e8021d;">
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
        
          
     