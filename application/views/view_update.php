<html>
<head>
	<title>Create CRUD with Code Igniter</title>
</head>
<body>
	<center>
		<h1>Create CRUD with Code Igniter</h1>
		<h3>Update Data</h3>
	</center>

	<?php foreach ($user as $u) { ?>
	<form action="<?php echo base_url().'crud/update_action'; ?>" method="post">
		<table style="margin: 20px auto;">
			<tr>
				<td>Name</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $u->id; ?>">
					<input type="text" name="name" value="<?php echo $u->nama; ?>">
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td>
					<input type="text" name="address" value="<?php echo $u->alamat; ?>">
				</td>
			</tr>
			<tr>
				<td>Jobs</td>
				<td>
					<input type="text" name="jobs" value="<?php echo $u->pekerjaan ?>">
				</td>
			</tr>
			<tr>				
				<td>
					<input type="submit" value="Update">
				</td>
				<td>
					<input type="button" value="Cancel" onClick="javascript: history.back()">
				</td>
			</tr>
		</table>
	</form>
	
	<?php
	} ?>
</body>
</html>