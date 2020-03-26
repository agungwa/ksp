<div class="row">
        <div class="ibox-content">
            <div class="jumbotron">
            
            <h2><b>Input Kasbon Kembali <?= $this->jenisKasbon[$j] ?></b></h2>
                <form action="<?php echo base_url()?>kasbon/rekap/<?= $p?>" class="form-inline" method="get">

                    <div>
                            <div class="input-group">
                                <select class="form-control col-md-3"  name="w">
                                    <option value="<?= $w ?>"><?= $setor['nm_wil_kode'] ?></option>
                                    <?php
                                        foreach ($wilayah_data as $value) { ?>
                                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                                    <?php        
                                        }
                                    ?>
                                </select>
                                <input type="date" class="form-control" name="f" value="<?= $f ?>"  autofocus>
                                <button class="btn btn-primary" type="submit">Tampilkan</button>
                                </span>
                            </div>
                    </div>
                    </form>
            </div>
        
	        	<?php 
	        	if ($setor != null) {
	        	?>
                <form action="<?php echo site_url('kasbon/rekap_action'); ?>" method="post">
                    <div class="form-group col-md-3">
                        <label for="float">Kasbon Masuk</label>
                        <input type="text" class="form-control numeric" name="ksb_masuk" id="searchTxt" placeholder="Jumlah" required />
                    </div>
                <table class="table">
                    <tr><td class='active'>Kasbon Keluar</td><td><?php echo neraca($setor['ksb_keluar']); ?></td></tr>
                    <tr><td class='active'>Karyawan</td><td><?php echo $setor['nm_kar_kode']; ?></td></tr>
                    <tr><td class='active'>Wilayah</td><td><?php echo $setor['nm_wil_kode']; ?></td></tr>
                    <tr><td class='active'>Keterangan</td><td><?php echo $setor['ksb_keterangan']; ?></td></tr>
                    <tr><td class='active'>Tanggal</td><td><?php echo dateFormataja($setor['ksb_tanggal']); ?></td></tr>
                </table>
                    <input type="hidden" name="p" value="<?php echo $p; ?>" /> 
                    <input type="hidden" name="ksb_no" value="<?php echo $setor['ksb_no']; ?>" /> 
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Click OK jika benar menyetor sejumlah Rp ' + rubah(searchTxt.value))"><?php echo $button ?></button> 
                    <a href="<?=base_url()?>kasbon/rekap/<?= $p?>" class="btn btn-default">Cancel</a>
                    
                </form>
	        	<?php
	        	} ?>
        </div>
</div>