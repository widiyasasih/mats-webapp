 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <div class="card-title">
                    <ul class="navbar-nav pull-left">
                      <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person_pin</i> &nbsp NO. PO : <?php echo $po['nopo']?>
                            <div class="ripple-container"></div>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" onclick="return confirm('Anda yakin akan menghapus Purchase Order ?')" href="<?php echo site_url('needs/delete_po/'.$po['dateneed_id'].'/'.$po['po_id']);?>">
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
                        <a class="nav-link" href="<?php echo site_url('needs/edit_po/'.$po['dateneed_id'].'/'.$po['po_id']);?>">
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
                        <a class="nav-link" href="<?php echo site_url('needs/print_po/'.$po['po_id']);?>" target="_BLANK">
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
                          <span><?php echo 'Diperbaharui pada '.date('d-m-Y (H:i:s)', strtotime($max_mod_at['modified_at']));?></span>
                        </a>
                      </li>
                    </ul>
                    
                  </div>
                </div>
                <div class="card-body">
                  <div class="card-body text-left">
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="tim-typo head">
                            <p>
                            <table class="col-md-12">
                                <tr class="text-center">
                                  <td class="text-center"><img class="img" name="logo" src="<?php echo base_url('assets/img/logos_profile/'.$po['logo'])?>"/></td>
                                  <td class="text-left">
                                    <output class="tim-note" style="font-size:25px;padding-bottom:5px;font-weight: bold;"><?php echo $po['name']?></output><br>
                                    <output class="tim-note" style="padding-bottom:5px; font-weight: bold;"><?php echo $po['field']?></output><br>
                                    <output class="tim-note" style="padding-bottom:5px"><?php echo $po['add_cv']?></output><br>
                                    <output class="tim-note" style="padding-bottom:5px">Telp/fax : 
                                      <?php
                                        if ($po['telp_alt'] === '' && $po['fax'] === ''){
                                            echo $po['telp_primary'];
                                        }elseif($po['telp_alt'] === '') {
                                            echo $po['telp_primary'].'/'.$po['fax'];
                                        }else {
                                            echo $po['telp_primary'].'-'.$po['telp_alt'].'/'.$po['fax'];
                                        }
                                        ?>  
                                    </output><br>
                                    <output class="tim-note" style="padding-bottom:10px"><?php echo $po['website']?></output>
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2" class="text-center"><hr><hr class="hrthin"></td>
                                </tr>
                            </table>
                            </p>
                        </div>
                        <div class="tim-typo body">
                            <p>
                            <table class="col-md-12">
                                <tr class="text-center">
                                  <td colspan="7" class="text-center">
                                    <output class="tim-note" style="font-weight: bold;">Purchase Order</output>
                                  </td>
                                </tr>
                                <tr class="text-center">
                                  <td colspan="2" class="text-center">
                                    <output class="tim-note"><br></output>
                                  </td>
                                </tr>
                                <tr  style="font-size: 14px;">
                                  <td class="text-left">No. PO</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left"><?php echo $po['nopo']?></td>
                                  <td class="text-left" style="padding-left:200px"></td>
                                  <td class="text-left" >Supplier</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left"><?php echo $po['supplier']?></td>
                                </tr>
                                <tr  style="font-size: 14px;">
                                  <td class="text-left">From</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left"><?php echo $po['name']?></td>
                                  <td class="text-left" style="padding-left:200px"></td>
                                  <td class="text-left" >Attention</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left"><?php echo $po['attn_s']?></td>
                                </tr>
                                <tr  style="font-size: 14px;">
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left" style="padding-left:200px"></td>
                                  <td class="text-left" >Telpon</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left">
                                    <?php
                                        if ($po['ta_s'] === ''){
                                            echo $po['tp_s'];
                                        }else {
                                            echo $po['tp_s'].'/'.$po['ta_s'];
                                        }
                                    ?>
                                  </td>
                                </tr>
                                <tr  style="font-size: 14px;">
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left" style="padding-left:200px"></td>
                                  <td class="text-left" >Fax</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left">
                                    <?php
                                        if ($po['f_s'] === ''){
                                            echo '-';
                                        }else {
                                            echo $po['f_s'];
                                        }
                                    ?>
                                  </td>
                                </tr>
                                <tr  style="font-size: 14px;">
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left" style="padding-left:200px"></td>
                                  <td class="text-left" >Maximal Delivery</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left">
                                    <?php echo date('d/m/Y', strtotime($po['delivery']));?>
                                  </td>
                                </tr>
                            </table>
                        </div><br>
                        <div class="tim-typo item_list">
                            <div class="table-responsive">
                            <table class="table" style="border: 1px solid black;">
                                <thead style="color:black;" class="printbg text-center" >
                                    <th style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;width:50px;">
                                    <h6>No</h6>
                                    </th>
                                    <th style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;word-wrap:break-word;width:250px;">
                                    <h6>Deskripsi</h6>
                                    </th>
                                    <th style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;">
                                    <h6>Delivery</h6>
                                    </th>
                                    <th  style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;">
                                    <h6>Qty</h6>
                                    </th>
                                    <th  style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;">
                                    <h6>Unit</h6>
                                    </th>
                                    <th colspan="2" style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;">
                                    <h6>Harga @</h6>
                                    </th>
                                    <th colspan="2" style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;">
                                    <h6>Nominal</h6>
                                    </th>
                                </thead>
                                <tbody class=" text-center">
                                <?php $no = 1;
                                foreach ($items_po as $item) : ?>  
                                    <tr>
                                        <td style="border: 1px solid black;">
                                            <?php 
                                            echo $no;
                                            $no++;
                                            ?>
                                        </td>
                                        <td class=" text-left" style="border: 1px solid black; word-wrap:break-word;width:300px;">
                                            <?php echo $item['item_name']?>
                                        </td>
                                        <td style="border: 1px solid black;">
                                            <?php echo date('d/m/Y', strtotime($item['deliv_item']));?>
                                        </td>
                                        <td style="border: 1px solid black;">
                                            <?php echo $item['qty']?>
                                        </td>
                                        <td style="border: 1px solid black;">
                                            <?php echo $item['unit']?>
                                        </td>
                                        <td class="text-left" style="border-right: solid 1px transparent;border-bottom: solid 1px black; color: black; ">
                                            Rp.
                                        </td>
                                        <td class=" text-right" style="border: 1px solid black;">
                                            <?php echo number_format($item['custom_price'],2,',','.');?>
                                        </td>
                                        <td class="text-left" style="border-right: solid 1px transparent; border-bottom: solid 1px black; color: black;">
                                            Rp.
                                        </td>
                                        <td class=" text-right" style="border: 1px solid black;">
                                            <?php echo number_format($item['qty']*$item['custom_price'],2,',','.');?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                    <tr>
                                        <td colspan="7" style="border: 1px solid black;">
                                            Total
                                        </td>
                                        <td class="text-left" style="border-right: solid 1px transparent; border-bottom: solid 1px black; color: black;">
                                            Rp.
                                        </td>
                                        <td class=" text-right" style="border: 1px solid black;">
                                            <?php echo number_format($sum['nominals'],2,',','.');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" style="border: 1px solid black;">
                                            PPN 10%
                                        </td>
                                        <td class="text-left" style="border-right: solid 1px transparent; border-bottom: solid 1px black; color: black;">
                                            Rp.
                                        </td>
                                        <td class=" text-right" style="border: 1px solid black;">
                                            <?php echo number_format((10/100)*$sum['nominals'],2,',','.');?>
                                        </td>
                                    </tr>
                                    <tr style="font-weight: bold;">
                                        <td colspan="7" style="-webkit-print-color-adjust: exact !important;background-color:#fafafa !important;border: 1px solid black;">
                                            Grand Total
                                        </td>
                                        <td class="text-left" style="-webkit-print-color-adjust: exact !important;background-color:#fafafa !important;border-right: solid 1px transparent; border-bottom: solid 1px black; color: black;">
                                            Rp.
                                        </td>
                                        <td class=" text-right" style="-webkit-print-color-adjust: exact !important;background-color:#fafafa !important;border: 1px solid black;">
                                           <?php echo number_format($sum['nominals']-((10/100)*$sum['nominals']),2,',','.');?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div><br><br>
                        <div class="tim-typo signature">
                            <table class="col-md-12" style="font-size: 14px;">
                                <tr class="text-center">
                                  <td class="text-center">
                                    <output class="tim-note"><?php echo $po['city_sender'].' , ';
                                    echo date('d-m-Y', strtotime($po['date_sender']));
                                    ?></output><br>
                                  </td>
                                  <td class="text-center">Vendor,</td>
                                </tr>
                                <tr>
                                  <td class="text-center"><br><br><br></td>
                                  <td class="text-center"><br><br><br></td>
                                </tr>
                                <tr style="font-weight: bold;">
                                  <td class="text-center"><?php echo $po['name']?></td>
                                  <td class="text-center" ><?php echo $po['vendor']?></td>
                                </tr>
                                <tr>
                                  <td class="text-center" style="width:50%"><br><br>
                                  <!-- <div class="" style="width:100%"> -->
                                    <table class="" style="font-size: 14px; width:100%; border: 1px solid black;">
                                      <tr>
                                        <td style="border: 1px solid black;">Menyetujui</td>
                                        <td style="border: 1px solid black;">Mengetahui</td>
                                        <td style="border: 1px solid black;">Dibuat oleh</td>
                                      </tr>
                                      <tr>
                                        <td style="border-right: 1px solid black; height: 70px;"></td>
                                        <td style="border-right: 1px solid black; height: 70px;"></td>
                                        <td style="border-right: 1px solid black; height: 70px;"></td>
                                      </tr>
                                      <tr style="font-weight:bold;">
                                        <td style="border-right: 1px solid black; word-wrap:break-word; width:80px"><?php echo $po['approved_by_nm']?></td>
                                        <td style="border-right: 1px solid black; word-wrap:break-word; width:80px"><?php echo $po['known_by_nm']?></td>
                                        <td style="border-right: 1px solid black; word-wrap:break-word; width:80px"><?php echo $po['user']?></td>
                                      </tr>
                                    </table>
                                  <!-- </div> -->
                                  </td>
                                  <td class="text-center"></td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <br>
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
                    <a class="nav-link" href="<?php echo site_url('needs/view/'.$po['dateneed_id']);?>">
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
          
        
          
     