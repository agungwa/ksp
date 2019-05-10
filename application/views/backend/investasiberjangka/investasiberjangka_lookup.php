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
                    <h2><b>List Investasi Berjangka</b></h2>
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
                <form action="<?php echo site_url('investasiberjangka/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>investasiberjangka/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Rekening Investasi</th>
		<th class="text-center">Anggota</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Jangka Waktu</th>
		<th class="text-center">Jasa</th>
		<th class="text-center">Bunga</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Tanggal Perpanjangan</th>
		<th class="text-center">Status</th>
            </thead>
			<tbody><?php
            foreach ($investasiberjangka_data as $investasiberjangka)
            {
                ?>
                <tr>
                <tr onclick="setVal('<?=$idhtml?>','<?=$investasiberjangka->ivb_kode?>','<?=$investasiberjangka->ivb_kode?>')" style="cursor: pointer;">
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $investasiberjangka->ivb_kode ?></td>
			<td><?php echo $investasiberjangka->ang_no ?></td>
			<td><?php echo $investasiberjangka->kar_kode ?></td>
			<td><?php echo $investasiberjangka->wil_kode ?></td>
			<td><?php echo $investasiberjangka->jwi_id ?></td>
			<td><?php echo $investasiberjangka->jiv_id ?></td>
			<td><?php echo $investasiberjangka->biv_id ?></td>
			<td><?php echo $investasiberjangka->ivb_tglpendaftaran ?></td>
			<td><?php echo $investasiberjangka->ivb_tglperpanjangan ?></td>
			<td><?php echo $investasiberjangka->ivb_status ?></td>
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