<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; }
 	h2{text-align: center}
 	h3{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style> 
 <h2><b>List Angsuran Pinjaman</b></h2>
 <h3><b>Tanggal Jatuh Tempo: <?=dateFormataja($t)?> </b></h3>
        <table>
            <thead>
            <tr>
                <th>No</th>
		<th>Rekening Pinjaman</th>
        <th>Nama</th>
        <th>Alamat</th>
		<th>Jaminan</th>
		<th>Angsuranke</th>
		<th>Jatuh Tempo</th>
		<th>Tanggal Bayar</th>
		<th>Jumlah Pokok</th>
		<th>Jumlah Bunga</th>
		<th>Status</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($dataangsuran as $key=>$item)
            {
                $pin_id = $this->db->get_where('pinjaman', array('pin_id' => $item['pin_id']))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $pin_id->ang_no))->row();
                $jaminan = $this->Jaminan_model->get_by_rek($item['pin_id']);
                $jej_id = $this->db->get_where('jenisjaminan', array('jej_id' => $jaminan->jej_id))->row();
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $item['pin_id'] ?></td>
			<td><?php echo $ang_no->ang_nama ?></td>
			<td><?php echo $ang_no->ang_alamat ?></td>
			<td><?php echo $jej_id->jej_jaminan ?></td>
			<td><?php echo $item['ang_angsuranke'] ?></td>
			<td><?php echo $item['ags_tgljatuhtempo'] ?></td>
			<td><?php echo $item['ags_tglbayar'] ?></td>
			<td><?php echo rupiah($item['ags_jmlpokok']) ?></td>
			<td><?php echo rupiah($item['ags_jmlbunga']) ?></td>
			<td><?php echo $item['ags_status'] ?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
      