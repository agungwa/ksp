<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">

            <form action="<?php echo base_url()?>simpanan/" class="form-inline" method="get">
            <input type="hidden"  class="form-control" name="p" required="required" value="3">
            <div class="col-md-8 text-right">
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
                
                    <input class="form-control" type="date" name="f"  value="<?= $f;?>">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>">
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

        <table class="data table table-sm table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th>No</th>
				<th>Kode Simpanan</th>
				<th>Kode Anggota</th>
				<th>Nama Anggota</th>
				<th>Alamat Anggota</th>
				<th>Jenis Setoran</th>
				<th>Wilayah</th>
                <th><i class ="fa fa-calendar" aria-hidden="true"></i>
            </th>
				<th>Saldo</th>
				<th width="100px">Status | Diagunkan</th>
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
                
                 <?php 
                if ($item['sim_jamid'] > 0){
                    echo '<tr class = danger>';
                } else {
                    echo '<tr class = info>';
                }
                ?>
					<td width="80px"><?php echo ++$start ?></td>
					<td><?php echo $item['sim_kode'] ?></td>
					<td><?php echo $item['ang_no'] ?></td>
					<td><?php echo $item['nm_ang_no'] ?></td>
					<td><?php echo $item['alamat_ang_no'] ?></td>
					<td><?php echo $item['jse_id'] ?></td>
					<td><?php echo $item['wil_kode'] ?></td>
					<td width="100px"><initialism title="Tanggal Pendaftaran | Jatuh Tempo"><?php echo dateFormataja($item['sim_tglpendaftaran']),' | ',dateFormataja($tanggalDuedate) ?></initialism></td>
					<td><?php echo rupiahsimpanan($totalsetoran[0]->ssi_jmlsetor)?></td>
					<td><?php echo $item['sim_status'],' | ',$item['sim_jam'] ?></td>
                    
					<td>
                    <div class="dropdown">
                        <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">
                            Pilih 
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo site_url('simpanan/read/'.$item['sim_kode']); ?>">Detail</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('simpanan/update/'.$item['sim_kode']); ?>">Update</a></li>
                            <?php if(is_allow('M_EDIT')): ?>
                            <li><a class="dropdown-item" href="<?php echo site_url('simpanan/delete/'.$item['sim_kode']); ?>">Delete</a></li>
                            <?php endif; ?>
                            <?php if ($item['sim_statusid'] < 1){ ?>
                            <li class="divider"></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('simpanan/setor?q='.$item['sim_kode']); ?>">Setor</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('simpanan/tariksimpanan?q='.$item['sim_kode']); ?>">Tarik</a></li>
                            <?php }   ?>
                        </ul>
                    </div>
					<form action="<?php echo site_url('simpanan/jaminan/'.$item['sim_kode']); ?>" method="post">
                        <input type="hidden" class="form-control" name="sim_kode" id="sim_kode" placeholder="sim_kode" value="<?php echo $item['sim_kode']; ?>" />
                        <?php  
                        if ($item['sim_jamid'] == 0 && $item['sim_statusid'] < 1){
                        echo '
                        <input type="hidden" class="form-control" name="sim_jam" id="sim_jam" placeholder="sim_jam" value="1" />
                        <button type="submit" class="btn btn-danger btn-sm">Agunkan</button>';
                            } 
                        else if ($item['sim_jamid'] == 1 && $item['sim_statusid'] < 1) {
                        echo '
                        <input type="hidden" class="form-control" name="sim_jam" id="sim_jam" placeholder="sim_jam" value="0"/>
                        <button type="submit" class="btn btn-info btn-sm">Lunas</button>'; 
                            } ?>
                    </form>

					</td>
					
				</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
		<table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tr>
            <td class="active">Total Pokok</td><td><?= rupiahSimpanan($total) ?></td>
            </tr>
		</table>
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>