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
                <?php echo anchor(site_url('pinjaman/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pinjaman/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pinjaman'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
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
        		<th class="text-center">Setting Angsuran</th>
        		<th class="text-center">Bunga Pinjaman</th>
        		<th class="text-center">Potongan Provisi</th>
        		<th class="text-center">Wilayah</th>
        		<th class="text-center">Kategori Peminjam</th>
        		<th class="text-center">Penjamin</th>
        		<th class="text-center">Pengajuan</th>
        		<th class="text-center">Pinjaman</th>
        		<th class="text-center">Tanggal Pengajuan</th>
        		<th class="text-center">Tanggal Pencairan</th>
        		<th class="text-center">Marketing</th>
        		<th class="text-center">Surveyor</th>
        		<th class="text-center">Survey</th>
        		<th class="text-center">Status Pinjaman</th>
        		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($pinjaman_data as $pinjaman)
            {
                ?>
                <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $pinjaman->pin_id ?></td>
    			<td><?php echo $pinjaman->ang_no ?></td>
    			<td><?php echo $pinjaman->sea_id ?></td>
    			<td><?php echo $pinjaman->bup_id ?></td>
    			<td><?php echo $pinjaman->pop_id ?></td>
    			<td><?php echo $pinjaman->wil_kode ?></td>
    			<td><?php echo $pinjaman->skp_id ?></td>
    			<td><?php echo $pinjaman->pen_id ?></td>
    			<td><?php echo $pinjaman->pin_pengajuan ?></td>
    			<td><?php echo $pinjaman->pin_pinjaman ?></td>
    			<td><?php echo dateFormat($pinjaman->pin_tglpengajuan) ?></td>
    			<td><?php echo dateFormat($pinjaman->pin_tglpencairan) ?></td>
    			<td><?php echo $pinjaman->pin_marketing ?></td>
    			<td><?php echo $pinjaman->pin_surveyor ?></td>
    			<td><?php echo $pinjaman->pin_survey ?></td>
    			<td><?php echo $pinjaman->pin_statuspinjaman ?></td>
    			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pinjaman/read/'.$pinjaman->pin_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('pinjaman/update/'.$pinjaman->pin_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('pinjaman/delete/'.$pinjaman->pin_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
			</td>
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
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>