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
                    <h2 style="margin-top:0px"><?php echo $button ?> Neraca Aktiva Tetap </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Tanah</label>
            <input type="number" class="form-control" name="nat_tanah" id="nat_tanah" placeholder="Tanah" value="<?php echo $nat_tanah ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Bangunan</label>
            <input type="number" class="form-control" name="nat_bangunan" id="nat_bangunan" placeholder="Bangunan" value="<?php echo $nat_bangunan ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Elektronik</label>
            <input type="number" class="form-control" name="nat_elektronik" id="nat_elektronik" placeholder="Elektronik" value="<?php echo $nat_elektronik ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Kendaraan</label>
            <input type="number" class="form-control" name="nat_kendaraan" id="nat_kendaraan" placeholder="Kendaraan" value="<?php echo $nat_kendaraan ?>"/>
        </div>
	    <div class="form-group">
            <label for="float">Peralatan</label>
            <input type="number" class="form-control" name="nat_peralatan" id="nat_peralatan" placeholder="Peralatan" value="<?php echo $nat_peralatan ?>"/>
        </div>
	    <div class="form-group">
            <label for="float">Akumulasipenyusutan</label>
            <input type="number" class="form-control" name="nat_akumulasipenyusutan" id="nat_akumulasipenyusutan" placeholder="Akumulasipenyusutan" value="<?php echo $nat_akumulasipenyusutan ?>" required/>
        </div>
	    <div class="form-group">
            <label for="text">Keterangan</label>
            <textarea class="form-control" rows="3" name="nat_keterangan" id="nat_keterangan" placeholder="Keterangan"></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal</label>
            <input type="date" class="form-control" name="nat_tanggal" id="todays-date" placeholder="Tanggal" value="" required/>
        </div>
	    <input type="hidden" name="nat_id" value="" required /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('neracaaktivatetap') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>