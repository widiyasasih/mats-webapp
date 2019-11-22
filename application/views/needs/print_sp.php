<!doctype html>
<html lang="en">
  <head>
    <title>Mats Deschino Sport</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Material Dashboard CSS -->
    <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.1')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/advances.css')?>" rel="stylesheet" />
  
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <style>
    </style>
  </head>
  <body class="">
    <div class="wrapper ">
        <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-body text-left">
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="tim-tysp head">
                            <p>
                            <table class="col-md-12">
                                <tr class="text-left">
                                  <td class="text-left">
                                    <output class="tim-note" style="font-size:15px;font-weight: bold;"><h6><?php echo $sp['name']?></h6></output>
                                  </td>
                                </tr>
                                <tr class="text-center">
                                  <td class="text-center"><br><br> 
                                    <output class="tim-note" style="font-size:20px; color:black;padding-bottom:10px;font-weight: bold;">SLIP PENGAJUAN</output><br>
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2" class="text-center">
                                      <hr style="border-top: 1px dashed black; width:50%; border-bottom :0px;border-width: 2px;">
                                      <hr class="hrthin" style="width:50%; border-bottom :0px;border-width: 2px;">
                                  </td>
                                </tr>
                                <tr class="text-center">
                                  <td colspan="2" style="color:black; font-weight: bold;" class="text-center">
                                      <?php echo 'Tanggal : '.date('d/m/Y', strtotime($sp['date_submission']));?>
                                  </td>
                                </tr>
                            </table>
                            </p>
                        </div>
                        <div class="tim-typo item_list"><br>
                            <div class="" style="text-align:center">
                            <table class="" style="border: 1px solid black; table-layout:fixed">
                                <tbody class=" text-center">
                                    <tr>
                                        <td rowspan="2" style="font-weight:bold;font-size:12px; border: 1px solid black; word-wrap:break-word;width:60px;">
                                        NAMA INSTANSI
                                        </td>
                                        <td rowspan="2" style="border: 1px solid black; word-wrap:break-word;width:180px;">
                                        <?php
                                            if (empty($sp['supplier'])){
                                                echo $sp['vendor'];
                                            }else {
                                                echo $sp['supplier'];
                                            }
                                        ?>
                                        </td>
                                        <td colspan="2" style="border: 1px solid black; width:150px">
                                        In Charge
                                        </td>
                                        <td style="border: 1px solid black; width:115px">
                                        Supervisor
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;width:100px;">
                                        Manager
                                        </td>
                                        <td colspan="2" style="border: 1px solid black;width:100px;">
                                        General Mgr.
                                        </td>
                                        <td colspan="" style="border: 1px solid black;width:100px;">
                                        Director
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="border: 1px solid black;height:50px;">
                                        <br>
                                        </td>
                                        <td style="border: 1px solid black;">
                                        <br>
                                        </td>
                                        <td colspan="2" style="border: 1px solid black;width:100px;">
                                        <br>
                                        </td>
                                        <td style="border: 1px solid black; width:110px; ">
                                        <br>
                                        </td>
                                        <td colspan="2" style="border: 1px solid black;">
                                        <br>
                                        </td>
                                        <td colspan="" class=" text-left" style="border: 1px solid black; ">
                                        <br>
                                        </td>
                                    </tr>
                                    <tr class=" text-center">
                                        <td style="font-weight:bold;font-size:12px;border: 1px solid black;">
                                        NO.
                                        </td>
                                        <td colspan="4" style="font-weight:bold;font-size:12px;border: 1px solid black;">
                                        URAIAN
                                        </td>
                                        <td colspan="3" style="font-weight:bold;font-size:12px;border: 1px solid black;">
                                        JUMLAH
                                        </td>
                                        <td colspan="2" style="font-weight:bold;font-size:12px;border: 1px solid black;">
                                        PCS
                                        </td>
                                        <td style="border: 1px solid black;">
                                        General Mgr.
                                        </td>
                                    </tr>
                                    <!-- <tr class="one">
                                        <td style="border: 1px solid black;">
                                        </td>
                                        <td colspan="4" class=" text-left" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="1" style="border: 1px solid black;text-align:left;border-right: solid 1px transparent;">
                                        &nbsp;Rp.
                                        </td>
                                        <td colspan="2" style="border: 1px solid black; text-align:right; width:3100px;">
                                        1&nbsp;
                                        </td>
                                        <td colspan="2" class=" text-center" style="border: 1px solid black;">
                                        </td>
                                        <td class=" text-center" style="border: 1px solid black;">
                                        </td>
                                    </tr> -->
                                    <tr class="one">
                                      <td colspan="10" rowspan="12" >
                                        <table style="width: 100%; table-layout:fixed">
                                        <?php 
                                        // $rows = 14;
                                        $no = 1;
                                        foreach ($items as $item) : ?>
                                          <tr class="text-center" >
                                            <td style="height:20px;border-right: 1px solid black; border-bottom: 1px solid black; width:59px">
                                              <?php echo $no++;?>
                                            </td>
                                            <td style="word-wrap:break-word;border-right: 1px solid black; border-bottom: 1px solid black; width:445px; text-align:left;">
                                              &nbsp;&nbsp;<?php echo $item['item_name'];?>
                                            </td>
                                            <td style="width: 40px; border-bottom: 1px solid black;text-align:left;">
                                              &nbsp; Rp.
                                            </td>
                                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; width:180px; text-align:right; ">
                                              <?php 
                                              if ($item['man_qty'] > 0) {
                                                echo number_format($item['man_qty']*$item['custom_price'], 0, ',','.');
                                              }else {
                                                echo number_format($item['qty']*$item['custom_price'], 0, ',','.');                                                
                                              }
                                              ;?> &nbsp;
                                            </td>
                                            <td style="border-bottom: 1px solid black;">
                                              <?php 
                                              if ($item['man_qty'] > 0) {
                                                echo $item['man_qty'];
                                              }else {
                                                echo $item['qty'];                                                
                                              }
                                              ;?>
                                            </td>
                                          </tr>
                                        <?php endforeach;
                                          $table_rows = '
                                            <tr class="text-center" >
                                              <td style="height:20px;border-right: 1px solid black; border-bottom: 1px solid black; ">
                                            </td>
                                            <td style="word-wrap:break-word;border-right: 1px solid black; border-bottom: 1px solid black; text-align:left;">
                                            </td>
                                            <td style="width: 40px; border-bottom: 1px solid black;text-align:left;">
                                              &nbsp; Rp.
                                            </td>
                                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; text-align:right;">
                                            </td>
                                            <td style="border-bottom: 1px solid black;">
                                            </td>
                                            </tr>';
                                          if (empty($items)) {
                                          $rows = 14;
                                          for ($i=0; $i < $rows; $i++) { 
                                            echo $table_rows;
                                          }
                                        } elseif($count == 1) {
                                          $rows = 13;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 2) {
                                          $rows = 12;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 3) {
                                          $rows = 11;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 4) {
                                          $rows = 10;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 5) {
                                          $rows = 9;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 6) {
                                          $rows = 8;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 7) {
                                          $rows = 7;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 8) {
                                          $rows = 6;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 9) {
                                          $rows = 5;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 10) {
                                          $rows = 4;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 11) {
                                          $rows = 3;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 12) {
                                          $rows = 2;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        } elseif($count == 13) {
                                          $rows = 1;
                                          for ($i=0; $i < $rows; $i++) {
                                            echo $table_rows;
                                          }
                                        }
                                        ?>
                                          
                                        </table>
                                      </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="" style="border: 1px solid black; border-bottom: solid 1px transparent;"><br>
                                      </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="" style="height:5px; border: 1px solid black;">
                                      Manager
                                      </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black; border-bottom: solid 1px transparent;"><br>
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="" style="height:5px; border: 1px solid black;">
                                      Supervisor
                                      </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black; border-bottom: solid 1px transparent;"><br>
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="" style="height:5px; border: 1px solid black;">
                                      Cashier
                                      </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black; border-bottom: solid 1px transparent;"><br>
                                        </td>
                                    </tr>
                                    <tr class="two">
                                      <td colspan="1" style="border: 1px solid black;border-bottom: solid 1px transparent;">
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <td colspan="5" style="border: 1px solid black;font-weight:bold;">
                                        TOTAL
                                        </td>
                                        <td colspan="" class=" text-left" style="border: 1px solid black;border-right: solid 1px transparent; font-weight:bold;">
                                        &nbsp;&nbsp;Rp.
                                        </td>
                                        <td colspan="2" style="border: 1px solid black;font-weight:bold; text-align:right;">
                                        <?php echo number_format($sum['nominals'], 0, ',','.');?>&nbsp;&nbsp;
                                        </td>
                                        <td colspan="2" class=" text-center" style="border: 1px solid black;font-weight:bold;">
                                        <?php echo $sum['pcs'];?>
                                        </td>
                                        <td colspan="2" class=" text-center" style="border: 1px solid black;font-weight:bold;">
                                        
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="2" class=" text-left" style="border: 1px solid black;">
                                        &nbsp;Kode Pembayaran :
                                        </td>
                                        <td rowspan="5" class=" text-center" style="font-weight:bold; border: 1px solid black; word-break: break-all;width:15px;">
                                        Paymen t
                                        </td>
                                        <td colspan="" class=" text-center" style="border: 1px solid black; ">
                                        Cash
                                        </td>
                                        <td colspan="7" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td rowspan="2" class="text-left" colspan="2" style="border: 1px solid black;">
                                        &nbsp;Diterima oleh :
                                        </td>
                                        <td style="border: 1px solid black;">
                                        </td>
                                        <td colspan="1" style="border: 1px solid black;">
                                        Cheque
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        Giro
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        Credit
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td style="border: 1px solid black;">
                                        Nama Bank
                                        </td>
                                        <td colspan="1" class=" text-left" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class=" text-left" rowspan="2" colspan="2" style="border: 1px solid black;">
                                        &nbsp;Tanda Tangan :
                                        </td>
                                        <td class=" text-left" style="border: 1px solid black; height:40px">
                                        </td>
                                        <td colspan="1" class=" text-left" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td  style="border: 1px solid black;">
                                        Date
                                        </td>
                                        <td colspan="1" class=" text-left" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                        <td colspan="3" style="border: 1px solid black;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div><br>
                    </div>
                  </div>
                  </div>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assets/js/core/jquery.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/core/popper.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/core/bootstrap-material-design.min.js')?>" type="text/javascript"></script>

    <!-- Plugin for the Perfect Scrollbar -->
    <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>

    <!-- Plugin for the momentJs  -->
    <script src="<?php echo base_url('assets/js/plugins/moment.min.js')?>"></script>

    <!--  Plugin for Sweet Alert -->
    <script src="<?php echo base_url('assets/js/plugins/sweetalert2.js')?>"></script>

    <!-- Forms Validations Plugin -->
    <script src="<?php echo base_url('assets/js/plugins/jquery.validate.min.js')?>"></script>

    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="<?php echo base_url('assets/js/plugins/jquery.bootstrap-wizard.js')?>"></script>

    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="<?php echo base_url('assets/js/plugins/bootstrap-selectpicker.js')?>" ></script>

    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="<?php echo base_url('assets/js/plugins/bootstrap-datetimepicker.min.js')?>"></script>

    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="<?php echo base_url('assets/js/plugins/jquery.datatables.min.js')?>"></script>

    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="<?php echo base_url('assets/js/plugins/bootstrap-tagsinput.js')?>"></script>

    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?php echo base_url('assets/js/plugins/jasny-bootstrap.min.js')?>"></script>

    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="<?php echo base_url('assets/js/plugins/fullcalendar.min.js')?>"></script>

    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="<?php echo base_url('assets/js/plugins/jquery-jvectormap.js')?>"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?php echo base_url('assets/js/plugins/nouislider.min.js')?>" ></script>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <!-- Library for adding dinamically elements -->
    <script src="<?php echo base_url('assets/js/plugins/arrive.min.js')?>"></script>

    <!--  Google Maps Plugin    -->
    <script  src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Chartist JS -->
    <script src="<?php echo base_url('assets/js/plugins/chartist.min.js')?>"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js')?>"></script>

    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url('assets/js/material-dashboard.js?v=2.1.1')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/material-dashboard.min.js')?>" type="text/javascript"></script>
    <script>
      $(document).ready(function() {
        $().ready(function() {
          $sidebar = $('.sidebar');

          $sidebar_img_container = $sidebar.find('.sidebar-background');

          $full_page = $('.full-page');

          $sidebar_responsive = $('body > .navbar-collapse');

          window_width = $(window).width();

          fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

          if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
            if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
              $('.fixed-plugin .dropdown').addClass('open');
            }

          }

          $('.fixed-plugin a').click(function(event) {
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass('switch-trigger')) {
              if (event.stopPropagation) {
                event.stopPropagation();
              } else if (window.event) {
                window.event.cancelBubble = true;
              }
            }
          });

          $('.fixed-plugin .active-color span').click(function() {
            $full_page_background = $('.full-page-background');

            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if ($sidebar.length != 0) {
              $sidebar.attr('data-color', new_color);
            }

            if ($full_page.length != 0) {
              $full_page.attr('filter-color', new_color);
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr('data-color', new_color);
            }
          });

          $('.fixed-plugin .background-color .badge').click(function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('background-color');

            if ($sidebar.length != 0) {
              $sidebar.attr('data-background-color', new_color);
            }
          });

          $('.fixed-plugin .img-holder').click(function() {
            $full_page_background = $('.full-page-background');

            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');


            var new_image = $(this).find("img").attr('src');

            if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              $sidebar_img_container.fadeOut('fast', function() {
                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $sidebar_img_container.fadeIn('fast');
              });
            }

            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

              $full_page_background.fadeOut('fast', function() {
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                $full_page_background.fadeIn('fast');
              });
            }

            if ($('.switch-sidebar-image input:checked').length == 0) {
              var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
            }
          });

          $('.switch-sidebar-image input').change(function() {
            $full_page_background = $('.full-page-background');

            $input = $(this);

            if ($input.is(':checked')) {
              if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn('fast');
                $sidebar.attr('data-image', '#');
              }

              if ($full_page_background.length != 0) {
                $full_page_background.fadeIn('fast');
                $full_page.attr('data-image', '#');
              }

              background_image = true;
            } else {
              if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr('data-image');
                $sidebar_img_container.fadeOut('fast');
              }

              if ($full_page_background.length != 0) {
                $full_page.removeAttr('data-image', '#');
                $full_page_background.fadeOut('fast');
              }

              background_image = false;
            }
          });

          $('.switch-sidebar-mini input').change(function() {
            $body = $('body');

            $input = $(this);

            if (md.misc.sidebar_mini_active == true) {
              $('body').removeClass('sidebar-mini');
              md.misc.sidebar_mini_active = false;

              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

            } else {

              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

              setTimeout(function() {
                $('body').addClass('sidebar-mini');

                md.misc.sidebar_mini_active = true;
              }, 300);
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
              window.dispatchEvent(new Event('resize'));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
              clearInterval(simulateWindowResize);
            }, 1000);

          });
        });
      });
    </script>
    <script>
      $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();

      });
    
    $(document).ready(function(){
    $("input").click(function(){
            $(this).next().show();
            $(this).next().hide();
        });

    });

    $(document).ready(function(){
 
      // Initialize select2
      $("#selUser").select2();

      // Read selected option
      $('#but_read').click(function(){
        var username = $('#selUser option:selected').text();
        var userid = $('#selUser').val();

        $('#result').html("id : " + userid + ", name : " + username);

      });
    });

    //collapse
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("activeclp");
      
      var contentclp = this.nextElementSibling;
      if (contentclp.style.maxHeight){
        contentclp.style.maxHeight = null;
      } else {
        contentclp.style.maxHeight = contentclp.scrollHeight + "px";
        
      } 
    });
    }
    
    //checkbox
    jQuery('form').submit(function () {
        var sel = jQuery('input[type=checkbox]:checked').map(function (_, el) {
            return jQuery(el).parent().text().trim();
        }).get();
        var s = $('#s').val().trim();
        jQuery("#checkIt").val(sel.join()+ ',' + s);
    });
    </script>

    <script>
        document.getElementById('today_date').value = new Date().toISOString().slice(0, 10); 
    </script>

     <script>
        window.print();
    </script>
  </body>
</html>
          
        
          
     