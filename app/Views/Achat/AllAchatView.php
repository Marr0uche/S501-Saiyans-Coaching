<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestion des Produits et Promotions</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>">
</head>

<body>
	<div class="container-dashboard">
		<!-- Barre latérale -->
		<div class="sidebar">
			<i class="fas fa-home" onclick="window.location='/'"></i>
            <i class="fas fa-arrow-left" onclick="window.location='/admin/board'"></i>
            <i class="fas fa-chart-line" onclick="window.location='/produit/dashboard'"></i>
            <i class="fas fa-shopping-cart" onclick="window.location='/achat/allachat'"></i>
            <i class="fas fa-sign-out-alt" onclick="window.location='/authentification/deconnexion'"></i>
        </div>

		<!-- Section principale -->
		<div class="dashboard-section">
			<h1 class="dashboard-title">Gestion des Produits et Promotions</h1>

		<table>
			<thead>
				<tr td style="border : 2px solid">
					<th>Nom et Prénom</th>
					<th>Email</th>
					<th>Numéro de Telephone</th>
					<th>Nom Produit</th>
					<th>Prix</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($listeachat as $achat): ?>
					<tr>
						<?php 
							$idproduit = $achat['idproduit'];
							$idclient = $achat['idclient'];

							$clientModel = new \App\Models\ClientModel();
							$client = $clientModel->find($idclient);

							$produitModel = new \App\Models\ProduitModel();
							$produit = $produitModel->find($idproduit);
						?>				
						
						<td style="border : 2px solid"> <?= esc($client['nom'] . $client['prenom']); ?> </td>
						<td style="border : 2px solid"> <?= esc($client['mail'])?> </td>
						<td style="border : 2px solid"> <?= esc($client['mobile'])?> </td>
						<td style="border : 2px solid"> <?= esc($produit['titreproduit'])?> </td>
						<td style="border : 2px solid"d> <?= esc($produit['prix'])?> </td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	
		

		


</body>