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
                    <h2><b>List Shu</b></h2>
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
                <?php echo anchor(site_url('shu/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('shu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('shu'); ?>" class="btn btn-default">Reset</a>
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
		<th class="text-center">Shu Pendapatan</th>
		<th class="text-center">Shu Pengeluaran</th>
		<th class="text-center">Shu Jumlah</th>
		<th class="text-center">Shu Tanggal</th>
		<th class="text-center">Shu Tgl</th>
		<th class="text-center">Shu Flag</th>
		<th class="text-center">Shu Info</th>
		<th class="text-center">Phu Id</th>
		<th class="text-center">Psis Id</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($shu_data as $shu)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $shu->shu_pendapatan ?></td>
			<td><?php echo $shu->shu_pengeluaran ?></td>
			<td><?php echo $shu->shu_jumlah ?></td>
			<td><?php echo $shu->shu_tanggal ?></td>
			<td><?php echo $shu->shu_tgl ?></td>
			<td><?php echo $shu->shu_flag ?></td>
			<td><?php echo $shu->shu_info ?></td>
			<td><?php echo $shu->phu_id ?></td>
			<td><?php echo $shu->psis_id ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('shu/read/'.$shu->shu_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('shu/update/'.$shu->shu_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('shu/delete/'.$shu->shu_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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