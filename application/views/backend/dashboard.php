
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
<div class="row">
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
                        <div class="stat-percent font-bold text-info"><?= $piutang/1000000;?> <i class="fa fa-level-up"></i></div>
                        <small>x Juta </small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
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
               <!--<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right"> Data Anggota</span>
                        <h5>Pokok Dan Wajib</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="no-margins">Data </h2>
                                <div class="stat-percent font-bold text-info">89% <i class="fa fa-level-up"></i> 
                                </div><small>Anggota</small>
                            </div>
                            <div class="col-md-6">
                                <h1 class="no-margins">Data </h1>
                                <div class="stat-percent font-bold text-info">11% <i class="fa fa-level-up"></i> 
                                </div><small>Calon Anggota</small>
                            </div>
                        </div>


                    </div>
                </div>-->
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
                                </div><small>Pokok Dalam Juta</small>
                            </div>
                            <div class="col-md-6">
                                <h1 class="no-margins">Data </h1>
                                <div class="stat-percent font-bold text-info"><?= $saldosimpananpokok/1000000;?> <i class="fa fa-level-up"></i> 
                                </div><small>Wajib Dalam Juta</small>
                            </div>
                        </div>


                    </div>
                </div>
        </div>
            <!--
            <form action="<?php echo base_url()?>neraca/neraca" class="form-inline" method="get">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Jumlah Kas: </h5>
                        <div class="ibox-tools">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                        </div>
                    </div>
                    
        
                    <button class="btn btn-info" type="submit">Tampilkan</button>
                    <div class="ibox-content no-padding">
                        <div class="flot-chart m-t-lg" style="height: 90px;">
                            <div class="flot-chart-content" id="flot-chart1"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </form>

        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div>
                                        <span class="pull-right text-right">
                                         <small>Rapat <strong> Paripurna</strong></small> 
                                            <br/>
                                            Rata-rata: 86%
                                        </span>
                            <h3 class="font-bold no-margins">
                                Data Pinjaman Anggota
                            </h3>
                            <small>Tahun <?=date('Y')?></small>
                        </div>

                        <div class="m-t-sm">

                            <div class="row">
                                <div class="col-md-8">
                                    <div>
                                        <canvas id="lineChart" height="114"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="stat-list m-t-lg">
                                        <li>
                                            <h2 class="no-margins">87%</h2>
                                            <small>Pencairan</small>
                                            <div class="progress progress-mini">
                                                <div class="progress-bar" style="width: 88%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">160 Kali</h2>
                                            <small>Penolakan</small>
                                            <div class="progress progress-mini">
                                                <div class="progress-bar" style="width: 45%;"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="m-t-md">
                            <small class="pull-right">
                                <i class="fa fa-clock-o"> </i>
                                Update on 16.03.2018
                            </small>
                            <small>
                                <strong>Analisa kehadiran:</strong> selama 3 bulan rata-rata kehadiran anggota rapat sebesar 87%
                            </small> 
                        </div>

                    </div>
                </div>
            </div>
                </div>
            </div>

        </div>

        <div class="row">
        </div>

        <script type="text/javascript">
            $(document).ready(function(){

            var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
            var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

            var data1 = [
                { label: "Data 1", data: d1, color: '#17a084'},
                { label: "Data 2", data: d2, color: '#127e68' }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Example dataset",
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 40, 51, 36, 25, 40]
                    },
                    {
                        label: "Example dataset",
                        fillColor: "rgba(26,179,148,0.5)",
                        strokeColor: "rgba(26,179,148,0.7)",
                        pointColor: "rgba(26,179,148,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(26,179,148,1)",
                        data: [48, 48, 60, 39, 56, 37, 30]
                    }
                ]
            };

            var lineOptions = {
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                bezierCurve: true,
                bezierCurveTension: 0.4,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                responsive: true,
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

            });
        </script>
        -->
        <?php endif; ?>