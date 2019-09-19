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
</style>
<?php 
        $angsuranbunga=$pin_pinjaman*$bup_id/100;
        $provisi=$pin_pinjaman*$pop_id/100;
        $pinjamanditerima=$pin_pinjaman-$provisi;
        $angsuran=($pin_pinjaman/$sea_id)+$angsuranbunga;
        $angsuranpokok=$pin_pinjaman/$sea_id;
        ?>
<?php include('header1.php');?>
    <div>
        <table id="01" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">BERITA ACARA</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">SERAH TERIMA AGUNAN</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt"><span
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline"></span><span
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">
                            </span><span
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">
                                NO.</span><span
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">
                            </span><span
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">SPPH
                                :<?php echo $pin_id ?>/SHGB/SMM.K/
                                <?php
                                $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                                $bln = $array_bln[date('n')];
                                echo $bln;
                                ?>/<?php echo date('Y'); ?></span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top:0pt; margin-bottom:0pt; text-indent:36pt; text-align:center; font-size:10pt"><span
                style="font-family:'Calibri Light'; font-weight:bold">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Pada hari ini,
                                &nbsp; <?php echo hari_ini(),' , ',dateFormataja($this->tgl) ?> &nbsp; telah dilakukan Serah Terima Agunan:</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Dari:</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:5pt"><span style="font-family:'Calibri Light'">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Nama</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo $ang_nama ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Tempat, Tanggal Lahir</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo dateFormataja($ang_tgllahir) ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Alamat</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo $ang_alamat ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Nomor KTP</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo $ang_noktp ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">No. Tlp/HP</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo $ang_nohp ?></span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Selanjutnya disebut </span><span
                                style="font-family:'Calibri Light'; font-weight:bold">PIHAK PERTAMA</span></p>
                    </td>
                </tr>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:5pt"><span style="font-family:'Calibri Light'">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Ke KSP Sido Mukti Makmur, yang diwakili:</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width:539.45pt; border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Nama</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Vika Amelia Nurjannah, S.E</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Tempat, Tanggal Lahir</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Temanggung</span><span
                                style="font-family:'Calibri Light'">, </span><span
                                style="font-family:'Calibri Light'">27 Mei 1994</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Alamat</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">KEDU 6/3 KEDU</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Pekerjaan</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Karyawan swasta</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Nomor KTP</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">3323076705940001</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">No. Tlp/HP</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">085740525073</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Selanjutnya disebut </span><span
                                style="font-family:'Calibri Light'; font-weight:bold">PIHAK KEDUA</span></p>
                    </td>
                </tr>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:5pt"><span style="font-family:'Calibri Light'">&nbsp;</span></p>
        
        <table id="02" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Dengan ketentuan sebagai berikut:</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">PIHAK
                                PERTAMA telah menyerahkan kepada PIHAK KEDUA, dan PIHAK KEDUA mengakui
                                telah menerima dari PIHAK PERTAMA sebuah SHGB dengan data sebagai
                                berikut:</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin-left:44.75pt; border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">SHGB Atas Nama</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_atasnama ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Nomor Hak Milik</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_nomor ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Luas</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_luas ?> M2</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Pinjaman</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo rupiah($pin_pinjaman) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Pokok</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuranpokok) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Bunga</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuranbunga) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Angsuran</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuran) ?></span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">x </span><span
                                style="font-family:Cambria"><?php echo $sea_id ?></span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Bulan</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:200.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Jatuh</span><span
                                style="font-family:Cambria"> Tempo </span><span
                                style="font-family:Cambria">Pembayaran</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo dateFormatTanggal($pin_tglpencairan) ?></span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Tiap</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Bulan</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:200.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Waktu</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">Pelunasan</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo dateFormataja($tgl_pelunasan) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Denda</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">0.5% per </span><span
                                style="font-family:Cambria">hari</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">dari</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">sisa</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">angsuran</span></p>
                    </td>
                </tr>
            </tbody>
        </table> 
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Pelunasan dipercepat, SHGB dikeluarkan 3 (tiga) hari setelah tanggal pelunasan.</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Demikian berita acara serah terima agunan ini dibuat 
                                dengan sebenar – benarnya dan ditanda tangani dalam keadaan sehat jasmani dan rohani, 
                                serta tanpa ada unsur paksaan dari pihak manapun dan dapat digunakan sebagaimana mestinya.</span></p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top:0pt; margin-bottom:0pt; font-size:5pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table id="04" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:500.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10pt"><span
                                style="font-family:Cambria">Temanggung</span><span
                                style="font-family:Cambria">,</span><span style="font-family:Cambria">
                                <?php echo hari_ini(),' , ',dateFormataja($this->tgl) ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria"></span>PIHAK PERTAMA<span style="font-family:Cambria"></span>
                        </p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">PIHAK KEDUA</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria"></span>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt">
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria">Kabag. Pinjaman </span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(<?php echo $ang_nama ?>)</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold"></span><span
                                style="font-family:Cambria; font-weight:bold"></span><span
                                style="font-family:Cambria; font-weight:bold"></span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(</span><span
                                style="font-family:Cambria; font-weight:bold">Vika Amelia N, S.E</span><span
                                style="font-family:Cambria; font-weight:bold">)</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria"></span> A.n Direktur <span style="font-family:Cambria"></span>
                        </p>   
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria">KSP SIDO MUKTI MAKMUR</span></p>
                    </td>
                    
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria">Administrasi</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(Dina Andriyanti, S.Akun)</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(</span><span
                                style="font-family:Cambria; font-weight:bold">Erlin Amaliya</span><span
                                style="font-family:Cambria; font-weight:bold">)</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>