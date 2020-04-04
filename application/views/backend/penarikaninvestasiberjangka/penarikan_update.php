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
                    <h2 style="margin-top:0px"><?php echo $button ?> Penarikan Investasi Berjangka </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-6">
        <div class="col-md-4">
	    <div class="form-group">
            <label for="varchar">Rekening Investasi</label>
            <input type="text" class="form-control" name="ivb_kode" id="ivb_kode" value="<?php echo $ivb_kode; ?>" readonly/>
        </div>
	    <div class="form-group">
            <label for="tinyint">Penarikanke</label>
            <input type="text" class="form-control" name="pib_penarikanke" id="pib_penarikanke" placeholder="Penarikanke" required readonly value="<?php echo $pib_penarikanke; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Tanggal</label>
            <input type="text" class="form-control date" name="pib_tgl" id="pib_tgl" placeholder="pib_tgl" required readonly value="<?php echo $pib_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Diterima</label>
            <input type="number" class="form-control" name="pib_jmlditerima" id="pib_jmlditerima" placeholder="Jumlah Diterima" required value="<?php echo $pib_jmlditerima; ?>" />
        </div>
	    <input type="hidden" name="pib_id" value="<?php echo $pib_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penarikaninvestasiberjangka') ?>" class="btn btn-default hBack">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>