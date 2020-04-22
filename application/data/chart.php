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
$(function (){
    var elementvar = simpanan;
    var ctx = document.getElementById('simpanan');
    var saldomasuk0 = <?= $t_simpanan_m0 ?>; var saldokeluar0 = <?= $t_simpanan_k0 ?>;
    var saldomasuk1 = <?= $t_simpanan_m1 ?>; var saldokeluar1 = <?= $t_simpanan_k1 ?>;
    var saldomasuk2 = <?= $t_simpanan_m2 ?>; var saldokeluar2 = <?= $t_simpanan_k2 ?>;
    var saldomasuk3 = <?= $t_simpanan_m3 ?>; var saldokeluar3 = <?= $t_simpanan_k3 ?>;
    var saldomasuk4 = <?= $t_simpanan_m4 ?>; var saldokeluar4 = <?= $t_simpanan_k4 ?>;
    var saldomasuk5 = <?= $t_simpanan_m5 ?>; var saldokeluar5 = <?= $t_simpanan_k5 ?>;
    var ctx = document.getElementById('pinjaman');
    var elementvar = pinjaman;
    var saldomasuk0 = <?= $t_pinjaman_m0 ?>; var saldokeluar0 = <?= $pencairanPokok0 ?>;
    var saldomasuk1 = <?= $t_pinjaman_m1 ?>; var saldokeluar1 = <?= $pencairanPokok1 ?>;
    var saldomasuk2 = <?= $t_pinjaman_m2 ?>; var saldokeluar2 = <?= $pencairanPokok2 ?>;
    var saldomasuk3 = <?= $t_pinjaman_m3 ?>; var saldokeluar3 = <?= $pencairanPokok3 ?>;
    var saldomasuk4 = <?= $t_pinjaman_m4 ?>; var saldokeluar4 = <?= $pencairanPokok4 ?>;
    var saldomasuk5 = <?= $t_pinjaman_m5 ?>; var saldokeluar5 = <?= $pencairanPokok5 ?>;
var elementvar = new Chart(ctx, {
    type: 'bar',
    data: {
labels: [dateNow("-",5), dateNow("-",4), dateNow("-",3), dateNow("-",2), dateNow("-",1), dateNow("-",0)],
datasets: [
    {
    label: 'Simpok',
    data: [ saldomasuk5, saldomasuk4, saldomasuk3, saldomasuk2, saldomasuk1, saldomasuk0],
    backgroundColor: [
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    ],
    borderColor: [
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    'rgba(11, 96, 153, 1)',
    ],
    borderWidth: 1
    },
    {
    label: 'Pinpok',
    data: [saldokeluar5, saldokeluar4, saldokeluar3, saldokeluar2, saldokeluar1, saldokeluar0],
    backgroundColor: [
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    ],
    borderColor: [
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(54, 162, 235, 1)',
    ],
    borderWidth: 1
    },

    ]
},
options: {
    scales: {
        yAxes: [{
            ticks: {
    beginAtZero: true }
            }]
        }
    }
});

});

                $(function() {
                    //chart kas
                    Morris.Line({
                    element: 'morris-line-chart-kas',
                    data: [
                        { y: dateNow("-",4), e: <?= ($masuk4)/1000000 ?> , a: <?= ($keluar4)/1000000 ?> },
                        { y: dateNow("-",3), e: <?= ($masuk3)/1000000 ?> , a: <?= ($keluar3)/1000000 ?> },
                        { y: dateNow("-",2), e: <?= ($masuk2)/1000000 ?> , a: <?= ($keluar2)/1000000 ?> },
                        { y: dateNow("-",1), e: <?= ($masuk1)/1000000 ?> , a: <?= ($keluar1)/1000000 ?> },
                        { y: dateNow("-",0), e: <?= ($masuk0)/1000000 ?> , a: <?= ($keluar0)/1000000 ?> } 
                        ],
                    xkey: 'y',
                    ykeys: [ 'e' , 'a'],
                    labels: [ 'Masuk' , 'Keluar' ],
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
                    lineColors: ['#1ab394','#ff9587'],
                });
                    //investasi
                    Morris.Line({
                    element: 'morris-line-chart-investasi-masuk',
                    data: [
                        { y: dateNow("-",4), e: <?= ($investasi4)/1000000 ?> , a: <?= ($investasiTutup4)/1000000 ?> },
                        { y: dateNow("-",3), e: <?= ($investasi3)/1000000 ?> , a: <?= ($investasiTutup3)/1000000 ?> },
                        { y: dateNow("-",2), e: <?= ($investasi2)/1000000 ?> , a: <?= ($investasiTutup2)/1000000 ?>},
                        { y: dateNow("-",1), e: <?= ($investasi1)/1000000 ?> , a: <?= ($investasiTutup1)/1000000 ?>},
                        { y: dateNow("-",0), e: <?= ($investasi0)/1000000 ?> , a: <?= ($investasiTutup0)/1000000 ?>} 
                        ],
                    xkey: 'y',
                    ykeys: [ 'e' , 'a' ],
                    labels: [ 'Investasi' ,'Investasi tutup' ],
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
                    lineColors: ['#1ab394','#ff9587'],
                });
                    //jasa keluar
                    Morris.Line({
                    element: 'morris-line-chart-jasa-keluar',
                    data: [
                        { y: dateNow("-",4), e: <?= ($jasaInvestasi4)/1000000 ?> },
                        { y: dateNow("-",3), e: <?= ($jasaInvestasi3)/1000000 ?> },
                        { y: dateNow("-",2), e: <?= ($jasaInvestasi2)/1000000 ?> },
                        { y: dateNow("-",1), e: <?= ($jasaInvestasi1)/1000000 ?> },
                        { y: dateNow("-",0), e: <?= ($jasaInvestasi0)/1000000 ?> } 
                        ],
                    xkey: 'y',
                    ykeys: [ 'e' ],
                    labels: [ 'Jasa' ],
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
                    lineColors: ['#ff9587'],
                });

                    //pinjaman
                    Morris.Line({
                    element: 'morris-line-chart-pinjaman-masuk',
                    data: [
                         { y: dateNow("-",4), b: <?= ($angsuranPokok4+$pelunasanPokok4)/1000000 ?>, c: <?= ($angsuranBunga4+$pelunasanBunga4)/1000000 ?>, d: <?= ($angsuranDenda4+$pelunasanDenda4)/1000000 ?> },
                         { y: dateNow("-",3), b: <?= ($angsuranPokok3+$pelunasanPokok3)/1000000 ?>, c: <?= ($angsuranBunga3+$pelunasanBunga3)/1000000 ?>, d: <?= ($angsuranDenda3+$pelunasanDenda3)/1000000 ?> },
                         { y: dateNow("-",2), b: <?= ($angsuranPokok2+$pelunasanPokok2)/1000000 ?>, c: <?= ($angsuranBunga2+$pelunasanBunga2)/1000000 ?>, d: <?= ($angsuranDenda2+$pelunasanDenda2)/1000000 ?> },
                         { y: dateNow("-",1), b: <?= ($angsuranPokok1+$pelunasanPokok1)/1000000 ?>, c: <?= ($angsuranBunga1+$pelunasanBunga1)/1000000 ?>, d: <?= ($angsuranDenda1+$pelunasanDenda1)/1000000 ?> },
                         { y: dateNow("-",0), b: <?= ($angsuranPokok0+$pelunasanPokok0)/1000000 ?>, c: <?= ($angsuranBunga0+$pelunasanBunga0)/1000000 ?>, d: <?= ($angsuranDenda0+$pelunasanDenda0)/1000000 ?> } 
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
                    //pinjaman keluar
                    Morris.Line({
                    element: 'morris-line-chart-pinjaman-keluar',
                    data: [
                        { y: dateNow("-",4), e: <?= ($pencairanPokok4)/1000000 ?> },
                        { y: dateNow("-",3), e: <?= ($pencairanPokok3)/1000000 ?> },
                        { y: dateNow("-",2), e: <?= ($pencairanPokok2)/1000000 ?> },
                        { y: dateNow("-",1), e: <?= ($pencairanPokok1)/1000000 ?> },
                        { y: dateNow("-",0), e: <?= ($pencairanPokok0)/1000000 ?> } 
                        ],
                    xkey: 'y',
                    ykeys: [ 'e' ],
                    labels: [ 'Pihutang' ],
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
                    lineColors: ['#ff9587'],
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
                    lineColors: ['#54cdb4','#0b997c','#ff9587'],
                });

                 });
                    

</script>