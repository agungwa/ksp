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
                    <h2><b>List Mutasi Simkesan</b></h2>
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
                <?php echo anchor(site_url('mutasisimkesan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('mutasisimkesan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('mutasisimkesan'); ?>" class="btn btn-default">Reset</a>
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
		<th class="text-center">Rekening Simkesan</th>
		<th class="text-center">Asal</th>
		<th class="text-center">Tujuan</th>
		<th class="text-center">Tanggal</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($mutasisimkesan_data as $mutasisimkesan)
            {
                
                $wil_asal = $this->db->get_where('wilayah', array('wil_kode' => $mutasisimkesan->msk_asal))->row();
                $wil_tujuan = $this->db->get_where('wilayah', array('wil_kode' => $mutasisimkesan->msk_asal))->row();
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $mutasisimkesan->sik_kode ?></td>
			<td><?php echo $mutasisimkesan->msk_asal ?></td>
			<td><?php echo $mutasisimkesan->msk_tujuan ?></td>
			<td><?php echo dateFormat($mutasisimkesan->msk_tgl) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('mutasisimkesan/read/'.$mutasisimkesan->msk_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('mutasisimkesan/update/'.$mutasisimkesan->msk_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('mutasisimkesan/delete/'.$mutasisimkesan->msk_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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