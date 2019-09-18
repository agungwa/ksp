<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; }
 	td#01{padding: 5px;text-align: justify;background-color: #95a5a6; }
 	h2{text-align: center}
 	h3{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style>
 <h2><b>List Tagihan Simkesan</b></h2>
 <?php $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $p))->row(); ?>

 <h3><b>Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?> </b></h3>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">Plan : <?php if($p!='all'){echo $psk_id->psk_plan;} else if ($p='all') {echo 'Semua Plan';}?></p>
     
        <table >
            <thead >
            <tr>
                <th>No</th>
        <th>Rekening Simkesan</th>
		<th>ID Angggota</th>
		<th>Nama</th>
		<th>Karyawan</th>
		<th>Plan Simkesan</th>
		<th>Wilayah</th>
		<th>Tanggal Pendaftaran</th>
		<th>Total Setor</th>
		<th>Titipan</th>
		<th>Tunggakan</th>
		<th>Jatuh Tempo</th>
		<th>Status</th>
            </tr>
            </thead>
			<tbody><?php
            $total = 0;
            foreach ($datasimkesan as $key=>$item)
            {
                
                $totalsetoran = $this->Setoransimkesan_model->get_totalsetoran($item['sik_kode']); 
                $totaltitip = $this->Titipansimkesan_model->get_totaltitipan($item['sik_kode']); 
                $totalambil = $this->Titipansimkesan_model->get_totalambil($item['sik_kode']);
                $titipan =  $totaltitip[0]->tts_jmltitip - $totalambil[0]->tts_jmlambil;

                $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $item['psk_id']))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item['wil_kode']))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $item['ang_no']))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $item['kar_kode']))->row();
 
                $date11 = new DateTime($item['sik_tglpendaftaran']);
                $date21 = new DateTime();
                
                $diff1 = $date11->diff($date21);
                $selisih1 = (($diff1->format('%y') * 12) + $diff1->format('%m'))+1;
                $selisihjt1 = (($diff1->format('%y') * 12) + $diff1->format('%m'));
                $harusbayar = $selisih1 * $item['setor_psk_id'];
                $tunggakan = $harusbayar - $totalsetoran[0]->ssk_jmlsetor;
                $jatuhtempo = date("Y-m-d", strtotime($item['sik_tglpendaftaran'].' + '.$selisihjt1.' Months'));
                $total += $tunggakan;
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $item['sik_kode'] ?></td>
			<td><?php echo $item['ang_no'] ?></td>
			<td><?php echo $item['nm_ang_no'] ?></td>
			<td><?php echo $item['kar_kode']?></td>
			<td><?php echo $item['psk_id'] ?></td>
			<td><?php echo $item['wil_kode'] ?></td>
			<td><?php echo date('d/m/Y', strtotime($item['sik_tglpendaftaran'])) ?></td>
			<td><?php echo neraca($totalsetoran[0]->ssk_jmlsetor) ?></td>
			<td><?php echo neraca($titipan) ?></td>
			<td><?php echo neraca($tunggakan) ?></td>
			<td><?php echo dateFormataja($jatuhtempo) ?></td>
			<td><?php echo $item['sik_status'] ?></td>
			
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        <table>
        <tr><td id="01">Total Tunggakan</td><td id="01"><?php echo rupiahsimpanan($total) ?></td></tr>
        </table>