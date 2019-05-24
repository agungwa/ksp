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
                    <h2><b>Pelunasan</b></h2>
                </div>
                <div class="ibox-content">
        			<div class="row" style="margin-bottom: 10px">
        				<ul class="nav nav-tabs">
						  <li role="presentation" class="<?= ($active==1)?'active':''?>"><a href="<?=base_url()?>pelunasan/?p=1">Dipercepat</a></li>
						  <li role="presentation" class="<?= ($active==2)?'active':''?>"><a href="<?=base_url()?>pelunasan/?p=2">Biasa</a></li>
						  <li role="presentation" class="<?= ($active==3)?'active':''?>"><a href="<?=base_url()?>pelunasan/?p=3">Saldo Macet</a></li>
						  <li role="presentation" class="<?= ($active==4)?'active':''?>"><a href="<?=base_url()?>pelunasan/?p=4">List Pelunasan</a></li>
						</ul>
						<div class="clearfix"></div>
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