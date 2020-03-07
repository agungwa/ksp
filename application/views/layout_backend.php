<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>KOPRASI DIGITAL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon"  href="<?=base_url()?>upload/koperasi.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/animate.css">
    <!-- data-table CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/data-table/bootstrap-table.css">
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/data-table/bootstrap-editable.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/normalize.css">
    <!-- charts C3 CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/c3.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet"  href="<?=base_url()?>assets/vendor/verticaldark/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<?php
$CI = &get_instance();
lookup();

?>
<body class="darklayout">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a  href="<?=base_url()?>assets/vendor/verticaldark/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Header top area start-->
    <div class="wrapper-pro">
        <div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                    
                <?php  
                if($this->session->userdata('foto')!='' && file_exists(FCPATH."assets/foto_users/".$this->session->userdata('foto'))){ //die('a');?>
                                
                    <a href="#">
                        <img alt="image" class="img-circle"
                                    src="<?=base_url()?>assets/foto_users/<?=$this->session->userdata('foto')?>"
                                    style="width: 45px;" />
                    </a>
                                <?php }else{ //die('b');?>
                    <a href="#">
                <img alt="image" class="img-circle" src="<?=base_url()?>assets/foto_users/icon_user.png" style="width: 45px;" />
                    </a>
                <?php } ?>
                    <h3><strong class="font-bold"><?=$this->session->userdata('fullname')?></strong></h3>
                    <p><?=$this->session->userdata('email')?></p>
                    <strong>KSP</strong>
                </div>
                <!-- menu -->

                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
                
            <!-- START MENU DASHBOARD -->
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Home</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="dashboard.html" class="dropdown-item">Dashboard</a>
                                <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                    <ul>
                                        <li> 
                                    <a href="#kosekdingen" class="dropdown-item">Dashboard v.1</a>
                                        </li>
                                </div>
                                <a href="#kosekdingen" class="dropdown-item">Dashboard v.2</a>
                            </div> 
                            
                        </li>
            
                        <li class="nav-item"><a href="<?=base_url()?>Anggota" class="nav-link dropdown-toggle"><i class="fa big-icon fa-edit"></i> <span class="mini-dn">Anggota</span></a>        
                        </li>
            <!-- END MENU DASHBOARD -->
            
            <!-- START MENU SIMPANAN -->
            <?php if(is_allow('M_SIMPANAN')): ?>
                    <?php if(is_allow('M_UTILITAS')): ?>
                        <li class="nav-item chart-left-menu-std animated flipInX"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-gears"></i> <span class="mini-dn">Utilitas Berjangka</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="left-menu-dropdown">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="mini-dn">Utilitas Simpanan</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                                    <ul class="left dropdown-menu  chart-left-menu-std animated flipInX" aria-labelledby="navbarDropdown">
                                        <li><a href="<?=base_url()?>Jenissetoran">Jenis Setoran</a></li>
                                        <li><a href="<?=base_url()?>Jenissimpanan">Jenis Simpanan</a></li>
                                        <li><a href="<?=base_url()?>Bungasimpanan">Bunga Simpanan</a></li>
                                        <li><a href="<?=base_url()?>Settingsimpanan">Setting Simpanan</a></li>
                                    </ul>
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mini-dn">Utilitas Pinjaman</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                                    <ul class="left dropdown-menu chart-left-menu-std animated flipInX" aria-labelledby="navbarDropdown">
                                        <li><a href="<?=base_url()?>Jenissetoran">Jenis Setoran</a></li>
                                        <li><a href="<?=base_url()?>Jenissimpanan">Jenis Simpanan</a></li>
                                        <li><a href="<?=base_url()?>Bungasimpanan">Bunga Simpanan</a></li>
                                        <li><a href="<?=base_url()?>Settingsimpanan">Setting Simpanan</a></li>
                                    </ul>
                                </li>
                            </ul>
                            
                        </li>
                    <?php endif; ?>
                        <li class="nav-item"><a href="<?=base_url()?>Simpanan" class="nav-link dropdown-toggle"><i class="fa big-icon fa-edit"></i> <span class="mini-dn">Simpanan</span></a>            
                        </li>

                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-exchange"></i> <span class="mini-dn">Mutasi</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown chart-left-menu-std animated flipInX">
                                <a href="<?=base_url()?>Wilayah">Tambah Wilayah / Resort</a>
                                <a href="<?=base_url()?>Wilayah_karyawan">Wilayah Karyawan</a>
                                <a href="<?=base_url()?>Mutasisimpanan">Mutasi Simpanan</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-bar-chart-o"></i> <span class="mini-dn">Data</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown chart-left-menu-std animated flipInX">
                                <a href="<?=base_url()?>simpanan/jatuhtempo">Data Jatuh Tempo</a>
                                <a href="<?=base_url()?>datarekening">Sirkulasi</a>
                            </div>
                        </li>
            <?php endif; ?>
            <!-- END MENU SIMPANAN -->

            <!-- START MENU SIMKESAN -->
            <?php if(is_allow('M_SIMKESAN')): ?>
                <?php if(is_allow('M_UTILITAS')): ?>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-gears"></i> <span class="mini-dn">Utilitas Simkesan</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown chart-left-menu-std animated flipInX">
                                <a href="<?=base_url()?>plansimkesan">Plan Simkesan</a>
                                <a href="<?=base_url()?>jenispenarikansimkesan">Jenis Penarikan Simkesan</a>
                                <a href="<?=base_url()?>jenisklaim">Jenis Klaim</a>
                            </div>
                        </li>
                <?php endif; ?>
                        <li class="nav-item"><a href="<?=base_url()?>Simkesan" class="nav-link dropdown-toggle"><i class="fa big-icon fa-edit"></i> <span class="mini-dn">Simkesan</span></a>            
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-exchange"></i> <span class="mini-dn">Mutasi</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown chart-left-menu-std animated flipInX">
                                <a href="<?=base_url()?>Wilayah">Tambah Wilayah / Resort</a>
                                <a href="<?=base_url()?>Wilayah_karyawan">Wilayah Karyawan</a>
                                <a href="<?=base_url()?>Mutasisimkesan">Mutasi Simkesan</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="<?=base_url()?>Datasimkesan" class="nav-link dropdown-toggle"><i class="fa big-icon fa-bar-chart-o"></i> <span class="mini-dn">Sirkulasi</span></a>            
                        </li>

             <?php endif; ?>
            <!-- END MENU SIMKESAN -->

            <!-- START MENU INVESTASI BERJANGKA -->
            <?php if(is_allow('M_INVESTASI')): ?>
                <?php if(is_allow('M_UTILITAS')): ?>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-gears"></i> <span class="mini-dn">Utilitas Investasiberjangka</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown chart-left-menu-std animated flipInX">
                                <a href="<?=base_url()?>jangkawaktuinvestasi">Jangka Waktu</a>
                                <a href="<?=base_url()?>jasainvestasi">Jasa Investasi</a>
                                <a href="<?=base_url()?>bungainvestasi">Bunga Investasi</a>
                            </div>
                        </li>
                <?php endif; ?>
                        <li class="nav-item"><a href="<?=base_url()?>Investasiberjangka" class="nav-link dropdown-toggle"><i class="fa big-icon fa-edit"></i> <span class="mini-dn">Investasiberjangka</span></a>            
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-exchange"></i> <span class="mini-dn">Mutasi</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown chart-left-menu-std animated flipInX">
                                <a href="<?=base_url()?>Wilayah">Tambah Wilayah / Resort</a>
                                <a href="<?=base_url()?>Wilayah_karyawan">Wilayah Karyawan</a>
                                <a href="<?=base_url()?>Mutasiberjangka">Mutasi Investasi</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="<?=base_url()?>datainvestasi" class="nav-link dropdown-toggle"><i class="fa big-icon fa-bar-chart-o"></i> <span class="mini-dn">Sirkulasi</span></a>            
                        </li>

             <?php endif; ?>
            <!-- END MENU INVESTASI BERJANGKA -->

            <!-- START MENU PINJAMAN -->
            <?php if(is_allow('M_PINJAMAN')): ?>
                <?php if(is_allow('M_UTILITAS')): ?>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-gears"></i> <span class="mini-dn">Utilitas Pinjaman</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown chart-left-menu-std animated flipInX">
                                <a href="<?=base_url()?>Settingkategoripeminjam">Setting Kategori Peminjam</a>
                                <a href="<?=base_url()?>Settingstatuspeminjam">Setting Status Peminjam</a>
                                <a href="<?=base_url()?>SettingAngsuran">Setting Angsuran</a>
                                <a href="<?=base_url()?>Bungapinjaman">Bunga Pinjaman</a>
                                <a href="<?=base_url()?>Potonganprovisi">Potongan Provisi</a>
                                <a href="<?=base_url()?>Jenisjaminan">Jenis Jaminan</a>
                                <a href="<?=base_url()?>Jenispelunasan">Jenis Pelunasan</a>
                                <a href="<?=base_url()?>Settingdenda">Setting Denda</a>
                            </div>
                        </li>
                <?php endif; ?>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-edit"></i> <span class="mini-dn">Pinjaman</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown chart-left-menu-std animated flipInX">
                                <a href="<?=base_url()?>pinjaman">Pinjaman</a>
                                <a href="<?=base_url()?>Statuspeminjam">Status Peminjam</a>
                                <a href="<?=base_url()?>angsuran/?p=2">Angsuran</a>
                                <a href="<?=base_url()?>angsuranbayar">Angsuran Bayar</a>
                                <a href="<?=base_url()?>penagihan">Penagihan</a>
                                <a href="<?=base_url()?>Pelunasan">Pelunasan</a>
                                <a href="<?=base_url()?>Persentase">Persentase</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-exchange"></i> <span class="mini-dn">Mutasi</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown chart-left-menu-std animated flipInX">
                                <a href="<?=base_url()?>Wilayah">Tambah Wilayah / Resort</a>
                                <a href="<?=base_url()?>Wilayah_karyawan">Wilayah Karyawan</a>
                                <a href="<?=base_url()?>Mutasipinjaman">Mutasi Pinjaman</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="<?=base_url()?>Datapinjaman" class="nav-link dropdown-toggle"><i class="fa big-icon fa-bar-chart-o"></i> <span class="mini-dn">Sirkulasi</span></a>            
                        </li>

             <?php endif; ?>
            <!-- END MENU PINJAMAN -->
            
            <!-- START MENU NERACA -->
            <?php if(is_allow('M_LAPORAN')): ?>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-gears"></i> <span class="mini-dn">Neraca</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown chart-left-menu-std animated flipInX">
                                <a href="<?=site_url('phu')?>">Biaya PHU</a>
                                <a href="<?=site_url('neraca/perhitungan/')?>">Hitung SHU/Bulan</a>
                                <a href="<?=site_url('neracakasbank/')?>">Input Kas Bank</a>
                                <a href="<?=site_url('neracaaktivatetap/')?>">Input Aktiva Tetap</a>
                                <a href="<?=base_url()?>neracaekuitas/">Input Ekuitas</a>
                                <a href="<?=base_url()?>neracakewajibanjangkapanjang/">Input Kewajiban Jangka Panjang</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="<?=base_url()?>neraca/neraca" class="nav-link dropdown-toggle"><i class="fa big-icon fa-edit"></i> <span class="mini-dn">Investasiberjangka</span></a>            
                        </li>
             <?php endif; ?>
            <!-- END MENU NERACA -->
            
            <!-- START MENU NERACA SIMKESAN -->
            <!-- END MENU NERACA SIMKESAN -->
            
            <!-- START MENU KARYAWAN -->
            <!-- END MENU KARYAWAN -->
            
            <!-- START MENU KASIR -->
            <!-- END MENU KASIR -->
            
            <!-- START MENU USER MANAGEMENT -->
            <!-- END MENU USER MANAGEMENT -->
            
            <!-- START MENU SISTEM -->
            <!-- END MENU SISTEM -->





                    </ul>
                </div>
            </nav>
        </div>

                <!-- -->
        <div class="content-inner-all">
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="admin-logo logo-wrap-pro">
                                    <a href="#"><img src="<?=base_url()?>assets/vendor/verticaldark/img/logo/log.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                                <div class="header-top-menu tabl-d-n" >
                    <ul class="navbar-nav mr-auto nav navbar-nav mai-top-nav header-right-menu">
                        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Link</a></li>
                        <li class="dropdown"><span></i><a class="dropdown-toggle fa big-icon fa-gears" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mini-dn">Utilitas Pinjaman</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="left-menu-dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2</a>
                                <ul class="dropdown-menu  chart-left-menu-std animated flipInX" aria-labelledby="navbarDropdown">
                                
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="left-menu-dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2</a>
                                <ul class="dropdown-menu  chart-left-menu-std animated flipInX" aria-labelledby="navbarDropdown">
                                
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                </ul>
                            </li>
                            </ul>
                        </li>
                        <li><a href="#">Service</a></li>
                    </ul>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item dropdown">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="adminpro-icon adminpro-chat-pro"></span><span class="indicator-ms"></span></a>
                                            <div role="menu" class="author-message-top dropdown-menu animated flipInX">
                                                <div class="message-single-top">
                                                    <h1>Message</h1>
                                                </div>
                                                <ul class="message-menu">
                                                    <li>
                                                        <a href="#">
                                                            <div class="message-img">
                                                                <img src="<?=base_url()?>assets/vendor/verticaldark/img/message/1.jpg" alt="">
                                                            </div>
                                                            <div class="message-content">
                                                                <span class="message-date">05 Maret</span>
                                                                <h2>Pandu</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="message-img">
                                                                <img src="<?=base_url()?>assets/vendor/verticaldark/img/message/2.jpg" alt="">
                                                            </div>
                                                            <div class="message-content">
                                                                <span class="message-date">16 Sept</span>
                                                                <h2>Victor Jara</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="message-view">
                                                    <a href="#">View All Messages</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                            <div role="menu" class="notification-author dropdown-menu animated flipInX">
                                                <div class="notification-single-top">
                                                    <h1>Notifications</h1>
                                                </div>
                                                <ul class="notification-menu">
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <span class="adminpro-icon adminpro-checked-pro"></span>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Pandu</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <span class="adminpro-icon adminpro-cloud-computing-down"></span>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Sulaiman din</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <span class="adminpro-icon adminpro-shield"></span>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Victor Jara</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <span class="adminpro-icon adminpro-analytics-arrow"></span>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Victor Jara</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="notification-view">
                                                    <a href="#">View All Notification</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                                <span class="admin-name"><?=$this->session->userdata('fullname')?></span>
                                                <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                                <li><a href="#"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>My Account</a>
                                                </li>
                                                <li><a href="#"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>My Profile</a>
                                                </li>
                                                <li><a href="<?=base_url()?>auth/logout"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-tasks"></i></a>

                                            <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated flipInX">
                                                <ul class="nav nav-tabs custon-set-tab">
                                                    <li class="active"><a data-toggle="tab" href="#Notes">Notes</a>
                                                    </li>
                                                    <li><a data-toggle="tab" href="#Projects">Projects</a>
                                                    </li>
                                                    <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">
                                                    <div id="Notes" class="tab-pane fade in active">
                                                        <div class="notes-area-wrap">
                                                            <div class="note-heading-indicate">
                                                                <h2><i class="fa fa-comments-o"></i> Latest Notes</h2>
                                                                <p>You have 10 new message.</p>
                                                            </div>
                                                            <div class="notes-list-area notes-menu-scrollbar">
                                                                <ul class="notes-menu-list">
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="<?=base_url()?>assets/vendor/verticaldark/img/notification/5.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="Projects" class="tab-pane fade">
                                                        <div class="projects-settings-wrap">
                                                            <div class="note-heading-indicate">
                                                                <h2><i class="fa fa-cube"></i> Latest projects</h2>
                                                                <p> You have 20 projects. 5 not completed.</p>
                                                            </div>
                                                            <div class="project-st-list-area project-st-menu-scrollbar">
                                                                <ul class="projects-st-menu-list">
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="project-list-flow">
                                                                                <div class="projects-st-heading">
                                                                                    <h2>Wordpress Theme</h2>
                                                                                    <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                    <span class="project-st-time">9 hours ago</span>
                                                                                </div>
                                                                                <div class="projects-st-content project-rating-cl2">
                                                                                    <p>Completion with: 38%</p>
                                                                                    <div class="progress progress-mini">
                                                                                        <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                                                                                    </div>
                                                                                    <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="Settings" class="tab-pane fade">
                                                        <div class="setting-panel-area">
                                                            <div class="note-heading-indicate">
                                                                <h2><i class="fa fa-gears"></i> Settings Panel</h2>
                                                                <p> You have 20 Settings. 5 not completed.</p>
                                                            </div>
                                                            <ul class="setting-panel-list">
                                                                
                                                                <li>
                                                                    <div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2>Global search</h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example6">
                                                                                    <label class="onoffswitch-label" for="example6">
                                                                                        <span class="onoffswitch-inner"></span>
                                                                                        <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2>Offline users</h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example5">
                                                                                    <label class="onoffswitch-label" for="example5">
                                                                                        <span class="onoffswitch-inner"></span>
                                                                                        <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header top area end-->
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <h2>Thanks for Visits</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            
            <!-- Breadcome start-->
            <div class="breadcome-area des-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <h2>Thanks for Visits</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            <!-- welcome Project, sale area start-->
            
            <!-- welcome Project, sale area start-->
            <!-- stockprice, feed area start-->
            
            <!-- stockprice, feed area end-->
            <!-- Data table area Start-->
            
            <!-- Data table area End-->
    <!-- Footer Start-->
    

    <div class="wrapper wrapper-pro mg-b-15">
                <div class="table-responsive">
                    <?php $this->load->view($content);?>
                </div>
    </div>

    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright &#169; 2019 <a href="https://agungw.net"><?=data_app('RIGHT_FOOTER');?> , <?=data_app('LEFT_FOOTER');?></a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
    <!-- Chat Box Start-->
    <div class="chat-list-wrap">
        <div class="chat-list-adminpro">
            <div class="chat-button">
                <span data-toggle="collapse" data-target="#chat" class="chat-icon-link"><i class="fa fa-comments"></i></span>
            </div>
            <div id="chat" class="collapse chat-box-wrap shadow-reset animated zoomInLeft">
                <div class="chat-main-list">
                    <div class="chat-heading">
                        <h2>Messanger</h2>
                    </div>
                    <div class="chat-content chat-scrollbar">
                        <div class="author-chat">
                            <h3>Monica <span class="chat-date">10:15 am</span></h3>
                            <p>Hi, what you are doing and where are you gay?</p>
                        </div>
                        <div class="client-chat">
                            <h3>Mamun <span class="chat-date">10:10 am</span></h3>
                            <p>Now working in graphic design with coding and you?</p>
                        </div>
                        <div class="author-chat">
                            <h3>Monica <span class="chat-date">10:05 am</span></h3>
                            <p>Practice in programming</p>
                        </div>
                        <div class="client-chat">
                            <h3>Mamun <span class="chat-date">10:02 am</span></h3>
                            <p>That's good man! carry on...</p>
                        </div>
                    </div>
                    <div class="chat-send">
                        <input type="text" placeholder="Type..." />
                        <span><button type="submit">Send</button></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Chat Box End-->
    <!-- jquery
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/counterup/waypoints.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/counterup/counterup-active.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/peity/jquery.peity.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/flot/jquery.flot.spline.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/flot/jquery.flot.resize.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/flot/Chart.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/flot/flot-active.js"></script>
    <!-- map JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/map/raphael.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/map/jquery.mapael.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/map/france_departments.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/map/world_countries.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/map/usa_states.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/map/map-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/data-table/bootstrap-table.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/data-table/tableExport.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/data-table/data-table-active.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/data-table/bootstrap-editable.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?=base_url()?>assets/vendor/verticaldark/js/main.js"></script>

    
    <script>
    $(document).ready(function() {

        // $('input.timepicker').timepicker({ timeFormat: 'h:mm'});
        $('input.datepicker').datepicker({
            dateFormat: 'yy/mm/dd'
        });
        // $('input.datepicker-ym').datepicker({ dateFormat: 'mm/yy'});


    });
    </script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.data').DataTable();
		});
	</script>

    <script>
    var today = new Date();
    var dd = ("0" + (today.getDate())).slice(-2);
    var mm = ("0" + (today.getMonth() + 1)).slice(-2);
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    $("#todays-date,#todays-date1,#todays-date2").attr("value", today)

    function rubah(angka){
    var reverse = angka.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
            }

                function setEventId(event_id){
                document.querySelector("#event_id").innerHTML = event_id;
            }

(function($){
	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	  if (!$(this).next().hasClass('show')) {
		$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	  }
	  var $subMenu = $(this).next(".dropdown-menu");
	  $subMenu.toggleClass('show');

	  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		$('.dropdown-submenu .show').removeClass("show");
	  });

	  return false;
	});
})(jQuery)

    </script>
</body>

</html>