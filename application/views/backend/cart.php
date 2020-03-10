
<?php if(is_allow('M_LAPORAN')): ?>

    <div class="animated wobble">
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

    <div class="animated wobble">
            <div class="row col-md-6">
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

    <div class="animated wobble">
            <div class="row col-md-6">
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

                //data simpanan masuk
                $(function() {
                Morris.Line({
                    element: 'morris-line-chart-simpanan-masuk',
                    data: [
                         { y: dateNow("-",5), a: <?= $saldosimpananneraca5/1000000 ?> },
                         { y: dateNow("-",4), a: <?= $saldosimpananneraca4/1000000 ?> },
                         { y: dateNow("-",3), a: <?= $saldosimpananneraca3/1000000 ?> },
                         { y: dateNow("-",2), a: <?= $saldosimpananneraca2/1000000 ?> },
                         { y: dateNow("-",1), a: <?= $saldosimpananneraca1/1000000 ?> },
                         { y: dateNow("-",0), a: <?= $saldosimpananneraca0/1000000 ?> } 
                        ],
                    xkey: 'y',
                    ykeys: ['a','b','c'],
                    labels: ['Simpanan','Phbuku','Administrasi']
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
                    lineColors: ['#54cdb4'],
                });

                Morris.Line({
                    element: 'morris-line-chart-pinjaman-masuk',
                    data: [
                         { y: dateNow("-",5), b: <?= ($angsuranPokok0+$pelunasanPokok0)/1000000 ?>, c: <?= ($angsuranBunga0+$pelunasanBunga0)/1000000 ?>, d: <?= ($angsuranDenda0+$pelunasanDenda0)/1000000 ?> },
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

                Morris.Line({
                    element: 'morris-line-chart-investasi-masuk',
                    data: [
                        { y: dateNow("-",5), e: <?= ($investasi0)/1000000 ?> },
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
                

                });

                </script>
        <?php endif; ?>