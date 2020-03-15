<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                    <h2><b>List Setoran Simpanan</b></h2>
                </div>
        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>simpanan/listsetoran" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <div class="col-md-3"><h4>Rentang Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>
                <select class="form-control col-md-3"  name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>

            </div>
            
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <span class="input-group-btn">
                                    <a href="<?php echo base_url()?>printsimpanan/printlistsetoran?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>" class="btn btn-default">Print</a>
                        </span>
                            <button class="btn btn-primary" type="submit">Tampilkan</button>
                    </div>
            </div>
            </form>
        </div>
        <table class="data table table-sm table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
				<th>Rekening Simpanan</th>
				<th>Nama Anggota</th>
				<th>Tanggal Setor</th>
				<th>Jumlah Setor</th>
				<th>Aksi</th>
            </tr>
            </thead>
            <tbody><?php
            $total = 0;
            $no = 1;
            foreach ($setoransimpanan as $item)
            {
                $total +=$item->ssi_jmlsetor;
                $sim_kode = $this->db->get_where('simpanan', array('sim_kode' => $item->sim_kode))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $sim_kode->ang_no))->row();
                ?>
                <tr>
					<td width="80px"><?php echo $no ?></td>
					<td><?php echo $item->sim_kode ?></td>
					<td><?php echo $ang_no->ang_nama ?></td>
					<td><?php echo $item->ssi_tglsetor ?></td>
					<td><?php echo rupiahsimpanan($item->ssi_jmlsetor) ?></td>
					<?php if(is_allow('M_EDIT')): ?>
					<td style="text-align:center" width="200px">
						<?php 
						echo anchor(site_url('setoransimpanan/update/'.$item->ssi_id),'Update','class="text-navy"'); 
					 ?>
					</td> 
					<?php endif;  ?>
				</tr>
                
                <?php
                $no++;
            }
            
            ?>
            
            </tbody>
        </table>
		
		<table class="table table-bordered table-hover table-condensed">
			<tr class="danger"><td width="660px">Total Setor</td><td><?php echo rupiahsimpanan($total) ?></td></tr>
		</table>
        <div class="row">
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>