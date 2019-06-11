<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Rincian Simpanan Wajib</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Anggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama_ang_no; ?></td></tr>
	    <tr><td>Tanggal Bayar</td><td><?php echo $siw_tglbayar; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $siw_status; ?></td></tr>
	    <tr><td>Tanggal Ambil</td><td><?php echo $siw_tglambil; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('anggota/read/'.$ang_no) ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
<!--tabel setoran simpanan wajib-->

<form action="<?php echo site_url('simpananwajib/tariksimpananwajib_action'); ?>" method="post">
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Tanggal Setor</th>
		<th class="text-center">Jumlah Setor</th>
		<th class="text-center">Total Setor</th>
		<th class="text-center">Kekurangan Setor</th>
            </tr>
            </thead>
			<tbody><?php
            $no=1;
            $total=0;
            foreach ($setoransimpananwajib_data as $setoransimpananwajib)
            {
                $total += $setoransimpananwajib->ssw_jmlsetor;
                $kurang = 200000-$total;
                ?>
                <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $setoransimpananwajib->ssw_tglsetor ?></td>
			<td><?php echo $setoransimpananwajib->ssw_jmlsetor ?></td>
			<td><?php echo $total ?></td>
			<td><?php echo $kurang ?></td>
		</tr>
        <?php
        $no++;
            }
            ?>
    <div class="form-group col-md-4">
    <label for="varchar">Total Tarik</label>
        <input type="number" class="form-control" name="psw_jumlah" id="psw_jumlah" placeholder="Jumlah" value="<?php echo $total; ?>" readonly required="required" />
        <input type="hidden" class="form-control" name="siw_id" id="siw_id" placeholder="siw_id" value="<?php echo $siw_id; ?>"/>
    </div>
    <div class="form-group col-md-12">
	    <button type="submit" class="btn btn-primary">Tarik Simpanan</button> 
	    <a href="<?php echo site_url('anggota/read/'.$ang_no) ?>" class="btn btn-default">Batal</a>
    </div>
</form>
            </tbody>
        </table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>