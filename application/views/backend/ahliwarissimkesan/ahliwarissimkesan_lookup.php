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
                    <h2><b>List Ahliwarissimkesan</b></h2>
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
                <form action="<?php echo site_url('ahliwarissimkesan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>ahliwarissimkesan/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Sik Kode</th>
		<th class="text-center">Aws Noid</th>
		<th class="text-center">Aws Jenisid</th>
		<th class="text-center">Aws Nama</th>
		<th class="text-center">Aws Alamat</th>
		<th class="text-center">Aws Hubungan</th>
		<th class="text-center">Aws Lampiran</th>
		<th class="text-center">Aws Tgl</th>
		<th class="text-center">Aws Flag</th>
		<th class="text-center">Aws Info</th></tr>
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
			<td><?php echo $ahliwarissimkesan->aws_tgl ?></td>
			<td><?php echo $ahliwarissimkesan->aws_flag ?></td>
			<td><?php echo $ahliwarissimkesan->aws_info ?></td>
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
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>