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
                    <h2><b>List Jenis Klaim</b></h2>
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
                <form action="<?php echo site_url('jenisklaim/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>jenisklaim/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
                <tr>
                <th class="text-center">No</th>
        		<th class="text-center">Keuntungan</th>
        		<th class="text-center">Plan Simkesan</th>
        		<th class="text-center">Tahunke</th>
        		<th class="text-center">Nominal</th>
        		<th class="text-center">Keterangan</th>
        		<th class="text-center">Administrasi</th></tr>
            </thead>
			<tbody><?php
            foreach ($jenisklaim_data as $jenisklaim)
            {
                ?>
                <tr onclick="setVal('<?=$idhtml?>','<?=$jenisklaim->jkl_id?>','<?=$jenisklaim->jkl_keuntungan?>')" style="cursor: pointer;">
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $jenisklaim->jkl_keuntungan ?></td>
    			<td><?php echo $jenisklaim->jkl_plan ?></td>
    			<td><?php echo $jenisklaim->jkl_tahunke ?></td>
    			<td><?php echo $jenisklaim->jkl_nominal ?></td>
    			<td><?php echo $jenisklaim->jkl_keterangan ?></td>
    			<td><?php echo $jenisklaim->jkl_administrasi ?></td>
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