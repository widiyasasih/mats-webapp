 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                  <?php echo form_open_multipart('needs/add_item');?>
                  <!-- <div><?php echo validation_errors(); ?></div> -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Barang &nbsp<font color="red">*</font></label>
                          <input type="text" name="item_nm" class="form-control">
                          <font color="red"><i><?php echo form_error('item_nm', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="exampleFormControlSelect1" style="font-size:11px;">Satuan &nbsp<font color="red">*</font></label>
                          <select name="unit" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                          <option value="" disabled selected>Pilih satuan</option>
                          <?php foreach ($units as $unit) : ?>
                            <option value="<?php echo $unit['id'];?>"><?php echo $unit['unit'];?></option>
                          <?php endforeach; ?>
                          </select>
                          <font color="red"><i><?php echo form_error('unit', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Harga per Satuan (Rp.) &nbsp<font color="red">*</font></label>
                          <input type="text" name="price" class="form-control">
                          <font color="red"><i><?php echo form_error('price', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div><br><br><br><br>
                    <!-- <button class="btn btn-primary btn-block" onclick="md.showNotification('top','center')">Simpan</button> -->
                    <div align="right">
                    <button type="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          
        
          
     