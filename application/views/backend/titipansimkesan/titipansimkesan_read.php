<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Titipan Simkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Simkesan</td><td><?php echo $sik_kode; ?></td></tr>
	    <tr><td>Tanggal Titip</td><td><?php echo $tts_tgltitip; ?></td></tr>
	    <tr><td>Jumlah Titip</td><td><?php echo $tts_jmltitip; ?></td></tr>
	    <tr><td>Jumlah Ambil</td><td><?php echo $tts_jmlambil; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $tts_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('titipansimkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>