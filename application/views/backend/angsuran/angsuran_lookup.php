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
               
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('angsuran/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>angsuran/lookup')" >Search</button>
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
		<th class="text-center">Ang Angsuranke</th>
		<th class="text-center">Ags Tgljatuhtempo</th>
		<th class="text-center">Ags Tglbayar</th>
		<th class="text-center">Ags Jmlpokok</th>
		<th class="text-center">Ags Jmlbunga</th>
		<th class="text-center">Ags Status</th>
		<th class="text-center">Ags Tgl</th>
		<th class="text-center">Ags Flag</th>
		<th class="text-center">Ags Info</th></tr>
            </thead>
			<tbody><?php
            foreach ($angsuran_data as $angsuran)
            {
                ?>
                <tr onclick="setVal('<?=$idhtml?>','<?=$angsuran->pin_id?>','<?=$angsuran->pin_id?>')" style="cursor: pointer;">
        			<td width="80px"><?php echo ++$start ?></td>
        			<td><?php echo $angsuran->pin_id ?></td>
        			<td><?php echo $angsuran->ang_angsuranke ?></td>
        			<td><?php echo $angsuran->ags_tgljatuhtempo ?></td>
        			<td><?php echo $angsuran->ags_tglbayar ?></td>
        			<td><?php echo $angsuran->ags_jmlpokok ?></td>
        			<td><?php echo $angsuran->ags_jmlbunga ?></td>
        			<td><?php echo $angsuran->ags_status ?></td>
        			<td><?php echo $angsuran->ags_tgl ?></td>
        			<td><?php echo $angsuran->ags_flag ?></td>
        			<td><?php echo $angsuran->ags_info ?></td>
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