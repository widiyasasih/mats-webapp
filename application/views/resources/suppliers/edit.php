 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                  <?php echo form_open_multipart('resources/suppliers/update');?>
                  <div><?php echo validation_errors(); ?></div>
                  <div class="row">
                      <input type="hidden" name="id" value="<?php echo $supplier['id'];?>">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Supplier &nbsp<font color="red">*</font></label>
                          <input type="text" name="supplier" class="form-control" value="<?php echo $supplier['supplier'];?>">
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Attention (Attn.) &nbsp<font color="red">*</font></label>
                          <input type="text" name="attn" class="form-control" value="<?php echo $supplier['attn'];?>">
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bidang Jasa &nbsp<font color="red">*</font></label>
                          <input type="text" name="field" class="form-control" value="<?php echo $supplier['field'];?>">
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telepon Utama &nbsp<font color="red">*</font></label>
                          <input type="text" name="telp_primary" class="form-control" value="<?php echo $supplier['telp_primary'];?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telepon Alternatif</label>
                          <input type="text" name="telp_alt" class="form-control" value="<?php echo $supplier['telp_alt'];?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fax</label>
                          <input type="text" name="fax" class="form-control" value="<?php echo $supplier['fax'];?>">
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat <i>(tanpa penulisan Jalan)</i> &nbsp<font color="red">*</font></label>
                          <textarea name="address" cols="10" rows="5" class="form-control" value="<?php echo $supplier['address'];?>">
                          <?php echo $supplier['address'];?></textarea>
                        </div>
                      </div>
                    </div>
                    <br><br><br><br>
                    <!-- <button class="btn btn-primary btn-block" onclick="md.showNotification('top','center')">Simpan</button> -->
                    <div align="right">
                    <a class="btn pull-center" href="<?php echo site_url('resources/suppliers');?>" style="color:white;" id="tambahModel">
                    <i class="material-icons">cancel</i> &nbsp;Batal</a>
                    <button type="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          
        
          
     