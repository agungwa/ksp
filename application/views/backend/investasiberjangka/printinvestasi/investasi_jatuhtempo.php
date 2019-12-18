<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; }
 	tr#01{padding: 5px;text-align: center; }
 	h2{text-align: center}
 	h3{text-align: center}
    th{background-color: #95a5a6; padding: 10px;color: #fff}
    tr#01{background-color: #eb3131;}
    tr#02{background-color: #536fee;}
     
 </style>
 
<h2><b>List Jatuh Tempo Investasi</b></h2>
<?php $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row(); ?>
<h3><b>Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?> </b></h3>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
<span style="font-family:Cambria">Wilayah : <?php if($w!='all'){echo $wil_kode->wil_nama;} else if ($w='all') {echo 'Semua Wilayah';}?></p>
			
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
		
		<table >
            <thead >
				<tr>
					<th >No</th>
					<th >Rekening Investasi</th>
					<th >Nama Anggota</th>
					<th >Alamat</th>
					<th >Jangka Waktu</th>
					<th >Bunga</th>
					<th >Total Jasa</th>
					<th >Jasa Ditarik</th>
					<th >Sisa Jasa</th>
					<th >Pokok</th>
					<th >Pokok + Sisa Jasa</th>
					<th >Tanggal Pendaftaran</th>
					<th >Tanggal Jatuh Tempo</th>
					<th >Status</th>
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
						<td><?php echo $item['jwi_id'] , " Bulan" ?></td>
						<td><?php echo $item['biv_id'] ," %" ?></td>
						<td><?php echo rupiahsimpanan($item['to_jasa']) ?></td>
						<td><?php echo rupiahsimpanan($item['jumlahditarik'])?></td>
						<td><?php echo rupiahsimpanan($item['sisajasa'])?></td>
						<td><?php echo rupiahsimpanan($item['pokok']) ?></td>
						<td><?php echo rupiahsimpanan($item['pokok']+$item['sisajasa']) ?></td>
						<td><?php echo $item['tglpendaftaran'] ?></td>
						<td><?php echo $item['tanggalDuedate'] ?></td>
						<td><?php echo $item['status'] ?></td> 
						<?php
							// SUB TOTAL per thn_byr
							if (@$data[$key+1]['jatuhtempo'] != $item['jatuhtempo']) {
								echo '<tr id="02">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>SUB TOTAL ' . dateFormataja($item['jatuhtempo']) . '</td>
									<td></td>
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
				
				<tr id="01">
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