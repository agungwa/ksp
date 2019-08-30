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
                    <h2><b>Simpanan</b></h2>
                </div>
                <div class="ibox-content">
        			<div class="row" style="margin-bottom: 10px">
        				<ul class="nav nav-tabs">
                        <li role="presentation" class="<?= ($active==1)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=1">Investasi</a></li>
                        <li role="presentation" class="<?= ($active==2)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=2">Simpanan</a></li>
                        <li role="presentation" class="<?= ($active==3)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=3">Simkesan</a></li>
						</ul>
						
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