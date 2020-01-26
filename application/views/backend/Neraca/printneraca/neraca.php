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
 	h2{text-align: center}
 	h3{text-align: center}
</style>

<?php
        
        $jat=$aktivatetaptanah+$aktivatetapbangunan+$aktivatetapelektronik+$aktivatetapkendaraan+$aktivatetapperalatan+$phupenyusutan;
        $kas=$shudata + $simpanancdr + $donasi + $bungasimpanan + $rekeningkoran + $modalpenyertaan +$saldoinvestasi + $saldosimpananwajib+$saldosimpananpokok + $saldosimpananneraca - $saldopinjamanumumbelum - $saldopinjamankaryawanbelum-$saldopinjamankhususbelum - $jat;
        $jal=$kas + $kasbankdata + $saldopinjamanumumbelum + $saldopinjamankaryawanbelum+$saldopinjamankhususbelum;
        $jkl=$saldosimpananneraca+$bungasimpanan;
        $jkp=$saldoinvestasi+$simpanankaryawandata+$rekeningkoran+$modalpenyertaan;
        $jek=$saldosimpananwajib+$saldosimpananpokok+$simpanancdr+$donasi+$shudata;
       
        $kantorksp = $this->Kantorksp_model->get_by_id(1);
        
        ?>

<body>
 <h2><b>NERACA</b></h2>
 <h2><b>KSP Sido Mukti Makmur</b></h2>
 <?php $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row(); ?>
 <h3><b>Tanggal : <?=dateFormataja($f)?> </b></h3>
 <h3><b><?= $kantorksp->kks_nama ?> </b></h3>
 <!--<h3><b>Wilayah <?=$w?> <?php //if($w='all'){echo 'semua wilayah';}else {echo $wil_kode->wil_nama;}?></b></h3>-->
    <div>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td
                        style="width:259pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Calibri; font-weight:bold">AKTIVA</span></p>
                    </td>
                    <td
                        style="width:259pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Calibri; font-weight:bold">PASIVA</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:8pt; line-height:108%; font-size:11pt"><span
                style="font-family:Calibri">&nbsp;</span></p>
        <table style="width:567.05pt; border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td colspan="2" style="width:283.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri; font-weight:bold">AKTIVA LANCAR</span></p>
                    </td>
                    <td colspan="2" style="width:262.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri; font-weight:bold">KEWAJIBAN LANCAR</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Kas</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($kas);?></span></p>
                    </td>
                    <td style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Simpanan</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Berjangka</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($saldosimpananneraca);?></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Kas di Bank</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($kasbankdata);?></span></p>
                    </td>
                    <td style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Utang </span><span style="font-family:Calibri">Bunga</span>
                        </p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($bungasimpanan);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Piutang</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Anggota</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= rupiahsimpanan($saldopinjamanumumbelum);?></span></p>
                    </td>
                    <td
                        style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#bdd6ee">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Kewajiban</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Lancar</span></p>
                    </td>
                    <td
                        style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#bdd6ee">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($jkl);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Piutang</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Karyawan</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= rupiahsimpanan($saldopinjamankaryawanbelum);?></span></p>
                    </td>
                    <td colspan="2" style="width:262.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri; font-weight:bold">KEWAJIBAN JANGKA PANJANG</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Piutang</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Khusus</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= rupiahsimpanan($saldopinjamankhususbelum);?></span></p>
                    </td>
                    <td style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Investasi</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Berjangka</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($saldoinvestasi);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td
                        style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#bdd6ee">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Aktiva</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Lancar</span></p>
                    </td>
                    <td
                        style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#bdd6ee">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= rupiahsimpanan($jal);?></span></p>
                    </td>
                    <td style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Simpanan</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Karyawan</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($simpanankaryawandata);?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width:283.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">AKTIVA TETAP</span></p>
                    </td>
                    <td style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Rekening</span><span style="font-family:Calibri"> Koran
                                (BRI)</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($rekeningkoran);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Tanah</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($aktivatetaptanah);?></span></p>
                    </td>
                    <td style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Modal </span><span
                                style="font-family:Calibri">Penyertaan</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($modalpenyertaan);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Bangunan</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($aktivatetapbangunan);?></span>
                        </p>
                    </td>
                    <td
                        style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#bdd6ee">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Kewajiban</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Lancar</span></p>
                    </td>
                    <td
                        style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#bdd6ee">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($jkp);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Elektronik</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($aktivatetapelektronik);?></span>
                        </p>
                    </td>
                    <td colspan="2" style="width:262.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri; font-weight:bold">EKUITAS</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Kendaraan</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($aktivatetapkendaraan);?></span>
                        </p>
                    </td>
                    <td style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Simpanan</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Wajib</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($saldosimpananwajib);?></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Peralatan</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($aktivatetapperalatan);?></span>
                        </p>
                    </td>
                    <td style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Simpanan</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Pokok</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($saldosimpananpokok);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Akumulasi</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Penyusutan</span><span style="font-family:Calibri">
                                AT</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($phupenyusutan);?></span></p>
                    </td>
                    <td style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Simpanan</span><span style="font-family:Calibri"> CDR</span>
                        </p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($simpanancdr);?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td
                        style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#bdd6ee">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Aktiva</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Tetap</span></p>
                    </td>
                    <td
                        style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#bdd6ee">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($jat);?></span></p>
                    </td>
                    <td style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Donasi</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($donasi);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td
                        style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"></span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri"></span></p>
                    </td>
                    <td
                        style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"></p>
                    </td>
                    <td style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">SHU</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($shudata);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td
                        style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#bdd6ee">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Ekuitas</span></p>
                    </td>
                    <td
                        style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#bdd6ee">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($jek);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td
                        style="width:145.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#a8d08d">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Aktiva</span></p>
                    </td>
                    <td
                        style="width:127.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#a8d08d">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= rupiah($jat+$jal);?></p>
                    </td>
                    <td
                        style="width:134.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#a8d08d">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Pasiva</span></p>
                    </td>
                    <td
                        style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#a8d08d">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= rupiah($jek+$jkl+$jkp);?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="04" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:600.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:right; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Temanggung</span><span style="font-family:Cambria">,
                            </span><span style="font-family:Cambria"> <?php echo hari_ini(),' , ',dateFormataja($this->tgl) ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:200.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria"></span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;Oleh</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria"></span><span
                                style="font-family:Cambria"></span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria"></span><span
                                style="font-family:Cambria"></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:200.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria"></span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Pengurus KSP</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">"Sido Mukti Makmur"</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:200.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:200.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria; text-decoration:underline">Aryadi, S.E</span></p><p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Ketua</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria ; text-decoration:underline">Retno Eko Astuti</span></p><p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Sekretaris</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:12pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria; text-decoration:underline">Adila Septi Mayasa</span></p><p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Bendahara</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <!-- <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:600.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria">Mengetahui</span><span style="font-family:Cambria">,</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

       <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">KEPALA DESA</span></p>
                    </td>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">PENJAMIN</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria">( …………………… )</span></p>
                    </td>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria">( ........ )</span></p>
                    </td>
                </tr>
            </tbody>
        </table>-->
    </div>
</body>