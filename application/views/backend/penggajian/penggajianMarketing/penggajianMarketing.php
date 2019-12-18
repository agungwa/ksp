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
                    <h2><b>Penggajian Marketing</b></h2>
                </div>
                <div class="ibox-content">
        			<div class="row" style="margin-bottom: 10px">
        				<ul class="nav nav-tabs">
							<li role="presentation" class="<?= ($active==1)?'active':''?>"><a href="<?=base_url()?>penggajianmarketing/?p=1">Simpanan</a></li>
							<!--<li role="presentation" class="<?= ($active==2)?'active':''?>"><a href="<?=base_url()?>penggajianmarketing/?p=2">Simkesan</a></li>
							<li role="presentation" class="<?= ($active==3)?'active':''?>"><a href="<?=base_url()?>penggajianmarketing/?p=3">Investasi Berjangka</a></li>
							<li role="presentation" class="<?= ($active==4)?'active':''?>"><a href="<?=base_url()?>penggajianmarketing/?p=4">Pinjaman</a></li>
						--></ul>
						
            			<?php
            				include($item);
            			?>
						
        			</div>

        		</div>
    		</div>
    	</div>
    </div>
    </body>
</html>