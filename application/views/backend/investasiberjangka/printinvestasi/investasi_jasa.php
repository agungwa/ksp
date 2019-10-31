<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; }
 	tr#01{padding: 5px;text-align: center; }
 	h2{text-align: center}
 	h3{text-align: center}
    th{background-color: #95a5a6; padding: 10px;color: #fff}
    tr#01{background-color: #eb3131;}
    tr#02{background-color: #536fee;}
     
 </style>
 <h2><b>List Jasa Investasi</b></h2>
 <?php $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row(); ?>
 <h3><b>Bulan : <?php
 $bln=date("m");
 echo tampil_bulan($bln)?> </b></h3>
 <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">Wilayah : <?php if($w!='all'){echo $wil_kode->wil_nama;} else if ($w='all') {echo 'Semua Wilayah';}?></p>

        <table>
            <thead >
            <tr>
                <th >No</th>
        <th >Rekening Investasi</th>
		<th >Nama Anggota</th>
		<th >Alamat</th>
		<th >Jangka Waktu</th>
		<th >Bunga</th>
		<th >Jasa/bulan</th>
		<th >Investasi</th>
		<th >Tanggal Pendaftaran</th>
		<th >Tanggal Jatuh Tempo</th>
		<th >Status</th>
            </tr>
            </thead>
			<tbody><?php
            $total=$subtotal_thn=0;
             foreach ($datainvestasi as $key=>$item)
             { 
                $total += $item['ivb_jumlah']*$item['biv_id']/100;
                $subtotal_thn += $item['ivb_jumlah']*$item['biv_id']/100;
                 ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $item['ivb_kode'] ?></td>
			<td><?php echo $item['nama_ang_no'] ?></td>
			<td><?php echo $item['alamat_ang_no'] ?></td>
			<td><?php echo $item['jwi_id'] , " Bulan" ?></td>
			<td><?php echo $item['biv_id'] ," %" ?></td>
			<td><?php echo rupiahsimpanan($item['ivb_jumlah']*$item['biv_id']/100) ?></td>
			<td><?php echo rupiahsimpanan($item['ivb_jumlah']) ?></td>
			<td><?php echo dateFormataja($item['ivb_tglpendaftaran']) ?></td>
			<td><?php echo dateFormataja($item['jatuhtempo']) ?></td>
            <td><?php echo $item['ivb_status'] ?></td> 
            <?php
                    // SUB TOTAL per thn_byr
                            if (@$datainvestasi[$key+1]['jatuhtempo'] != $item['jatuhtempo']) {
                                echo '<tr id="02">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>SUB TOTAL ' . dateFormataja($item['jatuhtempo']) . '</td>
                                    <td class="right">'.rupiahsimpanan($subtotal_thn).'</td>
                                </tr>';
                                $subtotal_thn = 0;
                            } 
                            $total += $item['ivb_jumlah']*$item['biv_id']/100;
                        
                    ?>
		</tr>
                
                <?php
            }
            ?>
            <tr id="01">
            <td></td>
            <td>Total Jasa </td>
            <td></td><td></td><td></td><td></td>
            <td></td>
            <td><?php echo rupiahsimpanan($total) ?></td>
        </tr>
            </tbody>
        </table>
      