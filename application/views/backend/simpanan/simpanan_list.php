<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simpanan" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="3">
                <div class="col-md-2"><h3>Filter : </h3></div>
                <select class="form-control col-md-3"  name="wilayah">
                    <option value="">--Wilayah--</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="status">
                    <option value="">--Status--</option>
                    <?php
                        foreach ($this->statusSimpanan as $key => $value) { ?>
                            <option value="<?= $key?>"><?= $value?></option>
                    <?php        
                        }
                    ?>
                </select>
            </div>
            
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No simpanan/ No Anggota">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>simpanan/?p=3" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>

        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Kode Simpanan</th>
		<th class="text-center">Kode Anggota</th>
		<th class="text-center">Nama Anggota</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Bunga (dalam %)</th>
		<th class="text-center">Jenis Simpanan</th>
		<th class="text-center">Jenis Setoran</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Jatuh Tempo</th>
		<th class="text-center">Status</th>
		<th class="text-center">Edit Simpanan</th>
		<th class="text-center">Action Simpanan</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($simpanan_data as $simpanan)
            {
                $sim_status = $this->statusSimpanan;
                $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $simpanan->jsi_id))->row();
                $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $simpanan->jse_id))->row();
                $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $simpanan->bus_id))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $simpanan->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $simpanan->kar_kode))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $simpanan->wil_kode))->row();
                $tanggalDuedate = date("Y-m-d", strtotime($simpanan->sim_tglpendaftaran.' + '.$jsi_id->jsi_simpanan.' Months'));
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $simpanan->sim_kode ?></td>
			<td><?php echo $simpanan->ang_no ?></td>
			<td><?php echo $ang_no->ang_nama ?></td>
			<td><?php echo $kar_kode->kar_nama ?></td>
			<td><?php echo $bus_id->bus_bunga ?></td>
			<td><?php echo $jsi_id->jsi_simpanan ?></td>
			<td><?php echo $jse_id->jse_setoran ?></td>
			<td><?php echo $wil_kode->wil_nama ?></td>
			<td><?php echo $simpanan->sim_tglpendaftaran ?></td>
			<td><?php echo $tanggalDuedate?></td>
			<td><?php echo $this->statusSimpanan[$simpanan->sim_status]?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('simpanan/read/'.$simpanan->sim_kode),'Detail','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('simpanan/update/'.$simpanan->sim_kode),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('simpanan/delete/'.$simpanan->sim_kode),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
			</td>
            <td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('simpanan/setor?q='.$simpanan->sim_kode),'Setor','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('simpanan/tariksimpanan?q='.$simpanan->sim_kode),'Tarik','class="text-navy"');?>
			</td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>