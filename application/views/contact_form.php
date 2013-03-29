<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Tambah Kontak</title>
	<style>
		table {
			border-collapse: collapse;
		}
		table, th, td {
			border: 1px solid #000;
		}
		th, td {
			padding: 3px;
		}
		label, input, texarea {
			display: block;
		}
		p.error {			
			color: red;			
		}
	</style>
</head>
<body>
	<h1>Tambah Kontak</h1>
	<?php echo anchor("contact", "Kembali") ?> <br />
	
	<?php echo form_open( uri_string() );?>
	<label for="nama">Nama</label>
	<input type="text" name="name" id="nama" value="<?php echo set_value("name", @$found['name'])?>" />
	<?php echo form_error("name", "<p class='error'>", "</p>")?>
	
	<label for="email">Email</label>
	<input type="text" name="email" id="email" value="<?php echo set_value("email", @$found['email'])?>" />
	<?php echo form_error("email", "<p class='error'>", "</p>")?>
	
	<label for="phone">Telpon</label>
	<input type="text" name="phone" id="phone" value="<?php echo set_value("phone", @$found['phone'])?>" />
	
	<label for="address">Alamat</label>
	<textarea name="address" id="address" cols="20" rows="5"><?php echo set_value("address", @$found['address'])?></textarea>	
	
	<label for="category_id">Kategori</label>
	<?php $selected = (@$found['category_id']) ? @$found['category_id'] : $selected; ?>
	<?php echo form_dropdown("category_id", $options, $selected)?>
	<?php echo form_error("category_id", "<p class='error'>", "</p>")?>
	
	<input type="submit" value="Simpan" />
	<?php echo form_close() ?>
</body>
</html>
