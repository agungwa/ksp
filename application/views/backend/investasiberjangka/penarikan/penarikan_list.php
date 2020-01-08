<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                    <h2><b>List Penarikan Investasi</b></h2>
                </div>
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>investasiberjangka/listpenarikan" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <!--<div class="col-md-3"><h4>Rentang Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>
                --><select class="form-control col-md-3"  name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
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
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
				<th class="text-center">Rekening Investasi</th>
				<th class="text-center">Nama</th>
				<th class="text-center">Alamat</th>
				<th class="text-center">Nomor Hp</th>
				<th class="text-center">Penarikan ke</th>
				<th class="text-center">Jumlah Keuntungan</th>
				<th class="text-center">Jumlah Diterima</th>
				<th class="text-center">Tanggal</th>
            </tr>
            </thead>
			
			<tbody><?php
				$total=$subtotal=$tmp=0;
				foreach($listpenarikan as $key => $item){
					$subtotal += $item['pib_jmlditerima'];
					$total += $item['pib_jmlditerima'];
				?>
					<tr>
						<td width="80px"><?php echo ++$start ?></td>
						<td><?php echo $item['ivb_kode'] ?></td>
						<td><?php echo $item['ang_nama'] ?></td>
						<td><?php echo $item['ang_alamat'] ?></td>
						<td><?php echo $item['ang_nohp'] ?></td>
						<td><?php echo $item['pib_penarikanke'] ?></td>
						<td><?php echo rupiahsimpanan($item['pib_jmlkeuntungan']) ?></td>
						<td><?php echo rupiahsimpanan($item['pib_jmlditerima']) ?></td>
						<td><?php echo $item['pib_tgl'] ?></td>
						<?php
							if(@$listpenarikan[$key+1]['day'] != $item['day']){
								echo '<tr class="info">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>SUB TOTAL ' . $item['pib_tgl'] . '</td>
									<td class="right">'.rupiahsimpanan($subtotal).'</td>
								</tr>';
								$subtotal = 0;
							}
						?>
					</tr>
					<?php }?>
					<tr class="danger">
						<td></td>
						<td></td>
						<td>Total</td>
						<td></td><td></td><td></td><td></td>
						<td><?php echo rupiahsimpanan($total) ?></td>
					</tr>
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