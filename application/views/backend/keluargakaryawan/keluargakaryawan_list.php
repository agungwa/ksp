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
                    <h2><b>List Keluargakaryawan</b></h2>
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
                <?php echo anchor(site_url('keluargakaryawan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('keluargakaryawan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('keluargakaryawan'); ?>" class="btn btn-default">Reset</a>
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
		<th class="text-center">Kar Kode</th>
		<th class="text-center">Kka Nama</th>
		<th class="text-center">Kka Alamat</th>
		<th class="text-center">Kka Nohp</th>
		<th class="text-center">Kka Tgl</th>
		<th class="text-center">Kka Flag</th>
		<th class="text-center">Kka Info</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($keluargakaryawan_data as $keluargakaryawan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $keluargakaryawan->kar_kode ?></td>
			<td><?php echo $keluargakaryawan->kka_nama ?></td>
			<td><?php echo $keluargakaryawan->kka_alamat ?></td>
			<td><?php echo $keluargakaryawan->kka_nohp ?></td>
			<td><?php echo $keluargakaryawan->kka_tgl ?></td>
			<td><?php echo $keluargakaryawan->kka_flag ?></td>
			<td><?php echo $keluargakaryawan->kka_info ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('keluargakaryawan/read/'.$keluargakaryawan->kka_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('keluargakaryawan/update/'.$keluargakaryawan->kka_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('keluargakaryawan/delete/'.$keluargakaryawan->kka_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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