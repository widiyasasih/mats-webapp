 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                  <?php echo form_open_multipart('molds/update');?>
                  <!-- <div><?php echo validation_errors(); ?></div> -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="">
                          <input type="hidden" name="id" size="20" value="<?php echo $mold['id'];?>">
                          <label class="">Upload Gambar Cetakan <br> 
                          <font style="color:red;font-style:italic">(direkomendasikan gambar berlatar putih, <br>*size max 100KB, <br>*tipe jpeg/jpg/gif/png, <br>*dimensi max 2000x2000 pixels)</font></label> 
                          <input type="file" id="img_mold" name="img_mold" size="20" value="">
                          <input type="hidden" id="img_mold_old" name="img_mold_old" size="20" value="<?php echo $mold['image'];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="">
                          <div class="card-avatar">
                            <a>
                              <label class="bmd-label-floating">Gambar Sekarang<br>
                              <img class="img" width="70%" height="70%" name="image" src="<?php echo base_url('assets/img/molds/'.$mold['image'])?>"/><br>
                              (<i><?php if($mold['image']==NULL) {echo "none";} else{echo $mold['image'];} ?></i>)
                            </a>
                          </div>
                        </div><br>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="hidden" name="main_profile_id" value="1">
                          <label class="bmd-label-floating">Kode &nbsp<font color="red">*</font> (exp. BC12)</label>
                          <input type="text" name="code" class="form-control" value="<?php echo $mold['code'];?>">
                          <font color="red"><i><?php echo form_error('code', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="hidden" name="main_profile_id" value="1">
                          <label class="bmd-label-floating">Nama &nbsp</label>
                          <input type="text" name="name" class="form-control" value="<?php echo $mold['name'];?>">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kondisi Cetakan &nbsp<font color="red">*</font></label>
                          <select name="condition" onchange="manual_input(this);" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                            <option value="Sedang diperbaiki" <?php if ($mold['condition'] === 'Sedang diperbaiki') {echo 'selected';}?>>Sedang diperbaiki</option>
                            <option value="Sedang dipinjam" <?php if ($mold['condition'] === 'Sedang dipinjam') {echo 'selected';}?>>Sedang dipinjam</option>
                            <option value="Rusak" <?php if ($mold['condition'] === 'Rusak') {echo 'selected';}?>>Rusak</option>
                            <option value="Hilang" <?php if ($mold['condition'] === 'Hilang') {echo 'selected';}?>>Hilang</option>
                            <option value="show_input" <?php if ($mold['condition'] !== 'Sedang dipinjam' && $mold['condition'] !== 'Sedang diperbaiki' && $mold['condition'] !== 'Rusak' && $mold['condition'] !== 'Hilang') {echo 'selected';}?>>Input kondisi lain</option>
                          </select>
                          <font color="red"><i><?php echo form_error('rack', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <?php 
                    if ($mold['condition'] !== 'Sedang dipinjam' && $mold['condition'] !== 'Sedang diperbaiki' && $mold['condition'] !== 'Rusak' && $mold['condition'] !== 'Hilang') {
                      echo '
                      <div class="row" id="manual_input" style="display:block;">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating" style="font-style: italic;">Input kondisi &nbsp</label>
                            <input type="text" id="condition2" name="condition2" class="form-control" value="'.$mold['condition'].'">
                          </div>
                        </div>
                      </div>
                      <br>
                      ';
                    }else {
                      echo '
                      <div class="row" id="manual_input" style="display:none;">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating" style="font-style: italic;">Input kondisi &nbsp</label>
                            <input type="text" id="condition2" name="condition2" class="form-control" value="">
                          </div>
                        </div>
                      </div>
                      <br>
                      ';
                    }
                    ?>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Lokasi Rak &nbsp<font color="red">*</font></label>
                          <select name="rack" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                          <option value="" disabled selected>Pilih rak</option>
                          <?php foreach ($racks as $key => $rack) : ?>
                            <option value="<?php echo $rack['id']?>" <?php echo ($rack['id']==$mold['rack_id']?"selected" : "") ;?>><?php echo $rack['code']?></option>
                          <?php endforeach;?>
                          </select>
                          <font color="red"><i><?php echo form_error('rack', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="">Model Rak &nbsp<font color="red">*</font></label><br>
                          <?php 
                          $key = 0; $i = 0;
                          foreach ($models as $key => $model) : ?>
                          <label style="color:black;" for="<?php echo 'model'.$model['md_id']?>">
                          <input id="<?php echo 'model'.$model['md_id']?>" value="<?php echo $key++;?>" type="checkbox" name="checked[]" <?php if ($model['md_id'] !== NULL) {
                                  echo 'checked';}?>>&nbsp;
                          <input value="<?php echo $i++;?>" type="hidden" name="uncheck[]">
                          <input value="<?php echo $model['mm_id']?>" type="hidden" name="mold_models_id[]">
                          <input value="<?php echo $model['model_id']?>" type="hidden" name="model[]">&nbsp;
                          <?php echo $model['model']?>
                          </label><br>
                          <?php endforeach;?>
                          <font color="red"><i><?php echo form_error('model[]', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating" for="exampleFormControlSelect1" style="font-size:11px;">Deskripsi &nbsp<font color="red">*</font></label>
                            <textarea name="description" <?php echo $mold['description'];?> rows="5" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                            <?php echo $mold['description'];?>
                            </textarea>
                            <font color="red"><i><?php echo form_error('description', '<div class="error">', '</div>'); ?></i></font>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div align="right">
                    <a class="btn pull-center" href="<?php echo site_url('molds/view/'.$mold['id']);?>" style="color:white;" id="tambahModel">
                    <i class="material-icons">cancel</i> &nbsp;Batal</a>
                    <button type="submit" name="submit" class="btn btn-primary pull-center" style="background-color:#9C27B0">
                    <i class="material-icons">save</i> &nbsp; Simpan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          
        
          
     