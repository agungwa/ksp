<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                    <h2><b>List Jatuh Tempo</b></h2>
                </div>
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simpanan/jatuhtempo" class="form-inline" method="get">
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
                            
                        <span class="input-group-btn">
                                    <a href="<?php echo base_url()?>printsimpanan/jatuhtempo?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>" class="btn btn-default">Print</a>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>

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
							echo '<tr class="info">
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
            <tr class="danger"><td></td><td>Total Setor</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><?php echo rupiahsimpanan($total) ?></td></tr>
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