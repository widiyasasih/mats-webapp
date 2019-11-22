 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <ul class="navbar-nav pull-left">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h4 class="card-title"><i class="material-icons">label_important</i> &nbsp <?php echo $model['model']; ?></h4>
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav pull-right nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link text-success">
                                Rp.
                                <span class="sum_nominal" name="count_nominal"><?php echo number_format($sum_view['nominals'],2,',','.'); ?></span> &nbsp(
                                <span name="count_items"><?php echo $sum_view['items']; ?></span>&nbsp<span style="text-transform:lowercase">items)</span> 
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                  <?php
                  $attributes = array('name' => 'myForm');
                  echo form_open_multipart('needs/update_items', $attributes);
                  ?>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" ">
                        <th>
                          Pilih
                        </th>
                        <th>
                          Nama Barang
                        </th>
                        <th class="">
                          Jumlah
                        </th>
                        <th>
                          Harga Nett per Unit
                        </th>
                        <th>
                          Harga Custom per Unit
                        </th>
                        <th>
                          Nominal
                        </th>
                      </thead>
                      <?php $i = 0; $j = 0; $a=0; $b=0; $c=0; $x=0; $y=0; $z=0; $sum=0; $t=0; $p=0; $m=0; $n=0;?>
                      <tbody>
                      <?php foreach ($items as $item):?>
                        <tr>
                          <td>  
                            <div class="checkbox_item">
                              <label>
                                <input type="checkbox" name="check_item[]" value="<?php echo $i++; ?>" <?php if ($item['need_id'] !== NULL) {
                                  echo 'checked';}?>>
                              </label>
                                <input type="hidden" name="uncheck[]" value="<?php echo $j++; ?>">
                                <input type="hidden" name="item[]" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="need[]" value="<?php echo $item['need_id']; ?>">
                                <input type="hidden" name="date" value="<?php echo $date['id']; ?>">
                                <input type="hidden" name="model" value="<?php echo $model['id']; ?>">
                            </div>
                          </td>
                          <td class="">
                            <?php 
                            echo $item['item_name'];
                            ?>
                          </td>
                          <td class="form-group">
                            <input class="sum <?php echo 'tot'.$x++; ?>" style="text-align:center; width: 100px;" value="<?php echo $item['total']; ?>" size="2" type="number" name="ttl[]"  id="<?php echo 'ttl'.$item['id'];?>">
                            pcs.
                          </td>
                          <td class="form-group">
                            Rp.
                            <input class="<?php echo 'prc'.$y++; ?>" type="hidden" disabled id="<?php echo 'price'.$item['id'];?>" value="<?php echo $item['price']; ?>">
                            <?php 
                            echo number_format($item['price'],2,',','.').'&nbsp  /  &nbsp'.$item['unit'];
                            // $fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY); 
                            // echo $fmt->formatCurrency($item['price'], "INR");
                            ?>
                          </td>
                          <td class="form-group">
                            <!-- <input readonly type="text" value="0" class="form-control" name="nominal" id="<?php echo 'nominal'.$item['id'];?>" onchange="tryNumberFormat(this.form.thirdBox)" readonly> -->
                            Rp.
                            <input class="sum <?php echo 'man'.$z++; ?>" type="number" style="width: 100px;" name="manualprice[]" value="<?php echo $item['custom_price']; ?>" id="<?php echo 'manualprice'.$item['id'];?>">
                          </td>
                          <td class="form-group">
                            <font color="#9C27B0"><b>
                            Rp.
                            <output id="<?php echo 'nominal'.$sum++; ?>">
                            
                              <?php
                                  if ($item['custom_price'] > 0) {
                                      $nominal = $item['total']*$item['custom_price'];
                                      // echo $nominal;
                                      echo number_format($nominal,2,',','.');
                                  }else {
                                      $nominal = $item['total']*$item['price'];
                                      // echo $nominal;
                                      echo number_format($nominal,2,',','.');
                                  }
                              ?>
                            </output>
                            </b></font>
                          </td>
                        </tr>
                        <script>
                        // var item = document.querySelectorAll('.item').length;
                        // var item = 6;
                        // for(var x = 1; x <= item ; x++){
                            $('.form-group').on('input','<?php echo '.tot'.$t++?>, <?php echo '.prc'.$p++?>, <?php echo '.man'.$m++?>', function(){
                            var total = 0;
                            var price = 0;
                            var manual = 0;
                            $('.form-group <?php echo '.tot'.$a++?>').each(function(){
                              var a = $(this).val();
                              if($.isNumeric(a)){
                                total += parseFloat(a);
                              }
                            });
                            $('.form-group <?php echo '.prc'.$b++?>').each(function(){
                              var b = $(this).val();
                              if($.isNumeric(b)){
                                price += parseFloat(b);
                              }
                            });
                            $('.form-group <?php echo '.man'.$c++?>').each(function(){
                              var c = $(this).val();
                              if($.isNumeric(c)){
                                manual += parseFloat(c);
                              }
                            });
                            if (manual>0) {
                              var sum = total*manual;
                            }else{
                              var sum = total*price;
                            }
                            $('<?php echo '#nominal'.$n++?>').text(sum);
                          });
                        // }
                        </script>   
                        <?php endforeach ?>
                        <!-- <script>
                            $('.form-group').on('keyup', function(){
                            var total = 0;
                            $('.form-group .sum').each(function(){
                                var a = $(this).val();
                                if($.isNumeric(a)){
                                total += parseFloat(a);
                                }
                            });
                            $('.sum_nominal').text(total);
                            });
                        </script> -->
                      </tbody>
                    </table>
                  </div>
                  <br><br>
                  <div align="center">
                  <a class="btn pull-center" href="<?php echo site_url('/needs/view/'.$date['id']);?>">
                  <i class="material-icons">cancel</i>&nbsp; Batal</a>
                  <a class="btn btn-primary pull-center" href="<?php echo site_url('/needs/add_item');?>" style="color:white; background-color:#12B8CD" id="tambahModel" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">add</i>Tambah Barang Baru</a>
                  <button type="submit" onclick="return confirm('Anda yakin akan menyimpan perubahan data? \n\nPENTING! \nJika tidak ada item yang terceklis maka model <?php echo $model['model']; ?> akan dihapus.')" name="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                  <i class="material-icons">save</i>  Simpan</button>
                  </div>
                  </form> 
                </div>
              </div>
            </div>
          </div>
          
        
          
     