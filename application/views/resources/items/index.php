 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                    <div class="card-title">
                    <!-- <div class="pull-right"> -->
                    <ul class="navbar-nav pull-left">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">label_important</i> &nbsp Bahan Baku
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav pull-right nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo site_url('resources/items/add_item');?>">
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
                  <div class="card-body text-center">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          No
                        </th>
                        <th>
                          Nama Item
                        </th>
                        <th>
                          Satuan
                        </th>
                        <th>
                          Harga
                        </th>
                        <th>
                          Aksi
                        </th>
                      </thead>
                      <?php $no = 1;
                      foreach ($items as $item) : ?>  
                      <tbody>
                        <tr>
                          <input type="hidden" name="id" value="<?php echo $item['id'];?>">
                          <td>
                            <?php 
                            echo $no;
                            $no++;
                            ?>
                          </td>
                          <td>
                            <?php echo $item['item_name'];?>
                          </td>
                          <td>
                            <?php echo $item['unit'];?>
                          </td>
                          <td class="">
                              Rp.
                              <?php 
                              echo number_format($item['price'],2,',','.');
                              ?>
                            </td>
                          <td>
                            <!-- <ul class="navbar-nav pull-right nav nav-tabs" data-tabs="tabs"> -->
                              <!-- <li class="nav-item"> -->
                                  <a href="<?php echo site_url('resources/items/edit/'.$item['id']);?>" title="Edit">
                                      <i class="material-icons">edit</i>
                                      <div class="ripple-container"></div>
                                  </a> &nbsp &nbsp
                                  <a onclick="return confirm('Anda yakin akan menghapus barang <?php echo $item['item_name'];?> ?')" href="<?php echo site_url('resources/items/delete/'.$item['id']);?>" title="Delete" style="color:#e8021d;">
                                      <i class="material-icons">delete</i>
                                      <div class="ripple-container"></div>
                                  </a>
                              <!-- </li> -->
                          <!-- </ul> -->
                          </td>
                        </tr>
                      </tbody>
                      <?php endforeach; ?>
                    </table>
                  </div>
                </div>
                </div>
                <div class="row">
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
        
          
     