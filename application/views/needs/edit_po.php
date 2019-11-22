 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-success">
                <?php $attributes = array('name' => 'myForm');
                echo form_open_multipart('needs/update_po', $attributes);?>
                  <div class="card-title">
                    <ul class="navbar-nav pull-left">
                      <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="material-icons">person_pin</i> &nbsp No. PO &nbsp : &nbsp
                          <input name="no_po" type="number" value="<?php echo $po['no']?>" style="text-align:center; width: 60px;" size="6"> &nbsp / <?php echo $po['initial'].' / '.$po['romawi'].' / '.$po['year'];?>
                          <font color="red"><i><?php echo form_error('no_po', '<div class="error">', '</div>'); ?></i></font>
                          <input name="cv_id" type="hidden" value="<?php echo $po['cv_id']?>" style="text-align:center; width: 60px;" size="6">
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="#info">
                          <i title="Profile Perusahaan" class="material-icons">info</i>
                          <p class="d-lg-none d-md-block">
                            Info
                          </p>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input name="id_po" type="hidden" value="<?php echo $po['po_id']?>"/>
                        <label class="" for="exampleFormControlSelect1" style="font-size:11px;">Maksimal Tanggal Pengiriman Barang (Delivery Date) &nbsp<font color="red">*</font></label>
                        <input class="form-control" type="date" name="delivery_date" value="<?php echo $po['delivery']?>">
                        <font color="red"><i><?php echo form_error('delivery_date', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating" for="exampleFormControlSelect1" style="font-size:11px;">Supplier &nbsp<font color="red">*</font></label>
                        <select name="supplier" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                        <option value="" disabled selected>Pilih supplier</option>
                        <?php foreach ($suppliers as $supplier) : ?>
                          <option value="<?php echo $supplier['id'];?>"<?php echo ($supplier['id']==$po['supplier_id']?"selected" : "") ;?>><?php echo $supplier['supplier'];?></option>
                        <?php endforeach; ?>
                        </select>
                        <font color="red"><i><?php echo form_error('supplier', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating" for="exampleFormControlSelect1" style="font-size:11px;">Vendor &nbsp<font color="red">*</font></label>
                        <select name="vendor" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                        <option value="" disabled selected>Pilih vendor</option>
                        <?php foreach ($vendors as $vendor) : ?>
                          <option value="<?php echo $vendor['id'];?>"<?php echo ($vendor['id']==$po['vendor_id']?"selected" : "") ;?>><?php echo $vendor['vendor'];?></option>
                        <?php endforeach; ?>
                        </select>
                        <font color="red"><i><?php echo form_error('vendor', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating" for="exampleFormControlSelect1" style="font-size:11px;">Deskripsi &nbsp<font color="red">*</font></label>
                        <textarea name="description" rows="5" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1"><?php echo $po['descript'];?></textarea>
                        <font color="red"><i><?php echo form_error('description', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-plain">
                </div>
                <div class="card-body">
                  <!-- <h4>Identitas Pengirim</h4> -->
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="" style="font-size:15px; font-weight: bold;">Data Perusahaan <?php echo $po['name']?>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating" for="exampleFormControlSelect1" style="font-size:11px;">Cabang Kota Perusahaan &nbsp<font color="red">*</font></label>
                        <select name="city" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                        <option value="" disabled selected>Pilih kota pengirim</option>
                        <?php foreach ($branchs as $branch) : ?>
                          <option value="<?php echo $branch['id'];?>"<?php echo ($branch['id']==$po['city_sender_id']?"selected" : "") ;?>><?php echo $branch['city'];?></option>
                        <?php endforeach; ?>
                        </select>
                        <font color="red"><i><?php echo form_error('city', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div><br><br><br><br>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="" for="exampleFormControlSelect1" style="font-size:11px;">Tanggal Pembuatan Purchase Order &nbsp<font color="red">*</font></label>
                        <input class="form-control" value="<?php echo $po['date_sender'];?>" type="date" name="sender_date">
                        <font color="red"><i><?php echo form_error('sender_date', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating" for="exampleFormControlSelect1" style="font-size:11px;">Diketahui Oleh &nbsp<font color="red">*</font></label>
                        <select name="known_by" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                        <option value="" disabled selected>Pilih penanggungjawab</option>
                        <?php foreach ($persons as $person) : ?>
                          <option value="<?php echo $person['id'];?>" <?php echo ($person['id']==$po['known_by']?"selected" : "") ;?>><?php echo $person['name'];?></option>
                        <?php endforeach; ?>
                        </select>
                        <font color="red"><i><?php echo form_error('known_by', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating" for="exampleFormControlSelect1" style="font-size:11px;">Disetujui Oleh  &nbsp<font color="red">*</font></label>
                        <select name="approved_by" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                        <option value="" disabled selected>Pilih penanggungjawab</option>
                        <?php foreach ($persons as $person) : ?>
                          <option value="<?php echo $person['id'];?>" <?php echo ($person['id']==$po['approved_by']?"selected" : "") ;?>><?php echo $person['name'];?></option>
                        <?php endforeach; ?>
                        </select>
                        <font color="red"><i><?php echo form_error('approved_by', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <!-- <div class="card-header card-header-plain">
                </div> -->
                <div class="card-body">
                  <!-- <h4>Identitas Pengirim</h4> -->
                  <div class="table-responsive">
                    <table class="table">
                    <input type="hidden" name="sp_id" value="<?php echo $sp_id;?>">
                      <thead class=" ">
                        <th class="text-center">
                          Pilih
                        </th>
                        <th>
                          Nama Barang
                        </th>
                        <th class="text-center">
                          Delivery
                        </th>
                        <th class="text-center">
                          Total
                        </th>
                        <th class="text-center">
                          Qty (<font color="red">***</font>)
                        </th>
                        <th class="text-center">
                          Harga Manual (<font color="red">*</font>)
                        </th>
                        <th>
                          Nominal
                        </th>
                      </thead>
                      <?php $i=0; $j=0; $a=0; $b=0; $c=0; $x=0; $y=0; $z=0; $sum=0; $sumout=0; $sumin=0; $rest=0; $p=0; $q=0; $r=0; $s=0;?>
                      <tbody>
                      <?php foreach ($items as $key => $item):?>
                        <tr>
                          <td class="text-center">  
                            <div class="checkbox_item">
                              <label>
                                <input type="checkbox" name="check_item[]" value="<?php echo $i++; ?>" <?php if ($item['ip_id'] !== NULL) {
                                  echo 'checked';
                                }?>>
                              </label>
                                <input type="hidden" name="uncheck[]" value="<?php echo $j++; ?>">
                                <input type="hidden" name="po_item_id[]" value="<?php echo $item['ip_id']; ?>">
                                <input type="hidden" name="po_id" value="<?php echo $po['po_id']; ?>">
                                <input type="hidden" name="item[<?php echo $key; ?>]" value="<?php echo $item['item_id']; ?>">
                                <input type="hidden" name="date" value="<?php echo $po['dateneed_id']; ?>">
                            </div>
                          </td>
                          <td class="">
                            <?php 
                            echo $item['item_name'];
                            ?>
                          </td>
                          <td class="form-group text-center">
                            <!-- <input readonly type="text" value="0" class="form-control" name="nominal" id="<?php echo 'nominal'.$item['id'];?>" onchange="tryNumberFormat(this.form.thirdBox)" readonly> -->
                            <input type="date" style="width: 150px;" name="delivery_item[<?php echo $key;?>]" value="<?php echo $item['deliv_item']?>">
                          </td>
                          <td style="text-align:center;">
                            <a class="nav-link text-primary" style="background-color:#f3e6fa; color:black;" title="<?php echo $item['hover_result'];?>" href="#total" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php 
                              echo $item['totals'].' pcs.';
                              ?>
                              <output id="<?php echo 'rest_ammount'.$s++; ?>"></output>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-nav" aria-labelledby="navbarDropdownProfile">
                              <table>
                              <tr>
                                <td><?php echo $item['final_total'];?></td>
                              </tr>
                              </table>
                            </div>
                          </td>
                          <td class="form-group text-center">
                            <!-- <input readonly type="text" value="0" class="form-control" name="nominal" id="<?php echo 'nominal'.$item['id'];?>" onchange="tryNumberFormat(this.form.thirdBox)" readonly> -->
                            <input class="<?php echo 'qty'.$y++; ?> text-center" type="number" style="width: 100px;" name="qty[<?php echo $key;?>]" value="<?php echo $item['qty'];?>"> pcs.
                          </td>
                          <div class="form-group">
                            <input class="<?php echo 'prc'.$x++; ?> text-center" type="hidden" value="<?php echo $item['totals'];?>" style="width: 100px;">
                          </div>
                          <td class="form-group text-center">
                            Rp. <input class="<?php echo 'man'.$z++; ?> text-center" type="number" style="width: 100px;" name="manualprice[<?php echo $key;?>]" value="<?php echo $item['cp'];?>">
                          </td>
                          <td class="form-group">
                            <font color="#9C27B0"><b>
                            Rp.
                            <output id="<?php echo 'nominal'.$sumout++; ?>">
                                <?php echo $item['qty']*$item['cp'];?>
                            </output>
                            </b></font>
                          </td>
                        </tr>
                        <script>
                        // var item = document.querySelectorAll('.item').length;
                        // var item = 6;
                        // for(var x = 1; x <= item ; x++){
                            $('.form-group').on('input','<?php echo '.prc'.$p++?>, <?php echo '.qty'.$q++?>, <?php echo '.man'.$r++?>', function(){
                            var price = 0;
                            var qty = 0;
                            var manual = 0;
                            $('.form-group <?php echo '.prc'.$a++?>').each(function(){
                              var a = $(this).val();
                              if($.isNumeric(a)){
                                price += parseFloat(a);
                              }
                            });
                            $('.form-group <?php echo '.qty'.$b++?>').each(function(){
                              var b = $(this).val();
                              if($.isNumeric(b)){
                                qty += parseFloat(b);
                              }
                            });
                            $('.form-group <?php echo '.man'.$c++?>').each(function(){
                              var c = $(this).val();
                              if($.isNumeric(c)){
                                manual += parseFloat(c);
                              }
                            });
                            var a = "(";
                            var b = "sisa ";
                            var c = ")";
                            if (qty>0) {
                              var sisa = price-qty;
                              var rest = a.concat(b, sisa, c);
                            }
                            if (manual>0) {
                              var sum = manual*qty;
                            }
                            $('<?php echo '#rest_ammount'.$rest++?>').text(rest);
                            $('<?php echo '#nominal'.$sum++?>').text(sum);
                          });
                        // }
                        </script>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div><br><br>
                  <div align="center">
                    <a class="btn pull-center" onclick="history.go(-1);" style="color:white;" id="">
                    <i class="material-icons">cancel</i> &nbsp;Batal</a>
                    <button type="submit" name="submit" class="btn btn-danger">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                  </div>
                  </form> 
                </div>
              </div>
            </div>
          </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4><b>Keterangan :</b></h4>
                  <table>
                  <tr>
                    <td><font color="red">*</font></td>
                    <td>&nbsp harus diisi</td>
                  </tr>
                  <tr>
                    <td><font color="red">**</font></td>
                    <td>&nbsp harga manual</td>
                  </tr>
                  <tr>
                    <td><font color="red">***</font></td>
                    <td>&nbsp jumlah yang dibutuhkan</td>
                  </tr>
                  </table>
                </div>
            </div>
            <br>
          
        
          
     