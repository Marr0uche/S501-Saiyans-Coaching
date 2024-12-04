<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tableau de Bord Administrateur</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<style>
		.chart-container {
			width: 40%;
			margin: auto;
		}
	</style>
</head>

<body>
	<div class="container mt-5">
		<h1 class="text-center mb-4">Tableau de Bord Administrateur</h1>

		<div class="row">
			<div class="col-md-6 text-center">
				<h5>Répartition par Âge</h5>
				<div class="chart-container">
					<canvas id="ageChart"></canvas>
				</div>
			</div>
			<div class="col-md-6 text-center">
				<h5>Répartition par Sexe</h5>
				<div class="chart-container">
					<canvas id="sexChart"></canvas>
				</div>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-md-6 text-center">
				<h5>Poids Moyen par Sexe</h5>
				<p class="display-6">Hommes : <strong><?= round($stats['averageWeight']['Homme'], 2) ?> kg</strong></p>
				<p class="display-6">Femmes : <strong><?= round($stats['averageWeight']['Femme'], 2) ?> kg</strong></p>
			</div>
		</div>

		<h3 class="mt-5">Liste des Utilisateurs</h3>
		<table class="table table-bordered table-striped mt-3">
			<thead>
				<tr>
					<th>#</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Âge</th>
					<th>Poids (kg)</th>
					<th>Sexe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($clients as $index => $client): ?>
					<tr>
						<td><?= $index + 1 ?></td>
						<td><?= esc($client['nom']) ?></td>
						<td><?= esc($client['prenom']) ?></td>
						<td><?= esc($client['mail']) ?></td>
						<td><?= esc($client['mobile']) ?></td>
						<td>
							<?php
							$birthDate = new DateTime($client['datenaissance']);
							$age = $birthDate->diff(new DateTime())->y;
							echo $age;
							?>
						</td>
						<td><?= esc($client['poidsdecorps']) ?></td>
						<td><?= esc($client['sexe']) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<script>
		const ageData = <?= json_encode(array_values($stats['ageGroups'])) ?>;
		const sexData = <?= json_encode(array_values($stats['sexDistribution'])) ?>;

		const ageChart = new Chart(document.getElementById('ageChart'), {
			type: 'pie',
			data: {
				labels: ['< 20 ans', '20-30 ans', '31-50 ans', '> 50 ans'],
				datasets: [{
					label: 'Répartition par Âge',
					data: ageData,
					backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
				}]
			}
		});

		const sexChart = new Chart(document.getElementById('sexChart'), {
			type: 'pie',
			data: {
				labels: ['Homme', 'Femme'],
				datasets: [{
					label: 'Répartition par Sexe',
					data: sexData,
					backgroundColor: ['#36A2EB', '#FF6384']
				}]
			}
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>