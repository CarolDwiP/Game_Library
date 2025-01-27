<?php

namespace App\Controllers;

use App\Models\GameLibraryModel;

class GameLibrary extends BaseController
{
    protected $gameModel;

    public function __construct()
    {
        $this->gameModel = new GameLibraryModel();
        
        // HAPUS SEMUA REDIRECT DAN PENGECEKAN SESSION DI CONSTRUCTOR
        // helper(['auth']);  // HAPUS JIKA TIDAK ADA FILE HELPER AUTH
    }

    public function index()
    {
        $data['games'] = $this->gameModel->findAll();
        return view('gamelibrary/index', $data);
    }

    public function create()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/gamelibrary')->with('error', 'Anda tidak memiliki akses ke fitur ini.');
        }

        return view('gamelibrary/create');
    }

    public function store()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/gamelibrary')->with('error', 'Anda tidak memiliki akses ke fitur ini.');
        }

        $this->gameModel->save([
            'game_title' => $this->request->getPost('game_title'),
            'genre' => $this->request->getPost('genre'),
            'release_date' => $this->request->getPost('release_date'),
            'price' => $this->request->getPost('price'),
        ]);

        return redirect()->to('/gamelibrary');
    }

    public function update()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/gamelibrary')->with('error', 'Anda tidak memiliki akses ke fitur ini.');
        }

        $id = $this->request->getPost('id');

        if (!$id || !$this->gameModel->find($id)) {
            return redirect()->to('/gamelibrary')->with('error', 'ID game tidak valid atau tidak ditemukan.');
        }

        $data = [
            'game_title' => $this->request->getPost('game_title'),
            'genre' => $this->request->getPost('genre'),
            'release_date' => $this->request->getPost('release_date'),
            'price' => $this->request->getPost('price'),
        ];

        $this->gameModel->update($id, $data);

        return redirect()->to('/gamelibrary')->with('success', 'Data game berhasil diperbarui.');
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/gamelibrary')->with('error', 'Anda tidak memiliki akses ke fitur ini.');
        }

        if ($this->gameModel->find($id)) {
            $this->gameModel->delete($id);
            return redirect()->to('/gamelibrary')->with('success', 'Game berhasil dihapus.');
        } else {
            return redirect()->to('/gamelibrary')->with('error', 'Game tidak ditemukan.');
        }
    }
}