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
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('anggota/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>anggota/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Ang Nama</th>
		<th class="text-center">Ang Alamat</th>
		<th class="text-center">Ang Noktp</th>
		<th class="text-center">Ang Nokk</th>
		<th class="text-center">Ang Nohp</th>
		<th class="text-center">Ang Tgllahir</th>
		<th class="text-center">Ang Tgl</th>
		<th class="text-center">Ang Flag</th>
		<th class="text-center">Ang Info</th></tr>
            </thead>
			<tbody><?php
            foreach ($anggota_data as $anggota)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $anggota->ang_nama ?></td>
			<td><?php echo $anggota->ang_alamat ?></td>
			<td><?php echo $anggota->ang_noktp ?></td>
			<td><?php echo $anggota->ang_nokk ?></td>
			<td><?php echo $anggota->ang_nohp ?></td>
			<td><?php echo $anggota->ang_tgllahir ?></td>
			<td><?php echo $anggota->ang_tgl ?></td>
			<td><?php echo $anggota->ang_flag ?></td>
			<td><?php echo $anggota->ang_info ?></td>
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