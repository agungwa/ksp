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
                    <h2 style="margin-top:0px"><?php echo $button ?> Setoransimkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Sik Kode <?php echo form_error('sik_kode') ?></label>
            <div class="input-group">
            <!-- <input type="hidden" name="sik_kode" id="sik_kode" value="<?php echo $sik_kode; ?>" /> -->
            <input type="hidden" name="sik_kode" id="sik_kode" value="69" />
            <input type="text" class="form-control" name="nm_sik_kode" id="nm_sik_kode" placeholder="Simkesan" value="<?php echo $nm_sik_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>simkesan/lookup','sik_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="datetime">Ssk Tglsetoran <?php echo form_error('ssk_tglsetoran') ?></label>
            <input type="date" class="form-control" name="ssk_tglsetoran" id="ssk_tglsetoran" placeholder="Ssk Tglsetoran" value="<?php echo $ssk_tglsetoran; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ssk Tglbayar <?php echo form_error('ssk_tglbayar') ?></label>
            <input type="date" class="form-control" name="ssk_tglbayar" id="ssk_tglbayar" placeholder="Ssk Tglbayar" value="<?php echo $ssk_tglbayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ssk Jmlsetor <?php echo form_error('ssk_jmlsetor') ?></label>
            <input type="text" class="form-control" name="ssk_jmlsetor" id="ssk_jmlsetor" placeholder="Ssk Jmlsetor" value="<?php echo $ssk_jmlsetor; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ssk Status <?php echo form_error('ssk_status') ?></label>
            <input type="text" class="form-control" name="ssk_status" id="ssk_status" placeholder="Ssk Status" value="<?php echo $ssk_status; ?>" />
        </div>
        
	    <input type="hidden" name="ssk_id" value="<?php echo $ssk_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('setoransimkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>