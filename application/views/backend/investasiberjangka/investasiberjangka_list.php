<style>
	.tgl{
		margin:0 0 20px 20px;
	}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>investasiberjangka/listdata/" class="form-inline" method="get">
            
			<div class="tgl col-md-8 text-right">
				<div class="col-md-3"><h4>Rentang Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>
			</div>
			
			<div class="col-md-8 text-right">
                <input type="hidden" name="p" value="3">
				
                <div class="col-md-2"><h3>Filter : </h3></div>
                <select class="form-control col-md-3"  name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="s">
                    <option value="all">Semua Status</option>
                    <?php
                        foreach ($this->statusSimpanan as $key => $value) { ?>
                            <option value="<?= $key?>"><?= $value?></option>
                    <?php        
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="u" value="all" placeholder="No Rekening">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>investasiberjangka/?p=2" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
							<a href="<?php echo base_url()?>printinvestasiberjangka/listinvestasi?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>&s=<?=$s?>&u=<?=$u?>" class="btn btn-default">Print</a>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        <table class="data table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
				<th>Rekening Investasi</th>
				<th>Anggota</th>
				<th>Nama Anggota</th>
				<th>Karyawan</th>
				<th>Wilayah</th>
				<th>Jangka Waktu</th>
				<th>Jasa</th>
				<th>Bunga</th>
				<th>Investasi</th>
				<th>Tanggal Pendaftaran</th>
				<th>Tanggal Jatuh Tempo</th>
				<th>Status Diagunkan</th>
				<th>Status</th>
				<th>Action</th>
            </tr>
            </thead>
			<tbody><?php
            $total=0;
             foreach ($datainvest as $key=>$item)
             {
                 $total += $item['ivb_jumlah'];
                 ?>
                 <?php 
                if ($item['ivb_jam'] > 0){
                    echo '<tr class = danger>';
                } else {
                    echo '<tr class = info>';
                }
                ?>
					<td width="80px"><?php echo ++$start ?></td>
					<td><?php echo $item['ivb_kode'] ?></td>
					<td><?php echo $item['ang_no'] ?></td>
					<td><?php echo $item['nama_ang_no'] ?></td>
					<td><?php echo $item['kar_kode'] ?></td>
					<td><?php echo $item['wil_kode'] ?></td>
					<td><?php echo $item['jwi_id'] , " Bulan" ?></td>
					<td><?php echo $item['jiv_id'] ?></td>
					<td><?php echo $item['biv_id'] ," %" ?></td>
					<td><?php echo rupiahsimpanan($item['ivb_jumlah']) ?></td>
					<td><?php echo dateFormataja($item['ivb_tglpendaftaran']) ?></td>
					<td><?php echo dateFormataja($item['jatuhtempo']) ?></td>
					<td><?php echo $this->statusJaminan[$item['ivb_jam']] ?></td>
					<td><?php echo $item['ivb_status'] ?></td>
					<td style="text-align:center" width="200px">
						<?php 
						echo anchor(site_url('investasiberjangka/read/'.$item['ivb_kode']),'Read','class="text-navy"'); 
						echo ' | '; 
						echo anchor(site_url('investasiberjangka/update/'.$item['ivb_kode']),'Update','class="text-navy"'); 
						 ?>
                        <?php if(is_allow('M_EDIT')): ?>
                        <?php
						echo ' | '; 
						echo anchor(site_url('investasiberjangka/delete/'.$item['ivb_kode']),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
                        ?>
                        <?php endif; ?>
                      <form action="<?php echo site_url('investasiberjangka/jaminan/'.$item['ivb_kode']); ?>" method="post">
                        <input type="hidden" class="form-control" name="ivb_kode" id="ivb_kode" placeholder="ivb_kode" value="<?php echo $item['ivb_kode']; ?>" />
                        <?php  
                        if ($item['ivb_jam'] == 0 && $item['ivb_statusid'] < 1){
                        echo '
                        <input type="hidden" class="form-control" name="ivb_jam" id="ivb_jam" placeholder="ivb_jam" value="1" />
                        <button type="submit" class="btn btn-danger">Agunkan</button>';
                            } 
                        else if ($item['ivb_jam'] == 1 && $item['ivb_statusid'] < 1) {
                        echo '
                        <input type="hidden" class="form-control" name="ivb_jam" id="ivb_jam" placeholder="ivb_jam" value="0"/>
                        <button type="submit" class="btn btn-info">Lunas</button>'; 
                            } ?>
                    </form>

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