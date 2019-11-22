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
                  <div class="row">
                    <div class="col-md-12">
                        <div class="tim-typo head">
                            <p>
                            <table class="col-md-12">
                                <tr class="text-center">
                                  <td class="text-right"><img class="img" name="logo" src="<?php echo base_url('assets/img/logos_profile/'.$po['logo'])?>"/></td>
                                  <td class="text-left">
                                    <output class="tim-note" style="font-size:25px;padding-bottom:5px;font-weight: bold;"><?php echo $po['name']?></output><br>
                                    <output class="tim-note" style="padding-bottom:5px; font-weight: bold;"><?php echo $po['field']?></output><br>
                                    <output class="tim-note" style="padding-bottom:5px"><?php echo $po['add_cv']?></output><br>
                                    <output class="tim-note" style="padding-bottom:5px">Telp/fax : 
                                      <?php
                                        if ($po['telp_alt'] === '' && $po['fax'] === ''){
                                            echo $po['telp_primary'];
                                        }elseif($po['telp_alt'] === '') {
                                            echo $po['telp_primary'].'/'.$po['fax'];
                                        }else {
                                            echo $po['telp_primary'].'-'.$po['telp_alt'].'/'.$po['fax'];
                                        }
                                        ?>  
                                    </output><br>
                                    <output class="tim-note" style="padding-bottom:10px"><?php echo $po['website']?></output>
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2" class="text-center"><hr><hr class="hrthin"></td>
                                </tr>
                            </table>
                            </p>
                        </div>
                        <div class="tim-typo body">
                            <p>
                            <table class="col-md-12">
                                <tr class="text-center">
                                  <td colspan="7" class="text-center">
                                    <output class="tim-note" style="font-weight: bold;">Purchase Order</output>
                                  </td>
                                </tr>
                                <tr class="text-center">
                                  <td colspan="2" class="text-center">
                                    <output class="tim-note"><br></output>
                                  </td>
                                </tr>
                                <tr  style="font-size: 14px;">
                                  <td class="text-left">No. PO</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left"><?php echo $po['nopo']?></td>
                                  <td class="text-left" style="padding-left:200px"></td>
                                  <td class="text-left" >Supplier</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left"><?php echo $po['supplier']?></td>
                                </tr>
                                <tr  style="font-size: 14px;">
                                  <td class="text-left">From</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left"><?php echo $po['name']?></td>
                                  <td class="text-left" style="padding-left:200px"></td>
                                  <td class="text-left" >Attention</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left"><?php echo $po['attn_s']?></td>
                                </tr>
                                <tr  style="font-size: 14px;">
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left" style="padding-left:200px"></td>
                                  <td class="text-left" >Telpon</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left">
                                    <?php
                                        if ($po['ta_s'] === ''){
                                            echo $po['tp_s'];
                                        }else {
                                            echo $po['tp_s'].'/'.$po['ta_s'];
                                        }
                                    ?>
                                  </td>
                                </tr>
                                <tr  style="font-size: 14px;">
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left" style="padding-left:200px"></td>
                                  <td class="text-left" >Fax</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left">
                                    <?php
                                        if ($po['f_s'] === ''){
                                            echo '-';
                                        }else {
                                            echo $po['f_s'];
                                        }
                                    ?>
                                  </td>
                                </tr>
                                <tr  style="font-size: 14px;">
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left"></td>
                                  <td class="text-left" style="padding-left:200px"></td>
                                  <td class="text-left" >Maximal Delivery</td>
                                  <td class="text-left">: &nbsp;</td>
                                  <td class="text-left">
                                    <?php echo date('d-m-Y', strtotime($po['delivery']));?>
                                  </td>
                                </tr>
                            </table>
                        </div><br>
                        <div class="tim-typo item_list">
                            <div class="table-responsive">
                            <table class="table" style="border: 1px solid black;">
                                <thead style="color:black;" class="printbg text-center" >
                                    <th style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;width:50px;">
                                    <h6>No</h6>
                                    </th>
                                    <th style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;word-wrap:break-word;width:250px;">
                                    <h6>Deskripsi</h6>
                                    </th>
                                    <th style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;">
                                    <h6>Delivery</h6>
                                    </th>
                                    <th  style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;">
                                    <h6>Qty</h6>
                                    </th>
                                    <th  style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;">
                                    <h6>Unit</h6>
                                    </th>
                                    <th colspan="2" style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;">
                                    <h6>Harga @</h6>
                                    </th>
                                    <th colspan="2" style="-webkit-print-color-adjust: exact !important;background-color:#ffb2a1 !important; border: 1px solid black;">
                                    <h6>Nominal</h6>
                                    </th>
                                </thead>
                                <tbody class=" text-center">
                                <?php $no = 1;
                                foreach ($items_po as $item) : ?>  
                                    <tr>
                                        <td style="border: 1px solid black;">
                                            <?php 
                                            echo $no;
                                            $no++;
                                            ?>
                                        </td>
                                        <td class=" text-left" style="border: 1px solid black; word-wrap:break-word; width:300px">
                                            <?php echo $item['item_name']?>
                                        </td>
                                        <td style="border: 1px solid black;">
                                            <?php echo $item['deliv_item']?>
                                        </td>
                                        <td style="border: 1px solid black;">
                                            <?php echo $item['qty']?>
                                        </td>
                                        <td style="border: 1px solid black;">
                                            <?php echo $item['unit']?>
                                        </td>
                                        <td class="text-left" style="border-right: solid 1px transparent;border-bottom: solid 1px black; color: black; ">
                                            Rp.
                                        </td>
                                        <td class=" text-right" style="border: 1px solid black;">
                                            <?php echo number_format($item['custom_price'],2,',','.');?>
                                        </td>
                                        <td class="text-left" style="border-right: solid 1px transparent; border-bottom: solid 1px black; color: black;">
                                            Rp.
                                        </td>
                                        <td class=" text-right" style="border: 1px solid black;">
                                            <?php echo number_format($item['qty']*$item['custom_price'],2,',','.');?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                    <tr>
                                        <td colspan="7" style="border: 1px solid black;">
                                            Total
                                        </td>
                                        <td class="text-left" style="border-right: solid 1px transparent; border-bottom: solid 1px black; color: black;">
                                            Rp.
                                        </td>
                                        <td class=" text-right" style="border: 1px solid black;">
                                            <?php echo number_format($sum['nominals'],2,',','.');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" style="border: 1px solid black;">
                                            PPN 10%
                                        </td>
                                        <td class="text-left" style="border-right: solid 1px transparent; border-bottom: solid 1px black; color: black;">
                                            Rp.
                                        </td>
                                        <td class=" text-right" style="border: 1px solid black;">
                                            <?php echo number_format((10/100)*$sum['nominals'],2,',','.');?>
                                        </td>
                                    </tr>
                                    <tr style="font-weight: bold;">
                                        <td colspan="7" style="-webkit-print-color-adjust: exact !important;background-color:#fafafa !important;border: 1px solid black;">
                                            Grand Total
                                        </td>
                                        <td class="text-left" style="-webkit-print-color-adjust: exact !important;background-color:#fafafa !important;border-right: solid 1px transparent; border-bottom: solid 1px black; color: black;">
                                            Rp.
                                        </td>
                                        <td class=" text-right" style="-webkit-print-color-adjust: exact !important;background-color:#fafafa !important;border: 1px solid black; ">
                                           <?php echo number_format($sum['nominals']-((10/100)*$sum['nominals']),2,',','.');?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div><br><br>
                        <div class="tim-typo signature">
                            <table class="col-md-12" style="font-size: 14px;">
                                <tr class="text-center">
                                  <td class="text-center">
                                    <output class="tim-note"><?php echo $po['city_sender'].' , ';
                                    echo date('d-m-Y', strtotime($po['date_sender']));
                                    ?></output><br>
                                  </td>
                                  <td class="text-center">Vendor,</td>
                                </tr>
                                <tr>
                                  <td class="text-center"><br><br><br></td>
                                  <td class="text-center"><br><br><br></td>
                                </tr>
                                <tr style="font-weight: bold;">
                                  <td class="text-center"><?php echo $po['name']?></td>
                                  <td class="text-center" ><?php echo $po['vendor']?></td>
                                </tr>
                                <tr>
                                  <td class="text-center" style="width:50%"><br><br>
                                  <!-- <div class="" style="width:100%"> -->
                                    <table class="" style="font-size: 14px; width:100%; border: 1px solid black;">
                                      <tr>
                                        <td style="border: 1px solid black;">Menyetujui</td>
                                        <td style="border: 1px solid black;">Mengetahui</td>
                                        <td style="border: 1px solid black;">Dibuat oleh</td>
                                      </tr>
                                      <tr>
                                        <td style="border-right: 1px solid black; height: 70px;"></td>
                                        <td style="border-right: 1px solid black; height: 70px;"></td>
                                        <td style="border-right: 1px solid black; height: 70px;"></td>
                                      </tr>
                                      <tr style="font-weight:bold;">
                                        <td style="border-right: 1px solid black; word-wrap:break-word; width:80px"><?php echo $po['approved_by_nm']?></td>
                                        <td style="border-right: 1px solid black; word-wrap:break-word; width:80px"><?php echo $po['known_by_nm']?></td>
                                        <td style="border-right: 1px solid black; word-wrap:break-word; width:80px"><?php echo $po['user']?></td>
                                      </tr>
                                    </table>
                                  <!-- </div> -->
                                  </td>
                                  <td class="text-center"></td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <br>
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
          
        
          
     