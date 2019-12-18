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
                    <h2><b>List Angsuranbayar</b></h2>
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
                <form action="<?php echo site_url('angsuranbayar/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>angsuranbayar/lookup', '<?= @$_GET['idhtml']?>')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Angsuran</th>
		<th class="text-center">Bayar Pokok</th>
		<th class="text-center">Bayar Bunga</th>
		<th class="text-center">Bayar Denda</th>
		<th class="text-center">Bayar Status</th>
		<th class="text-center">Bayar Tglpokok</th>
		<th class="text-center">Bayar Tglbunga</th>
		<th class="text-center">Bayar Tgllunas</th></tr>
            </thead>
			<tbody><?php
            foreach ($angsuranbayar_data as $angsuranbayar)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $angsuranbayar->ags_id ?></td>
			<td><?php echo $angsuranbayar->agb_pokok ?></td>
			<td><?php echo $angsuranbayar->agb_bunga ?></td>
			<td><?php echo $angsuranbayar->agb_denda ?></td>
			<td><?php echo $angsuranbayar->agb_status ?></td>
			<td><?php echo $angsuranbayar->agb_tglpokok ?></td>
			<td><?php echo $angsuranbayar->agb_tglbunga ?></td>
			<td><?php echo $angsuranbayar->agb_tgllunas ?></td>
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