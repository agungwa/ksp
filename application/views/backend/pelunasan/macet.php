
    <div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('pelunasan/'); ?>" class="form-inline" method="get">
            <input type="hidden" name="p" value="3">
            <div class="col-md-4 text-left">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No Pinjaman">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pelunasan/?p=3'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>

	    <div class="row" style="margin-top: 10px">
        <div class="ibox-content">
	        	<?php 
	        	if ($pinjaman != null) {
	        	?><table class="table">
                <tr><td>Rekening Pinjaman</td><td><?php echo $pinjaman['pin_id']; ?></td></tr>
                <tr><td>Anggota</td><td><?php echo $pinjaman['ang_no']; ?></td></tr>
                <tr><td>Tenor</td><td><?php echo $pinjaman['sea_id']," Bulan"; ?></td></tr>
                <tr><td>Bunga Pinjaman</td><td><?php echo $pinjaman['bup_id']," %"; ?></td></tr>
                <tr><td>Potongan Provisi</td><td><?php echo $pinjaman['pop_id']; ?></td></tr>
                <tr><td>Wilayah</td><td><?php echo $pinjaman['wil_kode']; ?></td></tr>
                <tr><td>Kategori Peminjam</td><td><?php echo $pinjaman['skp_id']; ?></td></tr>
                <tr><td>Pengajuan</td><td><?php echo $pinjaman['pin_pengajuan']; ?></td></tr>
                <tr><td>Pinjaman</td><td><?php echo $pinjaman['pin_pinjaman']; ?></td></tr>
                <tr><td>Tanggal Pengajuan</td><td><?php echo dateFormat($pinjaman['pin_tglpengajuan']); ?></td></tr>
                <tr><td>Tanggal Pencairan</td><td><?php echo dateFormat($pinjaman['pin_tglpencairan']); ?></td></tr>
                <tr><td>Marketing</td><td><?php echo $pinjaman['pin_marketing']; ?></td></tr>
                <tr><td>Surveyor</td><td><?php echo $pinjaman['pin_surveyor']; ?></td></tr>
                <tr><td>Survey</td><td><?php echo $pinjaman['pin_survey']; ?></td></tr>
                <tr><td>Status Pinjaman</td><td><?php echo $pinjaman['pin_statuspinjaman']; ?></td></tr>
        
        <div class="col-md-12">
        <form action="<?php echo site_url('pelunasan/macet_action/'); ?>" method="post">
				    <tr><td></td><td><a href="<?php echo site_url('pelunasan/?p=3') ?>" class="btn btn-default">Batal</a></td></tr>
            </table>
	        	<?php
	        	} ?>
        <h3>Histori Angsuran</h3>

<table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
    <thead class="thead-light">
    <tr>
        <th class="text-center">Angsuranke</th>
        <th class="text-center">Jatuh Tempo</th>
        <th class="text-center">Tanggal Bayar</th>
        <th class="text-center">Jumlah Pokok</th>
        <th class="text-center">Jumlah Bunga</th>
        <th class="text-center">Total</th>
        <th class="text-center">Jumlah Bayar</th>
        <th class="text-center">Kurang Setor</th>
        <th class="text-center">Denda</th>
        <th class="text-center">Bayar Tunggakan</th>
        <th class="text-center">Kekurangan Tunggakan</th>
        <th class="text-center">Status</th>
    </tr>
    </thead>
    <tbody><?php
    if ($histori != null) {
    $i = 1;
    $denda=0;
    
    foreach ($histori as $item)
    {
        $d=2;
        $m=1;
        $dendajatuhtempo = date("Y-m-d", strtotime($item->ags_tgljatuhtempo.' + '.$d.' days'));
        $nextjatuhtempo = date("Y-m-d", strtotime($item->ags_tgljatuhtempo.' + '.$m.' months'));
        $tanggalnext = new DateTime($nextjatuhtempo); 
        $tanggala = new DateTime($dendajatuhtempo); 
        $sekarang = new DateTime();
        if ($this->tgl < $nextjatuhtempo){
        $perbedaan = $tanggala->diff($sekarang);
        }else if ($this->tgl >= $nextjatuhtempo){
        $perbedaan = $tanggala->diff($tanggalnext);
        }
        $totalbayar = $item->ags_jmlpokok + $item->ags_jmlbunga;
        if ($item->ags_jmlbayar < 1){
            $kurangsetor = 0; 
        }else {
            $kurangsetor = $totalbayar-$item->ags_jmlbayar;
        }
        if ($kurangsetor < 0){
            $kurangsetor = 0;
        }
        if ($this->tgl > $dendajatuhtempo && $item->ags_jmlbayar < $totalbayar && $item->ags_status < 2 ){
            $denda = ($kurangsetor * ($settingdenda_data->sed_denda/100))*$perbedaan->d;
        }
        if ($item->ags_bayartunggakan <= 0) {
            $totalkekurangan = $kurangsetor + $denda;
            } else {
            $totalkekurangan = $kurangsetor + $item->ags_denda - $item->ags_bayartunggakan;
            }
        ?>
        <tr>
            <td><?php echo $item->ang_angsuranke ?></td>
            <td><?php echo date("Y-m-d",strtotime($item->ags_tgljatuhtempo)) ?></td>
            <td><?php echo $item->ags_tglbayar?></td>
            <td><?php echo $item->ags_jmlpokok ?></td>
            <td><?php echo $item->ags_jmlbunga ?></td>
            <td><?php echo $totalbayar ?></td>
            <td><?php echo $item->ags_jmlbayar ?></td>
            <td><?php echo $kurangsetor ?></td>
            <?php if ($item->ags_bayartunggakan <= 0){
            echo '<td>'.$denda.'</td>';
            } else { 
            echo '<td>'.$item->ags_denda.'</td>';
            } ?>
            <td><?php echo $item->ags_bayartunggakan?></td>
            <td class='danger'><?php echo $totalkekurangan ?></td>
            <td><?php 
            if ($totalkekurangan > 0 && $denda > 0 && $this->tgl > $item->ags_tgljatuhtempo){
                echo anchor(site_url('angsuran/denda/'.$item->ags_id),'Bayar','class="text-navy"');
            } else {
            echo $this->statusAngsuran[$item->ags_status];
            } ?></td>
            
                </tr>
                
                <?php
            }
        }
            ?>
            </tbody>
        </table>
	    </div>
        </div>
        </div>
    </div>
</div>
</div>