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
                        <li role="presentation" class="<?= ($active==1)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=1">Simpanan A (9)</a></li>
                        <li role="presentation" class="<?= ($active==2)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=2">Simpanan B (12)</a></li>
                        <li role="presentation" class="<?= ($active==5)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=5">Setoran Simpanan</a></li>
                        <li role="presentation" class="<?= ($active==4)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=4">Tarik Simpanan</a></li>
						  <!--<li role="presentation"><a href="<?=base_url()?>penarikansimpananwajib/create">Tarik Simpanan Wajib</a></li>-->
						  <li role="presentation" class="<?= ($active==3)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=3">List Simpanan</a></li>
						  <li role="presentation" class="<?= ($active==6)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=6">List Setoran Simpanan</a></li>
						  <!--<li role="presentation" class="<?= ($active==7)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=7">Cari Simpanan</a></li>-->
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