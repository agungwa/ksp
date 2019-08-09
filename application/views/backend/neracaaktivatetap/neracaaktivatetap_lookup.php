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
                    <h2><b>Neraca Aktiva Tetap</b></h2>
                    <?php if ($this->session->userdata('message') != '') {?>
                    <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?=$this->session->userdata('message')?> <a class="alert-link" href="#"></a>
                    </div>
                 <?php }?>
                </div>
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-8">
               
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('neracaaktivatetap/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>neracaaktivatetap/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Tanah</th>
		<th class="text-center">Bangunan</th>
		<th class="text-center">Elektronik</th>
		<th class="text-center">Kendaraan</th>
		<th class="text-center">Peralatan</th>
		<th class="text-center">Akumulasipenyusutan</th>
		<th class="text-center">Tanggal</th></tr>
            </thead>
			<tbody><?php
            foreach ($neracaaktivatetap_data as $neracaaktivatetap)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $neracaaktivatetap->nat_tanah ?></td>
			<td><?php echo $neracaaktivatetap->nat_bangunan ?></td>
			<td><?php echo $neracaaktivatetap->nat_elektronik ?></td>
			<td><?php echo $neracaaktivatetap->nat_kendaraan ?></td>
			<td><?php echo $neracaaktivatetap->nat_peralatan ?></td>
			<td><?php echo $neracaaktivatetap->nat_akumulasipenyusutan ?></td>
			<td><?php echo $neracaaktivatetap->nat_tanggal ?></td>
		</tr>
                
                <?php
            }
            ?>
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