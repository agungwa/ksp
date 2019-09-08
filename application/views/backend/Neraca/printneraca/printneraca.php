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

     #container
{
 margin: 0 auto;
 width: 900px;
 background: #fff;
}

#header
{
 background: #ccc;
 padding: 20px;
}

#header h1 { margin: 0; }

#navigation
{
 float: left;
 width: 900px;
 background: #333;
}

#navigation ul
{
 margin: 0;
 padding: 0;
}

#navigation ul li
{
 list-style-type: none;
 display: inline;
}

#navigation li a
{
 display: block;
 float: left;
 padding: 5px 10px;
 color: #fff;
 text-decoration: none;
 border-right: 1px solid #fff;
}

#navigation li a:hover { background: #383; }

#content-container
{
 float: left;
 width: 900px;
 background: #fff;
}

#content
{
 clear: left;
 float: left;
 width: 400px;
 padding: 20px 0;
 margin: 0 0 0 30px;
 display: inline;
}

#content h2 { margin: 0; }

#aside
{
 float: right;
 width: 400px;
 padding: 20px 0;
 margin: 0 20px 0 0;
 display: inline;
}

#aside h3 { margin: 0; }

#footer
{
 clear: left;
 background: #ccc;
 text-align: right;
 padding: 20px;
 height: 1%;
}
 </style>
        <?php
        $kas=$shudata + $bungasimpanan +$saldoinvestasi + $saldosimpananwajib+$saldosimpananpokok+ $pokokangsuranpelunasan + $pokokangsuran + $saldosimpananneraca - $saldopinjamanumum - $saldopinjamankaryawan-$saldopinjamankhusus;
        $jal=$kas + $kasbankdata + $saldopinjamanumumbelum + $saldopinjamankaryawanbelum+$saldopinjamankhususbelum;
        $jat=$aktivatetaptanah+$aktivatetapbangunan+$aktivatetapelektronik+$aktivatetapkendaraan+$aktivatetapperalatan+$aktivatetappenyusutan;
        $jkl=$saldosimpananneraca+$bungasimpanan;
        $jkp=$saldoinvestasi+$simpanankaryawandata+$rekeningkoran+$modalpenyertaan;
        $jek=$saldosimpananwajib+$saldosimpananpokok+$simpanancdr+$donasi+$shudata;
        ?>
        <table >
            <tbody >
            <tr >
                <td width="500px">AKTIVA</td>
				<td width="500px">PASIVA</td>
            </tr >
            <tr >
                <td width="200px">Kas</td>
				<td width="200px"><?= neraca($kas);?></td>
                
                <td width="200px">Kas diBank</td>
				<td width="200px"><?= neraca($kasbankdata);?></td>
            </tr>
            <tr>
                <td >Kas diBank</td>
				<td ><?= neraca($kasbankdata);?></td>
            </tr>
            <tr>
                <td >Piutang Anggota</td>
				<td ><?= rupiahsimpanan($saldopinjamanumumbelum);?></td>
            </tr>
            <tr>
                <td >Piutang Karyawan</td>
				<td ><?= rupiahsimpanan($saldopinjamankaryawanbelum);?></td>
            </tr>
            <tr>
                <td >Piutang Khusus</td>
				<td ><?= rupiahsimpanan($saldopinjamankhususbelum);?></td>
            </tr>
            <tr class>
            <td >Jumlah Aktiva Lancar</td>
                <td  width="380px"><?= rupiahsimpanan($jal);?></td>
            </td>
            </tr>
            
            <tr>
                <td  width="150px">Tanah</td>
				<td ><?= neraca($aktivatetaptanah);?></td>
            </tr>
            <tr>
                <td >Bangunan</td>
				<td ><?= neraca($aktivatetapbangunan);?></td>
            </tr>
            <tr>
                <td >Elektronik</td>
				<td ><?= neraca($aktivatetapelektronik);?></td>
            </tr>
            <tr>
                <td >Kendaraan</td>
				<td ><?= neraca($aktivatetapkendaraan);?></td>
            </tr>
            <tr>
                <td >Peralatan</td>
				<td ><?= neraca($aktivatetapperalatan);?></td>
            </tr>
            <tr>
                <td >Akumulasi Penyusutan AT</td>
				<td ><?= neraca($aktivatetappenyusutan);?></td>
            </tr>
            <tr class>
                <td >Jumlah Aktiva Tetap</td>
				<td ><?= neraca($jat);?></td>
            </tr>

            <tr color="#DC143C">
                <td >Jumlah</td>
				<td ><?= rupiahsimpanan($jat+$jal);?></td>
            </tr>
            <tr>
                <td  width= "200px">Simpanan Berjangka</td>
				<td ><?= neraca($saldosimpananneraca);?></td>
            </tr>
            <tr>
                <td >Utang Bunga</td>
				<td ><?= neraca($bungasimpanan);?></td>
            </tr>
            <tr class>
                <td >Jumalah Kewajiban Lancar</td>
				<td ><?= neraca($jkl);?></td>
            </tr>

            <tr>
                <td  width= "200px">Investasi Berjangka</td>
				<td ><?= neraca($saldoinvestasi);?></td>
            </tr>
            <tr>
                <td >Simpanan Karyawan</td>
				<td ><?= neraca($simpanankaryawandata);?></td>
            </tr>
            <tr>
                <td >Rekening Koran (BRI)</td>
				<td ><?= neraca($rekeningkoran);?></td>
            </tr>
            <tr>
                <td >Modal Penyertaan</td>
				<td ><?= neraca($modalpenyertaan);?></td>
            </tr>
            <tr class>
                <td >Jumlah Kewajiban Lancar</td>
				<td ><?= neraca($jkp);?></td>
                
            </tr>

            <tr>
                <td  width= "200px">Simpanan Wajib</td>
				<td ><?= neraca($saldosimpananwajib);?></td>
            </tr>
            <tr>
                <td >Simpanan Pokok</td>
				<td ><?= neraca($saldosimpananpokok);?></td>
            </tr>
            <tr>
                <td >Simpanan CDR</td>
				<td ><?= neraca($simpanancdr);?></td>
            </tr>
            <tr>
                <td >Donasi</td>
				<td ><?= neraca($donasi);?></td>
            </tr>
            <tr>
                <td >SHU</td>
				<td ><?= neraca($shudata);?></td>
            </tr>
            <tr class>
                <td >Jumlah Ekuitas</td>
				<td ><?= neraca($jek);?></td>
            </tr>

            <tr color="#DC143C">
                <td >Jumlah</td>
				<td ><?= neraca($jek+$jkl+$jkp);?></td>
            </tr>
            </tbody>
        </table>
        
        

       