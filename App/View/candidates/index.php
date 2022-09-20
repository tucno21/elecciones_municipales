<?php include ext('layoutDash.head') ?>
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Panel de Candidatos</h1>

		<div class="row">
			<div class="card">
				<div class="card-header">
					<?php if (session()->user()->rango == 'Administrador') : ?>
						<a class="btn btn-primary" href="<?= route('candidates.create') ?>">Agregar Candidato</a>
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
								<th>Foto</th>
								<th>Logo</th>
								<th>Nombre del Grupo</th>
								<th>Estado</th>
								<?php if (session()->user()->rango == 'Administrador') : ?>
									<th>Aciones</th>
								<?php endif; ?>
							</tr>
						</thead>

						<tbody>
							<?php
							$fila = 1;
							foreach ($candidates as $candidato) : ?>
								<tr>
									<td><?php echo $fila; ?></td>
									<td><?php echo $candidato->name; ?></td>
									<td><?php echo $candidato->dni; ?></td>

									<?php if ($candidato->photo == "") : ?>
										<td><img src="<?= base_url('/assets/img/user.png') ?>" alt="avatar" class="img-thumbnail" width="40px"></td>
									<?php else : ?>
										<td><img src="<?= base_url('/assets/img/' . $candidato->photo) ?>" alt="avatar" class="img-thumbnail" width="40px"></td>
									<?php endif; ?>

									<?php if ($candidato->logo == "") : ?>
										<td><img src="<?= base_url('/assets/img/logo.jpg') ?>" alt="avatar" class="img-thumbnail" width="40px"></td>
									<?php else : ?>
										<td><img src="<?= base_url('/assets/img/' . $candidato->logo) ?>" alt="avatar" class="img-thumbnail" width="40px"></td>
									<?php endif; ?>

									<td><?php echo $candidato->group_name; ?></td>

									<?php if ($candidato->estado != 0) : ?>
										<td>
											<p class="btn btn-success btn-xs">Activado</p>
										</td>
									<?php else : ?>
										<td>
											<p class="btn btn-danger btn-xs">Desactivado</p>
										</td>
									<?php endif; ?>

									<?php if (session()->user()->rango == 'Administrador') : ?>
										<td>
											<div class="btn-group">
												<a class="btn btn-warning" href="<?= route('candidates.edit') . '?id=' . $candidato->id ?>">
													<i class="bi bi-pencil-square"></i>
												</a>

												<a class="btn btn-danger avisoAlertaxx" href="<?= route('candidates.destroy') . '?id=' . $candidato->id ?>">
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