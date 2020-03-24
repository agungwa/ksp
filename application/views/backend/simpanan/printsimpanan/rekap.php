<style>
table#01 {
    border-collapse: collapse;
    width: 100%;
    text-align: center;
}
table#02 {
    text-align: justify;
}
table#03 {
    text-align: center;
}
table#04 {
    text-align: right;
}
 	h2,h3,h4{text-align: center}
</style>

 <?php $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row(); ?>
 <h4><b>Rekap Simpanan Tanggal : <?=dateFormataja($f)?> </b></h4>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt"><span
    style="font-family:Cambria">Wilayah : <?php if($w!='all'){echo $wil_kode->wil_nama;} else if ($w='all' or $w='') {echo 'Semua Wilayah';}?></p>
    
 <br></br>
        <h4> Kas Masuk </h4>
        <table id="02">
            <tbody>
            <tr>
                <td width="500">Setoran Simpanan Masuk</td>
				<td><?= neraca($saldosimpanan);?></td>
            </tr>
            <tr>
                <td>PH Buku</td>
				<td><?= neraca($phbuku);?></td>
            </tr>
            <tr>
                <td>Administrasi</td>
				<td><?= neraca($administrasi);?></td>
            </tr>
            <tr>
                <td>lain-lain</td>
				<td><?= neraca($lsm);?></td>
            </tr>
            <tr bgcolor="#53d3ed">
                <td>Total masuk</td>
				<td><?= neraca($totalmasuk);?></td>
            </tr>
            </tbody>
        </table>
        
        <h4> Kas Keluar </h4>
        <table id="02">
            <tbody>
            <tr>
                <td width="500">Penarikan Simpanan</td>
				<td><?= neraca($saldosimpananditarik);?></td>
            </tr>
            <tr>
                <td>Bunga Simpanan Ditarik</td>
				<td><?= neraca($bungaditarik);?></td>
            </tr>
            <tr>
                <td>Lain-lain</td>
				<td><?= neraca($lsk);?></td>
            </tr>
            <tr bgcolor="#53d3ed">
                <td>Total keluar</td>
				<td><?= neraca($totalkeluar);?></td>
            </tr>
            </tbody>
        </table>
        <table id="02">
            <tbody>
            <tr bgcolor="#ed5353">
                <td width="500">Total Rekap Simpanan</td>
				<td><?= neraca($totalrekapsimpanan);?></td>
            </tr>
            </tbody>
        </table>