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
                    <h2 style="margin-top:0px">Input Phu </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Phu Gaji <?php echo form_error('phu_gaji') ?></label>
            <input type="text" class="form-control" name="phu_gaji" id="phu_gaji" placeholder="Phu Gaji" value="<?php echo $phu_gaji; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Operasional <?php echo form_error('phu_operasional') ?></label>
            <input type="text" class="form-control" name="phu_operasional" id="phu_operasional" placeholder="Phu Operasional" value="<?php echo $phu_operasional; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Listrik PDAM <?php echo form_error('phu_lps') ?></label>
            <input type="text" class="form-control" name="phu_lps" id="phu_lps" placeholder="Phu Lps" value="<?php echo $phu_lps; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Komunikasi <?php echo form_error('phu_komunikasi') ?></label>
            <input type="text" class="form-control" name="phu_komunikasi" id="phu_komunikasi" placeholder="Phu Komunikasi" value="<?php echo $phu_komunikasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Perlengkapan <?php echo form_error('phu_perlengkapan') ?></label>
            <input type="text" class="form-control" name="phu_perlengkapan" id="phu_perlengkapan" placeholder="Phu Perlengkapan" value="<?php echo $phu_perlengkapan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Penyusutan <?php echo form_error('phu_penyusutan') ?></label>
            <input type="text" class="form-control" name="phu_penyusutan" id="phu_penyusutan" placeholder="Phu Penyusutan" value="<?php echo $phu_penyusutan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Asuransi <?php echo form_error('phu_asuransi') ?></label>
            <input type="text" class="form-control" name="phu_asuransi" id="phu_asuransi" placeholder="Phu Asuransi" value="<?php echo $phu_asuransi; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Insentif <?php echo form_error('phu_insentif') ?></label>
            <input type="text" class="form-control" name="phu_insentif" id="phu_insentif" placeholder="Phu Insentif" value="<?php echo $phu_insentif; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Pajak Kendaraan <?php echo form_error('phu_pajakkendaraan') ?></label>
            <input type="text" class="form-control" name="phu_pajakkendaraan" id="phu_pajakkendaraan" placeholder="Phu Pajakkendaraan" value="<?php echo $phu_pajakkendaraan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Rapat <?php echo form_error('phu_rapat') ?></label>
            <input type="text" class="form-control" name="phu_rapat" id="phu_rapat" placeholder="Phu Rapat" value="<?php echo $phu_rapat; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Atk <?php echo form_error('phu_atk') ?></label>
            <input type="text" class="form-control" name="phu_atk" id="phu_atk" placeholder="Phu Atk" value="<?php echo $phu_atk; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Keamanan <?php echo form_error('phu_keamanan') ?></label>
            <input type="text" class="form-control" name="phu_keamanan" id="phu_keamanan" placeholder="Phu Keamanan" value="<?php echo $phu_keamanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu PH Pinjaman <?php echo form_error('phu_phpinjaman') ?></label>
            <input type="text" class="form-control" name="phu_phpinjaman" id="phu_phpinjaman" placeholder="Phu Phpinjaman" value="<?php echo $phu_phpinjaman; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Sosial <?php echo form_error('phu_sosial') ?></label>
            <input type="text" class="form-control" name="phu_sosial" id="phu_sosial" placeholder="Phu Sosial" value="<?php echo $phu_sosial; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Tasyakuran <?php echo form_error('phu_tayakuran') ?></label>
            <input type="text" class="form-control" name="phu_tayakuran" id="phu_tayakuran" placeholder="Phu Tayakuran" value="<?php echo $phu_tayakuran; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Koran <?php echo form_error('phu_koran') ?></label>
            <input type="text" class="form-control" name="phu_koran" id="phu_koran" placeholder="Phu Koran" value="<?php echo $phu_koran; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Pajak Koprasi <?php echo form_error('phu_pajakkoprasi') ?></label>
            <input type="text" class="form-control" name="phu_pajakkoprasi" id="phu_pajakkoprasi" placeholder="Phu Pajakkoprasi" value="<?php echo $phu_pajakkoprasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Service Kendaraan <?php echo form_error('phu_servicekendaraan') ?></label>
            <input type="text" class="form-control" name="phu_servicekendaraan" id="phu_servicekendaraan" placeholder="Phu Servicekendaraan" value="<?php echo $phu_servicekendaraan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Konsumsi <?php echo form_error('phu_konsumsi') ?></label>
            <input type="text" class="form-control" name="phu_konsumsi" id="phu_konsumsi" placeholder="Phu Konsumsi" value="<?php echo $phu_konsumsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu RAT <?php echo form_error('phu_rat') ?></label>
            <input type="text" class="form-control" name="phu_rat" id="phu_rat" placeholder="Phu Rat" value="<?php echo $phu_rat; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu THR <?php echo form_error('phu_thr') ?></label>
            <input type="text" class="form-control" name="phu_thr" id="phu_thr" placeholder="Phu Thr" value="<?php echo $phu_thr; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Nonoprasional <?php echo form_error('phu_nonoprasional') ?></label>
            <input type="text" class="form-control" name="phu_nonoprasional" id="phu_nonoprasional" placeholder="Phu Nonoprasional" value="<?php echo $phu_nonoprasional; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Perawatan Kantor <?php echo form_error('phu_perawatankantor') ?></label>
            <input type="text" class="form-control" name="phu_perawatankantor" id="phu_perawatankantor" placeholder="Phu Perawatankantor" value="<?php echo $phu_perawatankantor; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Keterangan</label>
            <input type="text" class="form-control" name="phu_keterangan" id="phu_keterangan" placeholder="keterangan" value="" />
        </div>
	    <div class="form-group">
            <label for="float">Phu Tangggal</label>
            <input type="date" class="form-control" name="phu_tanggal" id="todays-date" placeholder="tanggal" value="" />
        </div>
	    <input type="hidden" name="phu_id" value="<?php echo $phu_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('phu') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>