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
                    <h2><b>List Simpanan</b></h2>
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
                <form action="<?php echo site_url('simpanan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>simpanan/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Kode Simpanan</th>
		<th class="text-center">Anggota</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Bunga</th>
		<th class="text-center">Jenis Simpanan</th>
		<th class="text-center">Jenis Setoran</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Status</th>
		<th class="text-center">Action</th>
            </thead>
			<tbody><?php
            foreach ($simpanan_data as $simpanan)
            {
                ?>
                <tr>
                <tr onclick="setVal('<?=$idhtml?>','<?=$simpanan->sim_kode?>','<?=$simpanan->sim_kode?>')" style="cursor: pointer;">
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $simpanan->sim_kode ?></td>
			<td><?php echo $simpanan->ang_no ?></td>
			<td><?php echo $simpanan->kar_kode ?></td>
			<td><?php echo $simpanan->bus_id ?></td>
			<td><?php echo $simpanan->jsi_id ?></td>
			<td><?php echo $simpanan->jse_id ?></td>
			<td><?php echo $simpanan->wil_kode ?></td>
			<td><?php echo $simpanan->sim_tglpendaftaran ?></td>
			<td><?php echo $simpanan->sim_status ?></td>
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