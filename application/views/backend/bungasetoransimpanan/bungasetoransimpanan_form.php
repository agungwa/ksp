
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title col-lg-4">
                    <h2 style="margin-top:0px"><?php echo $button ?> Bunga Simpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-lg-4">
	    <div class="form-group">
            <label for="int">Kode Rekening <?php echo form_error('sim_kode') ?></label>
            <input type="text" class="form-control" name="sim_kode" id="sim_kode" placeholder="Sim Kode" value="<?php echo $sim_kode; ?>" readonly />
        </div>
	    <div class="form-group">
            <label for="float">Bunga Bulan Ini <?php echo form_error('bss_bungabulanini') ?></label>
            <input type="text" class="form-control numeric" name="bss_bungabulanini" id="bss_bungabulanini" placeholder="Bunga" value="<?php echo $bss_bungabulanini; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal <?php echo form_error('bss_tglbunga') ?></label>
            <input type="text" class="form-control" name="bss_tglbunga" id="bss_tglbunga" placeholder="Bss Tglbunga" value="<?php echo $bss_tglbunga; ?>" readonly/>
        </div>
	    <input type="hidden" name="bss_id" value="<?php echo $bss_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <button type="submit" class="btn btn-default hBack">Cancel</button> 
        </div>
            </form>
        </div>
        </div>