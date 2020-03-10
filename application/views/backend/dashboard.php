
<?php if(is_allow('M_LAPORAN')): ?>
<?php
        $piutang = $pinjamanaktif - $angsuranpokok;
        $kas=$shudata + $simpanankaryawandata + $bungasimpanan +$saldoinvestasi + $saldosimpananwajib+$saldosimpananpokok + $saldosimpananneraca - $piutang;
        $simkesan = $saldosimkesan+$saldotitipan;
        ?>
<div class="wrapper wrapper-content animated fadeInRight">
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Data</span>
                        <h5>Investasi</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">Data </h1>
                        <div class="stat-percent font-bold text-success"><?= $saldoinvestasi/1000000;?> <i class="fa fa-bolt"></i></div>
                        <small>x Juta </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Data</span>
                        <h5>Simpanan</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">Data </h1>
                        <div class="stat-percent font-bold text-success"><?= $saldosimpananneraca/1000000;?><i class="fa fa-bolt"></i></div>
                        <small>x Juta </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Data</span>
                        <h5>SHU</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">Data </h1>
                        <div class="stat-percent font-bold text-success"><?= $shudata/1000000;?><i class="fa fa-bolt"></i></div>
                        <small>x Juta </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right"></span>
                        <h5>Piutang</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">Data </h1>
                        <div class="stat-percent font-bold text-info"><?= ceiling($piutang/1000000,1);?> <i class="fa fa-level-up"></i></div>
                        <small>x Juta </small>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right"></span>
                        <h5>Simkesan</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">Data </h1>
                        <div class="stat-percent font-bold text-info"><?= $simkesan/1000000;?> <i class="fa fa-level-up"></i></div>
                        <small>x Juta </small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
              
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Data Simpanan</span>
                        <h5>Pokok/Wajib</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="no-margins">Data</h2>
                                <div class="stat-percent font-bold text-info"><?= $saldosimpananwajib/1000000;?> <i class="fa fa-level-up"></i> 
                                </div><small>Wajib x Juta</small>
                            </div>
                            <div class="col-md-6">
                                <h1 class="no-margins">Data </h1>
                                <div class="stat-percent font-bold text-info"><?= $saldosimpananpokok/1000000;?> <i class="fa fa-level-up"></i> 
                                </div><small>Pokok x Juta</small>
                            </div>
                        </div>


                    </div>
                </div>
        </div>
        <?php endif; ?>