<?php

namespace App\Controllers;

use App\Models\GameLibraryModel;

class UserDashboard extends BaseController
{
    protected $gameModel;

    public function __construct()
    {
        $this->gameModel = new GameLibraryModel();
    }

    public function index()
    {
        // Ambil data untuk chart
        $genreStats = $this->gameModel->getGenreStats();
        $priceStats = $this->gameModel->getPriceStats();

        $data = [
            'games' => $this->gameModel->findAll(),
            'genreStats' => $genreStats,
            'priceStats' => $priceStats
        ];

        return view('user_dashboard/index', $data);
    }
}