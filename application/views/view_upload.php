<html>
<head>
	<title>Create Upload with Code igniter</title>
</head>
<body>
	<center><h1>Create Upload with Code igniter</h1></center>
	<?php echo $error; ?>

	<?php echo form_open_multipart('crud/upload_action') //load for controller and method 
	//this is same like <form action="" enctype="multipart/form-data>
	//and the config for multipart/form-data set in Controller->upload_action()
	?>
		<input type="file" name="file_berkas">

		<br><br>

		<input type="submit" value="upload">
		<input type="button" onClick="javascript: history.back()" value="Back">		
	</form>

	<?php 
	if(empty($images)){ ?>
		<p>There is no image in gallery</p>
	<?php 
	}else{
		foreach($images as $image){ ?>
			<a href="<?php echo $image['url']; ?>">
				<img src="<?php echo $image['url']; ?>" width="300" height="300">
			</a>
		<?php 
		} 
	} ?>

</body>
</html>