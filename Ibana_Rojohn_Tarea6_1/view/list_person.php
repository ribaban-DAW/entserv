<div class="row">
	<div class="col-md-12 text-right">
		<a href="index.php?controller=person&action=create" class="btn btn-outline-primary">Crear persona</a>
		<hr/>
	</div>
	<?php
	if (count($dataToView["data"]) > 0) {
		foreach ($dataToView["data"] as $person) {
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
					<h5 class="card-title"><?php echo $person['nombre']; ?></h5>
					<div class="card-text"><?php echo $person['nif']; ?></div>
					<hr class="mt-1"/>
					<a href="index.php?controller=person&action=edit&id=<?php echo $person['id']; ?>" class="btn btn-primary">Editar</a>
					<a href="index.php?controller=person&action=confirmDelete&id=<?php echo $person['id']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	} else {
		?>
		<div class="alert alert-info">
			Actualmente no existen personas.
		</div>
		<?php
	}
	?>
</div>
