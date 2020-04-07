<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=data_app()?></title>
    <link rel="icon" href="<?=base_url()?>upload/koperasi.png" type="image/png">
    <link href="<?=base_url()?>assets/vendor/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/sweetalert/css/sweetalert.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?=base_url()?>assets/vendor/inspinia/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    
    <!-- Input Mask-->
    <link href="<?=base_url()?>assets/vendor/inspinia/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <!-- Morris -->
    <link href="<?=base_url()?>assets/vendor/inspinia/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/datepicker/css/datepicker3.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/inspinia/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/inspinia/css/style.css" rel="stylesheet">
    <!-- Form -->
    <link href="<?=base_url()?>assets/vendor/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
   
    
    <link href="<?=base_url()?>assets/vendor/inspinia/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <!-- <link href="<?=base_url()?>assets/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>  -->

    <script src="<?=base_url()?>assets/vendor/inspinia/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/rupiah/my.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/bootstrap.min.js"></script>
    <style>
    html {
        height: 100% !important;
    }

    body {
        height: 100% !important;
        padding-bottom: 30px;
    }

    .footer {
        position: fixed;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .table-condensed {
        font-size: 13px;
    }
    </style>
</head>
<?php
$CI = &get_instance();
lookup();

?>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <?php  if($this->session->userdata('foto')!='' && file_exists(FCPATH."assets/foto_users/".$this->session->userdata('foto'))){ //die('a');?>
                                <img alt="image" class="img-circle"
                                    src="<?=base_url()?>assets/foto_users/<?=$this->session->userdata('foto')?>"
                                    style="width: 45px;" />
                                <?php }else{ //die('b');?>
                                <img alt="image" class="img-circle" src="<?=base_url()?>assets/foto_users/icon_user.png"
                                    style="width: 45px;" />
                                <?php } ?>
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold"><?=$this->session->userdata('fullname')?></strong>
                                    </span> <span class="text-muted text-xs block">Tentang <b class="caret"></b></span>
                                </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="#"><?=$this->session->userdata('email')?></a></li>
                                <li><a href="#"><?=$this->session->userdata('telp')?></a></li>
                                <li class="divider"></li>
                                <li><a href="<?=base_url()?>auth/logout">Keluar</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            KSP
                        </div>
                    </li>
                    <li><a href="<?=base_url()?>backend"><i class="fa fa-th-large"></i> <span
                                class="nav-label">Dashboard</span><span
                                class="label label-primary pull-right"></span></a></li>

                                <?php if(is_allow('M_LAPORAN')): ?>
                    <li><a href="<?=base_url()?>cart"><i class="fa fa-bar-chart-o"></i> <span
                                class="nav-label">Chart</span><span
                                class="label label-primary pull-right"></span></a></li>
                  
                                <?php endif; ?>

                    <!-- MENU SIMPANAN BERJANGKA -->

                    <li class="">
                        <?php if(is_allow('M_SIMPANAN')): ?>
                        <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Simpanan
                                Berjangka</span> <span class="fa arrow"></span></a>
                        <?php endif; ?>
                        <ul class="nav nav-second-level">
                            <?php if(is_allow('M_UTILITAS')): ?>
                            <li>
                                <a href="#" id="damian">Utilitas Simpanan <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>Jenissetoran">Jenis Setoran</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Jenissimpanan">Jenis Simpanan</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Bungasimpanan">Bunga Simpanan</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Settingsimpanan">Setting Simpanan</a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>

                            <li>
                                <a href="#" id="damian">Rekap<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                <li>
                                        <a href="<?=base_url()?>Kasbon/?p=2">Kas Bon</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Lainlain/setupinput/?active=2">Lain-lain</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Tunai/?p=2">Rekap Simpanan</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="<?=base_url()?>Anggota">Setup Anggota</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>Simpanan">Simpanan</a>
                            </li>
                            <li>
                                <a href="#" id="damian">Mutasi<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>Wilayah">Tambah Wilayah / Resort</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Wilayah_karyawan">Wilayah Karyawan</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Mutasisimpanan">Mutasi Simpanan</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" id="damian">Data<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>simpanan/jatuhtempo">Data Jatuh Tempo</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>datarekening">Sirkulasi</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- MENU SIMKESAN -->

                    <li class="">
                        <?php if(is_allow('M_SIMKESAN')): ?>
                        <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Simkesan</span> <span
                                class="fa arrow"></span></a>
                        <?php endif; ?>
                        <ul class="nav nav-second-level">

                            <?php if(is_allow('M_SIMKESAN')): ?>
                            <li>
                                <a href="#" id="damian">Utilitas Simkesan<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>plansimkesan">Plan Simkesan</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>jenispenarikansimkesan">Jenis Penarikan Simkesan</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>jenisklaim">Jenis Klaim</a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?=base_url()?>Anggota">Setup Anggota</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>Simkesan">Simkesan</a>
                            </li>
                            <li>
                                <a href="#" id="damian">Mutasi<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>Wilayah">Tambah Wilayah / Resort</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Wilayah_karyawan">Wilayah Karyawan</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Mutasisimkesan">Mutasi Simkesan</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?=base_url()?>Simkesandata" id="damian">Data Simkesan</a>

                            </li>
                            <li><a href="<?=base_url()?>Datasimkesan">Sirkulasi</a></li>
                        </ul>
                    </li>

                    <!-- MENU INVESTASI BERJANGKA -->

                    <li class="">
                        <?php if(is_allow('M_INVESTASI')): ?>
                        <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Investasi</span> <span class="fa arrow"></span></a>
                        <?php endif; ?>
                        <ul class="nav nav-second-level">
                            <?php if(is_allow('M_UTILITAS')): ?>
                            <li>
                                <a href="#" id="damian">Utilitas Investasi <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>jangkawaktuinvestasi">Jangka Waktu</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>jasainvestasi">Jasa Investasi</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>bungainvestasi">Bunga Investasi</a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?=base_url()?>Anggota">Setup Anggota</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>Investasiberjangka">Investasi</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>Penarikaninvestasiberjangka">Penarikan Jasa</a>
                            </li>
                            <li>
                                <a href="#" id="damian">Mutasi<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>Wilayah">Tambah Wilayah / Resort</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Wilayah_karyawan">Wilayah Karyawan</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Mutasiberjangka">Mutasi Investasi</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" id="damian">Data<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>datainvestasi">Sirkulasi</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- MENU PINJAMAN -->

                    <li class="">
                        <?php if(is_allow('M_PINJAMAN')): ?>
                        <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Pinjaman</span> <span
                                class="fa arrow"></span></a>
                        <?php endif; ?>
                        <ul class="nav nav-second-level">
                            <?php if(is_allow('M_UTILITAS')): ?>
                            <li>
                                <a href="#" id="damian">Utilitas Pinjaman<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>Settingkategoripeminjam">Setting Kategori Peminjam</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Settingstatuspeminjam">Setting Status Peminjam</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>SettingAngsuran">Setting Angsuran</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Bungapinjaman">Bunga Pinjaman</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Potonganprovisi">Potongan Provisi</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Jenisjaminan">Jenis Jaminan</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Jenispelunasan">Jenis Pelunasan</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Settingdenda">Setting Denda</a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?=base_url()?>Anggota">Setup Anggota</a>
                            </li>
                            <li><a href="<?=base_url()?>pinjaman">Pinjaman</a></li>
                            <li><a href="<?=base_url()?>Statuspeminjam">Status Peminjam</a></li>
                            <li>
                            <li><a href="<?=base_url()?>angsuran/?p=2">Angsuran</a></li>
                            <li><a href="<?=base_url()?>angsuranbayar">Angsuran Bayar</a></li>
                            <li><a href="<?=base_url()?>penagihan">Penagihan</a></li>
                            <li><a href="<?=base_url()?>Pelunasan">Pelunasan</a></li>
                            <li><a href="<?=base_url()?>Persentase">Persentase</a></li>
                            <li>
                                <a href="#" id="damian">Mutasi<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>Wilayah">Tambah Wilayah / Resort</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Wilayah_karyawan">Wilayah Karyawan</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Mutasipinjaman">Mutasi Pinjaman</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" id="damian">Data / Laporan<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>Datapinjaman">Sirkulasi</a>
                                    </li>


                                </ul>
                            </li>

                        </ul>
                    </li>

                    <!-- MENU NERACA -->
                    <li class="">
                        <?php if(is_allow('M_LAPORAN')): ?>
                        <a href="index.html"><i class="fa fa-list"></i> <span class="nav-label">Neraca</span> <span
                                class="fa arrow"></span></a>
                        <?php endif; ?>
                        <ul class="nav nav-second-level">
                            <li><a href="<?=site_url('phu')?>">Biaya PHU</a></li>
                        </ul>
                        <ul class="nav nav-second-level">
                            <li><a href="<?=site_url('neraca/perhitungan/')?>">Hitung SHU/Bulan</a></li>
                        </ul>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" id="damian">Input Aktiva<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="<?=site_url('neracakasbank/')?>">Input Kas Bank</a></li>
                                    <li><a href="<?=site_url('neracaaktivatetap/')?>">Input Aktiva Tetap</a></li>
                                </ul>
                            </li>
                            <li>
                        </ul>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" id="damian">Input Pasiva<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>neracaekuitas/">Neraca Ekuitas</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>neracakewajibanjangkapanjang/">Kewajiban Jangka
                                            Panjang</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav nav-second-level">
                            <li><a href="<?=site_url('neraca/neraca')?>">Neraca</a></li>
                        </ul>
                    </li>
                    </li>

                    <!-- MENU NERACA SIMKESAN -->
                    <li class="">
                        <?php if(is_allow('M_LAPORAN')): ?>
                        <a href="index.html"><i class="fa fa-list"></i> <span class="nav-label">Neraca Simkesan</span>
                            <span class="fa arrow"></span></a>
                        <?php endif; ?>
                        <ul class="nav nav-second-level">
                            <li><a href="<?=site_url('phusimkesan')?>">Biaya PHU Simkesan</a></li>
                        </ul>
                        <ul class="nav nav-second-level">
                            <li><a href="<?=site_url('datasimkesan/hitungphu/')?>">Hitung SHU/Bulan</a></li>
                        </ul>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" id="damian">Input Aktiva<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="<?=site_url('neracakasbanksimkesan/')?>">Input Kas Bank</a></li>
                                </ul>
                            </li>
                            <li>
                        </ul>
                        <ul class="nav nav-second-level">
                            <li><a href="<?=site_url('datasimkesan/neraca')?>">Neraca Simkesan</a></li>
                        </ul>
                    </li>
                    </li>

                    <!-- MENU KASIR -->
                        <?php if(is_allow('M_KASIR')): ?>
                    <li class="">
                        
                        <a href="index.html"><i class="fa fa-money"></i> <span class="nav-label">KASIR</span>
                            <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?=base_url()?>kasbon/create">Input Kasbon</a></li>
                            <li>
                                <a href="<?=base_url()?>Lainlain/setupinput/?active=6">Input Lain-lain</a>
                            </li>
                            <li><a href="<?=base_url()?>tunai_kasir/input_tunai">Input Tunai</a></li>
                            <li><a href="<?=base_url()?>Tunai/?p=4">KAS</a></li>
                            <!-- <li>
                                <a href="#" id="damian">Tunai<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>tunai_kasir/input_tunai">Tunai Masuk</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>penggajianmarketing">Tunai Keluar</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="<?=base_url()?>tunai">KAS</a></li> -->
                        </ul>
                    </li>
                        <?php endif; ?>

                    <!-- MENU KARYAWAN -->
                    <li class="">
                        <?php if(is_allow('M_USER')): ?>
                        <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">KARYAWAN</span> <span
                                class="fa arrow"></span></a>
                        <?php endif; ?>
                        <ul class="nav nav-second-level">
							<li>
                                <a href="#" id="damian">Utilitas Karyawan<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>karyawanijasah">Jaminan</a>
                                    </li>
                                    
                                </ul>
                            </li>
							
							<li>
                                <a href="#" id="damian">Penggajian Karyawan<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?=base_url()?>penggajianmarketing">Marketing</a>
                                    </li>
                                    
                                </ul>
                            </li>
							
                            <li><a href="<?=base_url()?>jabatan">Jabatan</a></li>
                            <li><a href="<?=base_url()?>wilayah">Wilayah</a></li>
                            <li><a href="<?=base_url()?>karyawan">Karyawan</a></li>
                            <li><a href="<?=base_url()?>wilayah_karyawan">Wilayah Karyawan</a></li>
                        </ul>
                    </li>

                    <!-- MENU USER MANAGEMENT -->
                    <li class="">
                        
                        <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">MANAJEMEN USER</span>
                            <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        <?php if(is_allow('M_SISTEM')): ?>
                            <li><a href="<?=base_url()?>users">Users</a></li>
                            <li><a href="<?=base_url()?>user_group">User Group</a></li>
                            <?php endif; ?>
                            <?php if(is_allow('M_MANAGER')): ?>
                            <li><a href="<?=base_url()?>user_access">User Access</a></li>
                            <?php endif; ?>
                            <?php if(is_allow('M_SISTEM')): ?>
                            <li><a href="<?=base_url()?>master_access">Master Access</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    

                    <!-- MENU SISTEM UTILITAS -->
                    <li class="">
                        <?php if(is_allow('M_SISTEM')): ?>
                        <a href="index.html"><i class="fa fa-wrench"></i> <span class="nav-label">Sistem</span> <span
                                class="fa arrow"></span></a>
                        <?php endif;  ?>
                        <?php //die($this->db->last_query());  ?>
                        <ul class="nav nav-second-level">
                        <li><a href="<?=base_url()?>Tempsetoransimpanan">Hitung Temp SS</a></li>
                            <li><a href="<?=base_url()?>sy_config">Konfigurasi</a></li>
                            <li><a target="_link" href="<?=base_url()?>sfgen">Generator</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                  
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message"><?=data_app('APP_NAME')?>,
                                <?=data_app('OPD_NAME')?></span>
                        </li>

                        <li>
                            <a href="<?=base_url() . 'auth/logout'?>">
                                <i class="fa fa-sign-out"></i> Keluar
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>


            <div class="wrapper wrapper-content">
                <div class="table-responsive">
                    <?php $this->load->view($content);?>
                </div>
            </div>

        </div>
        <div class="footer">
            <div class="pull-right">
                <?=data_app('RIGHT_FOOTER');?>
            </div>
            <div>
                <?=data_app('LEFT_FOOTER');?>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->

    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/curvedLines.js"></script>
 
    <!-- Morris -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/morris/morris.js"></script>

    <!-- Peity -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js">
    </script>
    <script src="<?=base_url()?>assets/vendor/sweetalert/js/sweetalert.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Sparkline -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/demo/sparkline-demo.js"></script>
    <!-- Input Mask-->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- ChartJS-->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/chartJs/Chart.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/toastr/toastr.min.js"></script>
    <script src="<?=base_url()?>assets/js/sf.js"></script>

    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/dataTables/datatables.min.js"></script>

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
			$('.data').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    //{extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]}
            );
            var table = $('.data').DataTable();
            $('#next').on( 'click', function () {
                table.page( 'next' ).draw( 'page' );
            } );
            
            $('#previous').on( 'click', function () {
                table.page( 'previous' ).draw( 'page' );
            } );
		});
	</script>

    <script>
    var today = new Date();
    var dd = ("0" + (today.getDate())).slice(-2);
    var mm = ("0" + (today.getMonth() + 1)).slice(-2);
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    $("#todays-date,#todays-date1,#todays-date2").attr("value", today)

    //back function
    $(".hBack").on("click", function(e){
    e.preventDefault();
    window.history.back();
});


    function rubah(angka){
   var reverse = angka.toString().split('').reverse().join(''),
   ribuan = reverse.match(/\d{1,3}/g);
   ribuan = ribuan.join('.').split('').reverse().join('');
   return ribuan;
 }

    function setEventId(event_id){
    document.querySelector("#event_id").innerHTML = event_id;
}

    </script>
</body>

</html>