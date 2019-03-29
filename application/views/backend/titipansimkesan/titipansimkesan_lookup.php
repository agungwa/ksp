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
                    <h2><b>List Titipansimkesan</b></h2>
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
                <form action="<?php echo site_url('titipansimkesan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>titipansimkesan/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Sik Id</th>
		<th class="text-center">Tts Tgltitip</th>
		<th class="text-center">Tts Jmltitip</th>
		<th class="text-center">Tts Jmlambil</th>
		<th class="text-center">Tts Status</th>
		<th class="text-center">Tts Tgl</th>
		<th class="text-center">Tts Flag</th>
		<th class="text-center">Tts Info</th></tr>
            </thead>
			<tbody><?php
            foreach ($titipansimkesan_data as $titipansimkesan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $titipansimkesan->sik_id ?></td>
			<td><?php echo $titipansimkesan->tts_tgltitip ?></td>
			<td><?php echo $titipansimkesan->tts_jmltitip ?></td>
			<td><?php echo $titipansimkesan->tts_jmlambil ?></td>
			<td><?php echo $titipansimkesan->tts_status ?></td>
			<td><?php echo $titipansimkesan->tts_tgl ?></td>
			<td><?php echo $titipansimkesan->tts_flag ?></td>
			<td><?php echo $titipansimkesan->tts_info ?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>