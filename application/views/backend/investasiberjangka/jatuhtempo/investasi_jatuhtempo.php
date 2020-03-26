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
					
					$jumlahtarik = $this->Penarikaninvestasiberjangka_model->get_totalpenarikan($item['ivb_kode']);
					$data[$i]['ivb_kode'] 		= $item['ivb_kode'];
					$data[$i]['nama_ang_no'] 	= $item['nama_ang_no'];
					$data[$i]['alamat_ang_no'] 	= $item['alamat_ang_no'];
					$data[$i]['jwi_id'] 		= $item['jwi_id'];
					$data[$i]['biv_id'] 		= $item['biv_id'];
					$data[$i]['jumlahditarik'] 	= $jumlahtarik[0]->pib_jmlditerima;
					$data[$i]['sisajasa'] 		= ($item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id'])-$jumlahtarik[0]->pib_jmlditerima;
					$data[$i]['to_jasa'] 		= $item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id'];
					$data[$i]['pokok'] 			= $item['ivb_jumlah'];
					$data[$i]['pokok_bunga'] 	= $item['ivb_jumlah']+($item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id']);
					$data[$i]['tglpendaftaran'] = dateFormataja($item['ivb_tglpendaftaran']);
					$data[$i]['tanggalDuedate'] = dateFormataja($item['jatuhtempo']);
					$data[$i]['status'] 		= $item['ivb_status'];
					$data[$i]['ivb_jumlah']		= $item['ivb_jumlah'];
					$data[$i]['jatuhtempo']		= $item['jatuhtempo'];
					$data[$i]['wil_kode']		= $item['wil_kode'];
					$i++;
				}
				
				$orderByDate = $my2 = array();
				foreach($data as $key=>$row)
				{
					$my2 = explode('/',$row['tanggalDuedate']);
					$my_date2 = $my2[1].'/'.$my2[0].'/'.$my2[2];        
					$orderByDate[$key] = strtotime($my_date2);  
				}    
				array_multisort($orderByDate, SORT_ASC, $data);
				
				// function sortFunction($a, $b){
				// 	if ($a['tanggalDuedate'] == $b['tanggalDuedate']) return 0;
				// 	return strtotime($a['tanggalDuedate']) - strtotime($b['tanggalDuedate']);
				// }
				
				// usort($data, "sortFunction");
				
				// $j=0;
				// foreach($data as $d){
				// 	echo $data[$j]['ivb_kode']." ".$data[$j]['tanggalDuedate']."<br>";$j++;
				// }
			?>
			
			<table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
				<thead class="thead-light">
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Rekening Investasi</th>
						<th class="text-center">Nama Anggota</th>
						<th class="text-center">Alamat</th>
						<th class="text-center">Jangka | Bunga</th>
						<th class="text-center">Total Jasa</th>
						<th class="text-center">Jasa Ditarik</th>
						<th class="text-center">Sisa Jasa</th>
						<th class="text-center">Pokok</th>
						<th class="text-center">Pokok + Sisa Jasa</th>
						<th class="text-center"><initialism title="Tanggal Pendaftaran | Jatuh Tempo"><i class ="fa fa-calendar" aria-hidden="true"></i></initialism></th>
						<th class="text-center">Wilayah</th>
						<th class="text-center">Status</th>
					</tr>
				</thead>
				<tbody><?php
					$total=$sub_totaljasaditarik=$sub_totalsisajasa=$sub_pokokbungasisa
					=$subtotal_thn=$sub_pokokbunga=$pokokbunga=$sub_totalpokok=$totalpokok =
					$totaljasaditarik=$totalsisajasa=$pokokbungasisa=0;
					foreach ($data as $key=>$item){ 
						//$jumlahtarik = $this->Penarikaninvestasiberjangka_model->get_totalpenarikan($item['ivb_kode']);
						$subtotal_thn += $item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id'];
						$sub_totaljasaditarik += $item['jumlahditarik'];
						$sub_totalsisajasa += $item['sisajasa'];
						$sub_pokokbungasisa += $item['sisajasa']+$item['pokok'];
						$sub_pokokbunga += $item['ivb_jumlah']+($item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id']);
						$sub_totalpokok += $item['ivb_jumlah'];
					?>
					<tr>
						<td width="80px"><?php echo ++$start ?></td>
						<td><?php echo $item['ivb_kode'] ?></td>
						<td><?php echo $item['nama_ang_no'] ?></td>
						<td><?php echo $item['alamat_ang_no'] ?></td>
						<td><?php echo $item['jwi_id'] , " Bulan",' | ',$item['biv_id'] ," %" ?></td>
						<td><?php echo rupiahsimpanan($item['to_jasa']) ?></td>
						<td><?php echo rupiahsimpanan($item['jumlahditarik'])?></td>
						<td><?php echo rupiahsimpanan($item['sisajasa'])?></td>
						<td><?php echo rupiahsimpanan($item['pokok']) ?></td>
						<td><?php echo rupiahsimpanan($item['pokok']+$item['sisajasa']) ?></td>
						<td><initialism title="Tanggal Pendaftaran | Jatuh Tempo"><?php echo $item['tglpendaftaran'],' | ',$item['tanggalDuedate'] ?></initialism></td>
						<td><?php echo $item['wil_kode'] ?></td>
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
									<td class="right">'.rupiahsimpanan($subtotal_thn).'</td>
									<td class="right">'.rupiahsimpanan($sub_totaljasaditarik).'</td>
									<td class="right">'.rupiahsimpanan($sub_totalsisajasa).'</td>
									<td class="right">'.rupiahsimpanan($sub_totalpokok).'</td>
									<td class="right">'.rupiahsimpanan($sub_pokokbungasisa).'</td>
								</tr>';
								$subtotal_thn = $sub_totaljasaditarik = $sub_totalsisajasa = $sub_pokokbungasisa = $sub_totalpokok = 0;
							} 
							$total += $item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id'];
							$totaljasaditarik += $item['jumlahditarik'];
							$totalsisajasa += $item['sisajasa'];
							$pokokbunga += $item['ivb_jumlah']+($item['ivb_jumlah']*$item['biv_id']/100*$item['jwi_id']);
							$totalpokok += $item['ivb_jumlah'];
							$pokokbungasisa += $item['sisajasa']+$item['pokok'];
						?>
					</tr>
					<?php }?>
					<tr class="danger">
						<td></td>
						<td>Total </td>
						<td></td><td></td><td></td><td></td>
						<td><?php echo rupiahsimpanan($total) ?></td>
						<td><?php echo rupiahsimpanan($totaljasaditarik) ?></td>
						<td><?php echo rupiahsimpanan($totalsisajasa) ?></td>
						<td><?php echo rupiahsimpanan($totalpokok) ?></td>
						<td><?php echo rupiahsimpanan($pokokbungasisa) ?></td>
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