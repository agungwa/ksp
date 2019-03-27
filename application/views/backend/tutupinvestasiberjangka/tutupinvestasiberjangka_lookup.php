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
                    <h2><b>List Tutupinvestasiberjangka</b></h2>
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
                <form action="<?php echo site_url('tutupinvestasiberjangka/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>tutupinvestasiberjangka/lookup')" >Search</button>
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
		<th class="text-center">Tib Tgltutup</th>
		<th class="text-center">Tib Catatan</th>
		<th class="text-center">Tib Tgl</th>
		<th class="text-center">Tib Flag</th>
		<th class="text-center">Tib Info</th></tr>
            </thead>
			<tbody><?php
            foreach ($tutupinvestasiberjangka_data as $tutupinvestasiberjangka)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $tutupinvestasiberjangka->ivb_kode ?></td>
			<td><?php echo $tutupinvestasiberjangka->tib_tgltutup ?></td>
			<td><?php echo $tutupinvestasiberjangka->tib_catatan ?></td>
			<td><?php echo $tutupinvestasiberjangka->tib_tgl ?></td>
			<td><?php echo $tutupinvestasiberjangka->tib_flag ?></td>
			<td><?php echo $tutupinvestasiberjangka->tib_info ?></td>
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