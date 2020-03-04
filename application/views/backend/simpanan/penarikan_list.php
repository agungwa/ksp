<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simpanan/listpenarikan/" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="3">
                <select class="form-control col-md-3"  name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                <!--<select class="form-control col-md-3" name="s">
                    <option value="all">Semua Status</option>
                    <?php
                        foreach ($this->statusSimpanan as $key => $value) { ?>
                            <option value="<?= $key?>"><?= $value?></option>
                    <?php        
                        }
                    ?>
                </select>-->
                
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="u" value="all" placeholder="No Rekening">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>simpanan/?p=3" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <!--<a href="<?php echo base_url()?>printsimpanan/listdata?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>&s=<?=$s?>&u=<?=$u?>" class="btn btn-default">Print</a>-->
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>

        <table class="data table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th>No</th>
				<th>Kode Simpanan</th>
				<th>Nama Anggota</th>
				<th>Alamat Anggota</th>
				<th>Tanggal</th>
				<th>Saldo</th>
				<th>Bunga</th>
				<th>Jumlah</th>
				<th>PH Buku</th>
				<th>Admisnistrasi</th>
				<th>Jumlah Tarik</th>
				<th>Action</th>
            </tr>
            </thead>
            <tbody><?php $i=1;
            
                    $tot_tarikpokok = 0;
                    $tot_tarikbunga = 0;
                    $tot_tarikph = 0;
                    $tot_tarikadmin = 0;
                    $tot_tarik = 0;
                foreach ($tarik as $key=>$item){   
                    $tot_tarikpokok += $item['saldo'];
                    $tot_tarikbunga += $item['bunga'];
                    $tot_tarikph += $item['phbuku'];
                    $tot_tarikadmin += $item['administrasi'];
                    $tot_tarik += $item['jml_tarik'];
                    ?>
					<tr>
						<td><?= $i++ ?></td>
						<td><?= $item['sim_kode'] ?></td>
						<td><?= $item['ang_nama'] ?></td>
						<td><?= $item['ang_alamat'] ?></td>
						<td><?= dateFormataja($item['tgl_tarik']) ?></td>
						<td><?= neraca($item['saldo']) ?></td>
						<td><?= neraca($item['bunga']) ?></td>
						<td><?= neraca($item['jumlah']) ?></td>
						<td><?= neraca($item['phbuku']) ?></td>
						<td><?= neraca($item['administrasi']) ?></td>
						<td><?= neraca($item['jml_tarik']) ?></td>
						<td>
							<?php 
								echo anchor(site_url('penarikansimpanan/read/'.$item['pes_id']),'Detail','class="text-navy"'); 
								echo ' | '; 
								echo anchor(site_url('penarikansimpanan/update/'.$item['pes_id']),'Update','class="text-navy"'); 
								echo ' | '; 
								echo anchor(site_url('penarikansimpanan/delete/'.$item['pes_id']),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
							?>
						</td>
						</tr>
				<?php }?>
            </tbody>
        </table>
		<table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tr>
            <td class="active">Pokok</td><td><?= neraca($tot_tarikpokok) ?></td>
            </tr>
            <tr>
            <td class="info">Bunga</td><td><?= neraca($tot_tarikbunga) ?></td>
            </tr>
            <tr>
            <td class="active">PH</td><td><?= neraca($tot_tarikph) ?></td>
            </tr>
            <tr>
            <td class="info">Admin</td><td><?= neraca($tot_tarikadmin) ?></td>
            </tr>
            <tr>
            <td class="danger">Total</td><td><?= neraca($tot_tarik) ?></td></tr>
            </tr>
		</table>
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>