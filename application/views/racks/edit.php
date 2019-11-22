 </nav>
        <!-- End Navbar -->
        <div class="content">
        <di class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                  <?php echo form_open_multipart('racks/update');?>
                  <!-- <div><?php echo validation_errors(); ?></div> -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode &nbsp<font color="red">*</font> (exp. A12)</label>
                          <input type="hidden" name="id" class="form-control" value="<?php echo $rack['id']?>">
                          <input type="text" name="code" class="form-control" value="<?php echo $rack['code']?>">
                          <font color="red"><i><?php echo form_error('code', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating" for="exampleFormControlSelect1" style="font-size:11px;">Deskripsi &nbsp<font color="red">*</font></label>
                            <textarea name="description" rows="5" value="<?php echo $rack['description']?>" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                            <?php echo $rack['description']?></textarea>
                            <font color="red"><i><?php echo form_error('description', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div align="right">
                    <a class="btn pull-center" href="<?php echo site_url('racks');?>" style="color:white;" id="tambahModel">
                    <i class="material-icons">cancel</i> &nbsp;Batal</a>
                    <button type="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          
          
        
          
     