 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                  <?php echo form_open_multipart('resources/personincharges/add_person');?>
                  <!-- <div><?php echo validation_errors(); ?></div> -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama &nbsp<font color="red">*</font></label>
                          <input type="text" name="name" class="form-control">
                          <font color="red"><i><?php echo form_error('name', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Posisi &nbsp<font color="red">*</font></label>
                          <select name="position" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                          <option value="" disabled selected>Pilih Posisi</option>
                          <?php foreach ($positions as $key => $position) : ?>
                            <option value="<?php echo $position['id']?>"><?php echo $position['position']?></option>
                          <?php endforeach;?>
                          </select>
                          <font color="red"><i><?php echo form_error('position', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telepon Utama &nbsp<font color="red">*</font></label>
                          <input type="text" name="telp_primary" class="form-control">
                          <font color="red"><i><?php echo form_error('telp_primary', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telepon Alternatif</label>
                          <input type="text" name="telp_alt" class="form-control">
                        </div>
                      </div>
                    </div>  
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email &nbsp<font color="red">*</font></label>
                          <input type="text" name="email" class="form-control">
                          <font color="red"><i><?php echo form_error('email', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat <i>(tanpa penulisan Jalan)</i> &nbsp<font color="red">*</font></label>
                          <textarea name="address" cols="10" rows="5" class="form-control"></textarea>
                          <font color="red"><i><?php echo form_error('address', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br><br><br><br>
                    <!-- <button class="btn btn-primary btn-block" onclick="md.showNotification('top','center')">Simpan</button> -->
                    <div align="right">
                    <a class="btn pull-center" href="<?php echo site_url('resources/personincharges');?>" style="color:white;" id="tambahModel">
                    <i class="material-icons">cancel</i> &nbsp;Batal</a>
                    <button type="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          
        
          
     