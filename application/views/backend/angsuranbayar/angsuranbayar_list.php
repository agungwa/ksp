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
                    <h2><b>List Angsuranbayar</b></h2>
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
                <?php echo anchor(site_url('angsuranbayar/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <!--<form action="<?php echo site_url('angsuranbayar/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('angsuranbayar'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>-->
            </div>
        </div>
        <table class="data" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Angsuran</th>
		<th class="text-center">Bayar Pokok</th>
		<th class="text-center">Bayar Bunga</th>
		<th class="text-center">Bayar Denda</th>
		<th class="text-center">Bayar Status</th>
		<th class="text-center">Bayar Tglpokok</th>
		<th class="text-center">Bayar Tglbunga</th>
		<th class="text-center">Bayar Tgllunas</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($angsuranbayar_data as $angsuranbayar)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $angsuranbayar->ags_id ?></td>
			<td><?php echo $angsuranbayar->agb_pokok ?></td>
			<td><?php echo $angsuranbayar->agb_bunga ?></td>
			<td><?php echo $angsuranbayar->agb_denda ?></td>
			<td><?php echo $angsuranbayar->agb_status ?></td>
			<td><?php echo $angsuranbayar->agb_tglpokok ?></td>
			<td><?php echo $angsuranbayar->agb_tglbunga ?></td>
			<td><?php echo $angsuranbayar->agb_tgllunas ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('angsuranbayar/read/'.$angsuranbayar->agb_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('angsuranbayar/update/'.$angsuranbayar->agb_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('angsuranbayar/delete/'.$angsuranbayar->agb_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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