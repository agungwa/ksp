<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body><div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2><b>List Anggota</b></h2>
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
			<!--
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('anggota/anggotalist'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('anggota/?p=6'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
			-->
        </div>
        <table class="data table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Nomor Anggota</th>
		<th class="text-center">Nama</th>
		<th class="text-center">Alamat</th>
		<th class="text-center">Nomor KTP</th>
		<th class="text-center">Nomor KK</th>
		<th class="text-center">Nomor Handphone</th>
		<th class="text-center">Tanggal Lahir</th>
		<th class="text-center">Status</th>
		<th class="text-center">Edit Anggota</th>
		<th class="text-center">Action Anggota</th>
            </tr>
            </thead>
			<tbody><?php
            
            foreach ($anggota_data as $anggota)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $anggota->ang_no ?></td>
			<td><?php echo $anggota->ang_nama ?></td>
			<td><?php echo $anggota->ang_alamat ?></td>
			<td><?php echo $anggota->ang_noktp ?></td>
			<td><?php echo $anggota->ang_nokk ?></td>
			<td><?php echo $anggota->ang_nohp ?></td>
			<td><?php echo $anggota->ang_tgllahir ?></td>
			<td><?php echo $this->statusAnggota[$anggota->ang_status] ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('anggota/read/'.$anggota->ang_no),'Detail','class="text-navy"'); 
                echo ' | ';
                if ($anggota->ang_status == 0) {
				echo anchor(site_url('anggota/pengajuanupdate/'.$anggota->ang_no),'Update','class="text-navy"');
                } else {
                echo anchor(site_url('anggota/update/'.$anggota->ang_no),'Update','class="text-navy"');
                } 
				echo ' | '; 
				echo anchor(site_url('anggota/delete/'.$anggota->ang_no),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
            </td>
            <td style="text-align:center" width="200px">
                <?php
				echo anchor(site_url('anggota/setorsiw?q='.$anggota->ang_no),'Setor','class="text-navy"'); 
				echo ' | '; 
                echo anchor(site_url('anggota/tariksiw?q='.$anggota->ang_no),'Tarik','class="text-navy"');
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