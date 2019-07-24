
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>angsuran/?p=4" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="4">
                <div class="col-md-2"><h3>Filter : </h3></div>
                <select class="form-control col-md-3" name="s">
                    <option value="all">Semua Status</option>
                    <?php
                        foreach ($this->statusPinjaman as $key => $value) { ?>
                            <option value="<?= $key?>"><?= $value?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="k">
                    <option value="all">Semua Marketing</option>
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
                        <input type="text" class="form-control" name="u" value="all" placeholder="No Pinjaman">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>angsuran/?p=4" class="btn btn-default">Reset</a>
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
        		<th class="text-center">Nama Anggota</th>
        		<th class="text-center">Angsuran (bulan)</th>
        		<th class="text-center">Wilayah</th>
        		<th class="text-center">Pengajuan</th>
        		<th class="text-center">Pinjaman</th>
        		<th class="text-center">Tanggal Pengajuan</th>
        		<th class="text-center">Tanggal Pencairan</th>
        		<th class="text-center">Status Pinjaman</th>
        		<th class="text-center">Angsuran</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($datapinjaman as $key=>$item)
            {
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $item['ang_no']))->row();
                $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $item['sea_id']))->row();
                $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $item['bup_id']))->row();
                $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $item['pop_id']))->row();
                $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $item['skp_id']))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item['wil_kode']))->row();
                ?>
                <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $item['pin_id'] ?></td>
    			<td><?php echo $item['ang_no'] ?></td>
    			<td><?php echo $item['sea_id']," Bulan" ?></td>
    			<td><?php echo $item['wil_kode'] ?></td>
    			<td><?php echo "Rp ",$item['pin_pengajuan'] ?></td>
    			<td><?php echo "Rp ",$item['pin_pinjaman'] ?></td>
    			<td><?php echo dateFormat($item['pin_tglpengajuan']); ?></td>
    			<td><?php echo dateFormat($item['pin_tglpencairan']); ?></td>
    			<td><?php echo $item['pin_statuspinjaman'] ?></td>
    			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('angsuran/bayarAngsuran?q='.$item['pin_id']),'Angsur','class="text-navy"'); 
				?>
                </td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row">
            
        </div>
        </div>
    </div>
    </div>
    </div>