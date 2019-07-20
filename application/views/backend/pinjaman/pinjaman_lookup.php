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
                    <h2><b>List Pinjaman</b></h2>
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
                <form action="<?php echo site_url('pinjaman/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>pinjaman/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        		<th class="text-center">Pinjaman</th>
        		<th class="text-center">Anggota</th>
        		<th class="text-center">Wilayah</th>
        		<th class="text-center">Pengajuan</th>
        		<th class="text-center">Pinjaman</th>
        		<th class="text-center">Tanggal Pengajuan</th>
        		<th class="text-center">Tanggal Pencairan</th>
        		<th class="text-center">Marketing</th>
        		<th class="text-center">Surveyor</th>
        		<th class="text-center">Status Pinjaman</th></tr>
            </thead>
			<tbody><?php
            foreach ($pinjaman_data as $pinjaman)
            {
                ?>
                <tr onclick="setVal('<?=$idhtml?>','<?=$pinjaman->pin_id?>','<?=$pinjaman->ang_no?>')" style="cursor: pointer;">
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pinjaman->pin_id ?></td>
			<td><?php echo $pinjaman->ang_no ?></td>
			<td><?php echo $pinjaman->wil_kode ?></td>
			<td><?php echo $pinjaman->pin_pengajuan ?></td>
			<td><?php echo $pinjaman->pin_pinjaman ?></td>
			<td><?php echo $pinjaman->pin_tglpengajuan ?></td>
			<td><?php echo $pinjaman->pin_tglpencairan ?></td>
			<td><?php echo $pinjaman->pin_marketing ?></td>
			<td><?php echo $pinjaman->pin_surveyor ?></td>
			<td><?php echo $pinjaman->pin_statuspinjaman ?></td>
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