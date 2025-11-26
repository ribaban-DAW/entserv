<div class="row">
	<form class="form" action="index.php?controller=person&action=delete" method="POST">
		<input type="hidden" name="id" value="<?php echo $dataToView["data"]["id"]; ?>" />
		<div class="alert alert-warning">
			<strong>¿Confirma que desea eliminar esta persona?:</strong>
			<em><?php echo $dataToView["data"]["nombre"]; ?></em>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="index.php?controller=person&action=list">Cancelar</a>
	</form>
</div>
