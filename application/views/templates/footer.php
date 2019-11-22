    </div>
      </div>
        <footer class="footer">
          <div class="container-fluid">
            <nav class="float-left">
              <ul>
                <li>
                  <a href="http://deschinosport.co.id">
                    Deschino Sport
                  </a>
                </li>
                <li>
                  <a href="http://deschinosport.co.id/about-us/">
                    About Us
                  </a>
                </li>
              </ul>
            </nav>
            <div class="copyright float-right">
              &copy;
              <script>
                document.write(new Date().getFullYear())
              </script>, made with <i class="material-icons">favorite</i> template by
              <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
            </div>
          </div>
        </footer>
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
    </script>


    <script>
    // js's advances
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
    
    //checkbox but failed, need advances
    jQuery('form').submit(function () {
        var sel = jQuery('input[type=checkbox]:checked').map(function (_, el) {
            return jQuery(el).parent().text().trim();
        }).get();
        var s = $('#s').val().trim();
        jQuery("#checkIt").val(sel.join()+ ',' + s);
    });
    </script>
    
    <script>
    // set date currently with js
      document.getElementById('today_date').value = new Date().toISOString().slice(0, 10); 
    </script>

    <script>
    // live search mold with ajax
    $(document).ready(function(){

      // load_data();

      function load_data(query)
      {
        // ajax as method
        $.ajax({
          url:"<?php echo base_url(); ?>pages/fetch",
          method:"POST",
          data:{query:query},
          success:function(data){
            $('#result').html(data);
          }
        })
      }
      $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
          load_data(search);
        }
        else
        {
          // if search box empty then reset
          var search2 = '';
          $('#result').html(search2);
        }
      });
    });
    </script>

    <script>
    function manual_input(that) {
      if (that.value == "show_input") {
        // alert("Input manual kondisi rak");
          document.getElementById("manual_input").style.display = "block";
          document.getElementById("condition2").focus();
      } else {
          document.getElementById("manual_input").style.display = "none";
      }
    }
    </script>
  </body>
</html>