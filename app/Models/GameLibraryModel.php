<?php

namespace App\Models;

use CodeIgniter\Model;

class GameLibraryModel extends Model
{
    protected $table = 'gamelibrary';
    protected $primaryKey = 'id';
    protected $allowedFields = ['game_title', 'genre', 'release_date', 'price'];

    public function getGenreStats()
    {
        return $this->select('genre, COUNT(*) as total')
                   ->groupBy('genre')
                   ->findAll();
    }

    public function getPriceStats()
    {
        return $this->select('genre, SUM(price) as total_price')
                   ->groupBy('genre')
                   ->findAll();
    }
}