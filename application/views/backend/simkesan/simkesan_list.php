<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simkesan/listdata" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="2">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                <select class="form-control col-md-3" name="s">
                    <option value="all">Semua Status</option>
                    <?php
                        foreach ($this->statusSimkesan as $key => $value) { ?>
                            <option value="<?= $key?>"><?= $value?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="w">
                    <option value="">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="p">
                    <option value="">Semua Plan</option>
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
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
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
		<th class="text-center">Alamat</th>
		<th class="text-center">Plan Simkesan</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Tanggal Berakhir</th>
		<th class="text-center">Total Setor</th>
		<th class="text-center">Titipan</th>
		<th class="text-center">Status</th>
		<th class="text-center">Tanggal</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($simkesan_data as $simkesan)
            {

                $totalsetoran = $this->Setoransimkesan_model->get_totalsetoran($simkesan->sik_kode); 
                $totaltitip = $this->Titipansimkesan_model->get_totaltitipan($simkesan->sik_kode); 
                $totalambil = $this->Titipansimkesan_model->get_totalambil($simkesan->sik_kode);
                $titipan =  $totaltitip[0]->tts_jmltitip - $totalambil[0]->tts_jmlambil;
                $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $simkesan->psk_id))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $simkesan->wil_kode))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $simkesan->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $simkesan->kar_kode))->row();
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $simkesan->sik_kode ?></td>
			<td><?php echo $simkesan->ang_no ?></td>
			<td><?php echo $ang_no->ang_nama ?></td>
			<td><?php echo $ang_no->ang_alamat?></td>
			<td><?php echo $psk_id->psk_plan ?></td>
			<td><?php echo $wil_kode->wil_nama ?></td>
			<td><?php echo date('d/m/Y', strtotime($simkesan->sik_tglpendaftaran)) ?></td>
			<td><?php echo $simkesan->sik_tglberakhir ?></td>
			<td><?php echo neraca($totalsetoran[0]->ssk_jmlsetor) ?></td>
			<td><?php echo neraca($titipan) ?></td>
			<td><?php echo $simkesan->sik_status ?></td>
			<td><?php echo dateFormat($simkesan->sik_tgl) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('simkesan/read/'.$simkesan->sik_kode),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('simkesan/update/'.$simkesan->sik_kode),'Update','class="text-navy"'); 
				// echo ' | '; 
				// echo anchor(site_url('simkesan/delete/'.$simkesan->sik_kode),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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