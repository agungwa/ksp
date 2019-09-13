
<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; }
 	h2{text-align: center}
 	h3{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style>
 <h2><b>List Rekening Simpanan</b></h2>
 <?php $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row(); ?>

 <h3><b>Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?> </b></h3>
 <h3><b>Wilayah <?=$w?> <!--<?php //if($w='all'){echo 'semua wilayah';}else {echo $wil_kode->wil_nama;}?>--></b></h3>
        
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th >No</th>
		<th >Kode Simpanan</th>
		<th >Kode Anggota</th>
		<th >Nama Anggota</th>
		<th >Jenis Simpanan</th>
		<th >Tanggal Pendaftaran</th>
		<th >Jatuh Tempo</th>
		<th >Status</th>
		<th >Total Setoran</th>
            </tr>
            </thead>
            <tbody><?php
            
            $total=0;
            foreach ($datasimpanan as $key=>$item)
            {
                $totalsetoran = $this->Setoransimpanan_model->get_totalsetoran($item['sim_kode']); 
                $total += $totalsetoran[0]->ssi_jmlsetor;
                $tanggalDuedate = date("Y-m-d", strtotime($item['sim_tglpendaftaran'].' + '.$item['jsi_id'].' Months'));
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $item['sim_kode'] ?></td>
			<td><?php echo $item['ang_no'] ?></td>
			<td><?php echo $item['nm_ang_no'] ?></td>
			<td><?php echo $item['jsi_id']," Bulan" ?></td>
			<td><?php echo $item['sim_tglpendaftaran'] ?></td>
			<td><?php echo $tanggalDuedate?></td>
			<td><?php echo $item['sim_status']?></td>
			<td><?php echo rupiahsimpanan($totalsetoran[0]->ssi_jmlsetor)?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        