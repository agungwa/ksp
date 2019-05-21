<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>pinjaman" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="4">
                <div class="col-md-2"><h3>Filter : </h3></div>
                <select class="form-control col-md-3" name="status">
                    <option value="">--Status--</option>
                    <?php
                        foreach ($this->statusPinjaman as $key => $value) { ?>
                            <option value="<?= $key?>"><?= $value?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="wilayah">
                    <option value="">--Wilayah--</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="karyawan">
                    <option value="">--Karyawan--</option>
                    <?php
                        foreach ($karyawan_data as $value) { ?>
                            <option value="<?= $value->kar_kode?>"><?= $value->kar_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No Pinjaman / No Anggota">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>pinjaman/?p=4" class="btn btn-default">Reset</a>
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
        		<th class="text-center">Pinjaman</th>
        		<th class="text-center">Anggota</th>
        		<th class="text-center">Setting Angsuran</th>
        		<th class="text-center">Bunga Pinjaman</th>
        		<th class="text-center">Potongan Provisi</th>
        		<th class="text-center">Wilayah</th>
        		<th class="text-center">Kategori Peminjam</th>
        		<th class="text-center">Pengajuan</th>
        		<th class="text-center">Pinjaman</th>
        		<th class="text-center">Tanggal Pengajuan</th>
        		<th class="text-center">Tanggal Pencairan</th>
        		<th class="text-center">Status Pinjaman</th>
        		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($pinjaman_data as $pinjaman)
            {
                ?>
                <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $pinjaman->pin_id ?></td>
    			<td><?php echo $pinjaman->ang_no ?></td>
    			<td><?php echo $pinjaman->sea_id ?></td>
    			<td><?php echo $pinjaman->bup_id ?></td>
    			<td><?php echo $pinjaman->pop_id ?></td>
    			<td><?php echo $pinjaman->wil_kode ?></td>
    			<td><?php echo $pinjaman->skp_id ?></td>
    			<td><?php echo $pinjaman->pin_pengajuan ?></td>
    			<td><?php echo $pinjaman->pin_pinjaman ?></td>
    			<td><?php echo dateFormat($pinjaman->pin_tglpengajuan) ?></td>
    			<td><?php echo dateFormat($pinjaman->pin_tglpencairan) ?></td>
    			<td><?php echo $pinjaman->pin_statuspinjaman ?></td>
    			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pinjaman/read/'.$pinjaman->pin_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('pinjaman/update/'.$pinjaman->pin_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('pinjaman/delete/'.$pinjaman->pin_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
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