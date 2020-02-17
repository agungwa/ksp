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
                    <h2><b>List Kasbon</b></h2>
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
                <form action="<?php echo site_url('kasbon/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>kasbon/lookup', '<?= @$_GET['idhtml']?>')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Jumlah</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Keterangan</th>
		<th class="text-center">Tanggal</th></tr>
            </thead>
			<tbody><?php
            foreach ($kasbon_data as $kasbon)
            {
                ?>
                <tr>
                <tr onclick="setVal('<?=$idhtml?>','<?=$kasbon->wil_kode?>','<?=$kasbon->wil_nama?>')" style="cursor: pointer;">
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kasbon->ksb_jumlah ?></td>
			<td><?php echo $kasbon->wil_kode ?></td>
			<td><?php echo $kasbon->kar_kode ?></td>
			<td><?php echo $kasbon->ksb_keterangan ?></td>
			<td><?php echo $kasbon->ksb_tanggal ?></td>
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