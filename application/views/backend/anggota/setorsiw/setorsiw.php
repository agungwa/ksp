  <div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('anggota/setorsiw'); ?>" class="form-inline" method="get">

            <div class="col-md-4 text-left">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No Anggota">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('anggota/?p=4'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>

	  <div class="row" style="margin-top: 10px">
	        	<?php 
	        	if ($setorsiw != null) {
	        	?>
                </div>
        <div class="ibox-content">
        <table class="table">
        <tr><td>Nomor Anggota</td><td><?php echo $setorsiw['ang_no']; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $setorsiw['ang_nama']; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $setorsiw['ang_alamat']; ?></td></tr>
	    <tr><td>Nomor KTP</td><td><?php echo $setorsiw['ang_noktp']; ?></td></tr>
	    <tr><td>Nomor KK</td><td><?php echo $setorsiw['ang_nokk']; ?></td></tr>
	    <tr><td>Nomor Handphone</td><td><?php echo $setorsiw['ang_nohp']; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $setorsiw['ang_tgllahir']; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $setorsiw['ang_status']; ?></td></tr>
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
		<th class="text-center">Total Simpanan Pokok</th>
            </tr>
            </thead>
            <tbody><?php
             $no = 1;
            foreach ($setorsiw['simpananpokok_data'] as $simpananpokok)
            {   
                $sip = 10000;
                $ses_id = $this->db->get_where('settingsimpanan', array('ses_id' => $simpananpokok->ses_id))->row();
                ?>
                <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $simpananpokok->ang_no ?></td>
			<td><?php echo $ses_id ->ses_nama ?></td>
			<td><?php echo $simpananpokok->sip_tglbayar ?></td>
			<td><?php echo $sip ?></td>
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
            foreach ($setorsiw['simpananwajib_data'] as $simpananwajib)
            {
                $ses_id = $this->db->get_where('settingsimpanan', array('ses_id' => $simpananwajib->ses_id))->row();
                ?>
                <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $simpananwajib->siw_tglbayar ?></td>
            <td><?php echo $siw_status[$simpananwajib->siw_status] ?></td>
            <td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('simpananwajib/setorsimpananwajib/'.$simpananwajib->siw_id),'Setor','class="text-navy"');?>
			</td>
		</tr>
                
                <?php
                $no++;
            }
            ?>
            </tbody>
        </table>
            </tbody>
            </div>
	</div>
    
    <div class="form-group col-md-12">
	    <a href="<?php echo site_url('simpanan/?p=5') ?>" class="btn btn-default">Batal</a>
    </div>
            </form>
	        	<?php
	        	} ?>
	    </div>
        </div>
        </div>
    </div>
</div>
</div>