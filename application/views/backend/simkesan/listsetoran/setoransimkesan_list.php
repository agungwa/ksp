<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                    <h2><b>List Setoran Simpanan</b></h2>
                </div>
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simkesan/listsetoran" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <div class="col-md-3"><h4>Rentang Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
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
                        <!-- <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No simpanan/ No Anggota"> -->
                        <span class="input-group-btn">
                            <!-- <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>simpanan/?p=3" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?> -->
                            <a href="<?php echo base_url()?>printdatasimkesan/listSetoran?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>" class="btn btn-default">Print</a>
                          
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
        		<th class="text-center">Nama Anggota</th>
        		<th class="text-center">Tanggal Setoran</th>
        		<th class="text-center">Jumlah Setor</th>
            </tr>
            </thead>
            <tbody><?php
            $total = 0;
            foreach ($datasetoran as $k => $item)
            {
                $total += $item['ssk_jmlsetor'];
                ?>
                <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $item['sik_kode'] ?></td>
    			<td><?php echo $item['nama_anggota'] ?></td>
    			<td><?php echo $item['ssk_tglsetoran'] ?></td>
    			<td><?php echo neraca($item['ssk_jmlsetor']) ?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        <table  class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tr class="danger"><td width="600px" >Total Setoran</td><td width="200px"><?php echo neraca($total) ?></td></tr>
        </table>
    </div>
    </div>
    </div>
    </body>
</html>