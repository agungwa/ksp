<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; }
 	h2{text-align: center}
 	h3{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
    tr#01{padding: 5px;background-color: #eb3131;}
    tr#02{padding: 5px;background-color: #536fee;}
 </style>
        <table>
            <thead class="thead-light">
            <tr>
                <th>No</th>
        		<th>Rekening Simkesan</th>
        		<th>Nama Anggota</th>
        		<th>Tanggal Setoran</th>
        		<th>Jumlah Setor</th>
            </tr>
            </thead>
            <tbody><?php
            $total = 0;
            foreach ($datasetoran as $key => $item)
            {
                $total += $item['ssk_jmlsetor'];
                ?>
                <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $item['sik_kode'] ?></td>
    			<td><?php echo $item['nama_anggota'] ?></td>
    			<td><?php echo $item['ssk_tglsetoran'] ?></td>
    			<td><?php echo neraca($item['ssk_jmlsetor']) ?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        <table>
            <tr id="02" ><td width="600px" >Total Setoran</td><td width="200px"><?php echo neraca($total) ?></td></tr>
        </table>
  