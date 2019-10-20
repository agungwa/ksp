<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                    <h2><b>List Setoran Simpanan Wajib</b></h2>
                </div>
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>anggota/setoranwajib" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <div class="col-md-3"><h4>Rentang Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>

            </div>
            
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <!--<span class="input-group-btn">
                                    <a href="<?php echo base_url()?>printsimpanan/printlistsetoran?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>" class="btn btn-default">Print</a>
                        </span>-->
                            <button class="btn btn-primary" type="submit">Tampilkan</button>
                    </div>
            </div>
            </form>
        </div>
        <table class="data table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">No Rekening</th>
                <th class="text-center">Nama Anggota</th>
                <th class="text-center">Alamat Anggota</th>
				<th class="text-center">Tanggal Setor</th>
				<th class="text-center">Setor</th>
				<?php if(is_allow('M_UTILITAS')): ?>
				<th class="text-center">Action</th>
				<?php endif; ?>
            </tr>
            </thead>
			<tbody><?php
				$total = 0;
				foreach ($datasetoranwajib as $k => $item)
				{
					$total += $item['ssw_jmlsetor'];
					?>
					<tr>
						<td width="80px"><?php echo ++$start ?></td>
						<td><?php echo $item['siw_id'] ?></td>
						<td><?php echo $item['ang_no'] ?></td>
						<td><?php echo $item['ang_alamat'] ?></td>
						<td><?php echo $item['ssw_tglsetor'] ?></td>
						<td><?php echo rupiahsimpanan($item['ssw_jmlsetor']) ?></td>

						<?php if(is_allow('M_UTILITAS')): ?>
						<td style="text-align:center" width="200px">
							<?php 
							echo anchor(site_url('setoransimpananwajib/read/'.$item['ssw_id']),'Read','class="text-navy"'); 
							echo ' | '; 
							echo anchor(site_url('setoransimpananwajib/update/'.$item['ssw_id']),'Update','class="text-navy" onclick="javascript: return confirm(\'Yakin Update data?\')"'); 
							
							?>
						</td>
						<?php endif; ?>
					</tr><?php
				}?>
            </tbody>
        </table>
		<table class="data table table-bordered table-hover table-condensed">
			<tr class="danger"><td></td><td></td><td></td><td></td><td>Total Setor</td><td><?php echo rupiahsimpanan($total) ?></td></tr>
		</table>
        <div class="row">
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>