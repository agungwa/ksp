<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2><b>List Phu</b></h2>
                    <?php if ($this->session->userdata('message') != '') {?>
                    <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?=$this->session->userdata('message')?> <a class="alert-link" href="#"></a>
                    </div>
                 <?php }?>
                </div>
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-8">
                <?php echo anchor(site_url('phu/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('phu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('phu'); ?>" class="btn btn-default">Reset</a>
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
		<th class="text-center">Phu Gaji</th>
		<th class="text-center">Phu Operasional</th>
		<th class="text-center">Phu LPS</th>
		<th class="text-center">Phu Komunikasi</th>
		<th class="text-center">Phu Perlengkapan</th>
		<th class="text-center">Phu Penyusutan</th>
		<th class="text-center">Phu Asuransi</th>
		<th class="text-center">Phu Insentif</th>
		<th class="text-center">Phu Pajak Kendaraan</th>
		<th class="text-center">Phu Rapat</th>
		<th class="text-center">Phu ATK</th>
		<th class="text-center">Phu Keamanan</th>
		<th class="text-center">Phu Phpinjaman</th>
		<th class="text-center">Phu Sosial</th>
		<th class="text-center">Phu Tasyakuran</th>
		<th class="text-center">Phu Koran</th>
		<th class="text-center">Phu Pajak Koprasi</th>
		<th class="text-center">Phu Service Kendaraan</th>
		<th class="text-center">Phu Konsumsi</th>
		<th class="text-center">Phu RAT</th>
		<th class="text-center">Phu Thr</th>
		<th class="text-center">Phu Non Oprasional</th>
		<th class="text-center">Phu Perawatan Kantor</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($phu_data as $phu)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $phu->phu_gaji ?></td>
			<td><?php echo $phu->phu_operasional ?></td>
			<td><?php echo $phu->phu_lps ?></td>
			<td><?php echo $phu->phu_komunikasi ?></td>
			<td><?php echo $phu->phu_perlengkapan ?></td>
			<td><?php echo $phu->phu_penyusutan ?></td>
			<td><?php echo $phu->phu_asuransi ?></td>
			<td><?php echo $phu->phu_insentif ?></td>
			<td><?php echo $phu->phu_pajakkendaraan ?></td>
			<td><?php echo $phu->phu_rapat ?></td>
			<td><?php echo $phu->phu_atk ?></td>
			<td><?php echo $phu->phu_keamanan ?></td>
			<td><?php echo $phu->phu_phpinjaman ?></td>
			<td><?php echo $phu->phu_sosial ?></td>
			<td><?php echo $phu->phu_tayakuran ?></td>
			<td><?php echo $phu->phu_koran ?></td>
			<td><?php echo $phu->phu_pajakkoprasi ?></td>
			<td><?php echo $phu->phu_servicekendaraan ?></td>
			<td><?php echo $phu->phu_konsumsi ?></td>
			<td><?php echo $phu->phu_rat ?></td>
			<td><?php echo $phu->phu_thr ?></td>
			<td><?php echo $phu->phu_nonoprasional ?></td>
			<td><?php echo $phu->phu_perawatankantor ?></td>
			<td><?php echo $phu->phu_keterangan ?></td>
			<td><?php echo dateFormataja($phu->phu_tanggal) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('phu/read/'.$phu->phu_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('phu/update/'.$phu->phu_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('phu/delete/'.$phu->phu_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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
    </body>
</html>