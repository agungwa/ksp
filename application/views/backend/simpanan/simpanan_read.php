<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Simpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Kode Simpanan</td><td><?php echo $sim_kode; ?></td></tr>
	    <tr><td>Angggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Karyawan</td><td><?php echo $kar_kode; ?></td></tr>
	    <tr><td>Bunga</td><td><?php echo $bus_id,' %'; ?></td></tr>
	    <tr><td>Jenis Simpanan</td><td><?php echo $jsi_id,' bulan'; ?></td></tr>
	    <tr><td>Jenis Setoran</td><td><?php echo $jse_id; ?></td></tr>
	    <tr><td>Wilayah</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Tanggal Pendaftaran</td><td><?php echo $sim_tglpendaftaran; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $sim_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo base_url()?>printsimpanan/read/<?=$sim_kode?>" class="btn btn-default">Print</a>
                        <a href="<?php echo site_url('simpanan/?p=3') ?>" class="btn btn-primary hBack">Kembali</a></td></tr>
                    </table>
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Setoran</th>
		<th class="text-center">Tanggal Setoran</th>
		<th class="text-center">Saldo</th>
            </tr>
            </thead>
			<tbody><?php
            $no = 1;
            $total_setoran = 0;
            foreach ($setoran_data as $setoran)
            {
                $total_setoran += $setoran->ssi_jmlsetor;
            ?>
            <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo rupiahsimpanan($setoran->ssi_jmlsetor) ?></td>
			<td><?php echo $setoran->ssi_tglsetor ?></td>
			<td><?php echo rupiahsimpanan($total_setoran) ?></td>
		</tr>

            <?php
			$no++;
            }
            ?>
            </tbody>
            </table>
        
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Saldo simpanan</th>
		<th class="text-center">Bunga/bulan</th>
		<th class="text-center">Tanggal Bunga</th> 
        <?php if(is_allow('M_EDIT')): ?>
		<th class="text-center">Action</th>
        <?php endif; ?>
            </tr>
            </thead>
            <tbody><?php
            $no =1;
            $phbuku = 20000;
            $administasi = 1/100;
            $totalbunga = 0;
            foreach ($bungasetoran as $databunga)
            { 
                $totalbunga += $databunga->bss_bungabulanini;
                ?>
                <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $databunga->sim_kode ?></td>
			<td><?php echo $databunga->bss_bungabulanini?></td>
			<td><?php echo $databunga->bss_tglbunga ?></td>
            <?php if(is_allow('M_EDIT')): ?>
			<td>
            <div class="dropdown">
                        <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">
                            Pilih 
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo site_url('bungasetoransimpanan/update/'.$databunga->bss_id); ?>">Update</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('bungasetoransimpanan/delete/'.$databunga->bss_id); ?>">Delete</a></li>
                            
                        </ul>
                    </div>
            </td>
            <?php endif; ?>
            </tr>    
            <?php
                $no++;
            }?>
            </tbody>
            <tr class="danger"><td></td><td>Total Saldo (setoran+bunga)</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><?php echo $total_setoran+$totalbunga ?></td></tr>
            
        </table>
            
            </div>
        </div>
    </div>
    </div>
    </body>
</html>