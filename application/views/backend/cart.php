
<?php if(is_allow('M_LAPORAN')): ?>

    <div class="animated fadeIn">
            <div class="row col-md-6">

                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Chart Kas Simpanan Masuk</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div id="morris-line-chart-simpanan-masuk"></div>
                                </div>
                            </div>

                                                  
                            </div>
                        </div>

    <div class="animated fadeIn">
            <div class="row col-md-6">
                          <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Chart Simpanan (Admin - PH - Bunga Keluar)</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div id="morris-line-chart-simpanan-keluar"></div>
                                </div>
                            </div>
                              
                            </div>
                        </div>

    <div class="animated fadeIn">
            <div class="row col-md-12">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Chart Kas Pinjaman Masuk</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div id="morris-line-chart-pinjaman-masuk"></div>
                                </div>
                            </div>
                            </div>
                        </div>

    <div class="animated fadeIn">
            <div class="row col-md-12">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Chart Kas Investasi Masuk</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div id="morris-line-chart-investasi-masuk"></div>
                                </div>
                            </div>
                            </div>
                        </div>

                <script>
                    function dateNow(splinter,sub){
                        var set = new Date();
                        var getDate = set.getDate().toString();
                        if (getDate.length == 1){ //example if 1 change to 01
                        getDate = "0"+getDate;
                        }
                        var getMonth = (set.getMonth()+1).toString();
                        if (getMonth.length == 1){
                        getBulan = "0"+getMonth-sub;
                        }
                        var getYear = set.getFullYear().toString();
                        if (getBulan <= 0){
                        getBulan = getBulan + 12;
                        getYear = getYear - 1;
                        }
                        var dateNow = getYear +splinter+ getBulan; //today
                        return dateNow;
                        }
                $(function() {
                    //investasi
                    Morris.Line({
                    element: 'morris-line-chart-investasi-masuk',
                    data: [
                        { y: dateNow("-",4), e: <?= ($investasi1)/1000000 ?> },
                        { y: dateNow("-",3), e: <?= ($investasi2)/1000000 ?> },
                        { y: dateNow("-",2), e: <?= ($investasi3)/1000000 ?> },
                        { y: dateNow("-",1), e: <?= ($investasi4)/1000000 ?> },
                        { y: dateNow("-",0), e: <?= ($investasi5)/1000000 ?> } 
                        ],
                    xkey: 'y',
                    ykeys: [ 'e' ],
                    labels: [ 'Investasi' ],
                    xLabelFormat: function (x) {
                        var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
                        var month = IndexToMonth[ x.getMonth() ];
                        var year = x.getFullYear();
                        return year + ' ' + month;
                    },
                    dateFormat: function (x) {
                        var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
                        var month = IndexToMonth[ new Date(x).getMonth() ];
                        var year = new Date(x).getFullYear();
                        return year + ' ' + month;
                    },
                    hideHover: 'auto',
                    resize: true,
                    lineColors: ['#1ab394'],
                });

                    //pinjaman
                    Morris.Line({
                    element: 'morris-line-chart-pinjaman-masuk',
                    data: [
                         { y: dateNow("-",4), b: <?= ($angsuranPokok1+$pelunasanPokok1)/1000000 ?>, c: <?= ($angsuranBunga1+$pelunasanBunga1)/1000000 ?>, d: <?= ($angsuranDenda1+$pelunasanDenda1)/1000000 ?> },
                         { y: dateNow("-",3), b: <?= ($angsuranPokok2+$pelunasanPokok2)/1000000 ?>, c: <?= ($angsuranBunga2+$pelunasanBunga2)/1000000 ?>, d: <?= ($angsuranDenda2+$pelunasanDenda2)/1000000 ?> },
                         { y: dateNow("-",2), b: <?= ($angsuranPokok3+$pelunasanPokok3)/1000000 ?>, c: <?= ($angsuranBunga3+$pelunasanBunga3)/1000000 ?>, d: <?= ($angsuranDenda3+$pelunasanDenda3)/1000000 ?> },
                         { y: dateNow("-",1), b: <?= ($angsuranPokok4+$pelunasanPokok4)/1000000 ?>, c: <?= ($angsuranBunga4+$pelunasanBunga4)/1000000 ?>, d: <?= ($angsuranDenda4+$pelunasanDenda4)/1000000 ?> },
                         { y: dateNow("-",0), b: <?= ($angsuranPokok5+$pelunasanPokok5)/1000000 ?>, c: <?= ($angsuranBunga5+$pelunasanBunga5)/1000000 ?>, d: <?= ($angsuranDenda5+$pelunasanDenda5)/1000000 ?> } 
                        ],
                    xkey: 'y',
                    ykeys: ['b' , 'c' , 'd' ],
                    labels: [ 'Angsuran Pokok', 'Angsuran Bunga' , 'Angsuran Denda'],
                    xLabelFormat: function (x) {
                        var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
                        var month = IndexToMonth[ x.getMonth() ];
                        var year = x.getFullYear();
                        return year + ' ' + month;
                    },
                    dateFormat: function (x) {
                        var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
                        var month = IndexToMonth[ new Date(x).getMonth() ];
                        var year = new Date(x).getFullYear();
                        return year + ' ' + month;
                    },
                    hideHover: 'auto',
                    ymax : 150,
                    resize: true,
                    lineColors: ['#1ab394','#035c4a','#659c91'],
                });

                    //simpanan masuk
                    Morris.Line({
                    element: 'morris-line-chart-simpanan-masuk',
                    data: [
                         { y: dateNow("-",4), a: <?= $saldosimpananneraca4/1000000 ?>, d: <?= $pokokPenarikan4/1000000 ?>},
                         { y: dateNow("-",3), a: <?= $saldosimpananneraca3/1000000 ?>, d: <?= $pokokPenarikan3/1000000 ?>},
                         { y: dateNow("-",2), a: <?= $saldosimpananneraca2/1000000 ?>, d: <?= $pokokPenarikan2/1000000 ?>},
                         { y: dateNow("-",1), a: <?= $saldosimpananneraca1/1000000 ?>, d: <?= $pokokPenarikan1/1000000 ?>},
                         { y: dateNow("-",0), a: <?= $saldosimpananneraca0/1000000 ?>, d: <?= $pokokPenarikan0/1000000 ?>}],
                    xkey: 'y',
                    ykeys: ['a' , 'd'],
                    labels: ['Simpanan','Pokok Keluar'],
                    xLabelFormat: function (x) {
                        var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
                        var month = IndexToMonth[ x.getMonth() ];
                        var year = x.getFullYear();
                        return year + ' ' + month;
                    },
                    dateFormat: function (x) {
                        var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
                        var month = IndexToMonth[ new Date(x).getMonth() ];
                        var year = new Date(x).getFullYear();
                        return year + ' ' + month;
                    },
                    hideHover: 'auto',
                    resize: true,
                    lineColors: ['#54cdb4','#ff9587'],
                });

                //simpanan keluar
                Morris.Line({
                    element: 'morris-line-chart-simpanan-keluar',
                    data: [
                         { y: dateNow("-",4), b: <?= $phPenarikan4/1000000 ?>, c: <?= $adminPenarikan4/1000000 ?>, e: <?= $bungaPenarikan4/1000000 ?> },
                         { y: dateNow("-",3), b: <?= $phPenarikan3/1000000 ?>, c: <?= $adminPenarikan3/1000000 ?>, e: <?= $bungaPenarikan3/1000000 ?> },
                         { y: dateNow("-",2), b: <?= $phPenarikan2/1000000 ?>, c: <?= $adminPenarikan2/1000000 ?>, e: <?= $bungaPenarikan2/1000000 ?> },
                         { y: dateNow("-",1), b: <?= $phPenarikan1/1000000 ?>, c: <?= $adminPenarikan1/1000000 ?>, e: <?= $bungaPenarikan1/1000000 ?> },
                         { y: dateNow("-",0), b: <?= $phPenarikan0/1000000 ?>, c: <?= $adminPenarikan0/1000000 ?>, e: <?= $bungaPenarikan0/1000000 ?> } ],
                    xkey: 'y',
                    ykeys: ['b','c','e'],
                    labels: ['Phbuku','Administrasi','Bunga Keluar'],
                    xLabelFormat: function (x) {
                        var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
                        var month = IndexToMonth[ x.getMonth() ];
                        var year = x.getFullYear();
                        return year + ' ' + month;
                    },
                    dateFormat: function (x) {
                        var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
                        var month = IndexToMonth[ new Date(x).getMonth() ];
                        var year = new Date(x).getFullYear();
                        return year + ' ' + month;
                    },
                    hideHover: 'auto',
                    resize: true,
                    lineColors: ['#54cdb4','#f5412a','#ff9587'],
                });

                 });
                    

                </script>
        <?php endif; ?>