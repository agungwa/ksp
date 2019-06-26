
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
        		<th class="text-center">ID Anggota</th>
        		<th class="text-center">Nama Anggota</th>
        		<th class="text-center">Angsuran (bulan)</th>
        		<th class="text-center">wilayah</th>
        		<th class="text-center">wilayah</th>
        		<th class="text-center">Pengajuan</th>
        		<th class="text-center">Pinjaman</th>
        		<th class="text-center">Tanggal Pengajuan</th>
        		<th class="text-center">Tanggal Pencairan</th>
        		<th class="text-center">Status Pinjaman</th>
        		<th class="text-center">Edit Pinjaman</th>
        		<th class="text-center">Action Pinjaman</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($pinjaman_data as $pinjaman)
            {
                $pin_statuspinjaman = $this->statusPinjaman;
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $pinjaman->ang_no))->row();
                $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $pinjaman->sea_id))->row();
                $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $pinjaman->bup_id))->row();
                $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $pinjaman->pop_id))->row();
                $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $pinjaman->skp_id))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $pinjaman->wil_kode))->row();
                ?>
                <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $pinjaman->pin_id ?></td>
    			<td><?php echo $pinjaman->ang_no ?></td>
    			<td><?php echo $ang_no->ang_nama ?></td>
    			<td><?php echo $sea_id->sea_tenor," Bulan" ?></td>
    			<td><?php echo $pinjaman->wil_kode ?></td>
    			<td><?php echo $wil_kode->wil_nama ?></td>
    			<td><?php echo "Rp ",$pinjaman->pin_pengajuan ?></td>
    			<td><?php echo "Rp ",$pinjaman->pin_pinjaman ?></td>
    			<td><?php echo dateFormat($pinjaman->pin_tglpengajuan) ?></td>
    			<td><?php echo dateFormat($pinjaman->pin_tglpencairan) ?></td>
    			<td><?php echo $pin_statuspinjaman[$pinjaman->pin_statuspinjaman] ?></td>
    			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pinjaman/read/'.$pinjaman->pin_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('pinjaman/update/'.$pinjaman->pin_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('pinjaman/delete/'.$pinjaman->pin_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
                </td>
                <td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pinjaman/survey?q='.$pinjaman->pin_id),'Survey','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('pinjaman/persetujuan?q='.$pinjaman->pin_id),'Persetujuan','class="text-navy"');?>
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