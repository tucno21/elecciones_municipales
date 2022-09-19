<?php include ext('layoutDash.head') ?>
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Panel de Usuarios</h1>

		<div class="row">
			<div class="card">
				<div class="card-header">
					<?php if (session()->user()->rango == 'Administrador') : ?>
						<a class="mt-1 btn btn-primary" href="<?= route('students.create') ?>">Agregar Estudiante</a>
					<?php endif; ?>

					<a href="/estudiantes/reporte" class="mt-1 btn btn-success">
						<i class="bi bi-arrow-down-square"></i>
						<i class="bi bi-file-earmark-excel"></i>
						Descargar Participación
					</a>

					<?php if (session()->user()->rango == 'Administrador') : ?>
						<a href="/estudiantes/modelo" class="mt-1 btn btn-success">
							<i class="bi bi-arrow-down-square"></i>
							<i class="bi bi-file-earmark-excel"></i>
							Descargar Modelo
						</a>
						<a href="/estudiantes/subirdatos" class="mt-1 btn btn-success">
							<i class="bi bi-arrow-up-square"></i>
							<i class="bi bi-file-earmark-excel"></i>
							Subir Estudiantes
						</a>
					<?php endif; ?>
				</div>

				<div class="card-body">
					<!-- <table class="table table-bordered table-striped dtr-inline dt-responsive tablaDataTable"> -->
					<table id="datatables-reponsive" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th style="width: 10px;">N°</th>
								<th>Nombre</th>
								<th>DNI</th>
								<th>Aula</th>
								<th>Voto</th>
								<th>Fecha y hora Voto</th>
								<?php if (session()->user()->rango == 'Administrador') : ?>
									<th>Aciones</th>
								<?php endif; ?>
							</tr>
						</thead>

						<tbody>
							<?php
							$fila = 1;
							foreach ($estudiantes as $estudiante) : ?>
								<tr>
									<td><?php echo $fila; ?></td>
									<td><?php echo $estudiante->name; ?></td>
									<td><?php echo $estudiante->dni; ?></td>
									<td><?php echo $estudiante->aula; ?></td>

									<?php if ($estudiante->candidatoId > 0) { ?>
										<td>
											<p class="pt-0 pb-0 btn btn-primary">si</p>
										</td>
									<?php } else { ?>
										<td>
											<p class="pt-0 pb-0 btn btn-danger">no</p>
										</td>
									<?php }; ?>

									<td><?php echo $estudiante->date_access; ?></td>
									<?php if (session()->user()->rango == 'Administrador') : ?>
										<td>
											<div class="btn-group">
												<a class="btn btn-warning" href="<?= route('students.edit') . '?id=' . $estudiante->id ?>">
													<i class="bi bi-pencil-square"></i>
												</a>

												<a class="btn btn-danger avisoAlertaxx" href="<?= route('students.destroy') . '?id=' . $estudiante->id ?>">
													<i class="bi bi-trash-fill"></i>
												</a>

											</div>
										</td>
									<?php endif; ?>
								</tr>
							<?php
								$fila++;
							endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>

	</div>
</main>
<?php include ext('layoutDash.footer') ?>