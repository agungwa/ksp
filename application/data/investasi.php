<script>
$(function (){
    var ctx = document.getElementById('investasi');
    var elementvar = investasi;
    var saldomasuk0 = <?= $investasi0 ?>; var saldokeluar0 = <?= $t_investasi_k0 ?>;
    var saldomasuk1 = <?= $investasi1 ?>; var saldokeluar1 = <?= $t_investasi_k1 ?>;
    var saldomasuk2 = <?= $investasi2 ?>; var saldokeluar2 = <?= $t_investasi_k2 ?>;
    var saldomasuk3 = <?= $investasi3 ?>; var saldokeluar3 = <?= $t_investasi_k3 ?>;
    var saldomasuk4 = <?= $investasi4 ?>; var saldokeluar4 = <?= $t_investasi_k4 ?>;
    var saldomasuk5 = <?= $investasi5 ?>; var saldokeluar5 = <?= $t_investasi_k5 ?>;
var elementvar = new Chart(ctx, {
    type: 'bar',
    data: {
labels: [dateNow("-",5), dateNow("-",4), dateNow("-",3), dateNow("-",2), dateNow("-",1), dateNow("-",0)],
datasets: [
    {
    label: 'Masuk',
    data: [ saldomasuk5/1000000, saldomasuk4/1000000, saldomasuk3/1000000, saldomasuk2/1000000, saldomasuk1/1000000, saldomasuk0/1000000],
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
    label: 'Keluar',
    data: [saldokeluar5/1000000, saldokeluar4/1000000, saldokeluar3/1000000, saldokeluar2/1000000, saldokeluar1/1000000, saldokeluar0/1000000],
    backgroundColor: [
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
    ],
    borderColor: [
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
    'rgba(181, 35, 9, 1)',
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

</script>