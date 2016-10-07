<html>
<head>
	<title>Create CRUD with Code Igniter</title>
</head>
<body>
	<center>
		<h1>Create CRUD with Code Igniter</h1>
	</center>
	<center><?php echo anchor('crud/add', 'Tambah Data'); //anchor(); used to create hyperlinks ?></center>
	<table style="margin: 20px auto; " border='1'>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Address</th>
			<th>Jobs</th>
			<th>Action</th>
		</tr>
		<?php
		$no = 1;
		foreach ($user as $u) { ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->alamat ?></td>
			<td><?php echo $u->pekerjaan ?></td>
			<td>
				<?php echo anchor('crud/update/'.$u->id, 'Edit'); ?>
				<?php echo anchor('crud/delete/'.$u->id, 'Delete'); ?>
			</td>
		</tr>
		<?php
		$no++;
		} ?>
	</table>

</body>
</html>