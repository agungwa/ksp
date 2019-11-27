<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
			<div class="ibox-content">
				<div class="row" style="margin-bottom: 10px, margin-top:10px">

					<table id="dtOrderExample" class="data" style="margin-bottom: 10px">
						<thead class="thead-light">
							<tr>
								<th>No</th>
								<th>Kar kode</th>
								<th>Nama Karyawan</th>
								<th>Jabatan</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $i=0; foreach($karyawan as $k){ ?>
								<tr>
									<td width="10px"><?= ++$i ?></td>
									<td><?= $k->kar_kode ?></td>
									<td><?= $k->kar_nama ?></td>
									<td><?= $k->jab_kode ?></td>
									<td>
										<form action="<?= base_url() ?>penggajianmarketing/lihatgaji" method="get">
											<input type="hidden" name="kode" value="<?= $k->kar_kode ?>">
											<input type="submit" value="Lihat Gaji" class="btn btn-primary">
										</form>
									</td>
								</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
</div>