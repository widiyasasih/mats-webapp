 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12"><br><br>
              <div class="card card-profile">
                <div class="card-avatar">
                  <a>
                    <img class="img" name="logo" src="<?php echo base_url('assets/img/logos_profile/'.$profile['logo'])?>" />
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo $profile['name'];?></h4>
                  <h6 class="card-category text-gray"><?php echo $profile['field'];?></h6>
                  <p class="card-description">
                    <?php echo $profile['description'];?>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody class="text-left" style="background-color:#fafafa;">
                        <tr>
                          <td style="font-weight: bold; padding-left: 70px;">
                            Inisial
                          </td>
                          <td style="font-weight: bold;">
                            :
                          </td>
                          <td>
                            <?php echo $profile['initial'];?>
                          </td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold; padding-left: 70px;">
                            Telpon
                          </td>
                          <td style="font-weight: bold;">
                            :
                          </td>
                          <td>
                            <?php
                              if ($profile['telp_alt'] === ''){
                                echo $profile['telp_primary'];
                              }else {
                                echo $profile['telp_primary'].'/'.$profile['telp_alt'];
                              }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td  style="font-weight: bold; padding-left: 70px;">
                            Fax
                          </td>
                          <td style="font-weight: bold;">
                            :
                          </td>
                          <td class="">
                              <?php echo $profile['fax'];?>
                          </td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold; padding-left: 70px;">
                            Website
                          </td>
                          <td style="font-weight: bold;">
                            :
                          </td>
                          <td class="">
                              <?php echo $profile['website'];?>
                          </td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold; padding-left: 70px;">
                            Email
                          </td>
                          <td style="font-weight: bold;">
                            :
                          </td>
                          <td class="">
                              <?php echo $profile['email'];?>
                          </td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold; padding-left: 70px;">
                            Kota Kantor Pusat
                          </td>
                          <td style="font-weight: bold;">
                            :
                          </td>
                          <td>
                            <?php echo $profile['city'];?>
                          </td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold; padding-left: 70px;">
                            Alamat Kantor Pusat
                          </td>
                          <td style="font-weight: bold;">
                            :
                          </td>
                          <td class="">
                              <?php echo $profile['address'];?>
                          </td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold; padding-left: 70px;">
                            Cabang
                          </td>
                          <td style="font-weight: bold;">
                            :
                          </td>
                          <td>
                              <?php echo $all_branchs;?>
                          </td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold; padding-left: 70px;">
                            PPN
                          </td>
                          <td style="font-weight: bold;">
                            :
                          </td>
                          <td>
                              <?php echo $profile['tax_ppn'].'%';?>
                          </td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold; padding-left: 70px;">
                            Diedit
                          </td>
                          <td style="font-weight: bold;">
                            :
                          </td>
                          <td>
                              <?php echo $profile['modified_at'];?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <a href="<?php echo site_url('resources/cv_profile/edit/'.$profile['id']);?>" class="btn btn-primary btn-round">Edit</a>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <ul class="navbar-nav pull-left">
                <li class="nav-item dropdown">
                  <a class="nav-link" href="<?php echo site_url('resources')?>">
                    <i title="Kembali" class="material-icons">arrow_back</i> Kembali
                    <p class="d-lg-none d-md-block">
                      Kembali
                    </p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        
          
     