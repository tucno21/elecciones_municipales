<?php include ext('layoutDash.head') ?>
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Panel de Usuarios</h1>

		<div class="row">
			<div class="card">
				<div class="card-header">
					<a class="btn btn-primary" href="<?= route('users.create') ?>">Agregar Usuarios</a>
				</div>

				<div class="card-body">
					<!-- <table class="table table-bordered table-striped dtr-inline dt-responsive tablaDataTable"> -->
					<table id="datatables-reponsive" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th style="width: 10px;">N°</th>
								<th>Nombre</th>
								<th>Email</th>
								<th>Foto</th>
								<th>Perfil</th>
								<th>Estado</th>
								<th>Ultimo Login</th>
								<th>Aciones</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$fila = 1;
							foreach ($users as $user) : ?>
								<tr>
									<td><?php echo $fila; ?></td>
									<td><?php echo $user->name; ?></td>
									<td><?php echo $user->email; ?></td>

									<?php if ($user->photo == "") : ?>
										<td><img src="<?= base_url('/assets/img/user.png') ?>" alt="avatar" class="img-thumbnail" width="40px"></td>
									<?php else : ?>
										<td><img src="<?= base_url('/assets/img/' . $user->photo) ?>" alt="avatar" class="img-thumbnail" width="40px"></td>
									<?php endif; ?>

									<td><?php echo $user->rango; ?></td>
									<?php if ($user->estado != 0) : ?>
										<td>
											<p class="btn btn-success btn-xs">Activado</p>
										</td>
									<?php else : ?>
										<td>
											<p class="btn btn-danger btn-xs">Desactivado</p>
										</td>
									<?php endif; ?>

									<td><?php echo $user->date_access; ?></td>
									<td>
										<div class="btn-group">
											<a class="btn btn-warning" href="<?= route('users.edit') . '?id=' . $user->id ?>">
												<i class="bi bi-pencil-square"></i>
											</a>

											<a class="btn btn-danger avisoAlertaxx" href="<?= route('users.destroy') . '?id=' . $user->id ?>">
												<i class="bi bi-trash-fill"></i>
											</a>

										</div>
									</td>
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