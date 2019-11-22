 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                  <?php echo form_open_multipart('resources/items/update');?>
                  <div><?php echo validation_errors(); ?></div>
                    <div class="row">
                    <input type="hidden" name="id" value="<?php echo $item['id'];?>">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Barang &nbsp<font color="red">*</font></label>
                          <input type="text" name="item_nm" class="form-control" value="<?php echo $item['item_name'];?>">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="exampleFormControlSelect1" style="font-size:11px;">Satuan &nbsp<font color="red">*</font></label>
                          <select name="unit" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                          <?php foreach ($units as $unit) : ?>
                          <option value="<?php echo $unit['id'];?>"<?php echo ($unit['id']==$item['unit_id']?"selected" : "") ;?>><?php echo $unit['unit'];?></option>
                          <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Harga per Satuan (Rp.) &nbsp<font color="red">*</font></label>
                          <input type="text" name="price" class="form-control" value="<?php echo $item['price'];?>">
                        </div>
                      </div>
                    </div><br><br><br><br>
                    <!-- <button class="btn btn-primary btn-block" onclick="md.showNotification('top','center')">Simpan</button> -->
                    <div align="right">
                    <a class="btn pull-center" href="<?php echo site_url('resources/items');?>" style="color:white;" id="tambahModel">
                    <i class="material-icons">cancel</i> &nbsp;Batal</a>
                    <button type="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          
        
          
     