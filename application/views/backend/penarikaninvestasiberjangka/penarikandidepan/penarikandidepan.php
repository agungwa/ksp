<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>penarikaninvestasiberjangka/penarikandidepan" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="3">
                <div class="col-md-2"></div>
            </div>
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('penarikaninvestasiberjangka/penarikandidepan'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('penarikaninvestasiberjangka/penarikandidepan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="data table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Rekening Investasi</th>
		<th class="text-center">Anggota</th>
		<th class="text-center">Nama Anggota</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Jangka Waktu</th>
		<th class="text-center">Jasa</th>
		<th class="text-center">Bunga</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Tanggal Jatuh Tempo</th>
		<th class="text-center">Status</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($investasiberjangka_data as $investasiberjangka)
            {
                $ivb_status = $this->statusInvestasi;                
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $investasiberjangka->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $investasiberjangka->kar_kode))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $investasiberjangka->wil_kode))->row();
                $jwi_id = $this->db->get_where('jangkawaktuinvestasi', array('jwi_id' => $investasiberjangka->jwi_id))->row();
                $jiv_id = $this->db->get_where('jasainvestasi', array('jiv_id' => $investasiberjangka->jiv_id))->row();
                $biv_id = $this->db->get_where('bungainvestasi', array('biv_id' => $investasiberjangka->biv_id))->row();
                $tanggalDuedate = date("Y-m-d", strtotime($investasiberjangka->ivb_tglpendaftaran.' + '.$jwi_id->jwi_jangkawaktu.' Months'));
                $jumlahtarik = $this->Penarikaninvestasiberjangka_model->get_totalpenarikan($investasiberjangka->ivb_kode);
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $investasiberjangka->ivb_kode ?></td>
            <td><?php echo $investasiberjangka->ang_no ?></td>
			<td><?php echo $ang_no->ang_nama ?></td>
			<td><?php echo $kar_kode->kar_nama ?></td>
			<td><?php echo $wil_kode->wil_nama ?></td>
			<td><?php echo $jwi_id->jwi_jangkawaktu , " Bulan" ?></td>
			<td><?php echo $jiv_id->jiv_jasa ?></td>
			<td><?php echo $biv_id->biv_bunga ," %" ?></td>
			<td><?php echo $investasiberjangka->ivb_tglpendaftaran ?></td>
			<td><?php echo $tanggalDuedate ?></td>
			<td><?php echo $ivb_status[$investasiberjangka->ivb_status] ?></td>
			<td style="text-align:center" width="200px">
                <?php 
               if ($jumlahtarik[0]->pib_jmlditerima > 0){
                    echo "silakan tutup rekening";
                } else {
                    echo anchor(site_url('penarikaninvestasiberjangka/tarikpenarikandibelakang?q='.$investasiberjangka->ivb_kode),'tarik','class="text-navy"'); 
                }
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