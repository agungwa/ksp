    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <form action="<?php echo site_url('angsuran/listAngsuranbayar/'); ?>" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <label>Filter : </label>
                <input type="date" class="form-control" name="f" value="<?php echo $f ?>">
                <input type="date" class="form-control" name="t" value="<?php echo $t ?>">
            </div>           
        
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <!--<input type="text" class="form-control" name="u" value="all" placeholder="No Pinjaman">-->
                        <span class="input-group-btn">
                            <!--<?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('angsuran/?p=3'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>-->
                            <span class="input-group-btn">
                                        <!--<a href="<?php echo base_url()?>printangsuran/listAngsuran?t=<?=$t?>&u=<?=$u?>" class="btn btn-default">Print</a>-->
                            
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
		<th class="text-center">Jumlah Setor</th>
		<th class="text-center">Status</th>
            </tr>
            </thead>
			<tbody><?php
            $total = $totalpokok = $totalbunga = 0;
            foreach ($dataangsuran as $key=>$item)
            {
                $pin_id = $this->db->get_where('pinjaman', array('pin_id' => $item['pin_id']))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $pin_id->ang_no))->row();
                $jaminan = $this->Jaminan_model->get_by_rek($item['pin_id']);
                $jej_id = $this->db->get_where('jenisjaminan', array('jej_id' => $jaminan->jej_id))->row();
                $total += $item['ags_jmlbayar']+$item['ags_bayartunggakan'];
                $totalpokok += $item['ags_jmlpokok'];
                $totalbunga += $item['ags_jmlbunga'];
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $item['pin_id'] ?></td>
			<td><?php echo $ang_no->ang_nama ?></td>
			<td><?php echo $ang_no->ang_alamat ?></td>
			<td><?php echo $ang_no->ang_nohp ?></td>
			<td><?php echo $jej_id->jej_jaminan ?></td>
			<td><?php echo $item['ang_angsuranke'] ?></td>
			<td><?php echo dateFormataja($item['ags_tgljatuhtempo']) ?></td>
			<td><?php echo dateFormataja($item['ags_tglbayar']) ?></td>
			<td><?php echo rupiah($item['ags_jmlpokok']) ?></td>
			<td><?php echo rupiah($item['ags_jmlbunga']) ?></td>
			<td><?php echo rupiah($item['ags_jmlbayar']+$item['ags_bayartunggakan']) ?></td>
			<td><?php echo $item['ags_status'] ?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
            <tr class="active"><td>Total</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><?php echo rupiah($totalpokok) ?></td><td><?php echo rupiah($totalbunga) ?></td><td><?php echo rupiah($total) ?></td></tr>
            
        </table>
        
        </div>
    </div>
    </div>
    </div>