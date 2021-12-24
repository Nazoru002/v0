<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = User::get(); 
        return view('user::user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::user.create');
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
        ]);
        
        try {
            $create = User::firstOrCreate($validate);

            return redirect(route('user.index'));
        } catch (\Exception $e) {
            dd($e);
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
        return view('user::edit', compact('user'));
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
        ]);

        try {
            $hashCheck = Hash::check($request->password, $user->password);
            !$hashCheck ? $validate['password'] = Hash::make($request->password) : $validate['password'] = $user->password;

            $user->update($validate);

            return redirect(route('user.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan !');
            return redirect(route('user.index'));
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
