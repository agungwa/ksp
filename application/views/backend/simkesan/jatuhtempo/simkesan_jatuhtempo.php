<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                    <h2><b>List Jatuh Tempo Simkesan</b></h2>
                </div>
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simkesan/listjatuhtempo" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <div class="col-md-3"><h4>Rentang Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date"  name="f" required="required" value="<?= $f;?>">
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>
                <select class="form-control col-md-3"  name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>

            </div>
            
            <div class="col-md-4 text-right">
                    <div class="input-group">
                      <!--   <input type="text" class="form-control" name="q" value="all" placeholder="No simpanan/ No Anggota">
                        <span class="input-group-btn">
                             <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>simkesan/?p=3" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?> -->
                            <a href="<?php echo base_url()?>printdatasimkesan/listjatuhtempo?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>" class="btn btn-default">Print</a>
                          
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>
        <table class="data" style="margin-bottom: 10px">
            <thead>
				<tr>
					<th>No</th>
					<th>Rekening Simkesan</th>
					<th>Tanggal Terakhir Setoran</th>
					<th>Jatuh Tempo</th>
					<th>Setor</th>
				</tr>
            </thead>
			<tbody><?php
            foreach ($datajatuh as $key => $item)
            {
                $tanggal = new DateTime($item['tanggal']); 
                $sekarang = new DateTime();
                $perbedaan = $tanggal->diff($sekarang);
                $selisih = $perbedaan->m+($interval->y * 12);
                if ($sekarang > $tanggal){
                    $jatuh = $selisih;
                } else {
                    $jatuh = $selisih * -1;
                }
                ?>
                <tr>
					<td width="80px"><?php echo ++$start ?></td>
					<td><?php echo $item['sik_kode'] ?></td>
					<td><?php echo dateFormataja($item['tanggal']) ?></td>
					<td><?php echo $jatuh ?></td>
					<td><?php echo neraca($item['ssk_jmlsetor']) ?></td>
				</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
      
    </div>
    </div>
    </div>