    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <form action="<?php echo site_url('angsuran/'); ?>" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="2">
                <label>Jatuh Tempo : </label>
                <input type="date" class="form-control" name="t" value="<?php echo $t ?>">
            </div>           
        
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="u" value="all" placeholder="No Pinjaman">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('angsuran/?p=2'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                            <span class="input-group-btn">
                                        <a href="<?php echo base_url()?>printangsuran/listAngsuran?t=<?=$t?>&u=<?=$u?>" class="btn btn-default">Print</a>
                            
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
        </div>
        </form>

        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Rekening Pinjaman</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">No HP</th>
		<th class="text-center">Jaminan</th>
		<th class="text-center">Angsuranke</th>
		<th class="text-center">Jatuh Tempo</th>
		<th class="text-center">Tanggal Bayar</th>
		<th class="text-center">Jumlah Pokok</th>
		<th class="text-center">Jumlah Bunga</th>
		<th class="text-center">Status</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($dataangsuran as $key=>$item)
            {
                $pin_id = $this->db->get_where('pinjaman', array('pin_id' => $item['pin_id']))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $pin_id->ang_no))->row();
                $jaminan = $this->Jaminan_model->get_by_rek($item['pin_id']);
                $jej_id = $this->db->get_where('jenisjaminan', array('jej_id' => $jaminan->jej_id))->row();
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $item['pin_id'] ?></td>
			<td><?php echo $ang_no->ang_nama ?></td>
			<td><?php echo $ang_no->ang_alamat ?></td>
			<td><?php echo $ang_no->ang_nohp ?></td>
			<td><?php echo $jej_id->jej_jaminan ?></td>
			<td><?php echo $item['ang_angsuranke'] ?></td>
			<td><?php echo $item['ags_tgljatuhtempo'] ?></td>
			<td><?php echo $item['ags_tglbayar'] ?></td>
			<td><?php echo rupiah($item['ags_jmlpokok']) ?></td>
			<td><?php echo rupiah($item['ags_jmlbunga']) ?></td>
			<td><?php echo $item['ags_status'] ?></td>
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