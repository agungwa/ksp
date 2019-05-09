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
                    <h2><b>List Jenis Klaim</b></h2>
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
                <?php echo anchor(site_url('jenisklaim/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('jenisklaim/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('jenisklaim'); ?>" class="btn btn-default">Reset</a>
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
        		<th class="text-center">Keuntungan</th>
        		<th class="text-center">Plan Simkesan</th>
        		<th class="text-center">Tahunke</th>
        		<th class="text-center">Nominal</th>
        		<th class="text-center">Keterangan</th>
        		<th class="text-center">Administrasi</th>
        		<th class="text-center">Tanggal</th>
        		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($jenisklaim_data as $jenisklaim)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $jenisklaim->jkl_keuntungan ?></td>
			<td><?php echo $jenisklaim->jkl_plan ?></td>
			<td><?php echo $jenisklaim->jkl_tahunke ?></td>
			<td><?php echo $jenisklaim->jkl_nominal ?></td>
			<td><?php echo $jenisklaim->jkl_keterangan ?></td>
			<td><?php echo $jenisklaim->jkl_administrasi ?></td>
			<td><?php echo dateFormat($jenisklaim->jkl_tgl) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('jenisklaim/read/'.$jenisklaim->jkl_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('jenisklaim/update/'.$jenisklaim->jkl_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('jenisklaim/delete/'.$jenisklaim->jkl_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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