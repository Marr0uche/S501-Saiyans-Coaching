<?php

namespace App\Controllers;

use App\Models\ClientModel;
use CodeIgniter\Controller;

class BoardController extends Controller
{
	public function board()
	{

		$session = session();
		$admin = $session->get('admin');
		$connexion = $session->get('client_id');
		if ($admin === 'f' or $connexion === null) {
			return redirect()->to('/');
		}

		$clientModel = new ClientModel();

		$clients = $clientModel->findAll();

		$now = new \DateTime();
		$stats = [
			'totalUsers' => count($clients),
			'ageGroups' => [
				'<20' => 0,
				'20-30' => 0,
				'31-50' => 0,
				'>50' => 0
			],
			'sexDistribution' => [
				'Homme' => 0,
				'Femme' => 0
			],
			'averageWeight' => [
				'Homme' => 0,
				'Femme' => 0
			]
		];

		$weightBySex = [
			'Homme' => 0,
			'Femme' => 0
		];

		foreach ($clients as $client) {
			$birthDate = new \DateTime($client['datenaissance']);
			$age = $now->diff($birthDate)->y;

			if ($age < 20) {
				$stats['ageGroups']['<20']++;
			} elseif ($age <= 30) {
				$stats['ageGroups']['20-30']++;
			} elseif ($age <= 50) {
				$stats['ageGroups']['31-50']++;
			} else {
				$stats['ageGroups']['>50']++;
			}

			$sex = $client['sexe'];
			$stats['sexDistribution'][$sex]++;
			$weightBySex[$sex] += $client['poidsdecorps'];
		}

		foreach ($weightBySex as $sex => $totalWeight) {
			$stats['averageWeight'][$sex] = $totalWeight / max($stats['sexDistribution'][$sex], 1);
		}

		return view('Admin/BoardView', [
			'clients' => $clients,
			'stats' => $stats
		]);
	}
}
