<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Anggota Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
        <tr><td class="active">Nomor Anggota</td><td><?php echo $ang_no; ?></td><td class="active">Nama</td><td><?php echo $ang_nama; ?></td></tr>
	    <tr><td class="active">Alamat</td><td><?php echo $ang_alamat; ?></td><td class="active">Nomor KTP</td><td><?php echo $ang_noktp; ?></td></tr>
	    <tr><td class="active">Nomor KK</td><td><?php echo $ang_nokk; ?></td><td class="active">Nomor Handphone</td><td><?php echo $ang_nohp; ?></td></tr>
	    <tr><td class="active">Tanggal Lahir</td><td><?php echo $ang_tgllahir; ?></td><td class="active">Status</td><td><?php echo $ang_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('anggota/?p=2') ?>" class="btn btn-default">Batal</a></td></tr>
    </table>

<!-- list rekening anggota -->
<h5>LIST REKENING ANGGOTA</h5>
<table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Rekening simpanan</th>
		<th class="text-center">Jenis Simpanan</th>
		<th class="text-center">Jatuh Tempo</th>
		<th class="text-center">Total Setoran </th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Status</th>
            </tr>
            </thead>
            <tbody><?php
            $no=1;
            foreach ($simpanan_data as $simpanan)
            {    
                $totalsetoran = $this->Setoransimpanan_model->get_totalsetoran($simpanan->sim_kode);
                $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $simpanan->jsi_id))->row();
                $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $simpanan->jse_id))->row();
                $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $simpanan->bus_id))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $simpanan->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $simpanan->kar_kode))->row();
                $tanggalDuedate = date("Y-m-d", strtotime($simpanan->sim_tglpendaftaran.' + '.$jsi_id->jsi_simpanan.' Months'));
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $simpanan->wil_kode))->row();
                ?>
                <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $simpanan->sim_kode ?></td>
			<td><?php echo $jsi_id->jsi_simpanan,' bulan' ?></td>
			<td><?php echo dateFormataja($tanggalDuedate)?></td>
			<td><?php echo rupiahsimpanan($totalsetoran[0]->ssi_jmlsetor) ?></td>
			<td><?php echo $wil_kode->wil_nama ?></td>
			<td><?php echo dateFormataja($simpanan->sim_tglpendaftaran) ?></td>
            <td><?php echo $this->statusSimpanan[$simpanan->sim_status] ?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>

        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        		<th class="text-center">Rekening Pinjaman</th>
        		<th class="text-center">Wilayah</th>
        		<th class="text-center">Pengajuan</th>
        		<th class="text-center">Pinjaman</th>
        		<th class="text-center">Tanggal Pengajuan</th>
        		<th class="text-center">Tanggal Pencairan</th>
        		<th class="text-center">Marketing</th>
        		<th class="text-center">Surveyor</th>
        		<th class="text-center">Status Pinjaman</th></tr>
            </thead>
			<tbody><?php
            
            $no=1;
            foreach ($pinjaman_data as $pinjaman)
            {
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $pinjaman->wil_kode))->row();
                $marketing = $this->db->get_where('karyawan', array('kar_kode' => $pinjaman->pin_marketing))->row();
                $surveyor = $this->db->get_where('karyawan', array('kar_kode' => $pinjaman->pin_surveyor))->row();

                ?>
                	<td width="80px"><?php echo $no?></td>
			<td><?php echo $pinjaman->pin_id ?></td>
			<td><?php echo $wil_kode->wil_nama ?></td>
			<td><?php echo $pinjaman->pin_pengajuan ?></td>
			<td><?php echo $pinjaman->pin_pinjaman ?></td>
			<td><?php echo dateFormataja($pinjaman->pin_tglpengajuan) ?></td>
			<td><?php echo dateFormataja($pinjaman->pin_tglpencairan) ?></td>
			<td><?php echo $marketing->kar_nama ?></td>
			<td><?php echo $surveyor->kar_nama ?></td>
			<td><?php echo $this->statusPinjaman[$pinjaman->pin_statuspinjaman] ?></td>
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
                <th width="80px">No</th>
        <th class="text-center">Rekening Investasi</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Jangka Waktu</th>
		<th class="text-center">Bunga</th>
		<th class="text-center">Investasi</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Status</th>
            </thead>
			<tbody><?php
            $no=1;
            foreach ($investasi_data as $investasiberjangka)
            {
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $investasiberjangka->kar_kode))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $investasiberjangka->wil_kode))->row();
                $jwi_id = $this->db->get_where('jangkawaktuinvestasi', array('jwi_id' => $investasiberjangka->jwi_id))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $investasiberjangka->wil_kode))->row();
                $biv_id = $this->db->get_where('bungainvestasi', array('biv_id' => $investasiberjangka->biv_id))->row();

                ?>
                <tr><td width="80px"><?php echo $no ?></td>
            <td><?php echo $investasiberjangka->ivb_kode ?></td>
			<td><?php echo $kar_kode->kar_nama ?></td>
			<td><?php echo $wil_kode->wil_nama ?></td>
			<td><?php echo $jwi_id->jwi_jangkawaktu,' bulan' ?></td>
			<td><?php echo $biv_id->biv_bunga,' %' ?></td>
			<td><?php echo rupiah($investasiberjangka->ivb_jumlah) ?></td>
			<td><?php echo dateFormataja($investasiberjangka->ivb_tglpendaftaran) ?></td>
			<td><?php echo $this->statusInvestasi[$investasiberjangka->ivb_status] ?></td>
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
                <th width="80px">No</th>
        <th class="text-center">Rekening Simkesan</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Plan Simkesan</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Status</th></tr>
            </thead>
			<tbody><?php
            $no = 1;
            foreach ($simkesan_data as $simkesan)
            {
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $simkesan->kar_kode))->row();
                $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $simkesan->psk_id))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $simkesan->wil_kode))->row();
                ?>
                <td width="80px"><?php echo $no ?></td>
        			<td><?php echo $simkesan->sik_kode ?></td>
        			<td><?php echo $kar_kode->kar_nama ?></td>
        			<td><?php echo $psk_id->psk_plan ?></td>
        			<td><?php echo $wil_kode->wil_nama ?></td>
        			<td><?php echo dateFormataja($simkesan->sik_tglpendaftaran) ?></td>
        			<td><?php echo $this->statusSimkesan[$simkesan->sik_status] ?></td>
        		</tr>
                
                <?php
                $no++;
            }
            ?>
            </tbody>
        </table>
 <!-- tabel simpanan wajib -->
 <h5>SIMPANAN WAJIB</h5>
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Tanggal Bayar</th>
		<th class="text-center">Status</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody><?php
            $no=1;
            $siw_status = $this->statusSimpananwajib;
            foreach ($simpananwajib_data as $simpananwajib)
            {
                $ses_id = $this->db->get_where('settingsimpanan', array('ses_id' => $simpananwajib->ses_id))->row();
                ?>
                <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $simpananwajib->siw_tglbayar ?></td>
            <td><?php echo $siw_status[$simpananwajib->siw_status] ?></td>
            <td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('simpananwajib/read/'.$simpananwajib->siw_id),'Detail','class="text-navy"');?>
			</td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
    <!-- tabel simpanan pokok -->
    <h5>SIMPANAN POKOK</h5>
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Anggota</th>
		<th class="text-center">Setting Simpanan</th>
		<th class="text-center">Tanggal Bayar</th>
            </tr>
            </thead>
            <tbody><?php
             $no = 1;
            foreach ($simpananpokok_data as $simpananpokok)
            {
                $ses_id = $this->db->get_where('settingsimpanan', array('ses_id' => $simpananpokok->ses_id))->row();
                ?>
                <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $simpananpokok->ang_no ?></td>
			<td><?php echo $ses_id ->ses_nama ?></td>
			<td><?php echo $simpananpokok->sip_tglbayar ?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>

            </div>
        </div>
    </div>
    </div>
    </body>
</html>