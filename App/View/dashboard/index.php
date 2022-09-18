<?php include ext('layoutdash.head') ?>
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Blank Page</h1>

		<div class="row">
			<div class="col-12">
				<div class="p-2 mb-2">
					<a href="<?= route('dashboard.create') ?>" class="btn btn-outline-dark btn-sm">Crear producto</a>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Registro</th>
							<th scope="col">Producto</th>
							<th scope="col">Descripción</th>
							<th scope="col">Precio</th>
							<th scope="col">F. creación</th>
							<th scope="col">F. actualización</th>
							<th scope="col">Editar</th>
							<th scope="col">Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($product as $prod) : ?>
							<tr>
								<th scope="row"><?= $prod->id ?></th>
								<td><?= $prod->name ?></td>
								<td><?= $prod->producto ?></td>
								<td><?= $prod->descripcion ?></td>
								<td><?= $prod->precio ?></td>
								<td><?= $prod->created_at ?></td>
								<td><?= $prod->updated_at ?></td>
								<td><a href="<?= route('dashboard.edit') . '?id=' . $prod->id ?>" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"></i></a></td>
								<td><a href=<?= route('dashboard.destroy') . '?id=' . $prod->id ?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</main>
<?php include ext('layoutdash.footer') ?>