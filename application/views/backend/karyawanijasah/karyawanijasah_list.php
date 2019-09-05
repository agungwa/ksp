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
                    <h2><b>List Karyawanijasah</b></h2>
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
                <form action="<?php echo site_url('karyawanijasah/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('karyawanijasah'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Karyawan Kode</th>
		<th class="text-center">Karyawan Nama</th>
		<th class="text-center">ijazah Sd</th>
		<th class="text-center">ijazah Smp</th>
		<th class="text-center">ijazah Sma</th>
		<th class="text-center">ijazah D3</th>
		<th class="text-center">ijazah S1</th>
		<th class="text-center">ijazah S2</th>
		<th class="text-center">ijazah S3</th>
		<th class="text-center">Lainlain</th>
		<th class="text-center">Status</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($karyawanijasah_data as $karyawanijasah)
            {
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $karyawanijasah->kar_kode))->row();

                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $karyawanijasah->kar_kode ?></td>
			<td><?php echo $kar_kode->kar_nama ?></td>
			<td><?php echo $karyawanijasah->kij_sd ?></td>
			<td><?php echo $karyawanijasah->kij_smp ?></td>
			<td><?php echo $karyawanijasah->kij_sma ?></td>
			<td><?php echo $karyawanijasah->kij_d3 ?></td>
			<td><?php echo $karyawanijasah->kij_s1 ?></td>
			<td><?php echo $karyawanijasah->kij_s2 ?></td>
			<td><?php echo $karyawanijasah->kij_s3 ?></td>
			<td><?php echo $karyawanijasah->kij_lainlain ?></td>
			<td><?php echo $this->statusIjasahkaryawan[$karyawanijasah->kij_status] ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('karyawanijasah/read/'.$karyawanijasah->kij_id),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('karyawanijasah/update/'.$karyawanijasah->kij_id),'Update','class="text-navy"'); 
                ?>
			</td>
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