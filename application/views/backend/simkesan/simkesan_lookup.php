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
                    <h2><b>List Simkesan</b></h2>
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
                <form action="<?php echo site_url('simkesan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>simkesan/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Rekening Simkesan</th>
		<th class="text-center">Anggota</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Plan Simkesan</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Tanggal Berakhir</th>
		<th class="text-center">Status</th></tr>
            </thead>
			<tbody><?php
            foreach ($simkesan_data as $simkesan)
            {
                ?>
                <tr onclick="setVal('<?=$idhtml?>','<?=$simkesan->sik_kode?>','<?=$simkesan->sik_kode?>')" style="cursor: pointer;">
        			<td width="80px"><?php echo ++$start ?></td>
        			<td><?php echo $simkesan->sik_kode ?></td>
        			<td><?php echo $simkesan->ang_no ?></td>
        			<td><?php echo $simkesan->kar_kode ?></td>
        			<td><?php echo $simkesan->psk_id ?></td>
        			<td><?php echo $simkesan->wil_kode ?></td>
        			<td><?php echo $simkesan->sik_tglpendaftaran ?></td>
        			<td><?php echo $simkesan->sik_tglberakhir ?></td>
        			<td><?php echo $simkesan->sik_status ?></td>
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