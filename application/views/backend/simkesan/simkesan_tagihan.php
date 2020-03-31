<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simkesan/tagihan/" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <select class="form-control col-md-3" name="p">
                    <option value="all">Semua Plan</option>
                    <?php
                        foreach ($plansimkesan_data as $value) { ?>
                            <option value="<?= $value->psk_id?>"><?= $value->psk_plan?></option>
                    <?php        
                        }
                    ?>
                </select>
                
                <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
            </div>
            <div class="col-md-4 text-right">
                    <div class="input-group">
                    
                   <!-- <input type="text" class="form-control" name="u" value="all" placeholder="No simkesan">
                        <span class="input-group-btn">
                            <?php 
                                if ($u <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>simkesan/?p=2" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?> -->
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>
        <table class="data table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Rekening Simkesan</th>
		<th class="text-center">ID Angggota</th>
		<th class="text-center">Nama</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Plan Simkesan</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Total Setor</th>
		<th class="text-center">Titipan</th>
		<th class="text-center">Tunggakan</th>
		<th class="text-center">Jatuh Tempo</th>
		<th class="text-center">Status</th>
		<th class="text-center">Action</th>
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
                
                $date1 = new DateTime($item['sik_tglpendaftaran']);
                $date2 = new DateTime();
                
                $diff = $date1->diff($date2);
                $selisih = (($diff->format('%y') * 12) + $diff->format('%m'))+1;
                $selisihjt = (($diff->format('%y') * 12) + $diff->format('%m'));
                $harusbayar = $selisih * $item['setor_psk_id'];
                $tunggakan = $harusbayar - $totalsetoran[0]->ssk_jmlsetor;
                $jatuhtempo = date("Y-m-d", strtotime($item['sik_tglpendaftaran'].' + '.$selisihjt.' Months'));
            
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $item['sik_kode'] ?></td>
			<td><?php echo $item['ang_no'] ?></td>
			<td><?php echo $item['nm_ang_no'] ?></td>
			<td><?php echo $item['kar_kode']?></td>
			<td><?php echo $item['psk_id'] ?></td>
			<td><?php echo date('d/m/Y', strtotime($item['sik_tglpendaftaran'])) ?></td>
			<td><?php echo neraca($totalsetoran[0]->ssk_jmlsetor) ?></td>
			<td><?php echo neraca($titipan) ?></td>
			<td><?php echo neraca($tunggakan); ?></td>
			<td><?php echo dateFormat($jatuhtempo); ?></td>
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