<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                    <h2><b>List Jatuh Tempo Simpanan</b></h2>
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
        <table class="data table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        		<th class="text-center">Rekening Simkesan</th>
        		<th class="text-center">Tanggal Setoran</th>
        		<th class="text-center">Jatuh Tempo</th>
        		<th class="text-center">Setor</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($datajatuh as $key => $item)
            {
                $tanggal = new DateTime($item['ssk_tglsetoran']); 
                $sekarang = new DateTime();
                $perbedaan = $tanggal->diff($sekarang);
                ?>
                <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $item['sik_kode'] ?></td>
    			<td><?php echo $item['ssk_tglsetoran'] ?></td>
    			<td><?php echo $perbedaan->m ?></td>
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