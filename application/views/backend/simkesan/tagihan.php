<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simkesan/tagihan/" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                    <label for="float">Tanggal : </label>
                    <input type="date" class="form-control" name="f" id="f" value="<?php echo $f?>" />
              
                    <label for="float"> s/d </label>
                    <input type="date" class="form-control" name="t" id="t" value="<?php echo $t?>" />
                <select class="form-control col-md-3" name="p">
                    <option value="all">Semua Plan</option>
                    <?php
                        foreach ($plansimkesan_data as $value) { ?>
                            <option value="<?= $value->psk_id?>"><?= $value->psk_plan?></option>
                    <?php        
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-4 text-right">
                    <div class="input-group">
                          <a href="<?php echo base_url()?>printdatasimkesan/tagihan?f=<?=$f?>&t=<?=$t?>&p=<?=$p?>" class="btn btn-default">Print</a>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>
        <table class="data" style="margin-bottom: 10px">
            <thead>
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
				<th>Action</th>
            </tr>
            </thead>
			<tbody><?php
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
					<td style="text-align:center" width="200px">
						<?php 
						echo anchor(site_url('simkesan/read/'.$item['sik_kode']),'Read','class="text-navy"'); 
						echo ' | '; 
						echo anchor(site_url('simkesan/update/'.$item['sik_kode']),'Update','class="text-navy"'); 
						echo ' | '; 
						echo anchor(site_url('simkesan/delete/'.$item['sik_kode']),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
						?>
					</td>
				</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
    </div>
    </div>
    </div>
    </body>
</html>