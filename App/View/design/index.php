<?php include ext('layoutDash.head') ?>
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Modificar el Login</h1>

		<div class="row">
			<div class="card">
				<div class="card-header">
					<?php if (session()->user()->rango == 'Administrador') : ?>
						<a class="mt-1 btn btn-primary" href="<?= route('design.edit') ?>">Modificar</a>
					<?php endif; ?>
				</div>

				<div class="card-body">
					<table class="table table-bordered table-striped dtr-inline dt-responsive tablaDataTable">
						<thead>
							<tr>
								<th>Institucion Educativa</th>
								<th>Logo</th>
								<th>Color base</th>
								<th>Color suave</th>
								<th>Año de electoral</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td><?= $di->name_ie; ?></td>

								<?php if ($di->photo == "") : ?>
									<td><img src="<?= base_url('/assets/img/user.png') ?>" alt="avatar" class="img-thumbnail" width="40px"></td>
								<?php else : ?>
									<td><img src="<?= base_url('/assets/img/' . $di->photo) ?>" alt="avatar" class="img-thumbnail" width="40px"></td>
								<?php endif; ?>

								<td>
									<div style="background-color: <?= $di->color_b; ?>;"><?= $di->color_b; ?></div>
								</td>
								<td>
									<div style="background-color: <?= $di->color_s; ?>;"><?= $di->color_s; ?></div>
								</td>
								<td><?= $di->fecha; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>

	</div>
</main>
<?php include ext('layoutDash.footer') ?>