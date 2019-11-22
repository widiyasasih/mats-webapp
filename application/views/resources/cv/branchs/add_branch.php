 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                  <?php echo form_open_multipart('resources/cv_branchs/add_branch');?>
                  <!-- <div><?php echo validation_errors(); ?></div> -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="hidden" name="main_profile_id" value="1">
                          <label class="bmd-label-floating">Kode Cabang &nbsp<font color="red">*</font> (exp. DC-YK)</label>
                          <!-- <input type="text" name="code" value="DC-" disabled class="form-control"> -->
                          <input type="text" name="code" class="form-control">
                          <font color="red"><i><?php echo form_error('item_nm', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kota &nbsp<font color="red">*</font></label>
                          <input type="text" name="city" class="form-control">
                          <font color="red"><i><?php echo form_error('item_nm', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
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
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="font-size:11px;">Alamat &nbsp<font color="red">*</font></label>
                          <textarea name="address" cols="10" rows="3" class="form-control">
                          </textarea>
                          <font color="red"><i><?php echo form_error('unit', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <!-- <button class="btn btn-primary btn-block" onclick="md.showNotification('top','center')">Simpan</button> -->
                    <div align="right">
                    <a class="btn pull-center" href="<?php echo site_url('resources/cv_branchs');?>" style="color:white;" id="tambahModel">
                    <i class="material-icons">cancel</i> &nbsp;Batal</a>
                    <button type="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
          
        
          
     