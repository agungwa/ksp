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
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>karyawan/lookup', '<?= @$_GET['idhtml']?>')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Kar Nama</th>
		<th class="text-center">Jab Kode</th>
		<th class="text-center">Kar Alamat</th>
		<th class="text-center">Kar Nohp</th>
            </thead>
			<tbody><?php
            foreach ($karyawan_data as $karyawan)
            {
			$jab_kode = $this->db->get_where('jabatan', array('jab_kode' => $karyawan->jab_kode))->row();

                ?>
                <tr>
                <tr onclick="setVal('<?=$idhtml?>','<?=$karyawan->kar_kode?>','<?=$karyawan->kar_nama?>')" style="cursor: pointer;">
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $karyawan->kar_nama ?></td>
			<td><?php echo $jab_kode->jab_nama ?></td>
			<td><?php echo $karyawan->kar_alamat ?></td>
			<td><?php echo $karyawan->kar_nohp ?></td>
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