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
                    <h2><b>List Ahliwaris Simkesan</b></h2>
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
                <?php echo anchor(site_url('ahliwarissimkesan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('ahliwarissimkesan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('ahliwarissimkesan'); ?>" class="btn btn-default">Reset</a>
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
		<th class="text-center">Rekening Simkesan</th>
		<th class="text-center">Ahli Waris ID</th>
		<th class="text-center">Jenis ID</th>
		<th class="text-center">Nama</th>
		<th class="text-center">Alamat</th>
		<th class="text-center">Hubungan</th>
		<th class="text-center">Lampiran</th>
		<th class="text-center">Tanggal</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($ahliwarissimkesan_data as $ahliwarissimkesan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $ahliwarissimkesan->sik_kode ?></td>
			<td><?php echo $ahliwarissimkesan->aws_noid ?></td>
			<td><?php echo $ahliwarissimkesan->aws_jenisid ?></td>
			<td><?php echo $ahliwarissimkesan->aws_nama ?></td>
			<td><?php echo $ahliwarissimkesan->aws_alamat ?></td>
			<td><?php echo $ahliwarissimkesan->aws_hubungan ?></td>
			<td><?php echo $ahliwarissimkesan->aws_lampiran ?></td>
			<td><?php echo dateFormat($ahliwarissimkesan->aws_tgl) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('ahliwarissimkesan/read/'.$ahliwarissimkesan->aws_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('ahliwarissimkesan/update/'.$ahliwarissimkesan->aws_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('ahliwarissimkesan/delete/'.$ahliwarissimkesan->aws_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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