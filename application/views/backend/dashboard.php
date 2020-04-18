
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
                        <h5>Investasi</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="stat-percent font-bold text-success"><?= number_format($saldoinvestasi/1000000,2);?> <i class="fa fa-bolt"></i></div>
                        <span><small>Juta </small></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Simpanan</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="stat-percent font-bold text-success"><?= number_format($saldosimpananneraca/1000000,2);?><i class="fa fa-bolt"></i></div>
                        <small>Juta </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>SHU</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="stat-percent font-bold text-success"><?= number_format($shudata/1000000,2);?><i class="fa fa-bolt"></i></div>
                        <small>Juta </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Piutang</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="stat-percent font-bold text-info"><?= number_format($piutang/1000000,2);?> <i class="fa fa-level-up"></i></div>
                        <small>Juta </small>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Simkesan</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="stat-percent font-bold text-info"><?= number_format($simkesan/1000000,2);?> <i class="fa fa-level-up"></i></div>
                        <small>Juta </small>
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
                                <h5 class="no-margins">Data</h5>
                                <div class="stat-percent font-bold text-info"><?= $saldosimpananwajib/1000000;?> <i class="fa fa-level-up"></i> 
                                </div><small>Wajib x Juta</small>
                            </div>
                            <div class="col-md-6">
                                <h5 class="no-margins">Data </h5>
                                <div class="stat-percent font-bold text-info"><?= $saldosimpananpokok/1000000;?> <i class="fa fa-level-up"></i> 
                                </div><small>Pokok x Juta</small>
                            </div>
                        </div>


                    </div>
                </div>
        </div>
        <?php endif; ?>