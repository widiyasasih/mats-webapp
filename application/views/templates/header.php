<!doctype html>
<html lang="en">
  <head>
    <title>Mats Deschino Sport</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Fonts and icons -->
    <link rel="icon" type="image/ico" href="<?php echo base_url('assets/login/')?>images/icons/favicon.ico"/>
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Material Dashboard CSS -->
    <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.1')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/advances.css')?>" rel="stylesheet" />
  
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    
    <style type="text/css">
      .fulljustify {
        text-align:justify;
        text-justify: inter-word;
      }
      .fulljustify:after {
          content: "";
          display: inline-block;
          width: 100%;	
      }
      #tagline {
          height: 80px;
          overflow: hidden;
          line-height: 80px; 
      }
    </style>
  </head>
  <body class="">
    <div class="wrapper ">
      <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo base_url('assets/img/sidebar-1.jpg')?>">
        <div class="logo">
          <a href="#" class="simple-text logo-normal">
            MATS Deschino Sport
          </a>
          <div class="simple-text" style="text-transform:capitalize;"><small>- Material Monitoring System -</small></div>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item <?php if($this->uri->segment(1)==""){echo "active";}?> ">
              <a class="nav-link" href="<?php echo base_url('')?>">
                <i class="material-icons">dashboard</i>
                <p>Beranda</p>
              </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=="needs"){echo "active";}?>">
              <a class="nav-link " href="<?php echo site_url('needs')?>">
                <i class="material-icons">business_center</i>
                <p>Kebutuhan Bulanan</p>
              </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=="molds"){echo "active";}?>">
              <a class="nav-link" href="<?php echo base_url('molds')?>">
                <i class="material-icons">dns</i>
                <p>Rak Cetakan</p>
              </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=="resources"){echo "active";}?>">
              <a class="nav-link" href="<?php echo base_url('resources')?>">
                <i class="material-icons">eco</i>
                <p>Data Master</p>
              </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2)=="about"){echo "active";}?>">
              <a class="nav-link" href="<?php echo site_url('pages/about')?>">
                <i class="material-icons">info</i>
                <p>Tentang Sistem</p>
              </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2)=="faq"){echo "active";}?>">
              <a class="nav-link" href="<?php echo base_url('pages/faq')?>">
                <i class="material-icons">help</i>
                <p>FAQ</p>
              </a>
            </li>
            <?php if($this->session->userdata('user_level_id') == 1) : ?>
              <li class="nav-item <?php if($this->uri->segment(2)=="Users"){echo "active";}?>">
                <a class="nav-link" href="<?php echo base_url('admin')?>">
                  <i class="material-icons">people</i>
                  <p>Pengguna Mats</p>
                </a>
              </li>
            <?php endif;?>
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid" id="top">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="#pablo"><?= $title;?></a>
            </div>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button> -->
            <div class="collapse navbar-collapse justify-content-end">
              <div class="col-md-6">
                <?php if ($this->session->flashdata('user_registered')):?>
                  <?php echo '
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                    <b> Success - </b>'.$this->session->flashdata('user_registered').'
                    </span>
                </div>'?>
                <?php endif;?>
                <?php if ($this->session->flashdata('user_loggedin')):?>
                  <?php echo '
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                    <b> Success - </b>'.$this->session->flashdata('user_loggedin').'
                    </span>
                </div>'?>
                <?php endif;?>
              </div>
              <!-- <form class="navbar-form">
                <div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder="Search...">
                  <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                  </button>
                </div>
              </form> -->
              <ul class="navbar-nav breadcrumb">
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if($this->session->userdata('logged_in') && $this->session->userdata('user_id')) : ?>
                    <span>
                      <b style="color:green;"> <?php $level = $this->session->userdata('user_level'); echo $level.' - ';?> </b>
                    </span>
                    <?php endif;?>
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                      Akun
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Pengaturan</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url('users/logout');?>">Log out</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
       
      
      