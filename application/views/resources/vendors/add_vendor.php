 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                  <?php echo form_open_multipart('resources/vendors/add_vendor');?>
                  <!-- <div><?php echo validation_errors(); ?></div> -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Vendor &nbsp<font color="red">*</font></label>
                          <input type="text" name="vendor" class="form-control">
                          <font color="red"><i><?php echo form_error('vendor', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Attention (Attn.) &nbsp<font color="red">*</font></label>
                          <input type="text" name="attn" class="form-control">
                          <font color="red"><i><?php echo form_error('attn', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telepon Utama &nbsp<font color="red">*</font></label>
                          <input type="text" name="telp_primary" class="form-control">
                          <font color="red"><i><?php echo form_error('telp_primary', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telepon Alternatif</label>
                          <input type="text" name="telp_alt" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fax</label>
                          <input type="text" name="fax" class="form-control">
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
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
                    <a class="btn pull-center" href="<?php echo site_url('resources/vendors');?>" style="color:white;" id="tambahModel">
                    <i class="material-icons">cancel</i> &nbsp;Batal</a>
                    <button type="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          
        
          
     