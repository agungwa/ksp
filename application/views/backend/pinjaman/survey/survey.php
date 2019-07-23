<div class="row">
<div class="col-lg-12">
    <div class="ibox">
        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('pinjaman/survey'); ?>" class="form-inline" method="get">

            <div class="col-md-4 text-left">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No Pinjaman">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pinjaman/?p=2'); ?>" class="btn btn-default">Reset</a>
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
	        	if ($survey != null) {
	        	?>
	        	<table class="table">
				    <tr><td>Rekening Pinjaman</td><td><?php echo $survey['pin_id']; ?></td></tr>
				    <tr><td>Anggota</td><td><?php echo $survey['ang_no']; ?></td></tr>
				    <tr><td>Tenor</td><td><?php echo $survey['sea_id']," Bulan"; ?></td></tr>
				    <tr><td>Bunga Pinjaman</td><td><?php echo $survey['bup_id']," %"; ?></td></tr>
				    <tr><td>Potongan Provisi</td><td><?php echo $survey['pop_id']; ?></td></tr>
				    <tr><td>Wilayah</td><td><?php echo $survey['wil_kode']; ?></td></tr>
				    <tr><td>Kategori Peminjam</td><td><?php echo $survey['skp_id']; ?></td></tr>
				    <tr><td>Pengajuan</td><td><?php echo $survey['pin_pengajuan']; ?></td></tr>
				    <tr><td>Pinjaman</td><td><?php echo $survey['pin_pinjaman']; ?></td></tr>
				    <tr><td>Tanggal Pengajuan</td><td><?php echo dateFormat($survey['pin_tglpengajuan']); ?></td></tr>
				    <tr><td>Tanggal Pencairan</td><td><?php echo dateFormat($survey['pin_tglpencairan']); ?></td></tr>
				    <tr><td>Marketing</td><td><?php echo $survey['pin_marketing']; ?></td></tr>
				    <tr><td>Surveyor</td><td><?php echo $survey['pin_surveyor']; ?></td></tr>
				    <tr><td>Survey</td><td><?php echo $survey['pin_survey']; ?></td></tr>
				    <tr><td>Status Pinjaman</td><td><?php echo $survey['pin_statuspinjaman']; ?></td></tr>
                </table>
            
            <div class="col-md-12">
            <?php echo form_open_multipart('pinjaman/action_surveysetuju');?>
            <?php
	        	?>
            <div class="col-md-4">
                <label for="text">Disetujui</label>
                <input type="file" class="file" name="pin_survey" id="pin_survey" placeholder="Survey" required="required"/>
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="<?php echo $survey['pin_id'];?>" required="required"/>            
	            <button type="submit" class="btn btn-primary">Setujui</button> 
                <a href="<?php echo site_url('pinjaman/?p=2') ?>" class="btn btn-default">Batal</a>
            </div>
            
            <?php 
	        	?>
            <?php echo form_close(); ?>
            </div>

            <div class="col-md-12">
            <?php echo form_open_multipart('pinjaman/action_surveytolak');?>
            <?php
	        	?>
            <div class="col-md-4">
                <label for="text">Ditolak</label>
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="<?php echo $survey['pin_id'];?>" required="required"/>            
                <input type="file" class="file" name="pin_survey" id="pin_survey" placeholder="Survey" required="required"/>
	            <button type="submit" class="btn btn-primary">Tolak</button> 
                <a href="<?php echo site_url('pinjaman/?p=2') ?>" class="btn btn-default">Batal</a>
            </div>
            <?php 
	        	?>
            <?php echo form_close(); ?>

            </div>
	        	<?php
	        	} ?>
	    </div>
        </div>
        </div>
    </div>
</div>
</div>
