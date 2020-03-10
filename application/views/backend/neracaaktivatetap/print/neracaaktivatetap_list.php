<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; }
 	h2{text-align: center}
 	h3{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style>
                    <h2><b>Aktiva Tetap</b></h2>
                    <h3><b>KSP Sido Mukti Makmur</b></h3>
                    
        <table>
            <thead>
            <tr>
                <th>No</th>
		<th>Tanah</th>
		<th>Bangunan</th>
		<th>Elektronik</th>
		<th>Kendaraan</th>
		<th>Peralatan</th>
		<th>Akumulasipenyusutan</th>
		<th>Keterangan</th>
		<th>Tanggal</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($neracaaktivatetap_data as $neracaaktivatetap)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo neraca($neracaaktivatetap->nat_tanah) ?></td>
			<td><?php echo neraca($neracaaktivatetap->nat_bangunan) ?></td>
			<td><?php echo neraca($neracaaktivatetap->nat_elektronik) ?></td>
			<td><?php echo neraca($neracaaktivatetap->nat_kendaraan) ?></td>
			<td><?php echo neraca($neracaaktivatetap->nat_peralatan) ?></td>
			<td><?php echo neraca($neracaaktivatetap->nat_akumulasipenyusutan) ?></td>
			<td><?php echo $neracaaktivatetap->nat_keterangan ?></td>
			<td><?php echo dateFormataja($neracaaktivatetap->nat_tanggal) ?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>