<html>
<head>
	<title>Create Upload with Code Igniter</title>
</head>
<body>
	<center><h1>Create Upload with Code Igniter</h1></center>

	<img src="<?php echo base_url().'upload_image/'.$upload_data['file_name'] ?>">
	<ul>
		<?php foreach ($upload_data as $item => $value){ ?>
			<li><?php echo $item; ?>:  <?php echo $value ?></li>
		<?php } ?>
	</ul>
	<input type="button" onClick="javascript: location.href = '<?php echo base_url(); ?>' " value="Back to Index">
	<input type="button" onClick="javascript: location.href = '<?php echo base_url()."crud/upload"; ?>' " value="Back to Upload">

</body>
</html>