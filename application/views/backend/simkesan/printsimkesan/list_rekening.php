
<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; }
 	h2{text-align: center}
 	h3{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style><h2><b>List Rekening Simpanan</b></h2>
 <?php $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row(); ?>

 <h3><b>Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?> </b></h3>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">Wilayah : <?php if($w!=''){echo $wil_kode->wil_nama;} else {echo 'Semua Wilayah';}?></p>
        
        <table>
            <thead>
            <tr>
                <th>No</th>
				<th>Rekening Simkesan</th>
				<th>ID Angggota</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th width="100px">Plan</th>
				<th>Wilayah</th>
				<th>Tgl Daftar | Terakhir Setor</th>
				<th>Total | Titip</th>
				<th width="100px">Status | Diagunkan</th>
			</tr>
            </thead>
			<tbody>
            
            
            <?php
            foreach ($simkesan_data as $simkesan)
            {
                $terakhir = $this->Setoransimkesan_model->get_tglterakhir($simkesan->sik_kode);
                $totalsetoran = $this->Setoransimkesan_model->get_totalsetoran($simkesan->sik_kode); 
                $totaltitip = $this->Titipansimkesan_model->get_totaltitipan($simkesan->sik_kode); 
                $totalambil = $this->Titipansimkesan_model->get_totalambil($simkesan->sik_kode);
                $titipan =  $totaltitip[0]->tts_jmltitip - $totalambil[0]->tts_jmlambil;
                $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $simkesan->psk_id))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $simkesan->wil_kode))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $simkesan->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $simkesan->kar_kode))->row();
                ?>
                <?php 
                if ($simkesan->sik_jam > 0){
                    echo '<tr bgcolor = "#f8514b">';
                } else {
                    echo '<tr bgcolor = "#4db7e1">';
                }
                ?>
					<td width="80px"><?php echo ++$start ?></td>
        			<td><?php echo $simkesan->sik_kode ?></td>
        			<td><?php echo $simkesan->ang_no ?></td>
        			<td><?php echo $ang_no->ang_nama ?></td>
        			<td><?php echo $ang_no->ang_alamat ?></td>
        			<td><?php echo $psk_id->psk_plan ?></td>
        			<td><?php echo $wil_kode->wil_nama ?></td>
        			<td><?php echo dateFormataja($simkesan->sik_tglpendaftaran),' | ',dateFormataja($terakhir->tanggal) ?></td>
                    <td><?php echo neraca($totalsetoran[0]->ssk_jmlsetor),' | ', neraca($titipan)?></td>
        			<td><?php echo $this->statusSimkesan[$simkesan->sik_status],' | ',$this->statusJaminan[$simkesan->sik_jam] ?></td>
                   
        		</tr>
                <?php
            }
            ?>
            
            </tbody>
        </table>