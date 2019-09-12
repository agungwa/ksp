<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simpanan/listdata/" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="3">
                <div class="col-md-2"><h3>Filter : </h3></div>
                <select class="form-control col-md-3"  name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="s">
                    <option value="all">Semua Status</option>
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
                        <input type="text" class="form-control" name="u" value="all" placeholder="No Rekening">
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
            foreach ($datasimpanan as $key=>$item)
            {
                
                $tanggalDuedate = date("Y-m-d", strtotime($item['sim_tglpendaftaran'].' + '.$item['jsi_id'].' Months'));
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $item['sim_kode'] ?></td>
			<td><?php echo $item['ang_no'] ?></td>
			<td><?php echo $item['nm_ang_no'] ?></td>
			<td><?php echo $item['kar_kode'] ?></td>
			<td><?php echo $item['bus_id']," %" ?></td>
			<td><?php echo $item['jsi_id']," Bulan" ?></td>
			<td><?php echo $item['jse_id'] ?></td>
			<td><?php echo $item['wil_kode'] ?></td>
			<td><?php echo $item['sim_tglpendaftaran'] ?></td>
			<td><?php echo $tanggalDuedate?></td>
			<td><?php echo $item['sim_status']?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('simpanan/read/'.$item['sim_kode']),'Detail','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('simpanan/update/'.$item['sim_kode']),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('simpanan/delete/'.$item['sim_kode']),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
			</td>
            <td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('simpanan/setor?q='.$item['sim_kode']),'Setor','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('simpanan/tariksimpanan?q='.$item['sim_kode']),'Tarik','class="text-navy"');?>
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
    </div>
    </div>
    </body>
</html>