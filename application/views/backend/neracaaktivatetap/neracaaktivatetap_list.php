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
                    <h2><b>List Neracaaktivatetap</b></h2>
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
                <?php echo anchor(site_url('neracaaktivatetap/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('neracaaktivatetap/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('neracaaktivatetap'); ?>" class="btn btn-default">Reset</a>
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
		<th class="text-center">Tanah</th>
		<th class="text-center">Bangunan</th>
		<th class="text-center">Elektronik</th>
		<th class="text-center">Kendaraan</th>
		<th class="text-center">Peralatan</th>
		<th class="text-center">Akumulasipenyusutan</th>
		<th class="text-center">Tanggal</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($neracaaktivatetap_data as $neracaaktivatetap)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $neracaaktivatetap->nat_tanah ?></td>
			<td><?php echo $neracaaktivatetap->nat_bangunan ?></td>
			<td><?php echo $neracaaktivatetap->nat_elektronik ?></td>
			<td><?php echo $neracaaktivatetap->nat_kendaraan ?></td>
			<td><?php echo $neracaaktivatetap->nat_peralatan ?></td>
			<td><?php echo $neracaaktivatetap->nat_akumulasipenyusutan ?></td>
			<td><?php echo $neracaaktivatetap->nat_tanggal ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('neracaaktivatetap/read/'.$neracaaktivatetap->nat_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('neracaaktivatetap/delete/'.$neracaaktivatetap->nat_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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