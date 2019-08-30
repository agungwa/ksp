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
                    <h2><b>List Phu simkesan pendapatan</b></h2>
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
                <form action="<?php echo site_url('phusimkesanpendapatan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>phusimkesanpendapatan/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Phsp Klaim</th>
		<th class="text-center">Phsp Tarik</th>
		<th class="text-center">Phsp Gugur</th>
		<th class="text-center">Phsp Administrasi</th>
		<th class="text-center">Phsp Lainlain</th>
		<th class="text-center">Phsp Tgl</th></tr>
            </thead>
			<tbody><?php
            foreach ($phusimkesanpendapatan_data as $phusimkesanpendapatan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $phusimkesanpendapatan->phsp_klaim ?></td>
			<td><?php echo $phusimkesanpendapatan->phsp_tarik ?></td>
			<td><?php echo $phusimkesanpendapatan->phsp_gugur ?></td>
			<td><?php echo $phusimkesanpendapatan->phsp_administrasi ?></td>
			<td><?php echo $phusimkesanpendapatan->phsp_lainlain ?></td>
			<td><?php echo $phusimkesanpendapatan->phsp_tgl ?></td>
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