<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>APP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

   <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>CALEG</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b></b>APP</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- Notifications: style can be found in dropdown.less -->

              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= base_url('assets/') ?>dist/img/relawan.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"> <?=  ucfirst($this->session->username) ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?= base_url('assets/') ?>dist/img/relawan.png" class="img-circle" alt="User Image">

                    <p>
                     <?= ucfirst($this->session->username) ?>
                     <?php 

                     $kode_caleg = $this->session->kode;
                     $dapil = $this->db->get_where('tbl_caleg', ['kode' => $kode_caleg])->row_array();
                     
                     if ($dapil['dapil'] == 'DP-01') {
                      $dp = 'Dapil 1';
                    }elseif ($dapil['dapil'] == 'DP-02') {
                      $dp = 'Dapil 2';
                    }elseif ($dapil['dapil'] == 'DP-03') {
                      $dp = 'Dapil 3';
                    }elseif ($dapil['dapil'] == 'DP-04') {
                      $dp = 'Dapil 4';
                    }elseif ($dapil['dapil'] == 'DP-05') {
                      $dp = 'Dapil 5';
                    }else{
                     $dp = 'Dapil 6';
                   }
                   ?>
                   <small>
                    <?php 
                    if ($this->session->relawan == true) {
                      echo "Relawan - ";
                    }else{
                      echo "Caleg - ";
                    }
                    ?>
                    <?= $dp ?>

                  </small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                 <?php 
                 if ($this->session->relawan == true) {
                  ?>
                  <a href="<?= base_url('login/logout_relawan') ?>" class="btn btn-default btn-flat">Sign out</a>
                <?php }else{ ?>
                 <a href="<?= base_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
               <?php } ?>
             </div>
           </li>
         </ul>
       </li>
       <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?= base_url('assets/') ?>dist/img/relawan.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?= ucfirst($this->session->username) ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?= base_url('relawan/app') ?>"><i class="fa fa-circle-o"></i>Home</a></li>
                <!--  <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li> -->
              </ul>
            </li>

            <li><a href="<?= base_url('relawan/pemilih') ?>"><i class="fa fa-users"></i> <span>Data Pemilih</span></a></li>
            <li><a href="<?= base_url('relawan/wilayah_kerja') ?>"><i class="fa fa-map"></i> <span>Wilayah</span></a></li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <!--  <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section> -->