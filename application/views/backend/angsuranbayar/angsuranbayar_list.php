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
                    <h2><b>List Angsuran bayar</b></h2>
                    <?php if ($this->session->userdata('message') != '') {?>
                    <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?=$this->session->userdata('message')?> <a class="alert-link" href="#"></a>
                    </div>
                 <?php }?>
                </div>
                <div class="ibox-content">
					<div class="row" style="margin-bottom: 10px">
						<!--<div class="col-md-8">
							<?php echo anchor(site_url('angsuranbayar/create'),'Create', 'class="btn btn-primary"'); ?>
						</div>
						-->
						<div class="col-md-12 text-right">
							<form action="<?php echo site_url('angsuranbayar/index'); ?>" class="form-inline" method="get">
								<div class="col-md-6 text-right">Rentang Tanggal :
									<input class="form-control" type="date" name="f" required="required" value="<?= $f ?>">
									<input class="form-control" type="date" name="t" value="<?= $t ?>" required="required">
								</div>
								<div class="input-group">
									<span class="input-group-btn">
									  <button class="btn btn-primary" type="submit">Tampilkan</button>
									</span>
								</div>
							</form>
						</div>
					</div>
					<table class="data" style="margin-bottom: 10px">
						<thead class="thead-light">
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Nama</th>
							<th class="text-center">Alamat</th>
							<th class="text-center">Bayar Pokok</th>
							<th class="text-center">Bayar Bunga</th>
							<th class="text-center">Bayar Denda</th>
							<th class="text-center">Bayar Status</th>
							<th class="text-center">Bayar Tglpokok</th>
							<th class="text-center">Bayar Tglbunga</th>
							<th class="text-center">Bayar Tgldenda</th>
							<th class="text-center">Tanggal Bayar</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody><?php $no=0;
						foreach ($angsuranbayar_data as $angsuranbayar){ ?>
							<tr>
								<td width="80px"><?= ++$no ?></td>
								<td><?php echo $angsuranbayar['ang_nama'] ?></td>
								<td><?php echo $angsuranbayar['ang_alamat'] ?></td>
								<td><?php echo $angsuranbayar['agb_pokok'] ?></td>
								<td><?php echo $angsuranbayar['agb_bunga'] ?></td>
								<td><?php echo $angsuranbayar['agb_denda'] ?></td>
								<td><?php echo $angsuranbayar['agb_status'] ?></td>
								<td><?php echo $angsuranbayar['agb_tglpokok'] ?></td>
								<td><?php echo $angsuranbayar['agb_tglbunga'] ?></td>
								<td><?php echo $angsuranbayar['agb_tgldenda'] ?></td>
								<td><?php echo date('d-m-Y', strtotime($angsuranbayar['agb_tgl'])) ?></td>
								<td style="text-align:center" width="200px">
									<?php 
									echo anchor(site_url('angsuranbayar/read/'.$angsuranbayar['agb_id']),'Read','class="text-navy"'); 
									echo ' | '; 
									echo anchor(site_url('angsuranbayar/update/'.$angsuranbayar['agb_id']),'Update','class="text-navy"'); 
									echo ' | '; 
									echo anchor(site_url('angsuranbayar/delete/'.$angsuranbayar['agb_id']),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
									?>
								</td>
							</tr>
							
							<?php } ?>
						</tbody>
					</table>
			<div class="row">
			</div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>