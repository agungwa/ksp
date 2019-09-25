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
                    <h2><b>List Pelunasan</b></h2>
                </div>
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-8">
            </div>
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pelunasan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pelunasan'); ?>" class="btn btn-default">Reset</a>
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
		<th class="text-center">Rekening Pinjaman</th>
		<th class="text-center">Jenis Pelunasan</th>
		<th class="text-center">Total Kekurangan Pokok</th>
		<th class="text-center">Total Bunga Pokok</th>
		<th class="text-center">Bunga Tambahan</th>
		<th class="text-center">Total Denda</th>
		<th class="text-center">Biaya Penarikan</th>
		<th class="text-center">Tanggal Pelunasan</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($pelunasan_data as $pelunasan)
            {
                $pel_jenis = $this->db->get_where('jenispelunasan', array('jep_id' => $pelunasan->pel_jenis))->row();

                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pelunasan->pin_id ?></td>
			<td><?php echo $pel_jenis->jep_jenis ?></td>
			<td><?php echo rupiah($pelunasan->pel_totalkekuranganpokok) ?></td>
			<td><?php echo rupiah($pelunasan->pel_totalbungapokok) ?></td>
			<td><?php echo rupiah($pelunasan->pel_bungatambahan) ?></td>
			<td><?php echo rupiah($pelunasan->pel_totaldenda) ?></td>
			<td><?php echo rupiah($pelunasan->pel_biayapenarikan) ?></td>
			<td><?php echo $pelunasan->pel_tglpelunasan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pelunasan/read/'.$pelunasan->pel_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('pelunasan/update/'.$pelunasan->pel_id),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('pelunasan/delete/'.$pelunasan->pel_id),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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