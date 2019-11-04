<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h2><b>List Jatuh Tempo</b></h2>
            </div>
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>investasiberjangka/jatuhtempo" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <div class="col-md-3"><h4>Rentang Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>
                <select class="form-control col-md-3"  name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
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
                            <a href="<?php echo base_url()?>PrintInvestasiberjangka/jatuhtempo?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>" class="btn btn-default">Print</a>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
			
			<?php
				$data = array();
				$i=0;
				
				foreach($datainvestasi as $key=>$item){
					
					$data[$i]['ivb_kode'] 		= $item['ivb_kode'];
					$data[$i]['nama_ang_no'] 	= $item['nama_ang_no'];
					$data[$i]['alamat_ang_no'] 	= $item['alamat_ang_no'];
					$data[$i]['jwi_id'] 		= $item['jwi_id'];
					$data[$i]['biv_id'] 		= $item['biv_id'];
					$data[$i]['to_jasa'] 		= rupiahsimpanan($item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id']);
					$data[$i]['pokok'] 			= rupiahsimpanan($item['ivb_jumlah']);
					$data[$i]['pokok_bunga'] 	= rupiahsimpanan($item['ivb_jumlah']+($item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id']));
					$data[$i]['tglpendaftaran'] = dateFormataja($item['ivb_tglpendaftaran']);
					$data[$i]['tanggalDuedate'] = dateFormataja($item['jatuhtempo']);
					$data[$i]['status'] 		= $item['ivb_status'];
					$data[$i]['ivb_jumlah']		= $item['ivb_jumlah'];
					$data[$i]['jatuhtempo']		= $item['jatuhtempo'];
					$i++;
				}

				function sortFunction($a, $b){
					return strtotime($a['tanggalDuedate']) - strtotime($b['tanggalDuedate']);
				}
				
				usort($data, "sortFunction");
				
				//$j=0;
				foreach($data as $d){
					//echo $data[$j]['sim_kode']." ".$data[$j]['tanggalDuedate']."<br>";$j++;
				}
			?>
			
			<table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
				<thead class="thead-light">
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Rekening Investasi</th>
						<th class="text-center">Nama Anggota</th>
						<th class="text-center">Alamat</th>
						<th class="text-center">Jangka Waktu</th>
						<th class="text-center">Bunga</th>
						<th class="text-center">Total Jasa</th>
						<th class="text-center">Pokok</th>
						<th class="text-center">Pokok+Bunga</th>
						<th class="text-center">Tanggal Pendaftaran</th>
						<th class="text-center">Tanggal Jatuh Tempo</th>
						<th class="text-center">Status</th>
					</tr>
				</thead>
				<tbody><?php
					$total=$subtotal_thn=$sub_pokokbunga=$pokokbunga=$sub_totalpokok=$totalpokok=0;
					foreach ($data as $key=>$item){ 
						
						$subtotal_thn += $item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id'];
						$sub_pokokbunga += $item['ivb_jumlah']+($item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id']);
						$sub_totalpokok += $item['ivb_jumlah'];
					?>
					<tr>
						<td width="80px"><?php echo ++$start ?></td>
						<td><?php echo $item['ivb_kode'] ?></td>
						<td><?php echo $item['nama_ang_no'] ?></td>
						<td><?php echo $item['alamat_ang_no'] ?></td>
						<td><?php echo $item['jwi_id'] , " Bulan" ?></td>
						<td><?php echo $item['biv_id'] ," %" ?></td>
						<td><?php echo $item['to_jasa'] ?></td>
						<td><?php echo $item['pokok'] ?></td>
						<td><?php echo $item['pokok_bunga'] ?></td>
						<td><?php echo $item['tglpendaftaran'] ?></td>
						<td><?php echo $item['tanggalDuedate'] ?></td>
						<td><?php echo $item['status'] ?></td> 
						<?php
							// SUB TOTAL per thn_byr
							if (@$data[$key+1]['jatuhtempo'] != $item['jatuhtempo']) {
								echo '<tr class="info">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>SUB TOTAL ' . dateFormataja($item['jatuhtempo']) . '</td>
									<td></td>
									<td class="right">'.rupiahsimpanan($subtotal_thn).'</td>
									<td class="right">'.rupiahsimpanan($sub_totalpokok).'</td>
									<td class="right">'.rupiahsimpanan($sub_pokokbunga).'</td>
								</tr>';
								$subtotal_thn = $sub_pokokbunga = $sub_totalpokok = 0;
							} 
							$total += $item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id'];
							$pokokbunga += $item['ivb_jumlah']+($item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id']);
							$totalpokok += $item['ivb_jumlah'];
						?>
					</tr>
					<?php }?>
					<tr class="danger">
						<td></td>
						<td>Total </td>
						<td></td><td></td><td></td><td></td>
						<td><?php echo rupiahsimpanan($total) ?></td>
						<td><?php echo rupiahsimpanan($totalpokok) ?></td>
						<td><?php echo rupiahsimpanan($pokokbunga) ?></td>
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