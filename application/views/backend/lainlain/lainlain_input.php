<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2 style="margin-top:0px"><?php echo $button ?> Lain lain <?= $this->jenis[$j] ,' ',$this->inout[$m] ?> </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-6">
	    <div class="form-group">
            <label for="float"> Jumlah</label>
            <input type="number" class="form-control" name="lln_jumlah" id="searchTxt" placeholder="Jumlah" required />
        </div>
        <?php if ($active < 6) { ?>
        <div>
            <label for="int">Wilayah</label>
            <div class="input-group">
            <input type="hidden" name="wil_kode" id="wil_kode" required />
            <input type="text" class="form-control" name="nm_wil_kode" id="nm_wil_kode" autocomplete="off" onkeypress="return false" placeholder="Wilayah"  required />
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <?php } else if ($active == 6) { ?>
        <input type="hidden" name="wil_kode" id="wil_kode" value=<?= NULL ?> required />
        <?php } ?>
        <div class="form-group">
            <label for="ksb_keterangan">Keterangan</label>
            <textarea class="form-control" rows="3" name="lln_keterangan" id="lln_keterangan" placeholder="Keterangan"> </textarea>
        </div>
	    <div class="form-group">
            <label for="datetime"> Tanggal</label>
            <input type="date" readonly class="form-control" name="lln_tanggal" id="todays-date" required placeholder=" Tanggal" />
        </div>
	    <input type="hidden" name="lln_id" /> 
	    <input type="hidden" name="lln_jenis" value="<?php echo $j; ?>" /> 
	    <input type="hidden" name="lln_inout" value="<?php echo $m; ?>" /> 
	    <input type="hidden" name="active" value="<?php echo $active; ?>" /> 
	    <button type="submit" class="btn btn-primary" onclick="return confirm('Click OK jika benar menyetor sejumlah Rp ' + rubah(searchTxt.value))"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('lainlain') ?>" class="btn btn-default hBack">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>