<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>anggota" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="4">
                <div class="col-md-2"><h3>Filter : </h3></div>
                <select class="form-control col-md-3" name="status">
                    <option value="">--Status--</option>
                    <?php
                        foreach ($this->statusAnggota as $key => $value) { ?>
                            <option value="<?= $key?>"><?= $value?></option>
                    <?php        
                        }
                    ?>
                </select>
               <!-- <select class="form-control col-md-3" name="wilayah">
                    <option value="">--Wilayah--</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>-->
            </div>
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No Anggota">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>anggota/?p=2" class="btn btn-default">Reset</a>
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
        <th class="text-center">Nomor Anggota</th>
		<th class="text-center">Nama</th>
		<th class="text-center">Alamat</th>
		<th class="text-center">Nomor KTP</th>
		<th class="text-center">Nomor KK</th>
		<th class="text-center">Nomor Handphone</th>
		<th class="text-center">Tanggal Lahir</th>
		<th class="text-center">Status</th>
		<th class="text-center">Edit Anggota</th>
		<th class="text-center">Action Anggota</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($anggota_data as $anggota)
            {
                $status = $this->statusAnggota;
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $anggota->ang_no ?></td>
			<td><?php echo $anggota->ang_nama ?></td>
			<td><?php echo $anggota->ang_alamat ?></td>
			<td><?php echo $anggota->ang_noktp ?></td>
			<td><?php echo $anggota->ang_nokk ?></td>
			<td><?php echo $anggota->ang_nohp ?></td>
			<td><?php echo $anggota->ang_tgllahir ?></td>
			<td><?php echo $status[$anggota->ang_status]?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('anggota/read/'.$anggota->ang_no),'Detail','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('anggota/update/'.$anggota->ang_no),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('anggota/delete/'.$anggota->ang_no),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
            </td>
            <td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('anggota/setorsiw?q='.$anggota->ang_no),'Setor','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('anggota/tariksiw?q='.$anggota->ang_no),'Tarik','class="text-navy"');?>
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