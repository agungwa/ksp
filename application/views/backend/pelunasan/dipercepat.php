
    <div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('pelunasan/dipercepat/'); ?>" class="form-inline" method="get">
            <input type="hidden" name="p" value="1">
            <div class="col-md-4 text-left">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No Pinjaman">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pelunasan/?p=1'); ?>" class="btn btn-default">Reset</a>
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
	        
        <h3>Histori Angsuran</h3>
    <form action="<?php echo site_url('pelunasan/dipercepat_action/'); ?>" class="form-inline" method="post">
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
        <th class="text-center">Total Denda</th>
        <th class="text-center">Status</th>
    </tr>
    </thead>
    <tbody><?php
    if ($histori != null) {
    $i = 1;
    $denda=0;
    $totaldenda=0;
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
            $kurangsetor = $totalbayar; 
        }else {
            $kurangsetor = $totalbayar-$item->ags_jmlbayar;
        }
        if ($kurangsetor < 0){
            $kurangsetor = 0;
        }
        if ($this->tgl > $dendajatuhtempo && $item->ags_jmlbayar < $totalbayar && $item->ags_status < 2 && $item->ags_bayartunggakan <= 0){
            $denda = ($kurangsetor * ($settingdenda_data->sed_denda/100))*$perbedaan->d;
        } else {
            $denda = $item->ags_denda;
        }
        if ($item->ags_bayartunggakan <= 0) {
            $totalkekurangan = $kurangsetor + $denda;
            } else {
            $totalkekurangan = $kurangsetor + $item->ags_denda - $item->ags_bayartunggakan;
            }
        $totaldenda += $denda;
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
            <td><?php echo $denda ?></td>
            <td><?php echo $item->ags_bayartunggakan?></td>
            <td class='danger'><?php echo $totalkekurangan ?></td>
            <td><?php echo $totaldenda ?></td>
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
        <div class="ibox-content">
                <?php 
                if ($histori != null) {
                
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $pinjaman['ang_no']))->row();
                if ($pinjaman != null) 
                $kali=$pinjaman['sea_id']-$datatglsekarang->ang_angsuranke;
                        if ($datatglsekarang->ags_jmlbunga - $datatglsekarang->ags_jmlbayar > 0){
                            $sp = $datatglsekarang->ags_jmlpokok;
                        } else {
                            $sp = $datatglsekarang->ags_jmlpokok + $datatglsekarang->ags_jmlbunga - $datatglsekarang->ags_jmlbayar;
                        }
                        if ($this->tgl < $item->ags_tgljatuhtempo){
                            $bungadenda=0;
                        } else {
                            $bungadenda=$item->ags_jmlbunga;
                        }
                {
	        	?><table class="table">
                <tr><td>Rekening Pinjaman</td><td><input type="text" class="form-control" name="pin_id" id="pin_id" placeholder="<?php echo $pinjaman['pin_id']; ?>" value="<?php echo $pinjaman['pin_id']; ?>" readonly/> </td></tr>
                <tr><td>Jenis Pelunasan</td><td><?php echo $jenispelunasan->jep_jenis; ?><input type="hidden" class="form-control" name="pel_jenis" id="pel_jenis" placeholder="" value="<?php echo $jenispelunasan->jep_id; ?>" readonly/> </td></tr>
                <tr><td>Anggota</td><td><?php echo $ang_no->ang_nama; ?></td></tr>
                <tr><td>Tenor</td><td><input type="text" class="form-control" name="pel_tenor" id="pel_tenor" placeholder="<?php echo $pinjaman['sea_id']; ?>" value="<?php echo $pinjaman['sea_id']; ?>" readonly/></td></tr>
                <tr><td>Pokok/Bulan</td><td><input type="text" class="form-control" name="pel_angsuran" id="pel_angsuran" placeholder="<?php echo $item->ags_jmlpokok; ?>" value="<?php echo $item->ags_jmlpokok; ?>" readonly/></td></tr>
                <tr><td>Bunga/Bulan</td><td><input type="text" class="form-control" name="pel_bungaangsuran" id="pel_bungaangsuran" placeholder="<?php echo $item->ags_jmlbunga; ?>" value="<?php echo $item->ags_jmlbunga; ?>" readonly/></td></tr>
                <tr><td>Total Kurang Pokok</td><td><input type="text" class="form-control" name="pel_totalkekuranganpokok" id="pel_totalkekuranganpokok" placeholder="<?php echo $item->ags_jmlpokok*$kali; ?>" value="<?php echo $item->ags_jmlpokok*$kali; ?>" readonly/></td></tr>
                <tr><td>Total Bunga</td><td><input type="text" class="form-control" name="pel_totalbungapokok" id="pel_totalbungapokok" placeholder="<?php echo $item->ags_jmlbunga*$datatglsekarang->ang_angsuranke; ?>" value="<?php echo $item->ags_jmlbunga*$datatglsekarang->ang_angsuranke; ?>" readonly/></td></tr>
                <tr><td>Bunga Denda</td><td><input type="text" class="form-control" name="pel_bungatambahan" id="pel_bungatambahan" placeholder="<?php echo $bungadenda; ?>" value="<?php echo $bungadenda; ?>" readonly/></td></tr>
                <tr><td>Total Denda</td><td><input type="text" class="form-control" name="pel_totaldenda" id="pel_totaldenda" placeholder="<?php echo $totaldenda; ?>" value="<?php echo $totaldenda; ?>" readonly/></td></tr>
                <tr><td>Tanggal Pelunasan</td><td><?php echo dateFormat($this->tgl); ?></td></tr>
                <tr><td>Marketing</td><td><?php echo $pinjaman['pin_marketing']; ?></td></tr>
                <tr><td>Surveyor</td><td><?php echo $pinjaman['pin_surveyor']; ?></td></tr>
                <tr><td></td><td><a href="<?php echo site_url('pelunasan/?p=1') ?>" class="btn btn-default">Batal</a><button type="submit" class="btn btn-primary">Proses</button></td></tr>

                <?php
                }
	        	} ?>
                </table>
        <div class="col-md-12">
	    </div>
        </div>
        </div>
        </form>
    </div>
</div>
</div>