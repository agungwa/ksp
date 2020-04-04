<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simkesan/simkesanlist" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="5">
                <select class="form-control col-md-2" name="s">
                    <option value="">Semua Status</option>
                    <?php
                        foreach ($this->statusSimkesan as $key => $value) { ?>
                            <option value="<?= $key?>"><?= $value?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-2" name="w">
                    <option value="">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-2" name="plan">
                    <option value="">Semua Plan</option>
                    <?php
                        foreach ($plansimkesan_data as $value) { ?>
                            <option value="<?= $value->psk_id?>"><?= $value->psk_plan?></option>
                    <?php        
                        }
                    ?>
                </select>
                
            <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
            <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
            </div>
            
            <div class="col-md-4 text-right">
                    <div class="input-group">
                          <a href="<?php echo base_url()?>printdatasimkesan/listRekening?p=<?=$p?>&s=<?=$s?>&w=<?=$w?>&plan=<?=$plan?>&f=<?=$f?>&t=<?=$t?>" class="btn btn-default">Print</a>  
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
            </div>
            </form>
        </div>
        <table class="data table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
				<th>Rekening Simkesan</th>
				<th>ID Angggota</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th width="100px">Plan</th>
				<th>Wilayah</th>
				<th>Tgl Daftar | Terakhir Setor</th>
				<th>Titip</th>
				<th>Titip</th>
				<th width="100px">Status | Diagunkan</th>
				<th>Action</th>
			</tr>
            </thead>
			<tbody>
            
            <?php
            foreach ($simkesan_data as $simkesan)
            {
                $terakhir = $this->Setoransimkesan_model->get_tglterakhir($simkesan->sik_kode);
                $totalsetoran = $this->Setoransimkesan_model->get_totalsetoran($simkesan->sik_kode); 
                $totaltitip = $this->Titipansimkesan_model->get_totaltitipan($simkesan->sik_kode); 
                $totalambil = $this->Titipansimkesan_model->get_totalambil($simkesan->sik_kode);
                $titipan =  $totaltitip[0]->tts_jmltitip - $totalambil[0]->tts_jmlambil;
                $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $simkesan->psk_id))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $simkesan->wil_kode))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $simkesan->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $simkesan->kar_kode))->row();
                ?>
                
                <?php 
               if ($simkesan->sik_jam > 0){
                   echo '<tr class = danger>';
               } else {
                   echo '<tr class = info>';
               }
               ?>
					<td width="80px"><?php echo ++$start ?></td>
        			<td><?php echo $simkesan->sik_kode ?></td>
        			<td><?php echo $simkesan->ang_no ?></td>
        			<td><?php echo $ang_no->ang_nama ?></td>
        			<td><?php echo $ang_no->ang_alamat ?></td>
        			<td><?php echo $psk_id->psk_plan ?></td>
        			<td><?php echo $wil_kode->wil_nama ?></td>
        			<td><?php echo dateFormataja($simkesan->sik_tglpendaftaran),' | ',dateFormataja($terakhir->tanggal) ?></td>
                    <td><?php echo neraca($totalsetoran[0]->ssk_jmlsetor)?></td>
                    <td><?php echo neraca($titipan)?></td>
        			<td><?php echo $this->statusSimkesan[$simkesan->sik_status],' | ',$this->statusJaminan[$simkesan->sik_jam] ?></td>
                    <td style="text-align:center" width="200px">
                    <div class="dropdown">
                        <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">
                            Pilih 
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo site_url('simkesan/read/'.$simkesan->sik_kode); ?>">Detail</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('simkesan/update/'.$simkesan->sik_kode); ?>">Update</a></li>
                            <?php if(is_allow('M_EDIT')): ?>
                            <li><a class="dropdown-item" href="<?php echo site_url('simkesan/delete/'.$simkesan->sik_kode); ?>">Delete</a></li>
                            <?php endif; ?>
                            <?php if ($simkesan->sik_status == 3){ ?>
                            <li class="divider"></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('simkesan/aktifkan/'.$simkesan->sik_kode); ?>">Aktifkan</a></li>
                            <?php }   ?>
                        </ul>
                    </div>
					<form action="<?php echo site_url('simkesan/jaminan/'.$simkesan->sik_kode); ?>" method="post">
                        <input type="hidden" class="form-control" name="sik_kode" id="sik_kode" placeholder="sik_kode" value="<?php echo $simkesan->sik_kode; ?>" />
                        <?php  
                        if ($simkesan->sik_jam == 0 && $simkesan->sik_status < 1){
                        echo '
                        <input type="hidden" class="form-control" name="sik_jam" id="sik_jam" placeholder="sik_jam" value="1" />
                        <button type="submit" class="btn btn-danger">Agunkan</button>';
                            } 
                        else if ($simkesan->sik_jam == 1 && $simkesan->sik_status < 1) {
                        echo '
                        <input type="hidden" class="form-control" name="sik_jam" id="sik_jam" placeholder="sik_jam" value="0"/>
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