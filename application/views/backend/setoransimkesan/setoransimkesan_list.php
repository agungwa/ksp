<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-8">
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('setoransimkesan'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="hidden" name="p" value="3">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('setoransimkesan'); ?>" class="btn btn-default">Reset</a>
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
        		<th class="text-center">Tanggal Setoran</th>
        		<th class="text-center">Tanggal Bayar</th>
        		<th class="text-center">Jumlah Setor</th>
        		<th class="text-center">Status</th>
        		<th class="text-center">Tanggal</th>
        		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($setoransimkesan_data as $setoransimkesan)
            {
                ?>
                <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $setoransimkesan->sik_kode ?></td>
    			<td><?php echo $setoransimkesan->ssk_tglsetoran ?></td>
    			<td><?php echo $setoransimkesan->ssk_tglbayar ?></td>
    			<td><?php echo $setoransimkesan->ssk_jmlsetor ?></td>
    			<td><?php echo $setoransimkesan->ssk_status ?></td>
    			<td><?php echo dateFormat($setoransimkesan->ssk_tgl) ?></td>
    			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('setoransimkesan/read/'.$setoransimkesan->ssk_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('setoransimkesan/update/'.$setoransimkesan->ssk_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('setoransimkesan/delete/'.$setoransimkesan->ssk_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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