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
	    <tr><td>Tanggal Pendaftaran</td><td><?php echo dateFormataja($sik_tglpendaftaran)," | Berakhir Setoran : ",dateFormataja($estimasi_berakhir)," | Pengembangan : ",dateFormataja($estimasi_pengembangan); ?></td></tr>
	    <tr><td>Setoran Perbulan</td><td><?php echo neraca($setor_psk_id); ?></td></tr>
	    <tr><td>Estimasi Pokok</td><td><?php echo neraca($setor_psk_id*60)," | Potensi Pengembangan : ",neraca($setor_psk_id*60*5/3); ?></td></tr>
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
    			<td><?php echo dateFormataja($setoran->ssk_tglsetoran) ?></td>
    			<td><?php echo neraca($setoran->ssk_jmlsetor) ?></td>
    			<td><?php echo neraca($totalsetor) ?></td>
    			<td><?php echo neraca($kekurangan) ?></td>
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
        		<th class="text-center">Tunggakan</th>
        		<th class="text-center">Total Diterima</th>
            </tr>
            </thead>
			<tbody><?php
            $no=1;
            foreach ($klaim_data as $klaim)
            {

                $date11 = new DateTime($sik_tglpendaftaran);
                $date21 = new DateTime();
                
                $diff1 = $date11->diff($date21);
                $selisih1 = (($diff1->format('%y') * 12) + $diff1->format('%m'))+1;
                $selisihjt1 = (($diff1->format('%y') * 12) + $diff1->format('%m'));
                $harusbayar = $selisih1 * $setor_psk_id;

                $tahunklaim=$klaim->jkl_tahunke-1;
                $bulanklaim=($klaim->jkl_tahunke*12)-11;
                $totalsetorseharusnya=$bulanklaim*$setor_psk_id;
                if ($selisih1 < $bulanklaim) {
                $tunggakan=$totalsetorseharusnya-$totalsetor;
                } else if ($selisih1 > $bulanklaim) {
                $tunggakan = $harusbayar - $totalsetor;
                }

                $tanggalklaim = date("Y-m-d", strtotime($sik_tglpendaftaran.' + '.$tahunklaim.' Years'));            
                $administrasi = $klaim->jkl_nominal*$klaim->jkl_administrasi/100;
                $jumlahditerima = $klaim->jkl_nominal - $administrasi - $tunggakan;
                $jkl_plan = $this->db->get_where('plansimkesan', array('psk_id' => $klaim->jkl_plan))->row();
            
            ?>
                <tr>
                <td width="80px"><?php echo $no ?></td>
			<td><?php echo $tunggakan ?></td>
			<td><?php echo $klaim->jkl_keuntungan ?></td>
			<td><?php echo $jkl_plan->psk_plan?></td>
			<td><?php echo $klaim->jkl_tahunke ?></td>
			<td><?php echo neraca($klaim->jkl_nominal) ?></td>
			<td><?php echo neraca($administrasi) ?></td>
			<td><?php echo neraca($tunggakan) ?></td>
			<td><?php echo neraca($jumlahditerima)?></td>
		</tr>
                
                <?php
                $no++;
            }
            ?>
             <?php if ($this->tgl >= $tanggalklaim){
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
            <input type="hidden" class="form-control" name="ksi_administrasi" id="ksi_administrasi" placeholder="ksi_administrasi" value="<?php echo $administrasi; ?>"/>
            <input type="hidden" class="form-control" name="ksi_totalsetor" id="ksi_totalsetor" placeholder="ksi_totalsetor" value="<?php echo $totalsetor; ?>"/>
            <input type="hidden" class="form-control" name="ksi_status" id="ksi_status" placeholder="ksi_status" value="<?php echo $k-1; ?>"/>
            <label> Total Klaim</label>
            <input type="number" class="form-control" name="ksi_jmlditerima" id="ksi_jmlditerima" placeholder="ksi_jmlditerima" value="<?php echo $jumlahditerima; ?>" readonly/>
            <label> Jumlah Tunggakan (jika ada)</label>
            <input type="number" class="form-control" name="ksi_jmltunggakan" id="ksi_jmltunggakan" placeholder="Optional" value="<?= $tunggakan?>" readonly/>
            <?php if(is_allow('M_EDIT')): ?>
            <label> Tanggal Klaim</label>
            <input type="date" class="form-control" name="ksi_tglklaim" id="todays-date" placeholder="tanggal" value="<?= $tunggakan?>"/>
            <?php endif ?>
            </div>
            </tbody>
        </table>
        </form>
        </div>
    </div>
    </div>
    </body>
</html>