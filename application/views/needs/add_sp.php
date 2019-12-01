 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                    <ul class="navbar-nav pull-left">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h4 class="card-title"><i class="material-icons">label_important</i> &nbsp No.PO : <?php echo $po['nopo']?></h4>
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                    <!-- <ul class="navbar-nav pull-right nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link text-success">
                                Rp. &nbsp
                                <span name="count_nominal">0</span> &nbsp(
                                <span name="count_items">0</span>&nbsp<span style="text-transform:lowercase">items)</span> 
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul> -->
                </div>
                <div class="card-body">
                  <?php
                  $attributes = array('name' => 'myForm');
                  echo form_open_multipart('needs/add_sp', $attributes);
                  ?>
                  <br>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="" for="exampleFormControlSelect1" style="font-size:11px;">Tanggal Pengajuan Slip &nbsp;<font color="red">* (hari ini)</font></label>
                          <input class="form-control" id="today_date" type="date" name="date_sub">
                          <font color="red"><i><?php echo form_error('date_sub', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="exampleFormControlSelect1" style="font-size:11px;">Deskripsi &nbsp<font color="red">*</font></label>
                          <textarea name="description" rows="5" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1"></textarea>
                          <font color="red"><i><?php echo form_error('description', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" ">
                        <th class="text-center">
                          Pilih
                        </th>
                        <th>
                          Nama Barang
                        </th>
                        <th class="text-center">
                          Qty
                        </th>
                        <th colspan="2" class="text-center">
                          Harga
                        </th>
                        <th class="text-center" colspan="2">
                          Nominal
                        </th>
                      </thead>
                      <?php 
                      //list unique variables
                        // live counting 
                        $i=0;
                        // manual input qty
                      ?>
                      <tbody>
                      <?php foreach ($items as $key => $item):?>
                        <tr>
                          <td class="text-center">  
                            <div class="checkbox_item">
                              <label>
                                <input  type="checkbox" name="check_item[<?php echo $key; ?>]" value="<?php echo $i++; ?>">
                              </label>
                                <input type="hidden" name="item[<?php echo $key; ?>]" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="po_id" value="<?php echo $item['po_id']; ?>">
                                <input type="hidden" name="sp_id" value="<?php echo $id_sp['id']+1; ?>">
                            </div>
                          </td>
                          <td class="">
                            <?php 
                            echo $item['item_name'];
                            ?>
                          </td>
                          <td class="form-group text-center">
                            <label for=""></label>
                            <span style="text-align:center;"><?php echo $item['qty']; ?></span>
                            <input class="<?php echo 'qty'.$key; ?>" type="hidden" style="text-align:center;width: 100px;" name="qty[<?php echo $key; ?>]" value="<?php echo $item['qty']; ?>">
                            <label for=""></label>
                            <span style="display:none;" id="manualqty<?php echo $key;?>">
                              <label for=""></label>
                              <input class="<?php echo 'man'.$key; ?>" type="number" style="text-align:center;width: 100px;" name="man[<?php echo $key; ?>]" id="input_qty<?php echo $key;?>">
                            </span>
                            <label for=""></label>
                            <a title="Tutup Manual Input" id="close_input_qty<?php echo $key;?>" style="display: none; cursor: pointer; color:#E94743;" onclick="clo_manual_qty<?php echo $key;?>(this);">
                              <!-- <a class="nav-link" href=""> -->
                                <i class="material-icons">close</i>
                                <div class="ripple-container"></div>
                              <!-- </a> -->
                            </a>
                            pcs.
                            <a id="open_input_qty<?php echo $key;?>" title="Input Jumlah Manual" style="cursor: pointer;color:#9C27B0" onclick="manual_qty<?php echo $key;?>(this);">
                              <!-- <a class="nav-link" href=""> -->
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              <!-- </a> -->
                            </a>
                          </td>
                          <td class="form-group text-right">
                            Rp.
                            <input class="<?php echo 'prc'.$key; ?>" value="<?php echo $item['custom_price']; ?>" style="text-align:center; width: 100px;" maxlength="50" size="6" type="hidden" name="prc[<?php echo $key; ?>]">
                            <span style="text-align:center;"><?php echo $item['custom_price']; ?></span>
                          </td>
                          <td class="text-left">
                            <?php echo ' / '.$item['unit'];?>
                          </td>
                          <td class="form-group text-right">
                            <font color="#9C27B0"><b>
                            Rp.
                            </b></font>
                          </td>
                          <td class="form-group text-right">
                            <font color="#9C27B0"><b>
                            <output style="padding-left:20px" id="<?php echo 'nominal'.$key; ?>">
                              <?php
                                $nominal = $item['qty']*$item['custom_price'];
                                // echo $nominal;
                                echo number_format($nominal,2,',','.');
                              ?>
                            </output>
                            </b></font>
                          </td>
                        </tr>
                        <script>
                        function manual_qty<?php echo $key;?>(that) {
                          document.getElementById("manualqty<?php echo $key;?>").style.display = "inline";
                          document.getElementById("close_input_qty<?php echo $key;?>").style.display = "inline";
                          document.getElementById("open_input_qty<?php echo $key;?>").style.display = "none";
                          document.getElementById("input_qty<?php echo $key;?>").focus();
                        }

                        function clo_manual_qty<?php echo $key;?>(that) {
                          document.getElementById("manualqty<?php echo $key;?>").style.display = "none";
                          document.getElementById("input_qty<?php echo $key;?>").value = "";
                          document.getElementById("close_input_qty<?php echo $key;?>").style.display = "none";
                          document.getElementById("open_input_qty<?php echo $key;?>").style.display = "inline";
                          // var nominal = 0;
                          var custom_price = <?php echo $item['custom_price'];?>;
                          var qty = <?php echo $item['qty'];?>;
                          var nominal = qty*custom_price;
                          // var nominal = 1;
                          document.getElementById("nominal<?php echo $key;?>").innerHTML  = nominal;

                        }
                        </script>
                        <script>
                        // var item = document.querySelectorAll('.item').length;
                        // var item = 6;
                        // for(var x = 1; x <= item ; x++){
                            $('.form-group').on('input','<?php echo '.prc'.$key;?>, <?php echo '.qty'.$key;?>, <?php echo '.man'.$key;?>', function(){
                            var price = 0;
                            var qty = 0;
                            var manual = 0;
                            $('.form-group <?php echo '.prc'.$key;?>').each(function(){
                              var a = $(this).val();
                              if($.isNumeric(a)){
                                price += parseFloat(a);
                              }
                            });
                            $('.form-group <?php echo '.qty'.$key;?>').each(function(){
                              var b = $(this).val();
                              if($.isNumeric(b)){
                                qty += parseFloat(b);
                              }
                            });
                            $('.form-group <?php echo '.man'.$key;?>').each(function(){
                              var c = $(this).val();
                              if($.isNumeric(c)){
                                manual += parseFloat(c);
                              }
                            });
                            if (manual>0) {
                              var sum = price*manual;
                            }else{
                              var sum = price*qty;
                            }
                            $('<?php echo '#nominal'.$key;?>').text(sum);
                          });
                        // }
                        
                        </script>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                  <br><br>
                  <div align="center">
                  <a class="btn pull-center" href="<?php echo site_url('/needs/list_sp/'.$po['po_id']);?>">
                  <i class="material-icons">cancel</i>&nbsp; Batal</a>
                  <a class="btn pull-center" href="<?php echo site_url('/needs/edit_po/'.$po['dateneed_id'].'/'.$po['po_id']);?>" style="color:white; background-color:#12B8CD;">
                  <i class="material-icons">edit</i>&nbsp; Edit PO</a>
                  <button type="submit" name="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                  <i class="material-icons">save</i>  Simpan</button>
                  </div>
                  </form> 
                </div>
              </div>
            </div>
          </div>
          
        
          
     