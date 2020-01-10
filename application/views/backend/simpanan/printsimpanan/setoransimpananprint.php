<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; }
 	h2{text-align: center}
 	h3{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style>
 <h2><b>List Setoran Simpanan</b></h2>
 <?php $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row(); ?>

 <h3><b>Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?> </b></h3>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">Wilayah : <?php if($w!='all'){echo $wil_kode->wil_nama;} else if ($w='all') {echo 'Semua Wilayah';}?></p>
        <table>
            <tr>
        <th class="text-center">No</th>
		<th class="text-center">Rekening Simpanan</th>
		<th class="text-center">Nama Anggota</th>
		<th class="text-center">Tanggal Setor</th>
		<th class="text-center">Jumlah Setor</th>
            </tr>
        <tbody><?php
        $total=$no=0;
            foreach ($setoransimpanan as $key => $item)
            {
                $total += $item->ssi_jmlsetor;
                $sim_kode = $this->db->get_where('simpanan', array('sim_kode' => $item->sim_kode))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $sim_kode->ang_no))->row();
                ?>
                <tr>
					<td width="20px"><?php echo ++$no ?></td>
					<td><?php echo $item->sim_kode ?></td>
					<td width="250px"><?php echo $ang_no->ang_nama ?></td>
					<td><?php echo dateFormataja($item->ssi_tglsetor) ?></td>
					<td><?php echo rupiahsimpanan($item->ssi_jmlsetor) ?></td>
				</tr>
                
                <?php
            }
            ?>
            <tr><td></td><td></td><td></td><td>Total Setor</td><td><?php echo rupiahsimpanan($total) ?></td></tr>
            </tbody>
        </table>
  