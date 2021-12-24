<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles = Role::paginate(5);
        return view('user::role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::role.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'level' => 'required|numeric|min:1|max:9'
        ]);

        DB::beginTransaction();
        $createRole = Role::create([
            'name' => $request->name,
            'level' => $request->level
        ]);

        if (!$createRole) {
            session()->flash('error', 'Terjadi Kesalahan saat menambahkan data. <br>Silahkan Hubungi Administrator !');
            return redirect()->back();
        }

        DB::commit();

        session()->flash('success', 'Data Berhasil di-Tambahkan !');
        return redirect()->route('roles.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Role $role)
    {
        return view('user::role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,'.$role->id,
            'level' => 'required|numeric|min:1|max:9'
        ]);

        $updateRole = $role->update([
            'name' => $request->name,
            'level' => $request->level
        ]);

        session()->flash('info', 'Data berhasil di-Ubah !');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function active(Request $request, Role $role)
    {
        $is_active = $role->is_active ? 0 : 1;

        $updateRole = $role->update([
            'is_active' => $is_active,
        ]);

        if (!$updateRole) {
            session()->flash('error', 'Terjadi Kesalahan saat menambahkan data. <br>Silahkan Hubungi Administrator !');
            return redirect()->back();
        }

        if ($is_active) {
            session()->flash('info', 'Data Hak Akses di-Aktifkan !');
        } else {
            session()->flash('info', 'Data Hak Akses di-Matikan !');
        }

        return redirect()->route('roles.index');
    }
}
