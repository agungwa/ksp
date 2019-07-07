<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Simkesan Read</h2>
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
    <tr><td></td><td><a href="<?php echo site_url('simkesan/read/'.$sik_kode) ?>" class="btn btn-default">Batal</a> </td></tr>
	</table>

    <form action="<?php echo site_url('simkesan/penarikan_action'); ?>" method="post">
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        		<th class="text-center">Rekening Simkesan</th>
        		<th class="text-center">Tanggal Setoran</th>
        		<th class="text-center">Tanggal Bayar</th>
        		<th class="text-center">Jumlah Setor</th>
        		<th class="text-center">Kekurangan Setor</th>
            </tr>
            </thead>
            <tbody><?php 
                $no=1;
                $totalsetor=0;
            foreach ($setoran_data as $setoran)
            {
                $totalsetor+=$setoran->ssk_jmlsetor;
                $kekurangan=($setor_psk_id*60)-$totalsetor;
                ?>
                <tr>
    			<td width="80px"><?php echo $no ?></td>
    			<td><?php echo $setoran->sik_kode ?></td>
    			<td><?php echo $setoran->ssk_tglsetoran ?></td>
    			<td><?php echo $setoran->ssk_jmlsetor ?></td>
    			<td><?php echo $totalsetor ?></td>
    			<td><?php echo $kekurangan ?></td>
		</tr>
                
                
            
                
                <?php
                $no++;
            }
            ?>
            
            <?php if ($this->tgl == $estimasi_pengembangan && $totalsetor == ($setor_psk_id*60)){
                    echo '<button type="submit" class="btn btn-primary">Tarik</button>';
                }
                    else if ($this->tgl >= $estimasi_berakhir && $totalsetor == ($setor_psk_id*60)){
                    echo '<td class = "danger">Tarik Sebelum Pengembangan</td>
                    <button type="submit" class="btn btn-primary">Tarik</button>';
                    }
                    else if ($this->tgl < $estimasi_berakhir && $totalsetor < ($setor_psk_id*60)){
                    echo '<td class = "danger">Belum Bisa Tarik Simkesan </td>
                    <td class = "info">(cek ada tungakan atau belum mencapai akhir pembayaran)</td>';
                    }
                ?>
            </tbody>
        </table>

    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Jenis</th>
		<th class="text-center">Administrasi</th>
		<th class="text-center">Pengembangan</th>
		<th class="text-center">Total Penarikan</th>
            </thead>
			<tbody><?php
            $pengembangan = $setor_psk_id*60*5/$penarikan_data->jps_persenpenarikan;
            $administrasi = $penarikan_data->jps_administrasi * $pengembangan/100;
            $totalpenarikan = $pengembangan - $administrasi;
            $no=1;
                ?>
              <td width="80px"><?php echo $no ?></td>
			<td><?php echo $penarikan_data->jps_jenis ?></td>
			<td><?php echo 'Rp ',number_format($administrasi, 0, ".", ".") ?></td>
			<td><?php echo 'Rp ',number_format($pengembangan, 0, ".", ".") ?></td>
			<td class="success"><?php echo 'Rp ',number_format($totalpenarikan, 0, ".", ".") ?></td>
		</tr>
                
            </tbody>
        
   <div class="form-group col-md-4">
        <input type="hidden" class="form-control" name="sik_kode" id="sik_kode" placeholder="sik_kode" value="<?php echo $sik_kode; ?>" required="required" />
        <input type="hidden" class="form-control" name="jps_id" id="jps_id" placeholder="jps_id" value="<?php echo $penarikan_data->jps_id; ?>"/>
        <input type="hidden" class="form-control" name="pns_jmlsimkesan" id="pns_jmlsimkesan" placeholder="pns_jmlsimkesan" value="<?php echo $pengembangan; ?>"/>
        <input type="hidden" class="form-control" name="pns_jmlpenarikan" id="pns_jmlpenarikan" placeholder="pns_jmlpenarikan" value="<?php echo $totalpenarikan; ?>"/>
    </div>
            </tbody>
            </div>
	</div>
    
    <div class="form-group col-md-12">
   
   </td>
   </tr>
    </div>
            
            </table>
            </form>
        </div>
    </div>
    </div>
    </body>
</html>