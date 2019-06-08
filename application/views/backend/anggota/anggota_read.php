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
        <tr><td>Nomor Anggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $ang_nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $ang_alamat; ?></td></tr>
	    <tr><td>Nomor KTP</td><td><?php echo $ang_noktp; ?></td></tr>
	    <tr><td>Nomor KK</td><td><?php echo $ang_nokk; ?></td></tr>
	    <tr><td>Nomor Handphone</td><td><?php echo $ang_nohp; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $ang_tgllahir; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $ang_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('anggota') ?>" class="btn btn-default">Batal</a></td></tr>
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
            foreach ($simpananwajib_data as $simpananwajib)
            {
                $ses_id = $this->db->get_where('settingsimpanan', array('ses_id' => $simpananwajib->ses_id))->row();
                ?>
                <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $simpananwajib->siw_tglbayar ?></td>
            <td><?php echo $simpananwajib->siw_status ?></td>
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

            </div>
        </div>
    </div>
    </div>
    </body>
</html>