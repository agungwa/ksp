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
                    <h2><b>List Pelunasan</b></h2>
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
                <form action="<?php echo site_url('pelunasan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>pelunasan/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Pin Id</th>
		<th class="text-center">Pel Jenis</th>
		<th class="text-center">Pel Tenor</th>
		<th class="text-center">Pel Angsuran</th>
		<th class="text-center">Pel Bungaangsuran</th>
		<th class="text-center">Pel Totalkekuranganpokok</th>
		<th class="text-center">Pel Totalbungapokok</th>
		<th class="text-center">Pel Bungatambahan</th>
		<th class="text-center">Pel Totaldenda</th>
		<th class="text-center">Pel Tglpelunasan</th>
		<th class="text-center">Pel Tgl</th>
		<th class="text-center">Pel Flag</th>
		<th class="text-center">Pel Info</th></tr>
            </thead>
			<tbody><?php
            foreach ($pelunasan_data as $pelunasan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pelunasan->pin_id ?></td>
			<td><?php echo $pelunasan->pel_jenis ?></td>
			<td><?php echo $pelunasan->pel_tenor ?></td>
			<td><?php echo $pelunasan->pel_angsuran ?></td>
			<td><?php echo $pelunasan->pel_bungaangsuran ?></td>
			<td><?php echo $pelunasan->pel_totalkekuranganpokok ?></td>
			<td><?php echo $pelunasan->pel_totalbungapokok ?></td>
			<td><?php echo $pelunasan->pel_bungatambahan ?></td>
			<td><?php echo $pelunasan->pel_totaldenda ?></td>
			<td><?php echo $pelunasan->pel_tglpelunasan ?></td>
			<td><?php echo $pelunasan->pel_tgl ?></td>
			<td><?php echo $pelunasan->pel_flag ?></td>
			<td><?php echo $pelunasan->pel_info ?></td>
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