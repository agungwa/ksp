<h1>Print Anggota</h1>
<table border=1>
	<thead>
		<td>ang_nama</td>
		<td>ang_alamat</td>
		<td>ang_noktp</td>
		<td>ang_nokk</td>
	</thead>
	<?php foreach($anggota as $d){ ?>
	<tbody>
		<td><?= $d->ang_nama ?></td>
		<td><?= $d->ang_alamat ?></td>
		<td><?= $d->ang_noktp ?></td>
		<td><?= $d->ang_nokk ?></td>
	</tbody>
	<?php }?>
</table>



<a href="<?= base_url();?>PrintAnggota/printAnggota">print</a>