 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="card-title">
                    <ul class="navbar-nav pull-left">
                      <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-hassppup="true" aria-expanded="false">
                            <i class="material-icons">dns</i> &nbsp Cetakan
                            <?php echo $mold['code']; ?>
                            <div class="ripple-container"></div>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" onclick="return confirm('Anda akan menghapus <?php echo 'cetakan '.$mold['code'];?> ?')" href="<?php echo site_url('molds/delete/'.$mold['id']);?>">
                          <i title="Hapus Purchase Order" class="material-icons">delete</i>
                          <p class="d-lg-none d-md-block">
                            Hapus
                          </p>
                        </a>
                      </li>
                    </ul>
                    </ul><ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link">
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo site_url('molds/edit/'.$mold['id']);?>">
                          <i title="Edit Purchase Order" class="material-icons">edit</i>
                          <p class="d-lg-none d-md-block">
                            Edit
                          </p>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="card-body text-center">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
                    <a>
                        <img width="30%" class="img" name="logo" src="<?php echo base_url('assets/img/molds/'.$mold['image'])?>" />
                    </a>
                    <div class="card-body">
                    <p class="card-description" style="font-weight:bold;">
                        <?php echo $mold['image'];?>
                    </p><br>
                    <div class="table-responsive">
                        <table class="table">
                        <tbody class="text-left" style="background-color:#fafafa;">
                            <tr>
                            <td style="font-weight: bold; padding-left: 70px;">
                                Kode
                            </td>
                            <td style="font-weight: bold;">
                                :
                            </td>
                            <td>
                                <?php echo $mold['code'];?>
                            </td>
                            </tr>
                            <tr>
                            <td style="font-weight: bold; padding-left: 70px;">
                                Nama
                            </td>
                            <td style="font-weight: bold;">
                                :
                            </td>
                            <td>
                                <?php echo $mold['name'];?>
                            </td>
                            </tr>
                            <tr>
                            <td  style="font-weight: bold; padding-left: 70px;">
                                Lokasi Rak
                            </td>
                            <td style="font-weight: bold;">
                                :
                            </td>
                            <td class="">
                                <?php echo $mold['rack'];?>
                            </td>
                            </tr>
                            <tr>
                            <td style="font-weight: bold; padding-left: 70px;">
                                Model
                            </td>
                            <td style="font-weight: bold;">
                                :
                            </td>
                            <td class="">
                                <?php echo $mold['models'];?>
                            </td>
                            </tr>
                            <tr>
                            <td style="font-weight: bold; padding-left: 70px;">
                                Kondisi
                            </td>
                            <td style="font-weight: bold;">
                                :
                            </td>
                            <td class="">
                                <span style="background-color:yellow; font-weight: bold;"><?php echo $mold['condition'];?></span>                       
                            </td>
                            </tr>
                            <tr>
                            <td style="font-weight: bold; padding-left: 70px;">
                                Deskripsi
                            </td>
                            <td style="font-weight: bold;">
                                :
                            </td>
                            <td class="">
                                <?php echo $mold['description'];?>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>
                  </div>
                  </div>
                  </div>
                </div>
                </div>
            </div>
          </div>
            <div class="col-md-12">
                <ul class="navbar-nav pull-left">
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="<?php echo site_url('molds')?>">
                      <i title="Kembali" class="material-icons">arrow_back</i> Kembali
                      <p class="d-lg-none d-md-block">
                        Kembali
                      </p>
                    </a>
                  </li>
                </ul>
                </ul><ul class="navbar-nav pull-right">
                  <li class="nav-item dropdown">
                    <a class="nav-link">
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                    </a>
                  </li>
                </ul>
            </div>
          </div>
          
        
          
     