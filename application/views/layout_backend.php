<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=data_app()?></title>

    <link href="<?=base_url()?>assets/vendor/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/sweetalert/css/sweetalert.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?=base_url()?>assets/vendor/inspinia/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Morris -->
    <link href="<?=base_url()?>assets/vendor/inspinia/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/datepicker/css/datepicker3.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/inspinia/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/inspinia/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/radiocheck/radiocheck.css" rel="stylesheet">
<script src="<?=base_url()?>assets/vendor/inspinia/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/bootstrap.min.js"></script>
    <style>
  html { height: 100% !important; }
  body { height: 100% !important; padding-bottom: 30px; }
  .footer { position: fixed; left: 0; right: 0; bottom: 0; }
   .table-condensed{
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
                            <img alt="image" class="img-circle" src="<?=base_url()?>assets/foto_users/<?=$this->session->userdata('foto')?>" style="width: 45px;" />
                        <?php }else{ //die('b');?>
                            <img alt="image" class="img-circle" src="<?=base_url()?>assets/foto_users/icon_user.png" style="width: 45px;" />
                        <?php } ?>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$this->session->userdata('fullname')?></strong>
                             </span> <span class="text-muted text-xs block">Tentang <b class="caret"></b></span> </span> </a>
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
                <li><a href="<?=base_url()?>backend" ><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span><span class="label label-primary pull-right"></span></a></li>
               <!--  
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="#" id="damian">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>

                            </ul>
                        </li>
                        <li><a href="#">Second Level Item</a></li>
                        <li>
                            <a href="#">Second Level Item</a></li>
                        <li>
                            <a href="#">Second Level Item</a></li>
                    </ul>
                </li> -->

            

                <!-- MENU SIMPANAN BERJANGKA -->
                
                <li class="">
                    <?php if(is_allow('M_USER')): ?>
                    <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Simpanan Berjangka</span> <span class="fa arrow"></span></a>
                <?php endif; ?>
                    <ul class="nav nav-second-level">
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
                    <li>
                            <a href="#" id="damian">Set Up <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="<?=base_url()?>Anggota">Anggota</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>penarikansimpananwajib">Tarik Simpanan Wajib</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>setoransimpananwajib">Setoran Simpanan Wajib</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=base_url()?>Simpanan">Simpanan</a>
                        </li>
                        <li><a href="<?=base_url()?>Setoransimpanan">Setoran</a></li>
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
                        <li><a href="<?=base_url()?>Penarikansimpanan">Tarik Simpanan</a></li>
                        <li>
                            <a href="#" id="damian">Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Data Jatuh Tempo</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>simpanan">Data Rekening</a>
                                </li>
                                <li>
                                    <a href="#">Neraca / Sirkulasi</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- MENU SIMKESAN -->

                <li class="">
                    <?php if(is_allow('M_USER')): ?>
                    <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Simkesan</span> <span class="fa arrow"></span></a>
                <?php endif; ?>
                    <ul class="nav nav-second-level">
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
                        <li>
                            <a href="#" id="damian">Set Up <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="<?=base_url()?>Anggota">Anggota</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>penarikansimpananwajib">Tarik Simpanan Wajib</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>setoransimpananwajib">Setoran Simpanan Wajib</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>ahliwarissimkesan">Ahli Waris Simkesan</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=base_url()?>Simkesan">Simkesan</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>setoransimkesan" id="damian">Setoran Simkesan</a>
                        <li>
                            <a href="#" id="damian">Klaim<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="<?=base_url()?>Klaimsimkesan">Klaim Rawat Inap</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>Klaimsimkesan">Klaim Santunan Duka</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=base_url()?>penarikansimkesan" id="damian">Penarikan</a>
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
                            <a href="#" id="damian">Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Terlambat Jatuh Tempo</a>
                                </li>
                                <li>
                                    <a href="#">Rekening Simkesan Hangus</a>
                                </li>
                                <li>
                                    <a href="#">Simkesan Lunas </a>
                                </li>
                                <li>
                                    <a href="#">Simkesan Masa Berakhir</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Neraca / Sirkulasi</a></li>
                    </ul>
                </li>

                <!-- MENU INVESTASI BERJANGKA -->
                
                <li class="">
                    <?php if(is_allow('M_USER')): ?>
                    <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Investasi Berjangka</span> <span class="fa arrow"></span></a>
                <?php endif; ?>
                    <ul class="nav nav-second-level">
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
                    <li>
                            <a href="#" id="damian">Set Up <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="<?=base_url()?>Anggota">Anggota</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>penarikansimpananwajib">Tarik Simpanan Wajib</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>setoransimpananwajib">Setoran Simpanan Wajib</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>Investasiberjangka">Investasi Berjangka</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=base_url()?>Investasiberjangka">Investasi Berjangka</a>
                        </li>
                        <li><a href="<?=base_url()?>Penarikaninvestasiberjangka">Penarikan Jasa</a></li>
                        <li><a href="<?=base_url()?>Keuntunganinvestasi">Keuntungan Investasi</a></li>
                        <li><a href="<?=base_url()?>Tutupinvestasiberjangka">Tutup Investasi Berjangka</a></li>                        
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
                                    <a href="#">Data Investasi</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- MENU PINJAMAN -->

                <li class="">
                    <?php if(is_allow('M_USER')): ?>
                    <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Pinjaman</span> <span class="fa arrow"></span></a>
                <?php endif; ?>
                    <ul class="nav nav-second-level">
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
                                    <a href="<?=base_url()?>Settingdenda">Setting Denda</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" id="damian">Set Up <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="<?=base_url()?>Anggota">Anggota</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>penarikansimpananwajib">Tarik Simpanan Wajib</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>setoransimpananwajib">Setoran Simpanan Wajib</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>Jaminan">Jaminan</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>penjamin">Penjamin</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?=base_url()?>pinjaman">Pinjaman</a></li>
                        <li><a href="<?=base_url()?>Statuspeminjam">Status Peminjam</a></li>
                        <li>
                        <li><a href="<?=base_url()?>angsuran">Angsuran</a></li>
                        <li><a href="<?=base_url()?>penagihan">Penagihan</a></li>
                        <li><a href="<?=base_url()?>Pelunasan">Pelunasan</a></li>
                        <li><a href="#">Persentase</a></li>
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
                                    <a href="#">Data Pinjaman</a>
                                </li>
                                <li>
                                    <a href="#">Neraca / Sirkulasi</a>
                                </li>
                                
                            </ul>
                        </li>
                       
                    </ul>
                </li>

                <!-- MENU NERACA -->
                <li class="">
                    <?php if(is_allow('M_LAPORAN')): ?>
                    <a href="index.html"><i class="fa fa-list"></i> <span class="nav-label">Neraca</span> <span class="fa arrow"></span></a>
                <?php endif; ?>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=site_url('backend')?>">Neraca Dashboard</a></li>
                    </ul>
                </li>

                <!-- MENU KARYAWAN -->
               <li class="">
                    <?php if(is_allow('M_USER')): ?>
                    <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">KARYAWAN</span> <span class="fa arrow"></span></a>
                <?php endif; ?>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=base_url()?>jabatan">Jabatan</a></li>
                        <li><a href="<?=base_url()?>wilayah">Wilayah</a></li>
                        <li><a href="<?=base_url()?>karyawan">Karyawan</a></li>
                        <li><a href="<?=base_url()?>wilayah_karyawan">Wilayah Karyawan</a></li>
                    </ul>
                </li>

                <!-- MENU USER MANAGEMENT -->
               <li class="">
                    <?php if(is_allow('M_USER')): ?>
                    <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">MANAJEMEN USER</span> <span class="fa arrow"></span></a>
                <?php endif; ?>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=base_url()?>users">Users</a></li>
                        <li><a href="<?=base_url()?>user_group">User Group</a></li>
                        <li><a href="<?=base_url()?>user_access">User Access</a></li>
                        <li><a href="<?=base_url()?>master_access">Master Access</a></li>
                    </ul>
                </li>

                <!-- MENU SISTEM UTIL -->
                <li class="">
                    <?php if(is_allow('M_SISTEM')): ?>
                    <a href="index.html"><i class="fa fa-wrench"></i> <span class="nav-label">Sistem</span> <span class="fa arrow"></span></a>
                <?php endif;  ?>
                <?php //die($this->db->last_query());  ?>
                    <ul class="nav nav-second-level">
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
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <!-- <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Cari risalah ..." class="form-control" name="top-search" id="top-search">
                </div>
            </form> -->
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"><?=data_app('APP_NAME')?>, <?=data_app('OPD_NAME')?></span>
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
        <div class="table-responsive" >
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
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?=base_url()?>assets/vendor/sweetalert/js/sweetalert.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Sparkline -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/chartJs/Chart.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/toastr/toastr.min.js"></script>
    <script src="<?=base_url()?>assets/js/sf.js"></script>

    <script>
        $(document).ready(function() {

        // $('input.timepicker').timepicker({ timeFormat: 'h:mm'});
        $('input.datepicker').datepicker({ dateFormat: 'yy/mm/dd'});
        // $('input.datepicker-ym').datepicker({ dateFormat: 'mm/yy'});


        });

    </script>

    <script>
        var today = new Date();
        var dd = ("0" + (today.getDate())).slice(-2);
        var mm = ("0" + (today.getMonth() +　1)).slice(-2);
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd ;
        $("#todays-date").attr("value", today)
    </script>
</body>
</html>
