<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Admin', [
            'section' => 'UserMgr',
            'state' => 'list',
            'data' => compact('users'),
        ]);
    }


    public function create()
    {
        $users = User::all();
        // Lấy ID lớn nhất hiện tại và cộng thêm 1
        $nextId = \App\Models\User::max('id') + 1;
        return view('Admin', [
            'section' => 'UserMgr',
            'state' => 'create',
            'data' => compact('users', 'nextId'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
        ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('Admin.UserMgr')->with('success', 'User created successfully.');
    }


    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('Admin', [
            'section' => 'UserMgr',
            'state' => 'edit',
            'data' => compact('users'),
        ]);
    }


    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|string',
        ]);
        $data = $request->only(['username', 'name', 'email', 'role']);
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('Admin.UserMgr')->with('success', 'User updated successfully.');
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->role === 'admin' && $user->id == 1) {
            return redirect()->route('Admin.UserMgr')->with('error', 'Cannot delete Admin Account.');
        }
        $user->delete();
        return redirect()->route('Admin.UserMgr')->with('success', 'User deleted successfully.');
    }
}
