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
                    <h2><b>List Simpanan</b></h2>
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
                <form action="<?php echo site_url('simpanan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>simpanan/lookup')" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Kode Simpanan</th>
		<th class="text-center">Kode Anggota</th>
		<th class="text-center">Nama Anggota</th>
		<th class="text-center">Karyawan</th>
		<th class="text-center">Bunga (dalam %)</th>
		<th class="text-center">Jenis Simpanan</th>
		<th class="text-center">Jenis Setoran</th>
		<th class="text-center">Wilayah</th>
		<th class="text-center">Tanggal Pendaftaran</th>
		<th class="text-center">Status</th>
            </thead>
			<tbody><?php
            foreach ($simpanan_data as $simpanan)
            {
                $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $simpanan->jsi_id))->row();
                $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $simpanan->jse_id))->row();
                $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $simpanan->bus_id))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $simpanan->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $simpanan->kar_kode))->row();
                ?>
                <tr>
                <tr onclick="setVal('<?=$idhtml?>','<?=$simpanan->sim_kode?>','<?=$simpanan->sim_kode?>')" style="cursor: pointer;">
                <td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $simpanan->sim_kode ?></td>
			<td><?php echo $simpanan->ang_no ?></td>
			<td><?php echo $ang_no->ang_nama ?></td>
			<td><?php echo $kar_kode->kar_nama ?></td>
			<td><?php echo $bus_id->bus_bunga ?></td>
			<td><?php echo $jsi_id->jsi_simpanan ?></td>
			<td><?php echo $jse_id->jse_setoran ?></td>
			<td><?php echo $simpanan->wil_kode ?></td>
			<td><?php echo $simpanan->sim_tglpendaftaran ?></td>
			<td><?php echo $simpanan->sim_status ?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>