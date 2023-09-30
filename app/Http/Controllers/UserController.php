<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->when($request->input('name'), function($query, $name) {
                return $query->where('name', 'like', '%'.$name.'%');
            })
            ->select('id', 'name', 'email', 'phone', DB::raw('DATE_FORMAT(created_at, "%d %M %Y") as created_at'))
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.users.index', compact('users'), ['type_menu' => 'user']);
    }

    public function create() {
        return view('pages.users.create', ['type_menu' => 'user']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::factory()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'password' => Hash::make(substr($request['name'], -5) . substr($request['phone'], -4)),
        ]);

        return redirect(route('user.index'))->with('success', 'User successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('pages.users.edit', ['type_menu' => 'user'])->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, user $user)
    {
        $validate = $request->validated();
        $user->update($validate);

        return redirect(route('user.index'))->with('success', 'User ' . $user->name . ' successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        $user->delete();
        return redirect(route('user.index'))->with('success', 'User ' . $user->name . ' successfully deleted');
    }
}
