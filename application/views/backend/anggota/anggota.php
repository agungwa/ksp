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
                        <li role="presentation" class="<?= ($active==1)?'active':''?>"><a href="<?=base_url()?>anggota/?p=1">Pendaftaran</a></li>
                    <!--<li role="presentation" class="<?= ($active==3)?'active':''?>"><a href="<?=base_url()?>penarikansimpanan/?p=3">Tarik Simpanan Wajib</a></li>
						<li role="presentation"><a href="<?=base_url()?>penarikansimpananwajib/create">Tarik Simpanan Wajib</a></li>-->
						<li role="presentation" class="<?= ($active==2)?'active':''?>"><a href="<?=base_url()?>anggota/?p=2">List Anggota</a></li>
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