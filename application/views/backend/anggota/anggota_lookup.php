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
            <?php echo anchor(site_url('anggota/?p=1'),'Create', 'class="btn btn-primary"'); ?> 
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('anggota/lookup'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>anggota/lookup', '<?= @$_GET['idhtml']?>')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Nomor Anggota</th>
		<th class="text-center">Nama</th>
		<th class="text-center">Alamat</th>
		<th class="text-center">Nomor KTP</th>
		<th class="text-center">Nomor KK</th>
		<th class="text-center">Nomor Handphone</th>
		<th class="text-center">Status</th>
            </thead>
			<tbody><?php
            foreach ($anggota_data as $anggota)
            {
                ?>
                <tr>
                <tr onclick="setVal('<?=$idhtml?>','<?=$anggota->ang_no?>','<?=$anggota->ang_nama?>')" style="cursor: pointer;">
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $anggota->ang_no ?></td>
			<td><?php echo $anggota->ang_nama ?></td>
			<td><?php echo $anggota->ang_alamat ?></td>
			<td><?php echo $anggota->ang_noktp ?></td>
			<td><?php echo $anggota->ang_nokk ?></td>
			<td><?php echo $anggota->ang_nohp ?></td>
			<td><?php echo $this->statusAnggota[$anggota->ang_status] ?></td>
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