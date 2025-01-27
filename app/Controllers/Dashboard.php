<?php

namespace App\Controllers;

use App\Models\GameLibraryModel;

class Dashboard extends BaseController
{
    protected $gameModel;

    public function __construct()
    {
        $this->gameModel = new GameLibraryModel();
    }

    public function index()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/user');
        }

        // Ambil data untuk chart
        $genreStats = $this->gameModel->getGenreStats();
        $priceStats = $this->gameModel->getPriceStats();

        $data = [
            'genreStats' => $genreStats,
            'priceStats' => $priceStats
        ];

        return view('dashboard', $data);
    }
}