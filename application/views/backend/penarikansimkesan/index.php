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
                    <h2><b>Penarikan</b></h2>
                </div>
                <div class="ibox-content">
        			<div class="row" style="margin-bottom: 10px">
        				<ul class="nav nav-tabs">
						  <li role="presentation" class="<?= ($active==1)?'active':''?>"><a href="<?=base_url()?>penarikansimkesan/?p=1">Jangka 5th</a></li>
						  <li role="presentation" class="<?= ($active==2)?'active':''?>"><a href="<?=base_url()?>penarikansimkesan/?p=2">Jangka 10th</a></li>
						  <li role="presentation" class="<?= ($active==3)?'active':''?>"><a href="<?=base_url()?>penarikansimkesan/?p=3">List Penarikan</a></li>
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