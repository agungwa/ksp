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
                    <h2><b>Investasi Berjangka</b></h2>
                </div>
                <div class="ibox-content">
        			<div class="row" style="margin-bottom: 10px">
        				<ul class="nav nav-tabs">
                        <li role="presentation" class="<?= ($active==1)?'active':''?>"><a href="<?=base_url()?>investasiberjangka/?p=1">Pendaftaran</a></li>
                        <li role="presentation" class="<?= ($active==4)?'active':''?>"><a href="<?=base_url()?>investasiberjangka/?p=4">Tutup </a></li>
                        <li role="presentation" class="<?= ($active==2)?'active':''?>"><a href="<?=base_url()?>investasiberjangka/?p=2">L. Investasi</a></li>
                        <li role="presentation" class="<?= ($active==3)?'active':''?>"><a href="<?=base_url()?>investasiberjangka/?p=3">Jatuh Tempo</a></li>
                        <li role="presentation" class="<?= ($active==5)?'active':''?>"><a href="<?=base_url()?>investasiberjangka/?p=5">L. Jasa (Sub)</a></li>
						<li role="presentation" class="<?= ($active==6)?'active':''?>"><a href="<?=base_url()?>investasiberjangka/?p=6">L. Jasa</a></li>
						<li role="presentation" class="<?= ($active==7)?'active':''?>"><a href="<?=base_url()?>investasiberjangka/?p=7">L. Penarikan</a></li>
						<li role="presentation" class="<?= ($active==8)?'active':''?>"><a href="<?=base_url()?>investasiberjangka/?p=8">L. Tutup</a></li>
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