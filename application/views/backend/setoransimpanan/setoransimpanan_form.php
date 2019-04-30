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
                    <h2 style="margin-top:0px"><?php echo $button ?> Setoransimpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
        <div class="form-group">
            <label for="varchar">Sim Kode <?php echo form_error('sim_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="sim_kode" id="sim_kode" value="<?php echo $sim_kode; ?>" />
            <input type="text" class="form-control" name="nm_sim_kode" id="nm_sim_kode" placeholder="Rekening Simpanan" value="<?php echo $nm_sim_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>simpanan/lookup','sim_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="datetime">Ssi Tglsetor <?php echo form_error('ssi_tglsetor') ?></label>
            <input type="date" class="form-control" name="ssi_tglsetor" id="todays-date" placeholder="Ssi Tglsetor" value="<?php echo $ssi_tglsetor; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ssi Jmlsetor <?php echo form_error('ssi_jmlsetor') ?></label>
            <input type="text" class="form-control" name="ssi_jmlsetor" id="ssi_jmlsetor" placeholder="Ssi Jmlsetor" value="<?php echo $ssi_jmlsetor; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ssi Jmlbunga <?php echo form_error('ssi_jmlbunga') ?></label>
            <input type="text" class="form-control" name="ssi_jmlbunga" id="ssi_jmlbunga" placeholder="Ssi Jmlbunga" value="<?php echo $ssi_jmlbunga; ?>" />
        </div>
	    <input type="hidden" name="ssi_id" value="<?php echo $ssi_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('setoransimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
        <script>
        var today = new Date();
var dd = ("0" + (today.getDate())).slice(-2);
var mm = ("0" + (today.getMonth() +　1)).slice(-2);
var yyyy = today.getFullYear();
today = yyyy + '-' + mm + '-' + dd ;
$("#todays-date").attr("value", today)
</script>
    </body>
</html>