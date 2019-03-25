<?php
$CI = &get_instance();
lookup(); 
$CI->load->model('Syarat_model');
$jml_syarat     = $CI->Syarat_model->total_rows();
// Penarikan jumlah data untuk kelengkapan
$CI->load->model('Kelengkapan_model');
$jml_desa    = $CI->db->count_all('desa');
// Penarikan jumlah data untuk kegiatan
$CI->load->model('Kegiatan_model');
$jml_kegiatan    = $CI->Kegiatan_model->total_rows();
//kegiatan terverifikasi
$jml_kegiatan_verified = $CI->db->where('note',1)->from('kegiatan')->count_all_results();
//persen kegiatan
$kegiatan_persen = intval($jml_kegiatan_verified/$jml_kegiatan);
$kegiatan_persen = number_format((float)$jml_kegiatan_verified/$jml_kegiatan, 2, '.', '');
// Penarikan jumlah data untuk syarat
$CI->load->model('Syarat_model');
$jml_kegiatan    = $CI->Syarat_model->total_rows();
//syarat terverifikasi
$jml_syarat_verified = $CI->db->where('note_2',1)->from('syarat')->count_all_results();
//persen syarat
// $syarat_persen = round($jml_syarat_verified/$jml_syarat);

$syarat_persen = number_format((float)$jml_syarat_verified/$jml_syarat, 2, '.', '');

//users
$CI->load->model('Users_model');
$jml_users = $CI->Users_model->total_rows();

$CI->load->model('User_group_model');
$jml_user_group = $CI->User_group_model->total_rows();
?>

<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
        <div class="col-md-3">
            <div class="col-lg-12">
                <div class="widget style1 blue-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-pagelines fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Desa Pengaju Dana </span>
                                <h2 class="font-bold"><?=$jml_desa?> Desa / Kelurahan</h2>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Kegiatan yang telah diverifikasi </span>
                            <h2 class="font-bold"><?=$jml_kegiatan_verified?> dari <?=$jml_kegiatan?> Kegiatan</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-pie-chart fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Prosentase Kegiatan Terpenuhi </span>
                            <h2 class="font-bold"><?=$kegiatan_persen?>%</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-files-o fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Syarat yang telah diverifikasi </span>
                            <h2 class="font-bold"><?=$jml_syarat_verified?> dari <?=$jml_syarat?> Syarat</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-area-chart fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Prosentase Syarat Terpenuhi </span>
                            <h2 class="font-bold"><?=$syarat_persen?>%</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="col-md-9">
            <div class="widget-head-color-box navy-bg p-lg text-center">
                            <div class="m-b-md">
                            <h1 class="font-bold no-margins">
                                <?=data_app("APP_NAME")?>
                            </h1>
                                <h3><?=data_app("OPD_NAME")?></h3>
                            </div>
                            <img src="<?=base_url()?>assets/img/file.png" class="img-circle circle-border m-b-md" alt="profile">
                            <div>
                                <span><?=data_app("APP_DESC")?></span>
                            </div>
                        </div>
                        <div class="widget-text-box">
                            <h4 class="media-heading"><?=data_app("OPD_ADDR")?></h4>
                            <p><?=data_app("VISI_MISI")?></p>
                            <div class="text-right">
                                <a class="btn btn-xs btn-primary"><i class="fa fa-facebook"></i> Facebook</a>
                                <a class="btn btn-xs btn-primary"><i class="fa fa-twitter"></i> Twitter</a>
                                <a class="btn btn-xs btn-primary"><i class="fa fa-instagram"></i> Instagram</a>
                                <a class="btn btn-xs btn-primary"><i class="fa fa-whatsapp"></i> Whatsapp</a>
                            </div>
                        </div>
        </div>
        </div>
        </div>