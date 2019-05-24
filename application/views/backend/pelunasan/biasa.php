
    <div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('pelunasan/'); ?>" class="form-inline" method="get">
            <input type="hidden" name="p" value="2">
            <div class="col-md-4 text-left">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No Pinjaman">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pelunasan/?p=2'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>

	    <div class="row" style="margin-top: 10px">
	        	<?php 
	        	if ($pinjaman != null) {
	        	?>
	        	<table class="table">
				    <tr><td></td><td><a href="<?php echo site_url('pelunasan/?p=2') ?>" class="btn btn-default">Batal</a></td></tr>
				</table>
	        	<?php
	        	} ?>
	    </div>
        </div>
        </div>
    </div>
</div>
</div>