<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = User::paginate(10); 
        return view('user::user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $roles = Role::where('is_active', '=', 1)->get();
        return view('user::user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
            'roles'     => 'required|array',
            'roles.*'   => 'numeric|exists:roles,id'
        ]);
        

        try {
            DB::beginTransaction();
            $create = User::firstOrCreate($validate);

            $create->syncRoles($request->roles);

            DB::commit();

            session()->flash('success', 'Data Pengguna berhasil di-Buat !');
            return redirect(route('user.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan saat membuat Data Pengguna. <br> Silahkan Hubungi Administrator !');
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::user.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $user)
    {
        $roles = Role::where('is_active', '=', 1)->get();
        $user_roles = $user->roles->pluck('id')->toArray();
        return view('user::user.edit', compact('user', 'roles', 'user_roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request,User $user)
    {
        $validate = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,'.$user->id,
            'password'  => 'nullable|min:6|confirmed',
            'roles'     => 'required|array',
            'roles.*'   => 'numeric|exists:roles,id'
        ]);

        try {
            $hashCheck = Hash::check($request->password, $user->password);
            !$hashCheck ? $validate['password'] = Hash::make($request->password) : $validate['password'] = $user->password;

            $user->update($validate);

            $user->syncRoles($request->roles);

            session()->flash('info', 'Data Pengguna berhasil di-Ubah !');
            return redirect(route('user.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan saat mengubah Data Pengguna. Silahkan Hubungi Administrator!');
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            
            return redirect(route('user.index'));
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
