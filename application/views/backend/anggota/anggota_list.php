<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>anggota/listdata" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="2">
                <div class="col-md-2"><h3>Filter : </h3></div>
                <select class="form-control col-md-3" name="s">
                    <option value="all">Semua Status</option>
                    <?php
                        foreach ($this->statusAnggota as $key => $value) { ?>
                            <option value="<?= $key?>"><?= $value?></option>
                    <?php        
                        }
                    ?>
                </select>
				<div class="col-md-2"><h4>Tanggal: </h4></div>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>
            </div>
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="u" value="all" placeholder="No Anggota">
                        <span class="input-group-btn">
                            <?php 
                                if ($u <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>anggota/?p=2" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>

        <table class="data table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead>
				<tr>
					<th>No</th>
					<th>Nomor Anggota</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Nomor KTP</th>
					<th>Nomor KK</th>
					<th>Nomor Handphone</th>
					<th>Tanggal Pendaftaran</th>
					<th>Tanggal Lahir</th>
					<th>Status</th>
					<th>Edit Anggota</th>
					<th>Action Anggota</th>
				</tr>
            </thead>
			<tbody><?php
            
            foreach ($dataanggota as $key=>$item)
            {
                ?>
                <tr>
					<td width="80px"><?php echo ++$start ?></td>
					<td><?php echo $item['ang_no'] ?></td>
					<td><?php echo $item['ang_nama'] ?></td>
					<td><?php echo $item['ang_alamat'] ?></td>
					<td><?php echo $item['ang_noktp'] ?></td>
					<td><?php echo $item['ang_nokk'] ?></td>
					<td><?php echo $item['ang_nohp'] ?></td>
					<td><?php echo $item['ang_tgl'] ?></td>
					<td><?php echo $item['ang_tgllahir'] ?></td>
					<td><?php echo $item['ang_status']?></td>
					<td style="text-align:center" width="200px">
						<?php 
						echo anchor(site_url('anggota/read/'.$item['ang_no']),'Detail','class="text-navy"'); 
						echo ' | ';
						if ($item['ang_status'] == 0) {
						echo anchor(site_url('anggota/pengajuanupdate/'.$item['ang_no']),'Update','class="text-navy"');
						} else {
						echo anchor(site_url('anggota/update/'.$item['ang_no']),'Update','class="text-navy"');
						} 
						echo ' | '; 
						echo anchor(site_url('anggota/delete/'.$item['ang_no']),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
						?>
					</td>
					<td style="text-align:center" width="200px">
						<?php
						echo anchor(site_url('anggota/setorsiw?q='.$item['ang_no']),'Setor','class="text-navy"'); 
						echo ' | '; 
						echo anchor(site_url('anggota/tariksiw?q='.$item['ang_no']),'Tarik','class="text-navy"');
						?>
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
    </body>
</html>