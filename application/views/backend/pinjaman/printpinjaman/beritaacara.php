<style>
table#02 {
    border-collapse: collapse;
    width: 100%;
    text-align: center;
}
table#04 {
    text-align: justify;
}
table#05 {
    text-align: center;
}
</style>

<?php 
        $angsuranbunga=$pin_pinjaman*$bup_id/100;
        $provisi=$pin_pinjaman*$pop_id/100;
        $pinjamanditerima=$pin_pinjaman-$provisi;
        $angsuran=($pin_pinjaman/$sea_id)+$angsuranbunga;
        $angsuranpokok=$pin_pinjaman/$sea_id;
        ?>
<body>

<?php include('header2.php');?>
    <div>
        <table id="02" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
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
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">NO.</span><span
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">
                            </span><span
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">SPPH
                                :</span><span
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">
                                NO.</span><span
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">
                            </span><span
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">SPPH
                                :<?php echo $pin_id ?>/BP/SMM.K/
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
                                &nbsp; <?php echo dateFormataja($this->tgl) ?> &nbsp; telah dilakukan Serah Terima Agunan:</span></p>
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
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                style="font-family:'Calibri Light'">&nbsp;</span></p>
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
                <!--<tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Pekerjaan</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">........................................................</span>
                        </p>
                    </td>
                </tr>-->
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
                <tr>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                style="font-family:'Calibri Light'">&nbsp;</span></p>
                </tr>
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
                                telah menerima dari PIHAK PERTAMA sebuah BPKB dengan data sebagai
                                berikut:</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                style="font-family:'Calibri Light'">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:102.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Satu Unit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span></p>
                    </td>
                    <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td colspan="2" style="width:337.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo ' ',$jaminan_data->jam_unit ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:102.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Nomor Registrasi</span></p>
                    </td>
                    <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td colspan="2" style="width:337.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo $jaminan_data->jam_noregistrasi ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:102.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Nomor BPKB</span></p>
                    </td>
                    <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td colspan="2" style="width:337.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo $jaminan_data->jam_nomor ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:102.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Tahun Pembuatan</span></p>
                    </td>
                    <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td colspan="2" style="width:337.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo $jaminan_data->jam_tahunpembuatan ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:102.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Atas Nama</span></p>
                    </td>
                    <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td colspan="2" style="width:337.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo $jaminan_data->jam_atasnama ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:102.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Alamat</span></p>
                    </td>
                    <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">:</span></p>
                    </td>
                    <td colspan="2" style="width:337.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo $jaminan_data->jam_alamat ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="width:528.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:70.9pt; margin-bottom:0pt; text-indent:-70.9pt; text-align:justify; font-size:10pt">
                            <span style="font-family:'Calibri Light'">BPKB tersebut diatas digunakan sebagai Jaminan
                                Hutang pada KSP Sido Mukti Makmur senilai:&nbsp;<?php echo rupiah($pin_pinjaman) ?> </span><span
                                style="font-family:'Calibri Light'">- </span><span
                                style="font-family:'Calibri Light'; font-style:italic">(<?php echo terbilang($pin_pinjaman) ?>&nbsp;Rupiah)</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:102.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Angsuran Pokok</span><span
                                style="width:7.410pt; display:inline-block">&nbsp;</span></p>
                    </td>
                    <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td colspan="2" style="width:337.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo rupiah($angsuranpokok) ?></span><span style="font-family:'Calibri Light'">,-&nbsp;
                                (<?php echo terbilang($angsuranpokok) ?>&nbsp;Rupiah)</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:102.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Bunga</span></p>
                    </td>
                    <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td colspan="2" style="width:337.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo rupiah($angsuranbunga) ?></span><span style="font-family:'Calibri Light'">,-&nbsp;
                                (<?php echo terbilang($angsuranbunga) ?>&nbsp;Rupiah)</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:102.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Angsuran tiab Bulan</span></p>
                    </td>
                    <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td colspan="2" style="width:337.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo rupiah($angsuran) ?>,-&nbsp;
                                (<?php echo terbilang($angsuran) ?>&nbsp;Rupiah)</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:102.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Tenor Angsuran</span></p>
                    </td>
                    <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td colspan="2" style="width:337.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'"><?php echo $sea_id ?></span><span
                                style="font-family:'Calibri Light'"> </span><span
                                style="font-family:'Calibri Light'; font-style:italic">(<?php echo ' ',terbilang($sea_id),' ' ?>)</span><span
                                style="font-family:'Calibri Light'">Bulan</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td colspan="2" style="width:150.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Jatuh Tempo Pembayaran</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:323.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">: Tanggal <?php echo dateFormatTanggal($pin_tglpencairan) ?> Tiap Bulan</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:53pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td colspan="2" style="width:150.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Waktu Pelunasan Maksimal</span></p>
                    </td>
                    <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:323.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">: <?php echo dateFormataja($tgl_pelunasan) ?></span>
                        </p>
                    </td>
                </tr>
                
            </tbody>
        </table>
        <p
            style="margin-top:0pt; margin-left:70.9pt; margin-bottom:0pt; text-indent:-70.9pt; text-align:justify; font-size:10pt">
            <span style="width:70.9pt; text-indent:0pt; display:inline-block">&nbsp;</span><span
                style="font-family:'Calibri Light'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span><span style="font-family:'Calibri Light'"> </span><span
                style="width:34.67pt; text-indent:0pt; display:inline-block">&nbsp;</span></p>
        <table id="04" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:528.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:70.9pt; margin-bottom:0pt; text-indent:-70.9pt; text-align:justify; font-size:10pt">
                            <span style="font-family:'Calibri Light'">Apabila hutang di lunasi sebelum waktu pelunasan
                                (Pelunasan dipercepat), maka BPKB tersebut diatas akan di</span></p>
                        <p
                            style="margin-top:0pt; margin-left:70.9pt; margin-bottom:0pt; text-indent:-70.9pt; text-align:justify; font-size:10pt">
                            <span style="font-family:'Calibri Light'">keluarkan 3 </span><span
                                style="font-family:'Calibri Light'">(</span><span
                                style="font-family:'Calibri Light'">tiga</span><span
                                style="font-family:'Calibri Light'">) hari setelah tanggal pelunasan.</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:528.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Demikian
                                Berita Acara Serah Terima Agunan ini di tandatangani bersama dan&nbsp;
                                dibuat dengan sebenar-benarnya dalam keadaan sehat jasmani dan rohani,
                                serta tanpa paksaan dari pihak manapun dan dapat digunakan sebagaimana
                                mestinya sesuai hukum yang berlaku.</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:5pt"><span
                style="font-family:'Calibri Light'">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:169pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:169.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:169.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Temanggung,<?php echo hari_ini(),' , ',dateFormataja($this->tgl) ?></span>
                </tr>
        </table>
        
        <table id="05" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width:169pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:10pt">
                            <span style="font-family:'Calibri Light'">PIHAK PERTAMA</span></p>
                        <p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:10pt">
                            <span style="font-family:'Calibri Light'">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">(</span><span
                                style="font-family:'Calibri Light'; font-weight:bold"> <?php echo $ang_nama ?> </span><span
                                style="font-family:'Calibri Light'; font-weight:bold">)</span></p>
                    </td>
                    <td style="width:169.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:169.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:10pt">
                            <span style="font-family:'Calibri Light'">PIHAK KEDUA</span></p>
                        <p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:10pt">
                            <span style="font-family:'Calibri Light'; font-weight:bold">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">( </span><span
                                style="font-family:'Calibri Light'; font-weight:bold">Vika</span><span
                                style="font-family:'Calibri Light'; font-weight:bold"> Amelia N, S.E</span><span
                                style="font-family:'Calibri Light'; font-weight:bold">)</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:169pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:169.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Mengetahui</span><span
                                style="font-family:'Calibri Light'">,</span></p>
                    </td>
                    <td style="width:169.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:169pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">a.n</span><span style="font-family:'Calibri Light'">
                            </span><span style="font-family:'Calibri Light'">Direktur</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">KSP SIDO MUKTI MAKMUR</span></p>
                    </td>
                    <td style="width:169.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:169.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Administrasi</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:169pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">(Dina Andriyanti, S.Akun)</span>
                        </p>
                    </td>
                    <td style="width:169.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                    </td>
                    <td style="width:169.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:'Calibri Light'; font-weight:bold">(Erlin Amaliya)</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                style="font-family:'Calibri Light'">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-left:180pt; margin-bottom:0pt; font-size:10pt"><span
                style="font-family:'Calibri Light'">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:10pt"><span
                style="font-family:'Calibri Light'">&nbsp;</span></p>
    </div>
</body>

</html>