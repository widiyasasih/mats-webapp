 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                  <?php echo form_open_multipart('resources/models/update');?>
                    <div class="row">
                    <div><?php echo validation_errors(); ?></div>
                    <input type="hidden" name="id" value="<?php echo $model['id'];?>">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Satuan Unit &nbsp<font color="red">*</font></label>
                          <input type="text" name="model" class="form-control" value="<?php echo $model['model'];?>">
                        </div>
                      </div>
                    </div>
                    <br>
                    </div><br><br><br><br>
                    <!-- <button class="btn btn-primary btn-block" onclick="md.showNotification('top','center')">Simpan</button> -->
                    <div align="right">
                    <a class="btn pull-center" href="<?php echo site_url('resources/models');?>" style="color:white;" id="tambahModel">
                    <i class="material-icons">cancel</i> &nbsp;Batal</a>
                    <button type="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          
        
          
     