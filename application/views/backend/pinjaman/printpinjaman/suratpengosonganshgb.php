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
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt">
                            </span><span
                                style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">
                                SURAT PERNYATAAN PENGOSONGAN</span>
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
                                style="font-family:'Calibri Light'">Yang bertanda tangan di bawah ini :</span></p>
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
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:5pt"><span style="font-family:'Calibri Light'">&nbsp;</span></p>
        
        <table id="02" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Menyatakan bahwa, saya mengijinkan dari 
                                pihak KSP ”SIDO MUKTI MAKMUR” untuk memasang papan 
                                pengumuman di <?php echo $jaminan_data->jam_unit ?> 
                                dengan keterangan SHGB sebagai berikut : </span></p>
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
            </tbody>
        </table> 
        <table id="02" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Dikarenakan saya tidak membayar angsuran selama 2 (dua) bulan berturut – turut 
                                sesuai perjanjian yang telah ada dan setelah menerima Surat Pemberitahuan, Surat Somasi I dan Surat Somasi II,  
                                saya berikan kuasa sepenuhnya kepada KSP ”Sido Mukti Makmur” untuk proses selanjutnya.</td>
                </tr>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:'Calibri Light'">Demikian surat pernyataan ini saya buat tanpa 
                                adanya paksaan dan tekanan dari pihak manapun. 
                                Dan dapat digunakan sesuai hukum yang berlaku.</span></p>
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
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria"></span>  <span style="font-family:Cambria"></span>
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
                                style="font-family:Cambria">Saksi</span></p>
                    </td>
                    
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria">Yang Menyatakan</span></p>
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
                                style="font-family:Cambria; font-weight:bold">(<?php echo $penjamin_data->pen_nama ?>)</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(</span><span
                                style="font-family:Cambria; font-weight:bold"><?php echo $ang_nama ?></span><span
                                style="font-family:Cambria; font-weight:bold">)</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>