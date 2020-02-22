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
                    <h2><b>Anggota</b></h2>
                </div>
                <div class="ibox-content">
        			<div class="row" style="margin-bottom: 10px">
        				<ul class="nav nav-tabs">
                        <li role="presentation" class="<?= ($active==1)?'active':''?>"><a href="<?=base_url()?>mutasisimkesan/?p=1">Mutasi</a></li>
                        <li role="presentation" class="<?= ($active==2)?'active':''?>"><a href="<?=base_url()?>mutasisimkesan/?p=2">List Mutasi</a></li>
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