<div class="row">
<div class="col-lg-12">
    <div class="ibox">
        <div class="ibox-title">
            <h2><b>Penagihan Kolektor</b></h2>
        </div>

        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('penagihan/penagihanakhir/'); ?>" class="form-inline" method="get">
            
            <div class="col-md-8">
                <div class="form-group">
                    <label for="float">Tanggal : </label>
                    <input type="date" class="form-control" name="t" id="t" value="<?php echo $t?>" />
                </div>
                <div class="form-group">
                    <label for="float"> s/d </label>
                    <input type="date" class="form-control" name="y" id="y" value="<?php echo $y?>" />
                </div>
                <div class="form-group">
                </select>
                <select class="form-control col-md-3" name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                </div>
            </div>
            <div class="col-md-4 text-left">
                    <div class="input-group">
                        
                        <span class="input-group-btn">
                            <a href="<?php echo base_url()?>PrintPinjaman/printpenagihankolektor?t=<?=$t?>&y=<?=$y?>&w=<?=$w?>" class="btn btn-default">Print</a>
                        </span>
                        <span class="input-group-btn">
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
        <th class="text-center">Rekening Pinjaman</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Angsuranke</th>
		<th class="text-center">Jatuh Tempo</th>
		<th class="text-center">Tanggal Bayar</th>
		<th class="text-center">Jumlah Pokok</th>
		<th class="text-center">Jumlah Bunga</th>
		<th class="text-center">Status</th>
            </tr>
            </thead>
			<tbody><?php
            $no=1;
            $total = 0 ;
            foreach ($dataangsuran as $key=>$item)
            { 
                $totalbayar = $item['ags_jmlpokok'] + $item['ags_jmlbunga'];
                $total += $totalbayar;
                ?>
                <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $item['pin_id'] ?></td>
			<td><?php echo $item['wil_kode'] ?></td>
			<td><?php echo $item['ang_angsuranke'] ?></td>
			<td><?php echo $item['ags_tgljatuhtempo'] ?></td>
			<td><?php echo $item['ags_tglbayar'] ?></td>
			<td><?php echo rupiah($item['ags_jmlpokok']) ?></td>
			<td><?php echo rupiah($item['ags_jmlbunga']) ?></td>
            <td><?php echo $item['ags_status'] ?></td>
            
		</tr>
                
                <?php
                $no++;
            }
            ?>
            </tbody>
            
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tr class="danger"><td width="600px">Total Angsuran</td><td style="text-align:center" width="200px"><?php echo rupiah($total) ?></td></tr>
        </table>
            
	    <div class="row" style="margin-top: 10px">
	    </div>
        </div>
        </div>
    </div>
</div>
</div>