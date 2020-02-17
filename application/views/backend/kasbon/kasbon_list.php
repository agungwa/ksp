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
                    <h2><b>List Kasbon</b></h2>
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
                <?php echo anchor(site_url('kasbon/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kasbon/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kasbon'); ?>" class="btn btn-default">Reset</a>
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
		<th class="text-center">Jumlah</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Jenis</th>
		<th class="text-center">Keterangan</th>
		<th class="text-center">Tanggal</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($kasbon_data as $kasbon)
            {
                
            $wil_kode = $this->db->get_where('wilayah',array('wil_kode' => $kasbon->wil_kode))->row();
            $kar_kode = $this->db->get_where('karyawan',array('kar_kode' => $kasbon->kar_kode))->row();
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo neraca($kasbon->ksb_jumlah) ?></td>
			<td><?php echo $wil_kode->wil_nama ?></td>
			<td><?php echo $kar_kode->kar_nama ?></td>
			<td><?php echo $this->jenisKasbon[$kasbon->ksb_jenis] ?></td>
			<td><?php echo $kasbon->ksb_keterangan ?></td>
			<td><?php echo dateFormataja($kasbon->ksb_tanggal) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kasbon/read/'.$kasbon->ksb_no),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('kasbon/update/'.$kasbon->ksb_no),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('kasbon/delete/'.$kasbon->ksb_no),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
			</td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
       
        </div>
    </div>
    </div>
    </div>
    </body>
</html>