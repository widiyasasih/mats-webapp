 </nav>
        <!-- End Navbar -->
        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12" id="">
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="card-title">
                    <ul class="navbar-nav pull-left">
                      <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <form action="">
                            List Rak Terdaftar &nbsp;
                            <!-- <input type="text"  placeholder=" rak A12..">
                            <div class="ripple-container"></div>
                            <button name="submit" type="submit"><i class="material-icons">search</i></button> -->
                        </form>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" title="Tambah Rak" href="<?php echo site_url('racks/add');?>">
                            <i class="material-icons">add</i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="card-body text-left">
                  <div class="row">
                    <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                          <th class="text-center">
                            No.
                          </th>
                          <th>
                            Code Rak
                          </th>
                          <th class="text-center">
                            Deskripsi
                          </th>
                          <th class="text-center">
                            Aksi
                          </th>
                        </thead>
                        <tbody>
                        <?php $no=1;
                        foreach ($racks as $key => $rack) :?>
                        <tr>
                          <td class="text-center">
                          <?php echo $no++;?>
                          </td>
                          <td>
                          <?php echo $rack['code']?>
                          </td>
                          <td class="text-center">
                          <?php echo $rack['description']?>
                          </td>
                          <td class="text-center">
                            <a href="<?php echo site_url('racks/edit/'.$rack['id']);?>" title="Edit">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                            </a>&nbsp &nbsp
                            <a href="<?php echo site_url('racks/delete/'.$rack['id']);?>" title="Hapus" style="color:#e8021d;">
                              <i class="material-icons">delete</i>
                              <div class="ripple-container"></div>
                            </a>
                          </td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
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
            </div>
          </div>
