<script>
$(function (){
    var ctx = document.getElementById('simpanan');
    var saldomasuk0 = <?= $t_simpanan_m0 ?>; var saldokeluar0 = <?= $t_simpanan_k0 ?>;
    var saldomasuk1 = <?= $t_simpanan_m1 ?>; var saldokeluar1 = <?= $t_simpanan_k1 ?>;
    var saldomasuk2 = <?= $t_simpanan_m2 ?>; var saldokeluar2 = <?= $t_simpanan_k2 ?>;
    var saldomasuk3 = <?= $t_simpanan_m3 ?>; var saldokeluar3 = <?= $t_simpanan_k3 ?>;
    var saldomasuk4 = <?= $t_simpanan_m4 ?>; var saldokeluar4 = <?= $t_simpanan_k4 ?>;
    var saldomasuk5 = <?= $t_simpanan_m5 ?>; var saldokeluar5 = <?= $t_simpanan_k5 ?>;
    
var simpanan = new Chart(ctx, {
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