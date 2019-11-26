 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                  <?php echo form_open_multipart('resources/cv_profile/update');?>
                  <!-- <div><?php echo validation_errors(); ?></div> -->
                    <input type="hidden" name="main_profile_id" value="1">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="">
                          <label class="">Upload Logo Baru &nbsp<font color="red">*</font></label> 
                          <br>
                          <input type="file" id="logo" name="logo" size="20" value="<?php echo $profile['logo']; ?>">
						              <input type="hidden" id="logo_old" name="logo_old" size="20" value="<?php echo $profile['logo']; ?>">
                          <font color="red"><i><?php echo form_error('item_nm', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="">
                          <!-- <input type="text" name="logo" class="form-control" value="<?php echo $profile['logo'];?>"> -->
                          <div class="card-avatar">
                            <a>
                              <label class="bmd-label-floating">Logo Sekarang<br>
                              <img class="img" name="logo" src="<?php echo base_url('assets/img/logos_profile/'.$profile['logo'])?>"/><br>
                              (<i><?php if($profile['logo']==NULL) {echo "none";} else{echo $profile['logo'];} ?></i>)
                            </a>
                          </div>
                        </div><br>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <input type="hidden" name="main_profile_id" value="1">
                          <label class="bmd-label-floating">Nama Perusahaan &nbsp<font color="red">*</font> (exp. DC-YK)</label>
                          <input type="text" name="name" class="form-control" value="<?php echo $profile['name'];?>">
                          <font color="red"><i><?php echo form_error('item_nm', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="hidden" name="main_profile_id" value="1">
                          <label class="bmd-label-floating">Inisial Perusahaan &nbsp<font color="red">*</font> (exp. DC-YK)</label>
                          <input type="text" name="init" class="form-control" value="<?php echo $profile['initial'];?>">
                          <font color="red"><i><?php echo form_error('item_nm', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="hidden" name="main_profile_id" value="1">
                          <label class="bmd-label-floating">Bidang jasa &nbsp<font color="red">*</font> (exp. DC-YK)</label>
                          <input type="text" name="field" class="form-control" value="<?php echo $profile['field'];?>">
                          <font color="red"><i><?php echo form_error('item_nm', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kota kantor pusat &nbsp<font color="red">*</font></label>
                          <input type="text" name="city" class="form-control" value="<?php echo $profile['city'];?>">
                          <font color="red"><i><?php echo form_error('item_nm', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telepon Utama &nbsp<font color="red">*</font></label>
                          <input type="text" name="telp_primary" class="form-control" value="<?php echo $profile['telp_primary'];?>">
                          <font color="red"><i><?php echo form_error('telp_primary', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telepon Alternatif</label>
                          <input type="text" name="telp_alt" class="form-control" value="<?php echo $profile['telp_alt'];?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fax</label>
                          <input type="text" name="fax" class="form-control" value="<?php echo $profile['fax'];?>">
                        </div>
                      </div>
                    </div> 
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email &nbsp<font color="red">*</font></label>
                          <input type="text" name="email" class="form-control" value="<?php echo $profile['email'];?>">
                          <font color="red"><i><?php echo form_error('email', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Website &nbsp<font color="red">*</font></label>
                          <input type="text" name="website" class="form-control" value="<?php echo $profile['website'];?>">
                          <font color="red"><i><?php echo form_error('email', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="font-size:11px;">Alamat &nbsp<i>(tanpa penulisan Jalan)</i><font color="red">*</font></label>
                          <textarea name="address" class="form-control" value="<?php echo $profile['address'];?>">
                          <?php echo $profile['address'];?>
                          </textarea>
                          <font color="red"><i><?php echo form_error('unit', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="font-size:11px;">PPN &nbsp<i>(%)</i><font color="red">*</font></label>
                          <input type="text" name="tax_ppn" class="form-control" value="<?php echo $profile['tax_ppn'];?>">
                          <font color="red"><i><?php echo form_error('tax_ppn', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="font-size:11px;">Deskripsi &nbsp<i>(tanpa penulisan Jalan)</i><font color="red">*</font></label>
                          <textarea name="description" class="form-control" value="<?php echo $profile['description'];?>">
                          <?php echo $profile['description'];?>
                          </textarea>
                          <font color="red"><i><?php echo form_error('unit', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <!-- <button class="btn btn-primary btn-block" onclick="md.showNotification('top','center')">Simpan</button> -->
                    <div align="right">
                    <a class="btn pull-center" href="<?php echo site_url('resources/cv_profile');?>" style="color:white;" id="tambahModel">
                    <i class="material-icons">cancel</i> &nbsp;Batal</a>
                    <button type="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          
        
          
     