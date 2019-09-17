<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
 	h2{text-align: center}
 	h3{text-align: center}
 </style>
<h2><b>Sirkulasi Simkesan</b></h2>
<h3><b>Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?> </b></h3>
<h3><b>Wilayah <?=$w?> <!--<?php //if($w='all'){echo 'semua wilayah';}else {echo $wil_kode->wil_nama;}?>--></b></h3>

        <table>
            <tbody>
            <tr>
                <td>Saldo simkesan Lalu</td>
				<td><?= neraca($saldosimkesanlalu);?></td>
            </tr>
            <tr>
                <td>Saldo simkesan Masuk</td>
				<td><?= neraca($saldosimkesan);?></td>
            </tr>
            <tr>
                <td>Titipan</td>
				<td><?= neraca($saldotitipan - $saldoambiltitipan);?></td>
            </tr>
            <tr>
                <td>Penarikan simkesan</td>
				<td><?= neraca($saldosimkesanditarik);?></td>
            </tr>
            <tr>
                <td>Saldo simkesan Kini</td>
				<td><?= neraca($saldosimkesan+$saldosimkesanlalu-$saldosimkesanditarik);?></td>
            </tr>
            <tr>
                <td>Keuntungan Klaim Simkesan</td>
				<td><?= neraca($saldosetorklaim+$saldotunggakanklaim-$saldojumlahklaim);?></td>
            </tr>
            <tr>
                <td>Keuntungan Tarik Simkesan</td>
				<td><?= neraca($saldosetortarik+$saldotunggakantarik-$saldojumlahtarik);?></td>
            </tr>
            <tr>
                <td>Administrasi</td>
				<td><?= neraca($administrasiklaim + $administrasitarik);?></td>
            </tr>
            <tr>
                <td>Rekening Lalu</td>
				<td><?= $totalrekening;?></td>
            </tr>
            <tr>
                <td>Rekening Masuk</td>
				<td><?= $totalrekeninglalu;?></td>
            </tr>
            <tr>
                <td>Rekening Keluar</td>
				<td><?= $totalrekeningkeluar;?></td>
            </tr>
            <tr>
                <td>Rekening Kini</td>
				<td><?= $totalrekeninglalu+$totalrekening-$totalrekeningkeluar;?></td>
            </tr>
            </tbody>
        </table>
        