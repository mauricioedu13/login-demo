<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h4><?php echo $titulo; ?></h4>
		<?php echo validation_errors(); ?>
		<div id="container">
			<form action="<?= base_url('datos/registrar') ?>" id="datos" name="datos" method="POST">
				<label for="correo">Correo</label>
				<input id="correo" type="text" name="correo">
				<label for="password">Password</label>
				<input id="password" type="password" name="password">
				<label for="nombre">Nombre</label>
				<input id="nombre" type="text" name="nombre">
				<label for="telefono">Telefono</label>
				<input id="telefono" type="text" name="telefono">
				<input type="submit" value="Enviar">
			</form>
		</div>


	</body>
</html>