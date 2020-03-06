
<?php if(is_allow('M_LAPORAN')): ?>
<?php
        $kas=$shudata + $bungasimpanan +$saldoinvestasi + $saldosimpananwajib+$saldosimpananpokok+ $pokokangsuranpelunasan + $pokokangsuran + $saldosimpananneraca - $saldopinjamanumum - $saldopinjamankaryawan-$saldopinjamankhusus;
        $piutang = $saldopinjamanumumbelum + $saldopinjamankaryawanbelum+$saldopinjamankhususbelum;
        $jal=$kas + $kasbankdata + $saldopinjamanumumbelum + $saldopinjamankaryawanbelum+$saldopinjamankhususbelum;
        $jat=$aktivatetaptanah+$aktivatetapbangunan+$aktivatetapelektronik+$aktivatetapkendaraan+$aktivatetapperalatan+$aktivatetappenyusutan;
        $jkl=$saldosimpananneraca+$bungasimpanan;
        $jkp=$saldoinvestasi+$simpanankaryawandata+$rekeningkoran+$modalpenyertaan;
        $jek=$saldosimpananwajib+$saldosimpananpokok+$simpanancdr+$donasi+$shudata;
        $simkesan = $saldosimkesan+$saldotitipan;
        ?>
<div class="income-order-visit-user-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>Investasi</h2>
                                        <div class="main-income-phara">
                                            <p>Data</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter"><?= $saldoinvestasi/1000000;?> </span><span>Juta</span></h3>
                                        </div>
                                        <div class="price-graph">
                                            <span id="sparkline1"></span>
                                        </div>
                                    </div>
                                    <div class="income-range">
                                        <p>Total income</p>
                                        <span class="income-percentange">98% <i class="fa fa-bolt"></i></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>Orders</h2>
                                        <div class="main-income-phara order-cl">
                                            <p>Annual</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter">72320</span></h3>
                                        </div>
                                        <div class="price-graph">
                                            <span id="sparkline6"></span>
                                        </div>
                                    </div>
                                    <div class="income-range order-cl">
                                        <p>New Orders</p>
                                        <span class="income-percentange">66% <i class="fa fa-level-up"></i></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>Visitor</h2>
                                        <div class="main-income-phara visitor-cl">
                                            <p>Today</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter">888200</span></h3>
                                        </div>
                                        <div class="price-graph">
                                            <span id="sparkline2"></span>
                                        </div>
                                    </div>
                                    <div class="income-range visitor-cl">
                                        <p>New Visitor</p>
                                        <span class="income-percentange">55% <i class="fa fa-level-up"></i></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>User activity</h2>
                                        <div class="main-income-phara low-value-cl">
                                            <p>Low Value</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter">888200</span></h3>
                                        </div>
                                        <div class="price-graph">
                                            <span id="sparkline5"></span>
                                        </div>
                                    </div>
                                    <div class="income-range low-value-cl">
                                        <p>In first month</p>
                                        <span class="income-percentange">33% <i class="fa fa-level-down"></i></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>