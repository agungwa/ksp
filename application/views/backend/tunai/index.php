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
                    <h2><b>Data KAS</b></h2>
                </div>
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <form action="<?php echo base_url()?>Tunai/" class="form-inline" method="get">
            <input class="hidden" type="text" name="p" required="required" value="4">
            <div class="col-md-8 text-right">
                <div class="col-md-3"><h4>Rentang Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>
            </div>
           
            
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <?php 
                                if ($f <> '' || $t <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>Tunai/?p=4" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                        </span>
                        <span class="input-group-btn">
                                    <!-- <a href="<?php echo base_url()?>printsimpanan/printsirkulasisimpanan?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>" class="btn btn-default">Print</a> -->
                        </span>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                       
                    </div>
            </div>
            </form>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <tr>
                <td class="text-left">KAS Lalu</td>
				<td class="text-center"><?= neraca($datakasirlalu);?></td>
            </tr>
            <tr>
                <td class="text-left">KAS Masuk</td>
				<td class="text-center"><?= neraca($datakasirmasuk);?></td>
            </tr>
            <tr>
                <td class="text-left">KAS Keluar</td>
				<td class="text-center"><?= neraca($datakasirkeluar);?></td>
            </tr>
            <tr>
                <td class="text-left">KAS Kini</td>
				<td class="text-center"><?= neraca($datakasirkini);?></td>
            </tr>
            </tbody>
        </table>
        <div class="row">
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>