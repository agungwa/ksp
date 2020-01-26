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
            <thead>
            <tr>
                <th>No</th>
        		<th>Rekening Simkesan</th>
        		<th>Tanggal Setoran</th>
        		<th>Jatuh Tempo</th>
        		<th>Setor</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($datajatuh as $key => $item)
            {
                $tanggal = new DateTime($item['ssk_tglsetoran']); 
                $sekarang = new DateTime();
                $perbedaan = $tanggal->diff($sekarang);
                $selisih = $perbedaan->m+($interval->y * 12);
                if ($sekarang > $tanggal){
                    $jatuh = $selisih;
                } else {
                    $jatuh = $selisih * -1;
                }
                ?>
                <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $item['sik_kode'] ?></td>
    			<td><?php echo dateFormataja($item['ssk_tglsetoran']) ?></td>
    			<td><?php echo $jatuh?></td>
    			<td><?php echo neraca($item['ssk_jmlsetor']) ?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
      