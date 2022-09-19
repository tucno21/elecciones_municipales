<?php include ext('layoutDash.head') ?>
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Fecha para las elecciones</h1>

		<div class="row">
			<div class="card">
				<div class="card-header">
					<?php if (session()->user()->rango == 'Administrador') : ?>
						<a class="mt-1 btn btn-primary" href="<?= route('votingdate.edit') ?>">Modificar Fecha</a>
					<?php endif; ?>
				</div>

				<div class="card-body">
					<table class="table table-bordered table-striped dtr-inline dt-responsive tablaDataTable">
						<thead>
							<tr>
								<th>fecha electoral</th>
								<th>hora de inicio</th>
								<th>fecha y de termino</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td><?= $fh->fecha; ?></td>
								<td><?= $fh->hora_inicio; ?></td>
								<td><?= $fh->hora_fin; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>

	</div>
</main>
<?php include ext('layoutDash.footer') ?>