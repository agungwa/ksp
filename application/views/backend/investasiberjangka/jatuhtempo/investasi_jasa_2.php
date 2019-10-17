<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                    <h2><b>List Jasa</b></h2>
            </div>
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            
			<form action="<?php echo base_url()?>investasiberjangka/listjasa/<?= $p?>" class="form-inline" method="get">
				<div class="col-md-8 text-right">
					<select class="form-control col-md-3"  name="w">
						<option value="all">Semua Wilayah</option>
						<?php foreach ($wilayah_data as $value) { ?>
							<option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
						<?php }?>
					</select>
				</div>
            
				<div class="col-md-4 text-right">
					<div class="input-group">
						<!-- <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No simpanan/ No Anggota"> -->
						<span class="input-group-btn">
							<!-- <?php 
								if ($q <> '')
								{
									?>
									<a href="<?php echo base_url()?>simpanan/?p=3" class="btn btn-default">Reset</a>
									<?php
								}
							?> -->
							<a href="<?php echo base_url()?>PrintInvestasiberjangka/listjasa?&w=<?=$w?>" class="btn btn-default">Print</a>
							<button class="btn btn-primary" type="submit">Tampilkan</button>
						</span>
					</div>
				</div>
            </form>
			<table class="data table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
				<thead class="thead-light">
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Rekening Investasi</th>
						<th class="text-center">Nama Anggota</th>
						<th class="text-center">Alamat</th>
						<th class="text-center">Jangka Waktu</th>
						<th class="text-center">Bunga</th>
						<th class="text-center">Jasa/bulan</th>
						<th class="text-center">Investasi</th>
						<th class="text-center">Tanggal Pendaftaran</th>
						<th class="text-center">Tanggal Jatuh Tempo</th>
						<th class="text-center">Status</th>
					</tr>
				</thead>
				<tbody><?php
					$total=$subtotal_thn=0;
					foreach ($datainvestasi as $key=>$item)
					{ 
						$total += $item['ivb_jumlah']*$item['biv_id']/100;
						$subtotal_thn += $item['ivb_jumlah']*$item['biv_id']/100;?>
						
						<tr>
							<td width="80px"><?php echo ++$start ?></td>
							<td><?php echo $item['ivb_kode'] ?></td>
							<td><?php echo $item['nama_ang_no'] ?></td>
							<td><?php echo $item['alamat_ang_no'] ?></td>
							<td><?php echo $item['jwi_id'] , " Bulan" ?></td>
							<td><?php echo $item['biv_id'] ," %" ?></td>
							<td><?php echo rupiahsimpanan($item['ivb_jumlah']*$item['biv_id']/100) ?></td>
							<td><?php echo rupiahsimpanan($item['ivb_jumlah']) ?></td>
							<td><?php echo dateFormataja($item['ivb_tglpendaftaran']) ?></td>
							<td><?php echo dateFormataja($item['jatuhtempo']) ?></td>
							<td><?php echo $item['ivb_status'] ?></td>
						</tr>
					
					<?php }?>
				</tbody>
			</table>
			
			<table class="table table-bordered table-hover table-condensed">
				<tr class="danger">
					<td></td>
					<td>Total Jasa </td>
					<td></td><td></td><td></td><td></td>
					<td></td>
					<td><?php echo rupiahsimpanan($total) ?></td>
				</tr>
			</table>
			<div class="row">
				
			</div>
        </div>
    </div>
    </div>
</div>