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

<h3> Pendapatan </h3>
        <table>
            <tbody class="thead-light">
            <tr>
                <td width="300px">Jasa Pinjaman</td>
				<td width="300px"><?= neraca($bungaangsuran + $bungadendapelunasan);?></td>
            </tr>
            <tr>
                <td width="300px">Administrasi</td>
				<td width="300px"><?= neraca($provisipinjaman);?></td>
            </tr>
            <tr>
                <td width="300px">Pinalti</td>
				<td width="300px"><?= neraca($dendaangsuran);?></td>
            </tr>
            <tr>
                <td width="300px">Administrasi 1%</td>
				<td width="300px"><?= neraca($administrasi);?></td>
            </tr>
            <tr>
                <td width="300px">Buku</td>
				<td width="300px"><?= neraca($phbuku);?></td>
            </tr>
            <tr>
                <td width="300px">Lain-lain</td>
                <td width="300px"><?= neraca($this->input->post('psis_lainlain',TRUE));?></td>  
            </td>
            <tr id="01">
                <td>Jumlah</td>
				<td><?= neraca($bungaangsuran + $bungadendapelunasan+$provisipinjaman+$dendaangsuran+$administrasi+$phbuku);?></td></td>
            </tr>
            </tbody>
            
        </table>
        
        <h3> Biaya </h3>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <tr>
                <td width="150px">Bunga Simpanan</td>
				<td width="150px"><?= neraca($bungasimpanan);?></td>
                <td width="150px">Bunga Investasi</td>
				<td width="150px"><?= neraca($jasainvestasiditarik);?></td>
            </tr>
            <tr>
                <td width="150px">Gaji</td>
				<td width="150px"><?= neraca($phugaji);?></td>
                <td width="150px">Listrik</td>
				<td width="150px"><?= neraca($phulps);?></td>
            </tr>
            <tr>
                <td width="150px">Komunikasi</td>
				<td width="150px"><?= neraca($phukomunikasi);?></td>
                <td width="150px">Perlengkapan</td>
				<td width="150px"><?= neraca($phuperlengkapan);?></td>
            </tr>
            <tr>
                <td width="150px">Penyusutan</td>
				<td width="150px"><?= neraca($phupenyusutan);?></td>
                <td width="150px">Asuransi</td>
				<td width="150px"><?= neraca($phuasuransi);?></td>
            </tr>
            <tr>
                <td width="150px">Isentif</td>
				<td width="150px"><?= neraca($phuisentif);?></td>
                <td width="150px">Pajak Kendaraan</td>
				<td width="150px"><?= neraca($phupajakkendaraan);?></td>
            </tr>
            <tr>
                <td width="150px">Rapat</td>
				<td width="150px"><?= neraca($phurapat);?></td>
                <td width="150px">ATK</td>
				<td width="150px"><?= neraca($phuatk);?></td>
            </tr>
            <tr>
                <td width="150px">Keamanan</td>
				<td width="150px"><?= neraca($phukeamanan);?></td>
                <td width="150px">PH Pinjaman</td>
				<td width="150px"><?= neraca($phuphpinjaman);?></td>
            </tr>
            <tr>
                <td width="150px">Sosial</td>
				<td width="150px"><?= neraca($phusosial);?></td>
                <td width="150px">Tasyakuran</td>
				<td width="150px"><?= neraca($phutasyakuran);?></td>
            </tr>
            <tr>
                <td width="150px">Koran</td>
				<td width="150px"><?= neraca($phukoran);?></td>
                <td width="150px">Pajak Koprasi</td>
				<td width="150px"><?= neraca($phupajakkoprasi);?></td>
            </tr>
            <tr>
                <td width="150px">Service Kendaraan</td>
				<td width="150px"><?= neraca($phuservicekendaraan);?></td>
                <td width="150px">Konsumsi</td>
				<td width="150px"><?= neraca($phukonsumsi);?></td>
            </tr>
            <tr>
                <td width="150px">RAT</td>
				<td width="150px"><?= neraca($phurat);?></td>
                <td width="150px">THR</td>
				<td width="150px"><?= neraca($phuthr);?></td>
            </tr>
            <tr>
                <td width="150px">Non Oprasional</td>
				<td width="150px"><?= neraca($phunonoprasional);?></td>
                <td width="150px">Perawatan Kantor</td>
				<td width="150px"><?= neraca($phuperawatankantor);?></td>
            </tr>
            
        <?php
        $totalphu = $phugaji+ $phuoprasional + $phulps + $phukomunikasi + $phuperlengkapan + $phupenyusutan + $phuasuransi + $phuisentif + $phupajakkendaraan + $phurapat + $phuatk + $phukeamanan + $phuphpinjaman + $phusosial +$phutasyakuran + $phukoran + $phupajakkoprasi + $phuservicekendaraan + $phukonsumsi + $phurat + $phuthr + $phunonoprasional + $phuperawatankantor; 
            $pengeluaranpsis = $bungasimpanan+$jasainvestasiditarik;
            $totalpengeluaran = $totalphu+$bungasimpanan+$jasainvestasiditarik;
            $totalpendapatan = $bungaangsuran + $bungadendapelunasan + $provisipinjaman + $dendaangsuran + $administrasi + $phbuku;
           $jumlahshu = $totalpendapatan - $totalpengeluaran;
        ?>
            <tr id="01">
                <td>Total Biaya</td>
				<td><?= neraca($totalpengeluaran);?></td>
            </tr>
            <tr id="02">
                <td>SHU</td>
				<td><?= neraca($totalpendapatan-$totalpengeluaran);?></td>
            </tr>
            </tbody>
        </table>