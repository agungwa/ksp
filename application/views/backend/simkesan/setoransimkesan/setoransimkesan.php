<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Setor Simkesan</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Simkesan</td><td><?php echo $sik_kode; ?></td></tr>
	    <tr><td>Id Anggota</td><td><?php echo $ang_no," | ",$nm_ang_no; ?></td></tr>
	    <tr><td>Plan Simkesan</td><td><?php echo $psk_id; ?></td></tr>
	    <tr><td>Wilayah</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Tanggal Pendaftaran</td><td><?php echo $sik_tglpendaftaran," | Estimasi Berakhir : ",$estimasi_berakhir," | Estimasi Pengembangan : ",$estimasi_pengembangan; ?></td></tr>
	    <tr><td>Setoran Perbulan</td><td><?php echo 'Rp ',number_format($setor_psk_id, 0, ".", "."); ?></td></tr>
	    <tr><td>Estimasi Pokok</td><td><?php echo 'Rp ',number_format($setor_psk_id*60, 0, ".", ".")," | Potensi Pengembangan : Rp ",number_format($setor_psk_id*60*5/3, 0, ".", "."); ?></td></tr>
	    <tr><td>Tanggal Berakhir</td><td><?php echo $sik_tglberakhir; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $this->statusSimkesan[$sik_status]; ?></td></tr>
    <tr><td></td><td><a href="<?php echo site_url('simkesan/read/'.$sik_kode) ?>" class="btn btn-default hBack">Kembali</a> </td></tr>
	</table>

    <form action="<?php echo site_url('simkesan/setoransimkesan_action'); ?>" method="post">
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        		<th class="text-center">Tanggal Setoran</th>
        		<th class="text-center">Jumlah Setor</th>
        		<th class="text-center">Total Setor</th>
        		<th class="text-center">Kekurangan Setoran</th>
                <?php if(is_allow('M_EDIT')): ?>
        		<th class="text-center">Action</th>
                <?php endif; ?>
            </tr>
            </thead>
			<tbody><?php
            $no=1;
            $totalsetor=0;
            $kekurangan=0;
            foreach ($setoran_data as $setoran)
            {
                $totalsetor+=$setoran->ssk_jmlsetor;
                $kekurangan = ($setor_psk_id*60)-$totalsetor;
                ?>
                <tr>
    			<td width="80px"><?php echo $no ?></td>
    			<td><?php echo dateFormataja($setoran->ssk_tglsetoran) ?></td>
    			<td><?php echo neraca($setoran->ssk_jmlsetor) ?></td>
    			<td><?php echo neraca($totalsetor) ?></td>
    			<td><?php echo neraca($kekurangan) ?></td>
                <?php if(is_allow('M_EDIT')): ?>
                <td style="text-align:center" width="200px">
                    <div class="dropdown">
                        <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">
                            Pilih 
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo site_url('setoransimkesan/update/'.$setoran->ssk_id); ?>">Update</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('setoransimkesan/delete/'.$setoran->ssk_id); ?>">Delete</a></li>
                        </ul>
                    </div>
                </td>
                <?php endif; ?>
		    </tr>
                <?php
                $no++;
            }
            ?>
            <div class='col-md-4'>
            <select name="ssk_jmlsetor" id="searchTxt" class="form-control"> 
            <option value="<?= $setor_psk_id ?>"><?= $setor_psk_id ?></option> 
                <?php
                    $ang=($kekurangan/$setor_psk_id)+1;
                    for ($num=1; $num<$ang; $num++){ echo '
                    <option value="' .+$num*$setor_psk_id. '">' .$num*$setor_psk_id. '</option>'; }
                    echo $ang;
                ?> 
            </select>
            <input type="date" class="form-control" name="ssk_tglsetoran" id="todays-date" placeholder="ssk_tglsetoran" value="" required />
            <?php if($kekurangan == $setor_psk_id) { 
            echo '<td class = "danger">Setoran Terakhir</td><input type="hidden" class="form-control" name="sik_status" id="sik_status" placeholder="sik_status" value="4" required="required" readonly />';
            } else {
                echo'<input type="hidden" class="form-control" name="sik_status" id="sik_status" placeholder="sik_status" value="0" required="required" readonly />';
            }?>
            <input type="hidden" class="form-control" name="sik_kode" id="sik_kode" placeholder="sik_kode" value="<?php echo $sik_kode ?>" required="required" readonly />
            
           <!-- <?php
         if ($totalsetor < $setor_psk_id*60){
            echo '<button type="submit" class="btn btn-primary" onclick="return confirm(\'Click OK jika benar menyetor sejumlah Rp \' + rubah(searchTxt.value))">SETOR</button>';
            }
            else if ($totalsetor == $setor_psk_id*60){
            echo '<td class = "danger">Setoran Sudah Selesai</td>';
            }
            ?> -->
            <button type="submit" class="btn btn-primary" onclick="return confirm('Click OK jika benar menyetor sejumlah Rp ' + rubah(searchTxt.value))">SETOR</button>
        </div>
            </tbody>
            </form>

    <!-- titipan simkesan -->
    <!-- <form action="<?php echo site_url('simkesan/titipsimkesan_action'); ?>" method="post">
        </table>
    
            <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Tanggal Titip</th>
		<th class="text-center">Jumlah Titip</th>
		<th class="text-center">Jumlah Ambil</th>
		<th class="text-center">Sisa Titip</th>
            </tr>
            </thead>
			<tbody><?php
            
            $no=1;
            $sisa=0;
            $totaltitip=0;
            $totalambil=0;
            foreach ($titipan_data as $titipansimkesan)
            {
                $totaltitip+=$titipansimkesan->tts_jmltitip;
                $totalambil+=$titipansimkesan->tts_jmlambil;
                $sisa=$totaltitip-$totalambil;
                $ang=($kekurangan-$sisa)/$setor_psk_id;
                $amb=$sisa/$setor_psk_id;
                
                ?>
                <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $titipansimkesan->tts_tgltitip ?></td>
			<td><?php echo $totaltitip ?></td>
			<td><?php echo $totalambil ?></td>
			<td><?php echo $sisa ?></td>
		</tr>
                <?php
                $no++;
            }
            ?>
            </tbody>
            <div>
            <label> Titip </label>
            <select name="tts_jmltitip"> 
            <option value="<?= $setor_psk_id ?>"><?= $setor_psk_id ?></option> 
            <?php
        for ($num=1; $num<$ang; $num++){ echo '
                <option value="' .+$num*$setor_psk_id. '">' .$num*$setor_psk_id. '</option>'; }?> </select>
            <input type="text" class="form-control" name="sik_kode" id="sik_kode" placeholder="sik_kode" value="<?php echo $sik_kode ?>" required="required" readonly />           
            </div>
            <?php
            if ($kekurangan  > 0){
            echo '<button type="submit" class="btn btn-primary">Titip</button>';
            }
            ?>
        <div>
        </form>
    <form action="<?php echo site_url('simkesan/ambiltitipsimkesan_action'); ?>" method="post">
    <label> Ambil </label>
            <select name="tts_jmlambil"> 
            <option value="0">0</option> 
            <?php for ($num=1; $num<=$amb; $num++){ echo '
                <option value="' .+$num*$setor_psk_id. '">' .$num*$setor_psk_id. '</option>'; }?> </select>
            <input type="text" class="form-control" name="sik_kode" id="sik_kode" placeholder="sik_kode" value="<?php echo $sik_kode ?>" required="required" readonly />           
            </div>
            <?php
            if ($kekurangan  > 0){
            echo '<button type="submit" class="btn btn-primary">Ambil Titipan</button>';
            }
            ?>
            
            </form>
        </table> -->
        </div>
        
    </div>
    </div>
    </div>
    </body>
</html>