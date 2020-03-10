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
                        <li role="presentation" class="<?= ($active==8)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=8">Setup Simpanan</a></li>
                        <li role="presentation" class="<?= ($active==5)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=5">Setoran Simpanan</a></li>
                        <li role="presentation" class="<?= ($active==4)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=4">Tarik Simpanan</a></li>
						  <!--<li role="presentation"><a href="<?=base_url()?>penarikansimpananwajib/create">Tarik Simpanan Wajib</a></li>-->
						  <li role="presentation" class="<?= ($active==3)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=3">List Simpanan</a></li>
						  <li role="presentation" class="<?= ($active==6)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=6">List Setoran Simpanan</a></li>
						  <li role="presentation" class="<?= ($active==9)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=9">List Penarikan</a></li>
						  <li role="presentation" class="<?= ($active==10)?'active':''?>"><a href="<?=base_url()?>simpanan/?p=10">List Simpanan Pokok</a></li>
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