<?php include ext('layoutDash.head') ?>
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Resultados</h1>

		<div class="row">
			<!-- cant candidatos -->
			<div class="col-md-6 col-xxl-3 d-flex">
				<div class="card bg-primary bg-opacity-25  flex-fill">
					<div class="card-body">
						<div class="row">
							<div class="col mt-0">
								<h5 class="card-title">Cantidad de candidatos</h5>
							</div>

							<div class="col-auto">
								<div class="stat stat-xm fs-1">
									<i class="bi bi-people-fill"></i>
								</div>
							</div>
						</div>
						<span class="h1 d-inline-block mt-1 mb-3"><?= count((array)$candidatos); ?></span>
						<div class="mb-0">
							<span class="text-muted">
								<a href="<?= route('candidates.index') ?>">
									<i class="bi bi-arrow-right-circle-fill"></i>
									Candidatos
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
			<!-- cant estudiantes -->
			<div class="col-md-6 col-xxl-3 d-flex">
				<div class="card bg-success bg-opacity-25  flex-fill">
					<div class="card-body">
						<div class="row">
							<div class="col mt-0">
								<h5 class="card-title">Cantidad de estudiantes</h5>
							</div>

							<div class="col-auto">
								<div class="stat stat-xm fs-1">
									<i class="bi bi-mortarboard"></i>
								</div>
							</div>
						</div>
						<span class="h1 d-inline-block mt-1 mb-3"><?= count((array)$estudiantes); ?></span>
						<div class="mb-0">
							<span class="text-muted">
								<a href="<?= route('students.index') ?>">
									<i class="bi bi-arrow-right-circle-fill"></i>
									Estudiantes
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
			<!--  porcentaje de participacion -->
			<div class="col-md-6 col-xxl-3 d-flex">
				<div class="card bg-warning bg-opacity-25  flex-fill">
					<div class="card-body">
						<div class="row">
							<div class="col mt-0">
								<h5 class="card-title">Porcentaje de Participacion</h5>
							</div>

							<div class="col-auto">
								<div class="stat stat-xm fs-1">
									<i class="bi bi-pencil-square"></i>
								</div>
							</div>
						</div>
						<span class="h1 d-inline-block mt-1 mb-3"><?= $estudiantes != null ? round(count((array)$votos) / count((array)$estudiantes) * 100, 2) : ''; ?>%</span>
						<div class="mb-0">
							<span class="text-muted">
								<i class="bi bi-arrow-right-circle-fill"></i>
								...
							</span>
						</div>
					</div>
				</div>
			</div>
			<!-- cant que no votaron -->
			<div class="col-md-6 col-xxl-3 d-flex">
				<div class="card bg-danger bg-opacity-25  flex-fill">
					<div class="card-body">
						<div class="row">
							<div class="col mt-0">
								<h5 class="card-title">Cantidad No votaron</h5>
							</div>

							<div class="col-auto">
								<div class="stat stat-xm fs-1">
									<i class="bi bi-question-circle"></i>
								</div>
							</div>
						</div>
						<span class="h1 d-inline-block mt-1 mb-3"><?= (count((array)$estudiantes) - count((array)$votos)); ?></span>
						<div class="mb-0">
							<span class="text-muted">
								<i class="bi bi-arrow-right-circle-fill"></i>
								...
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="">
							<h5 class="card-title">Resultados Electorales</h5>
							<h6 class="card-subtitle text-muted">Diagrama de barras</h6>
						</div>
						<div class="">
							<a href="<?= route('dashboard.excel') ?>" class="btn btn-success">Reporte Excel</a>
						</div>
					</div>

					<div class="card-body">
						<div class="chart">
							<canvas id="chartjs-bar"></canvas>
						</div>
					</div>
					<div class="card-footer bg-success bg-opacity-50">
						<h5 class="card-title">Ganador: <?= $alcalde->name ?></h5>
						<p class="card-subtitle text-muted">Cantidad de votos: <?= $alcalde->cant ?></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="">
							<h5 class="card-title">Resultados Electorales</h5>
							<h6 class="card-subtitle text-muted">Gráfico circular</h6>
						</div>
						<div class="">
							<a href="<?= route('dashboard.excel') ?>" class="btn btn-success">Reporte Excel</a>
						</div>
					</div>
					<div class="card-body">
						<div class="chart chart-sm">
							<canvas id="chartjs-pie"></canvas>
						</div>
					</div>
					<div class="card-footer bg-success bg-opacity-50">
						<h5 class="card-title">Ganador: <?= $alcalde->name ?></h5>
						<p class="card-subtitle text-muted">Cantidad de votos: <?= $alcalde->cant ?></p>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		var ticksStyle = {
			fontColor: '#17202A',
			fontStyle: 'bold'
		}

		var mode = 'index'
		var intersect = true

		// Bar chart
		new Chart(document.getElementById("chartjs-bar"), {
			type: 'bar',
			data: {
				labels: [
					<?php
					if ($resultados != null) {
						foreach ($resultados as $nombre => $cant) {
							echo "'" . $nombre . "',";
						}
					} else {
						echo "'0',";
					}
					?>
				],
				datasets: [{
					// backgroundColor: '#007bff',
					backgroundColor: window.theme.primary,
					borderColor: window.theme.primary,
					data: [
						<?php
						if ($resultados != null) {
							foreach ($resultados as $nombre => $cant) {
								echo "'" . $cant . "',";
							}
						} else {
							echo "'0',";
						}
						?>
					],
					// barPercentage: .75,
					categoryPercentage: .5
				}]
			},
			options: {
				maintainAspectRatio: false,
				tooltips: {
					mode: mode,
					intersect: intersect
				},
				hover: {
					mode: mode,
					intersect: intersect
				},
				legend: {
					display: false
				},
				scales: {
					yAxes: [{
						// display: false,
						gridLines: {
							display: true,
							lineWidth: '4px',
							color: 'rgba(0, 0, 0, .2)',
							zeroLineColor: 'transparent'
						},
						// ticks: $.extend({
						// 	beginAtZero: true,

						// 	// Include a dollar sign in the ticks
						// 	callback: function(value) {
						// 		if (value >= 1000) {
						// 			value /= 1000
						// 			value += 'k'
						// 		}

						// 		return '' + value
						// 	}
						// }, ticksStyle)
						ticks: {
							beginAtZero: true, //habilitar desde 0
							stepSize: 1
						}
					}],
					xAxes: [{
						display: true,
						gridLines: {
							display: false
						},
						ticks: ticksStyle
					}]
				}
			}
		});
	});
</script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		// Pie chart
		new Chart(document.getElementById("chartjs-pie"), {
			type: "pie",
			data: {
				labels: [
					<?php
					if ($resultados != null) {
						foreach ($resultados as $nombre => $cant) {
							echo "'" . $nombre . "',";
						}
					} else {
						echo "'0',";
					}
					?>
				],
				datasets: [{
					data: [
						<?php
						if ($resultados != null) {
							foreach ($resultados as $nombre => $cant) {
								echo "'" . $cant . "',";
							}
						} else {
							echo "'0',";
						}
						?>
					],
					backgroundColor: [
						window.theme.primary,
						window.theme.warning,
					],
					borderColor: "transparent"
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: true
				}
			}
		});
	});
</script>
<?php include ext('layoutDash.footer') ?>