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
                    <h2><b>Penarikan Jasa Investasi Berjangka</b></h2>
                </div>
                <div class="ibox-content">
        			<div class="row" style="margin-bottom: 10px">
        				<ul class="nav nav-tabs">
                        <li role="presentation" class="<?= ($active==1)?'active':''?>"><a href="<?=base_url()?>penarikaninvestasiberjangka/?p=1">Penarikan didepan</a></li>
                        <li role="presentation" class="<?= ($active==2)?'active':''?>"><a href="<?=base_url()?>penarikaninvestasiberjangka/?p=2">Penarikan perbulan</a></li>
                        <li role="presentation" class="<?= ($active==3)?'active':''?>"><a href="<?=base_url()?>penarikaninvestasiberjangka/?p=3">Penarikan dibelakang</a></li>
                        <li role="presentation" class="<?= ($active==4)?'active':''?>"><a href="<?=base_url()?>penarikaninvestasiberjangka/?p=4">List Penarikan</a></li>
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