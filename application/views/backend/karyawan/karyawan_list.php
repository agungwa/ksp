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
                    <h2><b>List Karyawan</b></h2>
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
                <?php echo anchor(site_url('karyawan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('karyawan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('karyawan'); ?>" class="btn btn-default">Reset</a>
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
                <th class="text-center">Kode</th>
        		<th class="text-center">Nama</th>
        		<th class="text-center">NO KTP</th>
        		<th class="text-center">Kode</th>
        		<th class="text-center">Alamat</th>
        		<th class="text-center">No Handphone</th>
        		<th class="text-center">Status</th>
        		<th class="text-center">Tanggal</th>
        		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($karyawan_data as $karyawan)
            {
			$jab_kode = $this->db->get_where('jabatan', array('jab_kode' => $karyawan->jab_kode))->row();
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $karyawan->kar_kode ?></td>
			<td><?php echo $karyawan->kar_nama ?></td>
			<td><?php echo $karyawan->kar_nik ?></td>
			<td><?php echo $jab_kode->jab_nama ?></td>
			<td><?php echo $karyawan->kar_alamat ?></td>
			<td><?php echo $karyawan->kar_nohp ?></td>
			<td><?php echo $this->statusKaryawan[$karyawan->kar_status]?></td>
			<td><?php echo dateFormat($karyawan->kar_tgl) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('karyawan/read/'.$karyawan->kar_kode),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('karyawan/delete/'.$karyawan->kar_kode),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
			</td>
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