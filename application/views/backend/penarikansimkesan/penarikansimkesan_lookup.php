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
                    <h2><b>List Penarikansimkesan</b></h2>
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
                <form action="<?php echo site_url('penarikansimkesan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>penarikansimkesan/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Pns Id</th>
		<th class="text-center">Sik Kode</th>
		<th class="text-center">Jps Id</th>
		<th class="text-center">Pns Tglpenarikan</th>
		<th class="text-center">Pns Jmlsimkesan</th>
		<th class="text-center">Pns Jmlpenarikan</th>
		<th class="text-center">Pns Catatan</th>
		<th class="text-center">Pns Tgl</th>
		<th class="text-center">Pns Flag</th>
		<th class="text-center">Pns Info</th></tr>
            </thead>
			<tbody><?php
            foreach ($penarikansimkesan_data as $penarikansimkesan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $penarikansimkesan->pns_id ?></td>
			<td><?php echo $penarikansimkesan->sik_kode ?></td>
			<td><?php echo $penarikansimkesan->jps_id ?></td>
			<td><?php echo $penarikansimkesan->pns_tglpenarikan ?></td>
			<td><?php echo $penarikansimkesan->pns_jmlsimkesan ?></td>
			<td><?php echo $penarikansimkesan->pns_jmlpenarikan ?></td>
			<td><?php echo $penarikansimkesan->pns_catatan ?></td>
			<td><?php echo $penarikansimkesan->pns_tgl ?></td>
			<td><?php echo $penarikansimkesan->pns_flag ?></td>
			<td><?php echo $penarikansimkesan->pns_info ?></td>
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