
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>pinjaman" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <input type="hidden" name="p" value="4">
                <div class="col-md-2"><h3>Filter : </h3></div>
                <div class="col-md-3">
                <select class="form-control col-md-3" name="s">
                    <option value="all">Semua Status</option>
                    <?php
                        foreach ($this->statusPinjaman as $key => $value) { ?>
                            <option value="<?= $key?>"><?= $value?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="k">
                    <option value="all">Marketing</option>
                    <?php
                        foreach ($karyawan_data as $value) { ?>
                            <option value="<?= $value->kar_kode?>"><?= $value->kar_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
                </div>
                <div class="col-md-2"><h3>Tanggal : </h3></div>
                
                <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
            </div>
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="u" value="all" placeholder="No Pinjaman">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>pinjaman/?p=4" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>

        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        		<th class="text-center">Pinjaman</th>
        		<th class="text-center">Nama Anggota</th>
        		<th class="text-center">Angsuran (bulan)</th>
        		<th class="text-center">Wilayah</th>
        		<th class="text-center">Pengajuan</th>
        		<th class="text-center">Survey</th>
        		<th class="text-center">Pinjaman</th>
        		<th class="text-center">Tanggal Pengajuan</th>
        		<th class="text-center">Tanggal Pencairan</th>
        		<th class="text-center">Tanggal Pelunasan</th>
        		<th class="text-center">Status Pinjaman</th>
        		<th class="text-center">Edit Pinjaman</th>
        		<th class="text-center">Action Pinjaman</th>
            </tr>
            </thead>
            <tbody><?php
            $total = 0 ;
            foreach ($datapinjaman as $key=>$item)
            {
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $item['ang_no']))->row();
                $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $item['sea_id']))->row();
                $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $item['bup_id']))->row();
                $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $item['pop_id']))->row();
                $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $item['skp_id']))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item['wil_kode']))->row();
                $total += $item['pin_pinjaman'];
                ?>
                <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $item['pin_id'] ?></td>
    			<td><?php echo $item['nama_ang_no'] ?></td>
    			<td><?php echo $item['sea_id']," Bulan" ?></td>
    			<td><?php echo $item['wil_kode'] ?></td>
    			<td><?php echo rupiah($item['pin_pengajuan']) ?></td>
                <td>
                <a href="javascript:;"  class="mask tt"  photoss="<?php echo $item['pin_survey'] ;?>" >
                <img src="<?php echo $item['pin_survey'] ?>" alt="" class="img-responsive">
            </a>
                </td>
    			<td><?php echo rupiah($item['pin_pinjaman']) ?></td>
    			<td><?php echo dateFormataja($item['pin_tglpengajuan']); ?></td>
    			<td><?php echo dateFormataja($item['pin_tglpencairan']); ?></td>
    			<td><?php echo $item['pin_tglpelunasan']; ?></td>
    			<td><?php echo $item['pin_statuspinjaman'] ?></td>
    			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pinjaman/read/'.$item['pin_id']),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('pinjaman/update/'.$item['pin_id']),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('pinjaman/delete/'.$item['pin_id']),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
                </td>
                <td style="text-align:center" width="200px">
                <?php
                if ($item['pin_statusid'] < 1) {
				echo anchor(site_url('pinjaman/survey?q='.$item['pin_id']),'Survey','class="text-navy"'); 
				echo ' | '; 
                echo anchor(site_url('pinjaman/persetujuan?q='.$item['pin_id']),'Persetujuan','class="text-navy"');
                } else {
                    echo 'Telah Disetujui';
                }?>
			    </td>
		</tr>
                
                <?php
            }
            ?>
            <tr class="danger"><td></td><td>Total Pinjaman</td><td></td><td></td><td></td><td></td><td></td><td><?php echo rupiah($total) ?></td></tr>
            
            </tbody>
        </table>
        <div id="tallModal" class="modal modal-wide fade">
    <div class="modal-dialog">
         <h4 id='namaaplikasi'> survey</h4>
             <div id="photoss">

                </div>
  </div>
        
        
  <script type="text/javascript">

        $(document).ready(function(){

        $(document).on("click",".tt",function(){

            var ss  =    $(this).attr("photoss");


            $('#photoss').html('<img src="'+ss+'" class="img-responsive">');


            $("#tallModal").modal("show");

        });
        });   
    </script> 
            