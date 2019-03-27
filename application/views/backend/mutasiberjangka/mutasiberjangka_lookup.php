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
                    <h2><b>List Mutasiberjangka</b></h2>
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
                <form action="<?php echo site_url('mutasiberjangka/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>mutasiberjangka/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Ivb Kode</th>
		<th class="text-center">Mib Tglmutasi</th>
		<th class="text-center">Mib Asal</th>
		<th class="text-center">Mib Tujuan</th>
		<th class="text-center">Mib Status</th>
		<th class="text-center">Mib Tgl</th>
		<th class="text-center">Mib Flag</th>
		<th class="text-center">Mib Info</th></tr>
            </thead>
			<tbody><?php
            foreach ($mutasiberjangka_data as $mutasiberjangka)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $mutasiberjangka->ivb_kode ?></td>
			<td><?php echo $mutasiberjangka->mib_tglmutasi ?></td>
			<td><?php echo $mutasiberjangka->mib_asal ?></td>
			<td><?php echo $mutasiberjangka->mib_tujuan ?></td>
			<td><?php echo $mutasiberjangka->mib_status ?></td>
			<td><?php echo $mutasiberjangka->mib_tgl ?></td>
			<td><?php echo $mutasiberjangka->mib_flag ?></td>
			<td><?php echo $mutasiberjangka->mib_info ?></td>
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