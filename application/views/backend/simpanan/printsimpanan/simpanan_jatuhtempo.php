<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; }
 	tr#01{padding: 5px;text-align: center; }
 	h2{text-align: center}
 	h3{text-align: center}
    th{background-color: #95a5a6; padding: 10px;color: #fff}
    tr#01{background-color: #eb3131;}
    tr#02{background-color: #536fee;}
	#01 td{color:#fff;}
	#02 td{color:#fff;}
</style>

<?php $kantorksp = $this->Kantorksp_model->get_by_id(1); ?>

<h2><b>List Jatuh Tempo Simpanan</b></h2>
<h2><b><?php echo $kantorksp->kks_nama ?></b></h2>

<?php $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row(); ?>

<h3><b>Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?> </b></h3>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
<span style="font-family:Cambria">Wilayah : <?php if($w!='all'){echo $wil_kode->wil_nama;} else if ($w='all') {echo 'Semua Wilayah';}?></p>

	<?php
		$data = array();
		$i=0;
		$total=$subtotal_thn=0;	
		foreach ($datasimpanan as $key => $item){
			$totalsetoran = $this->Setoransimpanan_model->get_totalsetoran($item['sim_kode']); 
			$total += $totalsetoran[0]->ssi_jmlsetor;
			$subtotal_thn += $totalsetoran[0]->ssi_jmlsetor;
			
			$data[$i]['sim_kode'] 			= $item['sim_kode'];
			$data[$i]['ang_no'] 			= $item['ang_no'];
			$data[$i]['ang_nama'] 			= $item['ang_nama'];
			$data[$i]['ang_alamat'] 		= $item['ang_alamat'];
			$data[$i]['kar_nama'] 			= $item['kar_nama'];
			$data[$i]['jsi_simpanan'] 		= $item['jsi_simpanan'];
			$data[$i]['jse_setoran'] 		= $item['jse_setoran'];
			$data[$i]['wil_nama'] 			= $item['wil_nama'];
			$data[$i]['sim_tglpendaftaran'] = $item['sim_tglpendaftaran'];
			$data[$i]['tanggalDuedate'] 	= $item['tanggalDuedate'];
			$data[$i]['to_setor'] 			= rupiahsimpanan($totalsetoran[0]->ssi_jmlsetor);
			$data[$i]['statusSimpanan'] 	= $item['statusSimpanan'];
			$data[$i]['wil_nama'] 			= $item['wil_nama'];
			
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
				<th class="text-center">Kode Simpanan</th>
				<th class="text-center">Kode Anggota</th>
				<th class="text-center">Nama Anggota</th>
				<th class="text-center">Alamat Anggota</th>
				<th class="text-center">Karyawan</th>
				<th class="text-center">Jenis Simpanan</th>
				<th class="text-center">Jenis Setoran</th>
				<th class="text-center">Wilayah</th>
				<th class="text-center">Tanggal Pendaftaran</th>
				<th class="text-center">Jatuh Tempo</th>
				<th class="text-center">Total Setoran </th>
				<th class="text-center">Status</th>
            </tr>
            </thead>
            <tbody><?php
            $total=$subtotal_thn=0;
            foreach ($data as $key => $item)
            {
                $totalsetoran = $this->Setoransimpanan_model->get_totalsetoran($item['sim_kode']); 
                $total += $totalsetoran[0]->ssi_jmlsetor;
                $subtotal_thn += $totalsetoran[0]->ssi_jmlsetor;
       // var_dump($totalsetoran);
                ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $item['sim_kode'] ?></td>
                    <td><?php echo $item['ang_no'] ?></td>
                    <td><?php echo $item['ang_nama'] ?></td>
                    <td><?php echo $item['ang_alamat'] ?></td>
                    <td><?php echo $item['kar_nama'] ?></td>
                    <td><?php echo $item['jsi_simpanan'] ?></td>
                    <td><?php echo $item['jse_setoran'] ?></td>
                    <td><?php echo $item['wil_nama'] ?></td>
                    <td><?php echo $item['sim_tglpendaftaran'] ?></td>
                    <td><?php echo $item['tanggalDuedate']?></td>
                    <td><?php echo rupiahsimpanan($totalsetoran[0]->ssi_jmlsetor)?></td>
                    <td><?php echo $item['statusSimpanan']?></td>
                    <?php
                    // SUB TOTAL per thn_byr
                            if (@$data[$key+1]['tanggalDuedate'] != $item['tanggalDuedate']) {
                                echo '<tr id="02">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>SUB TOTAL ' . $item['tanggalDuedate'] . '</td>
                                    <td></td>
                                    <td class="right">'.rupiahsimpanan($subtotal_thn).'</td>
                                </tr>';
                                $subtotal_thn = 0;
                            } 
                        
                    ?>
                </tr>
            
            <?php 
            }
            ?>
            <tr id="01"><td></td><td>Total Setor</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><?php echo rupiahsimpanan($total) ?></td></tr>
            </tbody>
        </table>
       