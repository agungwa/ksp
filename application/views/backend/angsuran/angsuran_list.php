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
                    <h2><b>List Angsuran</b></h2>
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
                <?php echo anchor(site_url('angsuran/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('angsuran/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('angsuran'); ?>" class="btn btn-default">Reset</a>
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
		<th class="text-center">Rekening Pinjaman</th>
		<th class="text-center">Angsuranke</th>
		<th class="text-center">Jatuh Tempo</th>
		<th class="text-center">Tanggal Bayar</th>
		<th class="text-center">Jumlah Pokok</th>
		<th class="text-center">Jumlah Bunga</th>
		<th class="text-center">Status</th>
		<th class="text-center">Tanggal</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($angsuran_data as $angsuran)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $angsuran->pin_id ?></td>
			<td><?php echo $angsuran->ang_angsuranke ?></td>
			<td><?php echo $angsuran->ags_tgljatuhtempo ?></td>
			<td><?php echo $angsuran->ags_tglbayar ?></td>
			<td><?php echo $angsuran->ags_jmlpokok ?></td>
			<td><?php echo $angsuran->ags_jmlbunga ?></td>
			<td><?php echo $this->statusAngsuran[$angsuran->ags_status] ?></td>
			<td><?php echo dateFormat($angsuran->ags_tgl) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('angsuran/read/'.$angsuran->ags_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('angsuran/update/'.$angsuran->ags_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('angsuran/delete/'.$angsuran->ags_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
			</td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
      
        </div>
    </div>
    </div>
    </div>
    </body>
</html>