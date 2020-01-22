<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2 style="margin-top:0px"><?= $button ?> Simpanan Pokok</h2>
                </div>
        
			<form action="<?= site_url($action); ?>" method="post">
				<div class="ibox-content col-md-12">
					<div class="col-md-6">
						<input type="hidden" name="sip_id" value="<?php echo $sip_id; ?>"/>
						<div class="form-group col-md-12">
							<label for="varchar">No Anggota <?php echo form_error('ang_no') ?></label>
							<input type="text" class="form-control" name="ang_no" id="ang_no" placeholder="No Simpanan" value="<?php echo $ang_no; ?>"  readonly/>
						</div>
						
						<div class="form-group col-md-12">
							<label for="varchar">Nama Anggota <?php echo form_error('ang_nama') ?></label>
							<input type="text" class="form-control" name="ang_nama" id="ang_nama" placeholder="Anggota" value="<?php echo $ang_nama; ?>" readonly/>
						</div>
						
						<div class="form-group col-md-12">
							<label for="varchar">Jenis Simpanan <?php echo form_error('ses_nama') ?></label>
							<input type="text" class="form-control" name="ses_nama" id="ses_nama" placeholder="Karyawan" value="<?php echo $ses_nama; ?>" readonly/>
						</div>
						
						<div class="form-group col-md-12">
							<label for="varchar">Setoran <?php echo form_error('sip_setoran') ?></label>
							<input type="text" class="form-control" name="sip_setoran" id="sip_setoran" placeholder="Karyawan" value="<?php echo $sip_setoran; ?>"/>
						</div>
						
						<div class="form-group col-md-12">
							<label for="float">Tanggal Bayar <?php echo form_error('sip_tglbayar') ?></label>
							<input type="text" class="form-control" name="sip_tglbayar" id="sip_tglbayar" placeholder="Bunga Simpanan" value="<?php echo $sip_tglbayar; ?>"/>
						</div>
					</div>
				</div>
				<div class="col-md-8" style="margin-left:35px;">
					<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('simpanan/simpananpokok_list') ?>" class="btn btn-default">Batal</a>
				</div>
			</form>
        </div>
    </div>
    </body>
</html>