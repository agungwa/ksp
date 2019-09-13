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
<h2><b>Data Laporan Sirkulasi Pinjaman</b></h2>
<h3><b>Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?> </b></h3>
<h3><b>Wilayah <?=$w?> <!--<?php //if($w='all'){echo 'semua wilayah';}else {echo $wil_kode->wil_nama;}?>--></b></h3>
        
               
        <table>
            <tbody>
            <tr>
                <td>Saldo Pinjaman Lalu</td>
				<td><?= neraca($saldolalupinjaman);?></td>
            </tr>
            <tr>
                <td>Saldo Drop</td>
				<td><?= neraca($saldodroppinjaman);?></td>
            </tr>
            <tr>
                <td>Angsuran Masuk (pokok)</td>
				<td><?= neraca($pokokangsuran+$pokokangsuranpelunasan);?></td>
            </tr>
            <tr>
                <td>Saldo Kini</td>
				<td><?= neraca(($saldolalupinjaman+$saldodroppinjaman)-($pokokangsuran+$pokokangsuranpelunasan));?></td>
            </tr>
            <tr>
                <td>Bunga Angsuran</td>
				<td><?= neraca($bungaangsuran + $bungadendapelunasan);?></td>
            </tr>
            <tr>
                <td>Denda Angsuran</td>
				<td><?= neraca($dendaangsuran);?></td>
            </tr>
            <tr>
                <td>Administrasi</td>
				<td><?= neraca($provisipinjaman);?></td>
            </tr>
            <tr>
                <td>Total Angsuran Masuk</td>
				<td><?= neraca($totalangsuran+$totalangsurantunggakan);?></td>
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
        