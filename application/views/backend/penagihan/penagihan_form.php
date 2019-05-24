<div class="row">
<div class="col-lg-12">
    <div class="ibox">
        <div class="ibox-title">
            <h2><b>Penagihan Pinjaman</b></h2>
        </div>

        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('penagihan/cetak'); ?>" class="form-inline" method="get">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="float">Tanggal : </label>
                    <input type="date" class="form-control" name="dari_tgl" id="dari_tgl"/>
                </div>
                <div class="form-group">
                    <label for="float"> s/d </label>
                    <input type="date" class="form-control" name="sampai_tgl" id="sampai_tgl"/>
                </div>
                <div class="form-group">
                <select class="form-control col-md-3" name="karyawan">
                    <option value="">--Karyawan--</option>
                    <?php
                        foreach ($karyawan as $value) { ?>
                            <option value="<?= $value->kar_kode?>"><?= $value->kar_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                </div>
            </div>
            <div class="col-md-4 text-left">
                    <div class="input-group">
                        <span class="input-group-btn">
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-btn">
                          <button class="btn btn-warning" type="submit">Cetak</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>

	    <div class="row" style="margin-top: 10px">
	    </div>
        </div>
        </div>
    </div>
</div>
</div>