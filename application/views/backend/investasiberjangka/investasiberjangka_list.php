<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>investasiberjangka" class="form-inline" method="get">
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
                        foreach ($this->statusInvestasi as $key => $value) { ?>
                            <option value="<?= $key?>"><?= $value?></option>
                    <?php        
                        }
                    ?>
                </select>
            </div>
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('investasiberjangka/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('investasiberjangka'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Rekening Investasi</th>
		<th class="text-center">Anggota</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Jangka Waktu</th>
		<th class="text-center">Jasa</th>
		<th class="text-center">Bunga</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Tanggal Perpanjangan</th>
		<th class="text-center">Status</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($investasiberjangka_data as $investasiberjangka)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $investasiberjangka->ivb_kode ?></td>
			<td><?php echo $investasiberjangka->ang_no ?></td>
			<td><?php echo $investasiberjangka->kar_kode ?></td>
			<td><?php echo $investasiberjangka->wil_kode ?></td>
			<td><?php echo $investasiberjangka->jwi_id ?></td>
			<td><?php echo $investasiberjangka->jiv_id ?></td>
			<td><?php echo $investasiberjangka->biv_id ?></td>
			<td><?php echo $investasiberjangka->ivb_tglpendaftaran ?></td>
			<td><?php echo $investasiberjangka->ivb_tglperpanjangan ?></td>
			<td><?php echo $investasiberjangka->ivb_status ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('investasiberjangka/read/'.$investasiberjangka->ivb_kode),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('investasiberjangka/update/'.$investasiberjangka->ivb_kode),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('investasiberjangka/delete/'.$investasiberjangka->ivb_kode),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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
    </body>
</html>