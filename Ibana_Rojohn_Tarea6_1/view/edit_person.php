<?php
$id = $nombre = $nif = "";

if (isset($dataToView["data"]["id"])) {
	$id = $dataToView["data"]["id"];
}

if (isset($dataToView["data"]["nombre"])) {
	$nombre = $dataToView["data"]["nombre"];
}

if (isset($dataToView["data"]["nif"])) {
	$nif = $dataToView["data"]["nif"];
}

?>
<div class="row">
	<?php
	if (isset($_GET["response"]) and $_GET["response"] === true) {
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="index.php?controller=person&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="index.php?controller=person&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" />
		</div>
		<div class="form-group mb-2">
			<label for="nif">NIF</label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="nif"><?php echo $nif; ?></textarea>
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="index.php?controller=person&action=list">Cancelar</a>
	</form>
</div>
