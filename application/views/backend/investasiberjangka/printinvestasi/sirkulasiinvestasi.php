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
<h2><b>Data Investasi</b></h2>
<h3><b>Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?> </b></h3>
<h3><b>Wilayah <?=$w?> <!--<?php //if($w='all'){echo 'semua wilayah';}else {echo $wil_kode->wil_nama;}?>--></b></h3>
               
        <table>
            <tbody>
            <tr>
                <td >Saldo Lalu</td>
				<td >RP <?= $saldoinvestasilalu;?></td>
            </tr>
            <tr>
                <td >Saldo Masuk</td>
				<td >RP <?= $saldoinvestasi;?></td>
            </tr>
            <tr>
                <td >Saldo Investasi Keluar</td>
				<td >RP <?= $saldoinvestasiditarik;?></td>
            </tr>
            <tr>
                <td >Saldo Investasi Kini</td>
				<td >RP <?= ($saldoinvestasilalu + $saldoinvestasi)-$saldoinvestasiditarik;?></td>
            </tr>
            <tr>  
                <td >Jasa Keluar</td>
				<td >RP <?= $jasainvestasiditarik;?></td>
            </tr>
            
            </tbody>
        </table>