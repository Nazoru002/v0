<?php

namespace Modules\Game\Http\Controllers;

use App\Models\Game;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $games = Game::paginate(5);
        return view('game::index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('game::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_game' => 'required|string|unique:games,kode_game|max:10',
            'nama_game' => 'required|string|max:40'
        ]);

        DB::beginTransaction();
        $createGame = Game::create([
            'kode_game' => $request->kode_game,
            'nama_game' => $request->nama_game
        ]);

        if (!$createGame) {
            session()->flash('error', 'Terjadi Kesalahan saat menambahkan data. <br>Silahkan Hubungi Administrator !');
            return redirect()->back();
        }

        DB::commit();

        session()->flash('success', 'Data Berhasil di-Tambahkan !');
        return redirect()->route('game.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('game::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Game $game)
    {
        return view('game::edit', compact('game'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'kode_game' => 'required|string|unique:games,kode_game,'.$game->id.'|max:10',
            'nama_game' => 'required|string|max:40'
        ]);

        $updatedGame = $game->update([
            'kode_game' => $request->kode_game,
            'nama_game' => $request->nama_game
        ]);

        session()->flash('info', 'Data berhasil di-Ubah !');
        return redirect()->route('game.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        
    }

    public function active(Request $request, Game $game)
    {
        $is_active = $game->is_active ? 0 : 1;

        $updateRole = $game->update([
            'is_active' => $is_active,
        ]);

        if (!$updateRole) {
            session()->flash('error', 'Terjadi Kesalahan saat menambahkan data. <br>Silahkan Hubungi Administrator !');
            return redirect()->back();
        }

        if ($is_active) {
            session()->flash('info', 'Data Game di-Aktifkan !');
        } else {
            session()->flash('info', 'Data Game di-Matikan !');
        }

        return redirect()->route('game.index');
    }
}
