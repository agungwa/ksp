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
                    <h2><b>List Klaim Simkesan</b></h2>
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
                <form action="<?php echo site_url('klaimsimkesan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>klaimsimkesan/lookup')" >Search</button>
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
        		<th class="text-center">Jenis Klam</th>
        		<th class="text-center">Tanggal Klaim</th>
        		<th class="text-center">Jumlah Klaim</th>
        		<th class="text-center">Jumlah Tunggakan</th>
        		<th class="text-center">Jumlah Terima</th>
        		<th class="text-center">Status</th>
            </thead>
			<tbody><?php
            foreach ($klaimsimkesan_data as $klaimsimkesan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $klaimsimkesan->sik_kode ?></td>
			<td><?php echo $klaimsimkesan->jkl_id ?></td>
			<td><?php echo $klaimsimkesan->ksi_tglklaim ?></td>
			<td><?php echo $klaimsimkesan->ksi_jmlklaim ?></td>
			<td><?php echo $klaimsimkesan->ksi_jmltunggakan ?></td>
			<td><?php echo $klaimsimkesan->ksi_jmlditerima ?></td>
			<td><?php echo $klaimsimkesan->ksi_status ?></td>
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