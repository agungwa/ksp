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
               
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('phu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>phu/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Phu Jasapin</th>
		<th class="text-center">Phu Administrasipin</th>
		<th class="text-center">Phu Pinaltipin</th>
		<th class="text-center">Phu Administrasisimpanan</th>
		<th class="text-center">Phu Phbuku</th>
		<th class="text-center">Phu Gaji</th>
		<th class="text-center">Phu Operasional</th>
		<th class="text-center">Phu Bungaivb</th>
		<th class="text-center">Phu Bungasim</th>
		<th class="text-center">Phu Lps</th>
		<th class="text-center">Phu Komunikasi</th>
		<th class="text-center">Phu Perlengkapan</th>
		<th class="text-center">Phu Penyusutan</th>
		<th class="text-center">Phu Asuransi</th>
		<th class="text-center">Phu Insentif</th>
		<th class="text-center">Phu Pajakkendaraan</th>
		<th class="text-center">Phu Rapat</th>
		<th class="text-center">Phu Atk</th>
		<th class="text-center">Phu Keamanan</th>
		<th class="text-center">Phu Phpinjaman</th>
		<th class="text-center">Phu Sosial</th>
		<th class="text-center">Phu Tayakuran</th>
		<th class="text-center">Phu Koran</th>
		<th class="text-center">Phu Pajakkoprasi</th>
		<th class="text-center">Phu Servicekendaraan</th>
		<th class="text-center">Phu Konsumsi</th>
		<th class="text-center">Phu Rat</th>
		<th class="text-center">Phu Thr</th>
		<th class="text-center">Phu Nonoprasional</th>
		<th class="text-center">Phu Perawatankantor</th></tr>
            </thead>
			<tbody><?php
            foreach ($phu_data as $phu)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $phu->phu_jasapin ?></td>
			<td><?php echo $phu->phu_administrasipin ?></td>
			<td><?php echo $phu->phu_pinaltipin ?></td>
			<td><?php echo $phu->phu_administrasisimpanan ?></td>
			<td><?php echo $phu->phu_phbuku ?></td>
			<td><?php echo $phu->phu_gaji ?></td>
			<td><?php echo $phu->phu_operasional ?></td>
			<td><?php echo $phu->phu_bungaivb ?></td>
			<td><?php echo $phu->phu_bungasim ?></td>
			<td><?php echo $phu->phu_lps ?></td>
			<td><?php echo $phu->phu_komunikasi ?></td>
			<td><?php echo $phu->phu_perlengkapan ?></td>
			<td><?php echo $phu->phu_penyusutan ?></td>
			<td><?php echo $phu->phu_asuransi ?></td>
			<td><?php echo $phu->phu_insentif ?></td>
			<td><?php echo $phu->phu_pajakkendaraan ?></td>
			</tr>
			<tr>
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
			<td><?php echo $phu->phu_tgl ?></td>
			<td><?php echo $phu->phu_info ?></td>
			<td><?php echo $phu->phu_flag ?></td>
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