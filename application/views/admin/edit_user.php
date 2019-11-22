 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                  <?php echo form_open_multipart('admin/update_user/'.$user['id']);?>
                  <div><?php echo validation_errors(); ?></div>
                    <div class="row">
                      <input type="hidden" name="id" value="<?php echo $user['id'];?>">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Lengkap &nbsp<font color="red">*</font></label>
                          <input type="text" name="fullname" class="form-control" value="<?php echo $user['fullname'];?>">
                        </div>
                        <font color="red"><i><?php echo form_error('fullname', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username &nbsp<font color="red">*</font></label>
                          <input type="text" name="username" class="form-control" value="<?php echo $user['username'];?>">
                        </div>
                        <font color="red"><i><?php echo form_error('username', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email &nbsp<font color="red">*</font></label>
                          <input type="text" name="email" class="form-control" value="<?php echo $user['email'];?>">
                        </div>
                        <font color="red"><i><?php echo form_error('email', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">New Password  &nbsp<font color="red">*</font></label>
                          <input type="text" name="password" class="form-control" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm New Password &nbsp<font color="red">*</font></label>
                          <input type="text" name="confirm_password" class="form-control">
                        </div>
                        <font color="red"><i><?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Posisi di Perusahaan &nbsp<font color="red">*</font></label>
                          <select name="position" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                          <option value="" disabled selected>Pilih Posisi</option>
                          <?php foreach ($positions as $key => $position) : ?>
                            <option value="<?php echo $position['id']?>" <?php echo ($position['id']==$user['position_id']?"selected" : "") ;?>><?php echo $position['position']?></option>
                          <?php endforeach;?>
                          </select>
                        </div>
                        <font color="red"><i><?php echo form_error('position', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telepon Utama &nbsp<font color="red">*</font></label>
                          <input type="text" name="telp_primary" class="form-control" value="<?php echo $user['telp_primary'];?>">
                        </div>
                        <font color="red"><i><?php echo form_error('telp_primary', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telepon Alternatif</label>
                          <input type="text" name="telp_alt" class="form-control" value="<?php echo $user['telp_alt'];?>">
                        </div>
                        <font color="red"><i><?php echo form_error('telp_alt', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fax</label>
                          <input type="text" name="fax" class="form-control" value="<?php echo $user['fax'];?>">
                        </div>
                        <font color="red"><i><?php echo form_error('fax', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat <i>(tanpa penulisan Jalan)</i> &nbsp<font color="red">*</font></label>
                          <textarea name="address" cols="10" rows="5" class="form-control" value="<?php echo $user['address'];?>">
                          <?php echo $user['address'];?></textarea>
                        </div>
                        <font color="red"><i><?php echo form_error('address', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Level Pengguna &nbsp<font color="red">*</font></label>
                          <select name="level" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                          <option value="" disabled selected>Pilih Posisi</option>
                          <?php foreach ($levels as $key => $level) : ?>
                            <option value="<?php echo $level['id']?>" <?php echo ($level['id']==$user['level_id']?"selected" : "") ;?>><?php echo $level['level']?></option>
                          <?php endforeach;?>
                          </select>
                        </div>
                        <font color="red"><i><?php echo form_error('level', '<div class="error">', '</div>'); ?></i></font>
                      </div>
                    </div>
                    <br>
                    <br>
                    <br><br>
                    <!-- <button class="btn btn-primary btn-block" onclick="md.showNotification('top','center')">Simpan</button> -->
                    <div align="right">
                    <a class="btn pull-center" href="<?php echo site_url('resources/userincharges');?>" style="color:white;" id="tambahModel">
                    <i class="material-icons">cancel</i> &nbsp;Batal</a>
                    <button type="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          
        
          
     