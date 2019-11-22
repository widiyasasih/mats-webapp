 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <?php
                  $attributes = array('name' => 'myForm', 'id' => 'form_id');
                  echo form_open_multipart('needs/add_items', $attributes);
              ?>
              <div class="card">
                <div class="card-header card-header-primary">
                  <!-- <h4 class="card-title">Isi berdasarkan bulan dan tahun kebutuhan material</h4> -->
                    Bulan &nbsp 
                    <div class="" style="color:white; display:inline;" data-style="btn btn-link">
                      <?php
                      // set month currently - auto select
                        setlocale(LC_TIME, "id_ID"); 
                        // echo strftime("%B"); can't work 
                        $month = strtotime(date('Y').'-'.date('m').'-'.date('j').' - 12 months');
                        $end = strtotime(date('Y').'-'.date('m').'-'.date('j').' + 0 months');
                        
                        echo '<select class="select" name="month">';
                        while($month < $end){ 
                            $selected = (date('F', $month)==date('F'))? ' selected' :'';
                            echo '<option'.$selected.' class="option" value="'.date('n', $month).'">'.date('F', $month).'</option>'."\n";
                            $month = strtotime("+1 month", $month);
                            }
                        echo '</select>'; 
                      ?>
                    </div>
                    &nbsp &nbsp &nbsp &nbsp
                    Tahun &nbsp 
                    <div class="" style="color:white; display:inline;" data-style="btn btn-link">
                      <?php 
                      // set year currently - auto select
                        $already_selected_value = date("Y");;
                        $earliest_year = 2015;
                        echo '<select name="year" class="select">';
                        foreach (range(date('Y'), $earliest_year) as $x) {
                            echo '<option class="option" value="'.$x.'"'.($x == $already_selected_value ? 'selected' : '').'>'.$x.'</option>';
                        }
                        echo '</select>';
                      ?>
                    </div>
                </div>
                <div class="card-body">
                  <div class="card-body text-left">
                  <br>
                  <?php foreach ($models as $model) : ?>
                  <script>
                    // onclick button will passing id as input - function must be unique 
                    function ganti<?php echo $model['id'];?>() {
                      document.getElementById("<?php echo $model['id'];?>").value = "<?php echo $model['id'];?>";
                    }
                  </script>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card card-plain">
                        <label for="<?php echo $model['id'];?>">
                        <input type="submit" style="display: none;" onclick="ganti<?php echo $model['id'];?>()" name="model_id" value="" id="<?php echo $model['id'];?>">
                          <div class="card-header card-header-primary">
                            <a> 
                            <h4 class="card-title ">
                            <div class="nav-item">
                              <i class="material-icons">label_important</i>&nbsp &nbsp<?php echo $model['model'];?>
                              <div class="ripple-container"></div>
                            </div>  
                            </h4>
                            </a>
                          </div>
                        </label>
                      </div>
                    </div>
                  </div>
                  <?php endforeach;?>
                  </div>
                </div>
              </form>  
            </div>
          </div>
          
        
          
     