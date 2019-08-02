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
<h2><b>Sirkulasi Simpanan</b></h2>
<h3><b>Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?> </b></h3>
<h3><b>Wilayah <?=$w?> <!--<?php //if($w='all'){echo 'semua wilayah';}else {echo $wil_kode->wil_nama;}?>--></b></h3>
        <table>
            <tbody>
            <tr>
                <td>Saldo Simpanan</td>
				<td >RP <?= $saldosimpanan;?></td>
            </tr>
            <tr>
                <td>Penarikan Simpanan</td>
				<td>RP <?= $saldosimpananditarik;?></td>
            </tr>
            <tr>
                <td>Bunga Simpanan</td>
				<td>RP <?= $bungasimpanan;?></td>
            </tr>
            <tr>
                <td>Saldo Simpanan Wajib</td>
				<td>RP <?= $saldosimpananwajib;?></td>
            </tr>
            <tr>
                <td>Simpanan Wajib Ditarik</td>
				<td>RP <?= $saldosimpananwajibditarik;?></td>
            </tr>
            <tr>
                <td>Saldo Simpanan Pokok</td>
				<td>RP <?= $saldosimpananpokok;?></td>
            </tr>
            <tr>
                <td>PH Buku</td>
				<td>RP <?= $phbuku;?></td>
            </tr>
            <tr>
                <td>Administrasi</td>
				<td>RP <?= $administrasi;?></td>
            </tr>
            </tbody>
        </table>
       