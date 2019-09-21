<style>
table#02 {
    border-collapse: collapse;
    width: 100%;
    text-align: center;
}
table#03 {
    text-align: justify;
}
table#05 {
    text-align: center;
}
table#06 {
    text-align: right;
}
</style>

<?php include('header1.php');?>
<?php   
        $ivb_kode = $this->db->get_where('investasiberjangka', array('ivb_kode' => $jaminan_data->jam_nomor))->row();
        $ang_no = $this->db->get_where('anggota', array('ang_no' => $ivb_kode->ang_no))->row();
        $angsuranbunga=$pin_pinjaman*$bup_id/100;
        $provisi=$pin_pinjaman*$pop_id/100;
        $pinjamanditerima=$pin_pinjaman-$provisi;
        $angsuran=($pin_pinjaman/$sea_id)+$angsuranbunga;
        $angsuranpokok=$pin_pinjaman/$sea_id;
        ?>

    <div>
        <table id="02" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:471.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:16pt"><span
                                style="font-family:Cambria; font-weight:bold; text-decoration:underline">SURAT
                                PERNYATAAN</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:471.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria; font-weight:bold">No. </span><span
                                style="font-family:Cambria; font-weight:bold"><?php echo $pin_id ?></span><span
                                style="font-family:Cambria; font-weight:bold">.</span><span
                                style="font-family:Cambria; font-weight:bold">DPT</span><span
                                style="font-family:Cambria; font-weight:bold">/SMM.K/</span><span
                                style="font-family:Cambria; font-weight:bold"> <?php
                    $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                    $bln = $array_bln[date('n')];
                    echo $bln;
                    ?>/<?php echo date('Y'); ?></span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:471.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Yang </span><span
                                style="font-family:Cambria">bertandatangan</span><span style="font-family:Cambria"> di
                            </span><span style="font-family:Cambria">bawah</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ini</span><span style="font-family:Cambria">
                                :</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Nama</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo $ang_nama ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Alamat</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo $ang_alamat ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Tempat</span><span style="font-family:Cambria">,
                            </span><span style="font-family:Cambria">Tanggal</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Lahir</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo $ang_tempatlahir,', ',dateFormataja($ang_tgllahir) ?></span></p>
                    </td>
                </tr>
                <!--<tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Pekerjaan</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">...............................................</span></p>
                    </td>
                </tr>-->
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">No HP</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo $ang_nohp ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:471.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Mempunyai</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pinjaman</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dengan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">rincian</span><span style="font-family:Cambria">
                                :</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Pinjaman</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo rupiah($pin_pinjaman) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Pokok</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuranpokok) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Bunga</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuranbunga) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Angsuran</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:350.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuran) ?>  X <?php echo $sea_id ?> </span><p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Tanggal</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Jatuh</span><span style="font-family:Cambria">
                                Tempo</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo dateFormatTanggal($pin_tglpencairan) ?></span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Tiap</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">bulan</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Tanggal</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Pelunasan</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo dateFormataja($tgl_pelunasan) ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:471.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Apabila</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">telat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dalam</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pembayaran</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">lebih</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dari</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">3</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">(</span><span
                                style="font-family:Cambria; font-style:italic">tiga</span><span
                                style="font-family:Cambria">)</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">hari</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">setelah</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">jatuh</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tempo </span><span
                                style="font-family:Cambria">maka</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">saya</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">bersedia</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">didatangi</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">oleh</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">petugas</span><span
                                style="font-family:Cambria">.</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id ="03" style="margin-left:26.75pt; border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:8.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">1.</span></p>
                    </td>
                    <td style="width:425.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">Apabila</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">telat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dalam</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pembayaran</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tiap</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">bulannya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">maka</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">bersedia</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">membayar</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">denda</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">setiap</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">hari</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">sebesar</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria; font-weight:bold">0.5% </span><span
                                style="font-family:Cambria; font-weight:bold">dari</span><span
                                style="font-family:Cambria; font-weight:bold"> </span><span
                                style="font-family:Cambria; font-weight:bold">sisa</span><span
                                style="font-family:Cambria; font-weight:bold"> </span><span
                                style="font-family:Cambria; font-weight:bold">tanggungan</span><span
                                style="font-family:Cambria; font-weight:bold"> </span><span
                                style="font-family:Cambria">selama</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">masa</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">keterlambatan</span><span
                                style="font-family:Cambria">.</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:8.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">2.</span></p>
                    </td>
                    <td style="width:425.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">Saya</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">mengijinkan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">kepada</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pihak</span><span style="font-family:Cambria"> KSP
                                SIDO MUKTI MAKMUR </span><span style="font-family:Cambria">untuk</span><span
                                style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">membekukan</span><span style="font-family:Cambria"> saldo
                                Tabungan Investasi Berjangka saya</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">sesuai</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">saldo</span><span
                                style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">pinjaman</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria"> yang
                            </span><span style="font-family:Cambria">belum</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">lunas</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ditambah</span><span style="font-family:Cambria"> 2
                                (</span><span style="font-family:Cambria">dua</span><span style="font-family:Cambria">)
                                kali </span><span style="font-family:Cambria">angsuran</span><span
                                style="font-family:Cambria">. </span><span style="font-family:Cambria">Atas</span><span
                                style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">pinjaman</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tersebut</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">diatas</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">menjaminkan</span><span
                                style="font-family:Cambria"> buku tabungan Investasi Berjangka </span><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:88.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:61.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">Nama</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:282.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo $ang_no->ang_nama ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:88.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:61.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">Alamat</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:282.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo $ang_no->ang_alamat ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:88.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:61.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">No. </span><span style="font-family:Cambria">Rek</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:282.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_nomor ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:471.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Apabila</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pinjaman</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">atas</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">nama</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">belum</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">lunas</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">maka</span><span style="font-family:Cambria">,
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">mengijinkan</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">untuk</span><span
                                style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">dibekukan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">sesuai</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">sisa</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saldo</span><span style="font-family:Cambria"> yang
                            </span><span style="font-family:Cambria">belum</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">lunas</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">akan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ambil</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">setelah</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">melunasi</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">semua</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pinjaman</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tersebut</span><span style="font-family:Cambria">.
                            </span><span style="font-family:Cambria">Demikian</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">surat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pernyataan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ini</span><span style="font-family:Cambria">,
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">buat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tanpa</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ada</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">unsur</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">paksaan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tekanan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dari</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pihak</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">manapun</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dapat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">digunakan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">sesuai</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ketentuan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">hukum</span><span style="font-family:Cambria"> yang
                            </span><span style="font-family:Cambria">berlaku</span><span
                                style="font-family:Cambria">.</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="06" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:471.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
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
        <table id="05" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">a.n Direktur</span></p>
                    </td>
                    <td style="width:149.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:149.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Yang </span><span
                                style="font-family:Cambria">membuat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pernyataan</span><span
                                style="font-family:Cambria">,</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">KSP Sido Mukti Makmur</span></p>
                    </td>
                    <td style="width:149.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Kepala</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Mantri</span></p>
                    </td>
                    <td style="width:149.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
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
                    <td style="width:149.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
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
                    <td style="width:149.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
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
                    <td style="width:149.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">( </span><span style="font-family:Cambria">Dina
                                Andriyanti, S.Akun</span><span style="font-family:Cambria"> )</span></p>
                    </td>
                    <td style="width:149.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">( </span><span style="font-family:Cambria">Vika Amelia N,
                                S.E )</span></p>
                    </td>
                    <td style="width:149.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:12pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">(</span><span
                                style="font-family:Cambria"> <?php echo $ang_nama ?> )</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="05" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:471.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria">Mengetahui</span><span style="font-family:Cambria">,</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="05" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:230.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">KEPALA DESA</span></p>
                    </td>
                    <td style="width:230.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">PENJAMIN</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:230.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
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
                    <td style="width:230.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
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
                    <td style="width:230.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria">( …………………… )</span></p>
                    </td>
                    <td style="width:230.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria">( <?php echo $penjamin_data->pen_nama ?> )</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:11pt"><span
                style="font-family:Calibri">&nbsp;</span></p>
    </div>