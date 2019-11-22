 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="card-title">
                    <ul class="navbar-nav pull-left">
                      <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">update</i> &nbsp Bulan  <?php echo $date['month'].' '.$date['year'];?>
                            <div class="ripple-container"></div>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" onclick="return confirm('Anda yakin akan menghapus periode <?php echo $date['month'].' '.$date['year'];?> ?')" href="<?php echo site_url('needs/delete_card/'.$date['date_id']);?>">
                          <i title="Hapus Periode" class="material-icons">delete</i>&nbsp &nbsp &nbsp &nbsp &nbsp 
                          <p class="d-lg-none d-md-block">
                            Hapus
                          </p>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo site_url('/needs/view/'.$date['date_id']) ;?>" id="navbarDropdownProfile" aria-haspopup="true" aria-expanded="false">
                          <i title="Lihat Model" class="material-icons">style</i>&nbsp &nbsp &nbsp &nbsp
                          <p class="d-lg-none d-md-block">
                            Model
                          </p>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <?php
                  $attributes = array('name' => 'myForm');
                  echo form_open_multipart('needs/update_items', $attributes);
                  ?>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" ">
                        <th class="text-center">
                          Pilih
                        </th>
                        <th>
                          Nama Barang
                        </th>
                        <th style="text-align:center;">
                          Jumlah
                        </th>
                        <th>
                          Harga Nett per Unit
                        </th>
                        <th>
                          Nominal
                        </th>
                      </thead>
                      <?php $no = 1;?>
                      <tbody>
                      <?php foreach ($items as $item):?>
                        <tr>
                          <td class="text-center">  
                            <?php echo $no++;?>
                          </td>
                          <td class="">
                            <?php 
                            echo $item['item_name'];
                            ?>
                          </td>
                          <td style="text-align:center;">
                            <a class="nav-link text-primary" style="background-color:#f3e6fa; color:black;" title="<?php echo $item['hover_result'];?>" href="#total" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php 
                              echo $item['totals'].' pcs.';
                              ?>
                              <p class="d-lg-none d-md-block">
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-nav" aria-labelledby="navbarDropdownProfile">
                              <table>
                              <tr>
                                <td><?php echo $item['final_total'];?></td>
                              </tr>
                              </table>
                            </div>
                          </td>
                          <td class="form-group">
                            Rp.
                            <input type="hidden" disabled id="<?php echo 'price'.$item['id'];?>" value="<?php echo $item['price']; ?>">
                            <?php 
                            echo number_format($item['price'],2,',','.').'&nbsp  /  &nbsp'.$item['unit'];
                            // $fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY); 
                            // echo $fmt->formatCurrency($item['price'], "INR");
                            ?>
                          </td>
                          <td class="form-group">
                            <font color="#9C27B0"><b>
                            Rp.
                            <?php echo number_format($item['nominals'],2,',','.');?>
                            </b></font>
                          </td>
                        </tr>
                        <?php endforeach ?>
                        <tr style="background-color:#fafafa;font-weight: bold;">
                          <td></td>
                          <td>Total</td>
                          <td class="text-center">
                          <output><?php echo $sum_pcs;?></output>
                          pcs.</td>
                          <td></td>
                          <td>Rp.
                            <output><?php echo number_format($sum_nominal,2,',','.');?></output>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  </form> 
                </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4><b>Keterangan :</b></h4>
                  <table>
                  <tr>
                    <td><font color="red">*</font></td>
                    <td>&nbsp harga manual</td>
                  </tr>
                  </table>
                </div>
            </div>
          </div>
          
        
          
     