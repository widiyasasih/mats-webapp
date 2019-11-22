 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                  <div class="card-title">
                    <ul class="navbar-nav pull-left">
                      <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-hassppup="true" aria-expanded="false">
                            <i class="material-icons">confirmation_number</i> &nbsp Slip pengajuan ke 
                            <?php
                                if (empty($sp['supplier'])){
                                    echo $sp['vendor'];
                                }else {
                                    echo $sp['supplier'];
                                }
                            ?>
                            <div class="ripple-container"></div>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" onclick="return confirm('Anda yakin akan menghapus Purchase Order ?')" href="<?php echo site_url('needs/delete_sp/'.$sp['dateneed_id'].'/'.$sp['sp_id']);?>">
                          <i title="Hapus Purchase Order" class="material-icons">delete</i>
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
                        <a class="nav-link" href="<?php echo site_url('needs/edit_sp/'.$sp['dateneed_id'].'/'.$sp['sp_id']);?>">
                          <i title="Edit Purchase Order" class="material-icons">edit</i>
                          <p class="d-lg-none d-md-block">
                            Edit
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
                        <a class="nav-link" href="<?php echo site_url('needs/print_sp/'.$sp['sp_id']);?>" target="_BLANK">
                          <i title="Print Purchase Order" class="material-icons">print</i>
                          <p class="d-lg-none d-md-block">
                            Print
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
                        <a class="nav-link">
                          <span><?php echo 'Modified at '.date('d-m-Y (H:i:s)', strtotime($sp['modified_at']));?></span>
                        </a>
                      </li>
                    </ul>
                    
                  </div>
                </div>
                <div class="card-body">
                  <div class="card-body text-left">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="tim-tysp head">
                            <p>
                            <table class="col-md-12">
                                <tr class="text-left">
                                  <td class="text-right">
                                    <font color="red">* Preview output akan lebih baik menggunakan Browser Chrome</font>
                                  </td>
                                </tr>
                                <tr class="text-left">
                                  <td class="text-left"><br> 
                                    <output class="tim-note" style="font-size:15px;font-weight: bold;"><h6><?php echo $sp['name']?></h6></output>
                                  </td>
                                </tr>
                                <tr class="text-center">
                                  <td class="text-center">
                                    <output class="tim-note" style="font-size:20px; color:black;padding-bottom:10px;font-weight: bold;">SLIP PENGAJUAN</output><br>
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2" class="text-center">
                                      <hr style="border-top: 1px dashed black; width:50%; border-bottom :0px;border-width: 2px;">
                                      <hr class="hrthin" style="width:50%; border-bottom :0px;border-width: 2px;">
                                  </td>
                                </tr>
                                <tr class="text-center">
                                  <td colspan="2" style="color:black; font-weight: bold;" class="text-center">
                                      <?php echo 'Tanggal : '.date('d/m/Y', strtotime($sp['date_submission']));?>
                                  </td>
                                </tr>
                            </table>
                            </p>
                        </div>
                        <div class="tim-typo item_list">
                            <div class="" style="text-align:center">
                            <table class="" style="border: 1px solid black; table-layout:fixed">
                                <tbody class=" text-center">
                                    <tr>
                                        <td rowspan="2" style="font-weight:bold;font-size:12px; border: 1px solid black; word-wrap:break-word;width:60px;">
                                        NAMA INSTANSI
                                        </td>
                                        <td rowspan="2" style="border: 1px solid black; word-wrap:break-word;width:180px;">
                                        <?php
                                            if (empty($sp['supplier'])){
                                                echo $sp['vendor'];
                                            }else {
                                                echo $sp['supplier'];
                                            }
                                        ?>
                                        </td>
                                        <td colspan="2" style="border: 1px solid black;">
                                        In Charge
                                        </td>
                                        <td style="border: 1px solid black; width:100px">
                                        Supervisor
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;width:150px;">
                                        Manager
                                        </td>
                                        <td colspan="2" style="border: 1px solid black;width:100px;">
                                        General Mgr.
                                        </td>
                                        <td colspan="" style="border: 1px solid black;width:100px;">
                                        Director
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="border: 1px solid black;height:50px;">
                                        <br>
                                        </td>
                                        <td style="border: 1px solid black;">
                                        <br>
                                        </td>
                                        <td colspan="2" style="border: 1px solid black;width:100px;">
                                        <br>
                                        </td>
                                        <td style="border: 1px solid black; width:110px; ">
                                        <br>
                                        </td>
                                        <td colspan="2" style="border: 1px solid black;">
                                        <br>
                                        </td>
                                        <td colspan="" class=" text-left" style="border: 1px solid black; ">
                                        <br>
                                        </td>
                                    </tr>
                                    <tr class=" text-center">
                                        <td style="font-weight:bold;font-size:12px;border: 1px solid black;">
                                        NO.
                                        </td>
                                        <td colspan="4" style="font-weight:bold;font-size:12px;border: 1px solid black;">
                                        URAIAN
                                        </td>
                                        <td colspan="3" style="font-weight:bold;font-size:12px;border: 1px solid black;">
                                        JUMLAH
                                        </td>
                                        <td colspan="2" style="font-weight:bold;font-size:12px;border: 1px solid black;">
                                        PCS
                                        </td>
                                        <td style="border: 1px solid black;">
                                        General Mgr.
                                        </td>
                                    </tr>
                                    <!-- <tr class="one">
                                        <td style="border: 1px solid black;">
                                        </td>
                                        <td colspan="4" class=" text-left" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="1" style="border: 1px solid black;text-align:left;border-right: solid 1px transparent;">
                                        &nbsp;Rp.
                                        </td>
                                        <td colspan="2" style="border: 1px solid black; text-align:right; width:3100px;">
                                        1&nbsp;
                                        </td>
                                        <td colspan="2" class=" text-center" style="border: 1px solid black;">
                                        </td>
                                        <td class=" text-center" style="border: 1px solid black;">
                                        </td>
                                    </tr> -->
                                    <tr class="one">
                                      <td colspan="10" rowspan="12" >
                                        <table style="width: 100%; table-layout:fixed; border:1px solid black">
                                        <?php 
                                        // $rows = 14;
                                        $no = 1;
                                        foreach ($items as $item) : ?>
                                          <tr class="text-center" >
                                            <td style="height:20px;border-right: 1px solid black; border-bottom: 1px solid black; width:59px">
                                              <?php echo $no++;?>
                                            </td>
                                            <td style="word-wrap:break-word;border-right: 1px solid black; border-bottom: 1px solid black; width:445px; text-align:left;">
                                              &nbsp;<?php echo $item['item_name'];?>
                                            </td>
                                            <td style="width: 40px; border-bottom: 1px solid black;text-align:left;">
                                              &nbsp; Rp.
                                            </td>
                                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; width:195px; text-align:right; ">
                                              <?php 
                                              if ($item['man_qty'] > 0) {
                                                echo number_format($item['man_qty']*$item['custom_price'], 0, ',','.');
                                              }else {
                                                echo number_format($item['qty']*$item['custom_price'], 0, ',','.');                                                
                                              }
                                              ;?> &nbsp;
                                            </td>
                                            <td style="border-bottom: 1px solid black;">
                                              <?php 
                                              if ($item['man_qty'] > 0) {
                                                echo $item['man_qty'];
                                              }else {
                                                echo $item['qty'];                                                
                                              }
                                              ;?>
                                            </td>
                                          </tr>
                                        <?php endforeach;
                                          $table_rows = '
                                            <tr class="text-center" >
                                              <td style="height:20px;border-right: 1px solid black; border-bottom: 1px solid black; ">
                                            </td>
                                            <td style="word-wrap:break-word;border-right: 1px solid black; border-bottom: 1px solid black; text-align:left;">
                                            </td>
                                            <td style="width: 40px; border-bottom: 1px solid black;text-align:left;">
                                              &nbsp; Rp.
                                            </td>
                                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; text-align:right;">
                                            </td>
                                            <td style="border-bottom: 1px solid black;">
                                            </td>
                                            </tr>';
                                          if (empty($items)) {
                                          $rows = 14;
                                          for ($i=0; $i < $rows; $i++) { 
                                            echo $table_rows;
                                          }
                                        } elseif($count == 1) {
                                          $rows = 13;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 2) {
                                          $rows = 12;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 3) {
                                          $rows = 11;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 4) {
                                          $rows = 10;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 5) {
                                          $rows = 9;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 6) {
                                          $rows = 8;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 7) {
                                          $rows = 7;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 8) {
                                          $rows = 6;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 9) {
                                          $rows = 5;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 10) {
                                          $rows = 4;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 11) {
                                          $rows = 3;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 12) {
                                          $rows = 2;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 13) {
                                          $rows = 1;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        }
                                        ?>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="" style="border: 1px solid black; border-bottom: solid 1px transparent;"><br>
                                      </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="" style="height:5px; border: 1px solid black;">
                                      Manager
                                      </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black; border-bottom: solid 1px transparent;"><br>
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="" style="height:5px; border: 1px solid black;">
                                      Supervisor
                                      </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black; border-bottom: solid 1px transparent;"><br>
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="" style="height:5px; border: 1px solid black;">
                                      Cashier
                                      </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black; border-bottom: solid 1px transparent;"><br>
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black;border-bottom: solid 1px transparent;">
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <td colspan="5" style="border: 1px solid black;font-weight:bold;">
                                        TOTAL
                                        </td>
                                        <td colspan="" class=" text-left" style="border: 1px solid black;border-right: solid 1px transparent; font-weight:bold;">
                                        &nbsp;&nbsp;Rp.
                                        </td>
                                        <td colspan="2" style="border: 1px solid black;font-weight:bold; text-align:right;">
                                        <?php echo number_format($sum['nominals'], 0, ',','.');?>&nbsp;&nbsp;
                                        </td>
                                        <td colspan="2" class=" text-center" style="border: 1px solid black;font-weight:bold;">
                                        <?php echo $sum['pcs'];?>
                                        </td>
                                        <td colspan="2" class=" text-center" style="border: 1px solid black;font-weight:bold;">
                                        
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="2" class=" text-left" style="border: 1px solid black;">
                                        &nbsp;Kode Pembayaran :
                                        </td>
                                        <td rowspan="5" class=" text-center" style="font-weight:bold; border: 1px solid black; word-break: break-all;width:15px;">
                                        Paymen t
                                        </td>
                                        <td colspan="" class=" text-center" style="border: 1px solid black; width:150px">
                                        Cash
                                        </td>
                                        <td colspan="7" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td rowspan="1" class="text-left" colspan="2" style="border-bottom: 1px solid transparent;">
                                        &nbsp;Diterima oleh :
                                        </td>
                                        <td style="border: 1px solid black;">
                                        </td>
                                        <td colspan="1" style="border: 1px solid black;">
                                        Cheque
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        Giro
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        Credit
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td colspan="2" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="1" style="border: 1px solid black;">
                                        Nama Bank
                                        </td>
                                        <td colspan="1" class=" text-left" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class=" text-left" colspan="2" style="border-bottom: 1px solid transparent;">
                                        &nbsp;Tanda Tangan :
                                        </td>
                                        <td  style="border: 1px solid black; height:40px">
                                        </td>
                                        <td colspan="1" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class=" text-center">
                                        <td colspan="2" style="border: 1px solid black;">
                                        
                                        </td>
                                        <td colspan="1" style="border: 1px solid black;">
                                        Date
                                        </td>
                                        <td colspan="1"  style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div><br>
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
                    <a class="nav-link" href="<?php echo site_url('needs/list_sp/'.$sp['po_id']);?>">
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
          
        
          
     