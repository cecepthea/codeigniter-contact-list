<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Daftar Kontak</title>
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
		p.success {color: green;}
	</style>
</head>
<body>
	<h1>Daftar Kontak</h1>
	<div style="margin-bottom: 5px;">		
		<?php echo form_open( current_url() ) ?>
		<?php echo form_dropdown("category_id", $options, $selected, "onchange='this.form.submit()'") ?>
		<?php echo form_close() ?>
		
		&nbsp;
		<?php echo anchor("contact/add", "Tambah")?>
	</div>
	<?php
		$message = $this->session->flashdata("message");
		echo ($message) ? "<p class='success'>{$message}</p>" : "";		
	?>
	<table width="100%">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telpon</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</tr>

		<?php 
		$no = $offset;
		// Memastikan jika data tidak kosong
		if ($data['query']->num_rows() > 0) {
			foreach ($data['query']->result() as $row) {
				?>
			
		<tr>
			<td><?php echo ++$no; ?></td>
			<td><?php echo $row->name ?></td>
			<td><?php echo $row->email ?></td>
			<td><?php echo $row->phone ?></td>
			<td><?php echo $row->address ?></td>
			<td>
				<?php echo anchor("contact/edit/{$row->contact_id}", "Edit")?> |
				<?php echo anchor("contact/delete/{$row->contact_id}", 
									"Delete", array("onclick" => "javascript:return confirm('Anda yakin akan menghapus data ini ?')"))
				?> 
			</td>
		</tr>
	
				<?php
			}
		} 
		// jika data masih kosong, tampilkan pesan
		else {
			echo "<tr><td colspan='6' align='center'>Data masih kosong !</td></tr>";
		}
		?>	
	</table>	
	<br />
	<?php echo $this->pagination->create_links() ?>
</body>
</html>
