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
                    <h2><b>Simpanan Pokok</b></h2>
                </div>
                <div class="ibox-content">
					<div class="row" style="margin-bottom: 10px">
						<div class="col-md-12 text-right">
							<form action="<?php echo site_url('simpanan/listsimpananpokok'); ?>" class="form-inline" method="get">
								<div class="col-md-6 text-right">Rentang Tanggal :  
									<input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
									<input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
								</div>
								<div class="input-group">
									<span class="input-group-btn">
									  <button class="btn btn-primary" type="submit">Tampilkan</button>
									</span>
								</div>
							</form>
						</div>
					</div>
					<table class=" data table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
						<thead class="thead-light">
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">No Anggota</th>
							<th class="text-center">Nama</th>
							<th class="text-center">Setting Simpanan</th>
							<th class="text-center">Jumlah Setoran</th>
							<th class="text-center">Tanggal Bayar</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody><?php $no=0;
						foreach($datasimpananpokok as $sp){ ?>
							<tr>
								<td width="80px"><?php echo ++$no ?></td>
								<td><?= $sp['ang_no']; ?></td>
								<td><?= $sp['ang_nama']; ?></td>
								<td><?= $sp['ses_nama']; ?></td>
								<td><?= $sp['sip_setoran']; ?></td>
								<td><?= $sp['sip_tglbayar']; ?></td>
								<td style="text-align:center" width="200px"><?php 
									echo anchor(site_url('simpanan/simpananpokok_read/'.$sp['sip_id']),'Detail','class="text-navy"'); 
									echo ' | '; 
									echo anchor(site_url('simpanan/simpananpokok_update/'.$sp['sip_id']),'Update','class="text-navy"'); 
									echo ' | '; 
									echo anchor(site_url('simpanan/simpananpokok_delete/'.$sp['sip_id']),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); ?>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
    </body>
</html>