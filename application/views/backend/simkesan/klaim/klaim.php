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


    <form action="<?php echo site_url('simkesan/klaim_action'); ?>" method="post">
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
            
           
            </tbody>
        </table>

    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
            <th class="text-center">No</th>
                <th class="text-center">Tunggakan Simkesan</th>
        		<th class="text-center">Keuntungan</th>
        		<th class="text-center">Plan Simkesan</th>
        		<th class="text-center">Tahunke</th>
        		<th class="text-center">Nominal</th>
        		<th class="text-center">Administrasi</th>
        		<th class="text-center">Total Diterima</th>
            </tr>
            </thead>
			<tbody><?php
            
            $no=1;
            
            
        //var_dump($klaim_data);
            foreach ($klaim_data as $klaim)
            {
            $tahunklaim=$klaim->jkl_tahunke-1;
            $bulanklaim=($klaim->jkl_tahunke*12)-11;
            $totalsetorseharusnya=$bulanklaim*$setor_psk_id;
            $tunggakan=$totalsetorseharusnya-$totalsetor;
            $tanggalklaim = date("Y-m-d", strtotime($sik_tglpendaftaran.' + '.$tahunklaim.' Years'));            
            $administrasi = $klaim->jkl_nominal*$klaim->jkl_administrasi/100;
            $jumlahditerima = $klaim->jkl_nominal - $administrasi;
            $jkl_plan = $this->db->get_where('plansimkesan', array('psk_id' => $klaim->jkl_plan))->row();
                ?>
                <tr>
                <td width="80px"><?php echo $no ?></td>
			<td><?php echo $tunggakan ?></td>
			<td><?php echo $klaim->jkl_keuntungan ?></td>
			<td><?php echo $jkl_plan->psk_plan?></td>
			<td><?php echo $klaim->jkl_tahunke ?></td>
			<td><?php echo "Rp ",$klaim->jkl_nominal ?></td>
			<td><?php echo "Rp ",$administrasi ?></td>
			<td><?php echo "Rp ",$jumlahditerima?></td>
		</tr>
                
                <?php
                $no++;
            }
            ?>
             <?php if ($this->tgl == $tanggalklaim && $totalsetor >= $totalsetorseharusnya){
                    echo '<button type="submit" class="btn btn-primary">Tarik</button>';
                }
                    else if ($klaim->jkl_tahunke == 0){
                    echo '<button type="submit" class="btn btn-primary">Tarik</button>';
                    }     
                    else if ($this->tgl < $tanggalklaim && $totalsetor < $totalsetorseharusnya){
                    echo '<td class = "danger">Belum Bisa Tarik Simkesan </td>
                    <td class = "danger">Tangggal Klaim '.$tanggalklaim.' </td>
                    <td class = "info">(cek ada tungakan atau belum mencapai akhir pembayaran)</td>';
                    }
                ?>
            <div class="form-group col-md-4">
            <input type="hidden" class="form-control" name="sik_kode" id="sik_kode" placeholder="sik_kode" value="<?php echo $sik_kode; ?>" required="required" />
            <input type="hidden" class="form-control" name="jkl_id" id="jkl_id" placeholder="jkl_id" value=""/>
            <input type="hidden" class="form-control" name="ksi_jmlklaim" id="ksi_jmlklaim" placeholder="ksi_jmlklaim" value="<?php echo $klaim->jkl_nominal; ?>"/>
            <label> Total Klaim</label>
            <input type="number" class="form-control" name="ksi_jmlditerima" id="ksi_jmlditerima" placeholder="ksi_jmlditerima" value="<?php echo $jumlahditerima; ?>" readonly/>
           
            <label> Jumlah Tunggakan (jika ada)</label>
            <input type="number" class="form-control" name="ksi_jmltunggakan" id="ksi_jmltunggakan" placeholder="Optional" value="<?= $tunggakan?>" readonly/>
        
            </div>
            </tbody>
        </table>
        </form>
        </div>
    </div>
    </div>
    </body>
</html>