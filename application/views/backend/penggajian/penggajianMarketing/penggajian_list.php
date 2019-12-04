<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
			<div class="ibox-content">
				<div class="row" style="margin-bottom: 10px, margin-top:10px">
					<form action="<?php echo base_url()?>penggajianmarketing/listgaji/" class="form-inline" method="get">
						<div class="input-group">
							<input type="hidden" name="x" value="1">
							<select class="form-control col-md-3"  name="periode">
								<option value="periode">-- Periode --</option>
								<?php foreach($periode as $p){ ?>
									<option value="<?= $p->per_id ?>"><?= $p->per_tgl_awal ?> - <?= $p->per_tgl_akhir ?></option>
								<?php }?>
							</select>
							<span class="input-group-btn">
							  <button class="btn btn-primary" type="submit">Tampilkan</button>
							</span>
						</div>
					</form>
					<?php if($x != 0){?>
						<table id="dtOrderExample" class="data" style="margin-bottom: 10px">
							<thead class="thead-light">
								<tr>
									<th>No</th>
									<th>Kode Karyawan</th>
									<th>Nama Karyawan</th>
									<th>Awal</th>
									<th>Akhir</th>
									<th>Gaji Pokok</th>
									<th>Bonus</th>
									<th>Aplikasi</th>
									<th></th>
								</tr>
							</thead>
							<tbody><?php $i=1; foreach($penggajian as $p){?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= $p['kar_kode'] ?></td>
									<td><?= $p['kar_nama'] ?></td>
									<td><?= $p['tgl_awal'] ?></td>
									<td><?= $p['tgl_akhir'] ?></td>
									<td><?= $p['gp'] ?></td>
									<td><?= $p['bonus'] ?></td>
									<td><?= $p['total_apl'] ?></td>
									<td>
										<a href="<?= site_url('penggajianmarketing/read/'.$p['pgg_id']) ?>" class="text-navy">Read</a>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					<?php }?>
				</div>
			</div>
		</div>
    </div>
</div>