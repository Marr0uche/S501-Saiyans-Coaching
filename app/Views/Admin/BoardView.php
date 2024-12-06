<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tableau de Bord Administrateur</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>">
</head>

<body>

	<?php
		$session = session();
		$admin = $session->get('admin');
		$connexion = $session->get('client_id');
		if ($admin == null || $connexion === null) {
			return redirect()->to('/');
		}
	?>

	<div class="container mt-5">
		<h1 class="text-center mb-4">Tableau de Bord Administrateur</h1>

		<div class="row g-4">
			<!-- Carte 1 : Répartition par Âge -->
			<div class="col-md-4">
				<div class="card shadow">
					<div class="card-body text-center">
						<h5 class="card-title">Répartition par Âge</h5>
						<div class="chart-container">
							<canvas id="ageChart"></canvas>
						</div>
					</div>
				</div>
			</div>

			<!-- Carte 2 : Poids Moyen par Sexe -->
			<div class="col-md-4">
				<div class="card shadow">
					<div class="card-body text-center">
						<h5 class="card-title">Poids Moyen par Sexe</h5>
						<p class="display-6">Hommes : <strong><?= round($stats['averageWeight']['Homme'], 2) ?> kg</strong></p>
						<p class="display-6">Femmes : <strong><?= round($stats['averageWeight']['Femme'], 2) ?> kg</strong></p>
					</div>
				</div>
			</div>

			<!-- Carte 3 : Répartition par Sexe -->
			<div class="col-md-4">
				<div class="card shadow">
					<div class="card-body text-center">
						<h5 class="card-title">Répartition par Sexe</h5>
						<div class="chart-container">
							<canvas id="sexChart"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>

		<h3 class="mt-5 mb-3">Filtres de Recherche</h3>
		<div class="row g-3">
			<div class="col-md-3">
				<input type="text" id="filterName" class="form-control" placeholder="Rechercher par Nom">
			</div>
			<div class="col-md-3">
				<input type="text" id="filterPrenom" class="form-control" placeholder="Rechercher par Prénom">
			</div>
			<div class="col-md-3">
				<select id="filterSexe" class="form-select">
					<option value="">Tous les sexes</option>
					<option value="Homme">Homme</option>
					<option value="Femme">Femme</option>
				</select>
			</div>
			<div class="col-md-3">
				<input type="number" id="filterAge" class="form-control" placeholder="Rechercher par Âge">
			</div>
		</div>

		<h3 class="mt-5">Liste des Utilisateurs</h3>
		<div class="table-responsive">
			<table class="table table-bordered table-striped mt-3" id="clientsTable">
				<thead>
					<tr>
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
					<?php foreach ($clients as $client): ?>
						<?php if ($client['idclient'] != $connexion): ?>
							<tr>
								<td class="name"><?= esc($client['nom']) ?></td>
								<td class="prenom"><?= esc($client['prenom']) ?></td>
								<td><?= esc($client['mail']) ?></td>
								<td><?= esc($client['mobile']) ?></td>
								<td class="age">
									<?php
									$birthDate = new DateTime($client['datenaissance']);
									$age = $birthDate->diff(new DateTime())->y;
									echo $age;
									?>
								</td>
								<td><?= esc($client['poidsdecorps']) ?></td>
								<td class="sexe"><?= esc($client['sexe']) ?></td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<script>
		// Fonction de filtrage
		const filterName = document.getElementById('filterName');
		const filterPrenom = document.getElementById('filterPrenom');
		const filterSexe = document.getElementById('filterSexe');
		const filterAge = document.getElementById('filterAge');
		const tableRows = document.querySelectorAll('#clientsTable tbody tr');

		function filterUsers() {
			const nameValue = filterName.value.toLowerCase();
			const prenomValue = filterPrenom.value.toLowerCase();
			const sexeValue = filterSexe.value;
			const ageValue = filterAge.value;

			tableRows.forEach(row => {
				const name = row.querySelector('.name').textContent.toLowerCase();
				const prenom = row.querySelector('.prenom').textContent.toLowerCase();
				const sexe = row.querySelector('.sexe').textContent;
				const age = row.querySelector('.age').textContent;

				const matchesName = name.includes(nameValue);
				const matchesPrenom = prenom.includes(prenomValue);
				const matchesSexe = !sexeValue || sexe === sexeValue;
				const matchesAge = !ageValue || parseInt(age) === parseInt(ageValue);

				if (matchesName && matchesPrenom && matchesSexe && matchesAge) {
					row.style.display = '';
				} else {
					row.style.display = 'none';
				}
			});
		}

		// Ajout des écouteurs d'événements
		filterName.addEventListener('input', filterUsers);
		filterPrenom.addEventListener('input', filterUsers);
		filterSexe.addEventListener('change', filterUsers);
		filterAge.addEventListener('input', filterUsers);

		// Initialisation des graphiques
		const ageData = <?= json_encode(array_values($stats['ageGroups'])) ?>;
		const sexData = <?= json_encode(array_values($stats['sexDistribution'])) ?>;

		new Chart(document.getElementById('ageChart'), {
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

		new Chart(document.getElementById('sexChart'), {
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
