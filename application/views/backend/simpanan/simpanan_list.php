<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simpanan/listdata/" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="3">
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
                
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="u" value="all" placeholder="No Rekening">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>simpanan/?p=3" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <a href="<?php echo base_url()?>printsimpanan/listdata?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>&s=<?=$s?>&u=<?=$u?>" class="btn btn-default">Print</a>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>

        <table id="dtOrderExample" class="data" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th>No</th>
				<th>Kode Simpanan</th>
				<th>Kode Anggota</th>
				<th>Nama Anggota</th>
				<th>Alamat Anggota</th>
				<th>Karyawan</th>
				<th>Jenis Setoran</th>
				<th>Wilayah</th>
				<th>Tanggal Pendaftaran</th>
				<th>Jatuh Tempo</th>
				<th>Total Setor</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Action</th>
            </tr>
            </thead>
			<tbody><?php
            $total=$subtotal_thn=0;
            foreach ($datasimpanan as $key=>$item)
            {
                
                $totalsetoran = $this->Setoransimpanan_model->get_totalsetoran($item['sim_kode']); 
                $total += $totalsetoran[0]->ssi_jmlsetor;
                $subtotal_thn += $totalsetoran[0]->ssi_jmlsetor;
                $tanggalDuedate = date("Y-m-d", strtotime($item['sim_tglpendaftaran'].' + '.$item['jsi_id'].' Months'));
                ?>
                <tr>
					<td width="80px"><?php echo ++$start ?></td>
					<td><?php echo $item['sim_kode'] ?></td>
					<td><?php echo $item['ang_no'] ?></td>
					<td><?php echo $item['nm_ang_no'] ?></td>
					<td><?php echo $item['alamat_ang_no'] ?></td>
					<td><?php echo $item['kar_kode'] ?></td>
					<td><?php echo $item['jse_id'] ?></td>
					<td><?php echo $item['wil_kode'] ?></td>
					<td><?php echo $item['sim_tglpendaftaran'] ?></td>
					<td><?php echo $tanggalDuedate?></td>
					<td><?php echo rupiahsimpanan($totalsetoran[0]->ssi_jmlsetor)?></td>
					<td><?php echo $item['sim_status']?></td>
					<td>
						<?php 
						echo anchor(site_url('simpanan/read/'.$item['sim_kode']),'Detail','class="text-navy"'); 
						echo ' | '; 
						echo anchor(site_url('simpanan/update/'.$item['sim_kode']),'Update','class="text-navy"'); 
						echo ' | '; 
						echo anchor(site_url('simpanan/delete/'.$item['sim_kode']),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
						?>
					</td>
					<td>
						<?php 
						echo anchor(site_url('simpanan/setor?q='.$item['sim_kode']),'Setor','class="text-navy"'); 
						echo ' | '; 
						echo anchor(site_url('simpanan/tariksimpanan?q='.$item['sim_kode']),'Tarik','class="text-navy"');?>
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
    </div>
    </body>
</html>