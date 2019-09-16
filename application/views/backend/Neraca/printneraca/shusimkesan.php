<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

td#01 {
    
  text-align: left;
  padding: 8px;
  width: 330px;
  
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
 	h2{text-align: center}
 	h3{text-align: center}
    tr#01{background-color: #eb3131;}
    tr#02{background-color: #536fee;}
     
 </style>
        <?php
        $pendapatansimkesan = ($saldosimkesan + $saldotitipan) * 2/100;
        $pendapatanklaim = $saldosetorklaim + $saldotunggakanklaim - $saldojumlahklaim;
        $pendapatantarik = $saldosetortarik + $saldotunggakantarik - $saldojumlahtarik;
        $administrasiall = $administrasiklaim + $administrasitarik;
        $pendapatanjumlah = $pendapatanklaim + $pendapatantarik + $saldosimkesanhangus + $pendapatansimkesan;
        ?>
        
        <h3> Pendapatan </h3>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <tr>
                <td width="300px">Klaim</td>
				<td width="300px"><?= neraca($pendapatanklaim);?></td>
            </tr>
            <tr>
                <td width="300px">Tarik</td>
				<td width="300px"><?= neraca($pendapatantarik);?></td>
            </tr>
            <tr>
                <td width="300px">Gugur</td>
				<td width="300px"><?= neraca($saldosimkesanhangus);?></td>
            </tr>
            <tr>
                <td width="300px">Administrasi</td>
				<td width="300px"><?= neraca($administrasiall);?></td>
            </tr>
            <tr>
                <td width="300px">Pendapatan Simkesan</td>
				<td width="300px"><?= neraca($pendapatansimkesan);?></td>
            </tr>
            <tr>
                <td width="300px">Lain-lain</td>
                <td width="300px"><?= neraca(0);?></td>  
            </td>
            <tr id="01">
                <td width="300px">Jumlah</td>
				<td width="300px"><?= neraca($pendapatanjumlah);?></td></td>
            </tr>
            </tbody>
            
        </table>
        
        <h3> Biaya </h3>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <tr>
                <td width="300px">Insentif</td>
				<td width="300px"><?= neraca($phuinsentif);?></td>
            </tr>
            <tr>
                <td width="300px">Gaji</td>
				<td width="300px"><?= neraca($phugaji);?></td>
            </tr>
            <tr>
                <td width="300px">Promosi</td>
				<td width="300px"><?= neraca($phupromosi);?></td>
            </tr>
            <tr>
                <td width="300px">Lain Lain</td>
				<td width="300px"><?= neraca($phulainlain);?></td>
            </tr>
        <?php
            $totalpengeluaran = $phuinsentif+ $phugaji + $phupromosi + $phulainlain;
            $totalpendapatan = $pendapatanjumlah;
            $jumlahshu = $totalpendapatan - $totalpengeluaran;
        ?>
            <tr id="01">
                <td width="300px">Total Biaya</td>
				<td width="300px"><?= neraca($totalpengeluaran);?></td>
            </tr>
            <tr id="02">
                <td width="300px">SHU</td>
				<td width="300px"><?= neraca($jumlahshu);?></td>
            </tr>
            </tbody>
        </table>