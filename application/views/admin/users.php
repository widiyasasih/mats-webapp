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
                        <div class="input-group no-border">
                          <label for="search_text"></label>&nbsp;
                            <i class="material-icons">people</i>
                            <div class="ripple-container"></div>
                        </div>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav pull-right">
                      <li class="nav-item">
                        <a class="nav-link" title="Tambah Level" href="<?php echo site_url('users/add');?>" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">poll</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" style="color:black;" href="<?php echo site_url('admin/view_level/');?>">Lihat Level Pengguna</a>
                            <a class="dropdown-item" style="color:black;" href="<?php echo site_url('admin/edit_level/');?>">Tambah Level Pengguna</a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="card-body text-left">
                  <div class="row">
                    <!-- <p class="card-category result-users">
                    <span class="text-primary"><i class="fa fa-long-arrow-right"></i></span><small> hasil pencarian cetakan</small> -->
                    <div id="result"></div>
                    <!-- </p> -->
                    <!-- <div style="clear:both"></div> -->
                    <div class="table-responsive">
                      <table id="result" class="table">
                          <?php
                          if (!empty($users)) {
                            echo'
                            <thead class=" text-primary">
                            <th class="text-center">
                              No.
                            </th>
                            <th>
                              Nama
                            </th>
                            <th class="text-center">
                              Username
                            </th>
                            <th class="text-center">
                              Password
                            </th>
                            <th class="text-center">
                              Email
                            </th>
                            <th class="text-center">
                              Alamat
                            </th>
                            <th class="text-center">
                              Posisi di Perusahaan
                            </th>
                            <th class="text-center">
                              Telpon
                            </th>
                            <th class="text-center">
                              Fax
                            </th>
                            <th class="text-center">
                              Status Online
                            </th>
                            <th class="text-center">
                              Member at
                            </th>
                            <th class="text-center">
                              Level
                            </th>
                            <th class="text-center">
                              Aksi
                            </th>
                          </thead>
                          <tbody>';
                            }
                          if (empty($users)) {
                              echo '<tr><td colspan="5" class="text-center" style="font-weight: bold;">';
                              echo 'Belum ada cetakan yang terdaftar';
                              echo '</td></tr>';
                            }
                          ?>
                          <?php $no=1;
                          foreach ($users as $key => $user) : ?>
                          <tr class="text-center">
                            <td class="text-center">
                            <?php echo $no++;?>
                            </td>
                            <td class="text-left">
                            <?php echo $user['fullname'];?>
                            </td>
                            <td>
                            <?php echo $user['username'];?>
                            </td>
                            <td>
                            <?php echo word_limiter($user['password'], 4); ?>
                            </td>
                            <td>
                            <?php echo $user['email'];?>
                            </td>
                            <td>
                            <?php echo $user['address'];?>
                            </td>
                            <td>
                            <?php echo $user['position'];?>
                            </td>
                            <td>
                            <?php
                              if ($user['telp_alt'] === NULL){
                                echo $user['telp_primary'];
                              }else {
                                echo $user['telp_primary'].'/'.$user['telp_alt'];
                              }
                            ?>
                            </td>
                            <td>
                            <?php echo $user['fax'];?>
                            </td>
                            <td>
                            <?php
                              if ($user['online_status'] == 1){
                                echo '<span style="color:green;">Online</>';
                              }else {
                                echo 'last seen at '.$user['last_online'];
                              }
                            ?>
                            </td>
                            <td class="text-center">
                            <?php echo $user['created_at'];?>
                            </td>
                            <td class="text-center">
                            <?php echo $user['level']; ?>
                            </td>
                            <td class="text-center">
                              <a href="<?php echo site_url('admin/edit_user/'.$user['id']);?>" title="Edit">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>&nbsp &nbsp
                              <a href="<?php echo site_url('admin/delete_user/'.$user['id']);?>" onclick="return confirm('Anda akan menghapus <?php echo 'cetakan '.$user['username'];?> ?');" title="Hapus" style="color:#e8021d;">
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
