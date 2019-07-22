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
                    <h2><b>Simkesan Data</b></h2>
                </div>
                <div class="ibox-content">
        			<div class="row" style="margin-bottom: 10px">
        				<ul class="nav nav-tabs">
						<li role="presentation" class="<?= ($active==1)?'active':''?>"><a href="<?=base_url()?>simkesandata/?p=1">Simkesan Lunas</a></li>
                        <li role="presentation" class="<?= ($active==2)?'active':''?>"><a href="<?=base_url()?>simkesandata/?p=2">Rekening Hangus</a></li>
						<li role="presentation" class="<?= ($active==3)?'active':''?>"><a href="<?=base_url()?>simkesandata/?p=3">Simkesan Masa Berakhir</a></li>
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