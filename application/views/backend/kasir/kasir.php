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
                    <h2><b>Kasir</b></h2>
                </div>
                <div class="ibox-content">
        			<div class="row" style="margin-bottom: 10px">
        				<ul class="nav nav-tabs">
                        <li role="presentation" class="<?= ($active==1)?'active':''?>"><a href="<?=base_url()?>Lainlain/setupinput/?active=6">Input Lain-lain</a></li>
                        <li role="presentation" class="<?= ($active==2)?'active':''?>"><a href="<?=base_url()?>kasbon">Input Kasbon</a></li>
                        <li role="presentation" class="<?= ($active==3)?'active':''?>"><a href="<?=base_url()?>tunai_kasir/input_tunai">Input Tunai</a></li>
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