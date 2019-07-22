<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simkesandata/simkesanmasaberakhir/" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <div class="col-md-3"><h4>Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="t" required="required" value="<?= $t;?>">
                </div>
                <select class="form-control col-md-3" name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="p">
                    <option value="all">Semua Plan</option>
                    <?php
                        foreach ($plansimkesan_data as $value) { ?>
                            <option value="<?= $value->psk_id?>"><?= $value->psk_plan?></option>
                    <?php        
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-4 text-right">
                    <div class="input-group">
                    
                        <span class="input-group-btn">
                            <?php 
                                if ($p <> '' && $w <> '' && $t <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>simkesandata/?p=2" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Rekening Simkesan</th>
		<th class="text-center">ID Angggota</th>
		<th class="text-center">Nama</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Plan Simkesan</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Tanggal Berakhir</th>
		<th class="text-center">Status</th>
		<th class="text-center">Tanggal</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($datasimkesan as $key=>$item)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $item['sik_kode'] ?></td>
			<td><?php echo $item['ang_no'] ?></td>
			<td><?php echo $item['nm_ang_no'] ?></td>
			<td><?php echo $item['kar_kode']?></td>
			<td><?php echo $item['psk_id'] ?></td>
			<td><?php echo $item['wil_kode'] ?></td>
			<td><?php echo date('d/m/Y', strtotime($item['sik_tglpendaftaran'])) ?></td>
			<td><?php echo $item['sik_tglberakhir'] ?></td>
			<td><?php echo $item['sik_status'] ?></td>
			<td><?php echo dateFormat($item['sik_tgl']) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('simkesan/read/'.$item['sik_kode']),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('simkesan/update/'.$item['sik_kode']),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('simkesan/delete/'.$item['sik_kode']),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
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
    </body>
</html>