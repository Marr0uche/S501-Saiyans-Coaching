<!DOCTYPE html>

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
	?>
	<header class="bg-dark py-3">
		<div class="container d-flex justify-content-between align-items-center">
			<h1 class="text-light">Tableau de Bord Administrateur</h1>
			<div class="menu-burger-container">
				<div class="menu-burger-button text-light">
					<i class="fa-solid fa-bars fa-xl"></i>
				</div>
				<div class="menu-burger bg-dark">
					<ul class="list-unstyled">
						<li><a href="produit/dashboard">Produit</a></li>
						<li><a href="/Produit">Programmes</a></li>
						<li><a href="#">Avant / Après</a></li>
						<li><a href="/blog">Blog</a></li>
						<li><a href="/actualites">Actualité</a></li>
						<li><a href="/contact">FAQ/Contact</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<main class="container mt-5">
		<div class="row g-4">
			<!-- Carte 1 : Répartition par Âge -->
			<div class="col-lg-4 col-md-6">
				<div class="card shadow-sm rounded-4 bg-gradient text-white">
					<div class="card-body">
						<h5 class="card-title">Répartition par Âge</h5>
						<canvas id="ageChart"></canvas>
					</div>
				</div>
			</div>

			<!-- Carte 2 : Poids Moyen par Sexe -->
			<div class="col-lg-4 col-md-6">
				<div class="card shadow-sm rounded-4 bg-gradient text-white">
					<div class="card-body">
						<h5 class="card-title">Poids Moyen par Sexe</h5>
						<p>Hommes : <strong id="poidsHomme"><?= round($stats['averageWeight']['Homme'], 2) ?> kg</strong></p>
						<p>Femmes : <strong id="poidsFemme"><?= round($stats['averageWeight']['Femme'], 2) ?> kg</strong></p>
					</div>
				</div>
			</div>

			<!-- Carte 3 : Répartition par Sexe -->
			<div class="col-lg-4 col-md-6">
				<div class="card shadow-sm rounded-4 bg-gradient text-white">
					<div class="card-body">
						<h5 class="card-title">Répartition par Sexe</h5>
						<canvas id="sexChart"></canvas>
					</div>
				</div>
			</div>
		</div>

		<h3 class="mt-5 mb-4">Filtres de Recherche</h3>
		<div class="row g-3">
			<div class="col-lg-3 col-md-6">
				<input type="text" id="filterName" class="form-control" placeholder="Rechercher par Nom">
			</div>
			<div class="col-lg-3 col-md-6">
				<input type="text" id="filterPrenom" class="form-control" placeholder="Rechercher par Prénom">
			</div>
			<div class="col-lg-3 col-md-6">
				<select id="filterSexe" class="form-select">
					<option value="">Tous les sexes</option>
					<option value="Homme">Homme</option>
					<option value="Femme">Femme</option>
				</select>
			</div>
			<div class="col-lg-3 col-md-6">
				<input type="number" id="filterAge" class="form-control" placeholder="Rechercher par Âge">
			</div>
		</div>

		<h3 class="mt-5">Liste des Utilisateurs</h3>
		<div class="table-responsive">
			<table id="clientsTable" class="table table-bordered table-hover text-center">
				<thead class="table-dark">
					<tr>
						<th class="name">Nom</th>
						<th class="prenom">Prénom</th>
						<th>Email</th>
						<th>Mobile</th>
						<th class="age">Âge</th>
						<th>Poids (kg)</th>
						<th>Taille (cm)</th>
						<th class="sexe">Sexe</th>
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
								<td><?= esc($client['taille']) ?></td>
								<td class="sexe"><?= esc($client['sexe']) ?></td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<script>
			const filterName = document.getElementById('filterName');
			const filterPrenom = document.getElementById('filterPrenom');
			const filterSexe = document.getElementById('filterSexe');
			const filterAge = document.getElementById('filterAge');
			const tableRows = document.querySelectorAll('#clientsTable tbody tr');

			// Initialisation des graphiques
			const ageChart = new Chart(document.getElementById('ageChart'), {
				type: 'pie',
				data: {
					labels: ['< 20 ans', '20-30 ans', '31-50 ans', '> 50 ans'],
					datasets: [{
						label: 'Répartition par Âge',
						data: <?= json_encode(array_values($stats['ageGroups'])) ?>,
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
						data: <?= json_encode(array_values($stats['sexDistribution'])) ?>,
						backgroundColor: ['#36A2EB', '#FF6384']
					}]
				}
			});

			// Fonction de mise à jour des graphiques
			function updateCharts() {
				const visibleRows = Array.from(tableRows).filter(row => row.style.display !== 'none');

				const ageGroups = {
					'<20': 0,
					'20-30': 0,
					'31-50': 0,
					'>50': 0
				};
				const sexDistribution = {
					'Homme': 0,
					'Femme': 0
				};

				visibleRows.forEach(row => {
					const age = parseInt(row.querySelector('.age').textContent.trim());
					const sexe = row.querySelector('.sexe').textContent.trim();

					if (age < 20) ageGroups['<20']++;
					else if (age <= 30) ageGroups['20-30']++;
					else if (age <= 50) ageGroups['31-50']++;
					else ageGroups['>50']++;

					if (sexe === 'Homme' || sexe === 'Femme') sexDistribution[sexe]++;
				});

				ageChart.data.datasets[0].data = Object.values(ageGroups);
				sexChart.data.datasets[0].data = Object.values(sexDistribution);

				ageChart.update();
				sexChart.update();
			}

			// Fonction de filtrage
			function filterUsers() {
				const nameValue = filterName.value.toLowerCase();
				const prenomValue = filterPrenom.value.toLowerCase();
				const sexeValue = filterSexe.value;
				const ageValue = filterAge.value;

				tableRows.forEach(row => {
					const name = row.querySelector('.name').textContent.toLowerCase();
					const prenom = row.querySelector('.prenom').textContent.toLowerCase();
					const sexe = row.querySelector('.sexe').textContent.trim();
					const age = row.querySelector('.age').textContent.trim();

					const matchesName = !nameValue || name.includes(nameValue);
					const matchesPrenom = !prenomValue || prenom.includes(prenomValue);
					const matchesSexe = !sexeValue || sexe === sexeValue;
					const matchesAge = !ageValue || parseInt(age) === parseInt(ageValue);

					if (matchesName && matchesPrenom && matchesSexe && matchesAge) {
						row.style.display = '';
					} else {
						row.style.display = 'none';
					}
				});

				updateCharts();
			}

			// Ajout des écouteurs d'événements
			filterName.addEventListener('input', filterUsers);
			filterPrenom.addEventListener('input', filterUsers);
			filterSexe.addEventListener('change', filterUsers);
			filterAge.addEventListener('input', filterUsers);
		</script>

		<script>
			const poidsHommeElement = document.getElementById('poidsHomme'); // Élément pour poids moyen des hommes
			const poidsFemmeElement = document.getElementById('poidsFemme'); // Élément pour poids moyen des femmes

			// Fonction pour mettre à jour les poids moyens en fonction des filtres
			function updateWeights() {
				const visibleRows = Array.from(document.querySelectorAll('#clientsTable tbody tr'))
					.filter(row => row.style.display !== 'none'); // Lignes visibles après filtrage

				let totalPoidsHomme = 0;
				let totalPoidsFemme = 0;
				let countHomme = 0;
				let countFemme = 0;

				// Calcul des poids moyens pour les lignes visibles
				visibleRows.forEach(row => {
					const poids = parseFloat(row.querySelector('td:nth-child(6)').textContent.trim()); // Colonne Poids
					const sexe = row.querySelector('td:nth-child(8)').textContent.trim(); // Colonne Sexe

					if (sexe === 'Homme') {
						totalPoidsHomme += poids;
						countHomme++;
					} else if (sexe === 'Femme') {
						totalPoidsFemme += poids;
						countFemme++;
					}
				});

				// Mise à jour des poids moyens dans la carte
				const avgPoidsHomme = countHomme > 0 ? (totalPoidsHomme / countHomme).toFixed(2) : '0';
				const avgPoidsFemme = countFemme > 0 ? (totalPoidsFemme / countFemme).toFixed(2) : '0';

				poidsHommeElement.textContent = `${avgPoidsHomme} kg`;
				poidsFemmeElement.textContent = `${avgPoidsFemme} kg`;
			}

			// Fonction existante pour filtrer les utilisateurs
			function filterUsers() {
				const filterName = document.getElementById('filterName').value.toLowerCase();
				const filterPrenom = document.getElementById('filterPrenom').value.toLowerCase();
				const filterSexe = document.getElementById('filterSexe').value;
				const filterAge = document.getElementById('filterAge').value;

				const tableRows = document.querySelectorAll('#clientsTable tbody tr');

				tableRows.forEach(row => {
					const name = row.querySelector('.name').textContent.toLowerCase();
					const prenom = row.querySelector('.prenom').textContent.toLowerCase();
					const sexe = row.querySelector('.sexe').textContent.trim();
					const age = parseInt(row.querySelector('.age').textContent.trim(), 10);

					const matchesName = !filterName || name.includes(filterName);
					const matchesPrenom = !filterPrenom || prenom.includes(filterPrenom);
					const matchesSexe = !filterSexe || sexe === filterSexe;
					const matchesAge = !filterAge || parseInt(filterAge, 10) === age;

					if (matchesName && matchesPrenom && matchesSexe && matchesAge) {
						row.style.display = '';
					} else {
						row.style.display = 'none';
					}
				});

				updateWeights(); // Mise à jour des poids moyens après filtrage
			}

			// Ajout des écouteurs d'événements
			document.getElementById('filterName').addEventListener('input', filterUsers);
			document.getElementById('filterPrenom').addEventListener('input', filterUsers);
			document.getElementById('filterSexe').addEventListener('change', filterUsers);
			document.getElementById('filterAge').addEventListener('input', filterUsers);
		</script>
	</main>
</body>

</html>