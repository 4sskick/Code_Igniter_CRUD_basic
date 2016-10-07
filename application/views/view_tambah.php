<html>
<head>
	<title>Create CRUD with Code Igniter</title>
</head>
<body>
	<center>
		<h1>Create CRUD with Code Igniter</h1>
		<h3>Add New Data</h3>
	</center>

	<form action="<?php echo base_url().'crud/add_action'; ?>" method="post">
		<table style="margin: 20px auto;">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address"></td>
			</tr>
			<tr>
				<td>Jobs</td>
				<td><input type="text" name="jobs"></td>
			</tr>
			<tr>				
				<td><input type="submit" value="Add"></td>
				<td><input type="button" value="Cancel" onClick="javascript: history.back()"></td>
			</tr>
		</table>
	</form>

</body>
</html>