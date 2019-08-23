<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('pinjaman/persetujuan'); ?>" class="form-inline" method="get">

            <div class="col-md-4 text-left">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No Pinjaman">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pinjaman/?p=3'); ?>" class="btn btn-default">Reset</a>
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
	        	<?php 
	        	if ($persetujuan != null) {
	        	?>
	        	<table class="table">
				    <tr><td>Rekening Pinjaman</td><td><?php echo $persetujuan['pin_id']; ?></td></tr>
				    <tr><td>Anggota</td><td><?php echo $persetujuan['ang_no']; ?></td></tr>
				    <tr><td>Tenor</td><td><?php echo $persetujuan['sea_id']," Bulan"; ?></td></tr>
				    <tr><td>Bunga Pinjaman</td><td><?php echo $persetujuan['bup_id']," %"; ?></td></tr>
				    <tr><td>Potongan Provisi</td><td><?php echo $persetujuan['pop_id']," %"; ?></td></tr>
				    <tr><td>Wilayah</td><td><?php echo $persetujuan['wil_kode']; ?></td></tr>
				    <tr><td>Kategori Peminjam</td><td><?php echo $persetujuan['skp_id']; ?></td></tr>
				    <tr><td>Pengajuan</td><td><?php echo rupiah($persetujuan['pin_pengajuan']); ?></td></tr>
				    <tr><td>Pinjaman</td><td><?php echo rupiah($persetujuan['pin_pinjaman']); ?></td></tr>
				    <tr><td>Tanggal Pengajuan</td><td><?php echo dateFormat($persetujuan['pin_tglpengajuan']); ?></td></tr>
				    <tr><td>Tanggal Pencairan</td><td><?php echo dateFormat($persetujuan['pin_tglpencairan']); ?></td></tr>
				    <tr><td>Marketing</td><td><?php echo $persetujuan['pin_marketing']; ?></td></tr>
				    <tr><td>Surveyor</td><td><?php echo $persetujuan['pin_surveyor']; ?></td></tr>
				    <tr><td>Survey</td><td><?php echo $persetujuan['pin_survey']; ?></td></tr>
				    <tr><td>Status Pinjaman</td><td><?php echo $persetujuan['pin_statuspinjaman']; ?></td></tr>
				    <tr><td></td><td><a href="<?php echo site_url('pinjaman/?p=3') ?>" class="btn btn-default">Batal</a></td></tr>
				</table>
                <div class="col-md-12">
            <form action="<?php echo site_url('pinjaman/action_persetujuan/'.$persetujuan['pin_id']); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <label for="text">Persetujuan</label>
                <input type="number" class="form-control" name="pin_pinjaman" id="pin_pinjaman" placeholder="Persetujuan" value="" required="required"/>
                <?php if ($jaminan_data->jej_id == 1){
                    echo'
                <input type="text" class="form-control" name="jam_unit" id="jam_unit" placeholder="Unit" value=""/>
                <input type="text" class="form-control" name="jam_noregistrasi" id="jam_noregistrasi" placeholder="No Registrasi" value=""/>
                <input type="text" class="form-control" name="jam_tahunpembuatan" id="jam_tahunpembuatan" placeholder="Tahun Pembuatan" value=""/>
                <input type="text" class="form-control" name="jam_atasnama" id="jam_atasnama" placeholder="Atas Nama" value=""/>
                <input type="hidden" class="form-control" name="jam_id" id="jam_id" placeholder="jam_id" value="'.$jaminan_data->jam_id.'"/>
                ';
                } ?>
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="pin_id" value="<?php echo $persetujuan['pin_id'];?>" required="required"/>            
                <input type="date" class="form-control" name="pin_tglpencairan" id="todays-date" placeholder="pin_tglpencairan" value="" required="required"/>            
                
                <label for="int">Tenor (bulan)</label>
                <div class="input-group">
                <input type="hidden" name="sea_id" id="sea_id" value="" required="required" />
                <input type="text" class="form-control" name="nm_sea_id" id="nm_sea_id" placeholder="Setting Angsuran" value="" required="required" readonly/>
                <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>settingangsuran/lookup','sea_id');" style="cursor: pointer;"><i class="glyphicon glyphicon-search"></i></span>
                </div>
                </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Proses</button> 
            <a href="<?php echo site_url('pinjaman/?p=2') ?>" class="btn btn-default">Batal</a>
            <?php 
	        	?>
            </form>
            </div>
            <?php 
	        	?>
            </form>
	        	<?php
	        	} ?>
	    </div>
        </div>
        </div>
    </div>
</div>
</div>