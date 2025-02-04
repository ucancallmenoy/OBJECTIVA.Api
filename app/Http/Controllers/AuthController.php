<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = auth()->user();

        return response()->json([
            'token' => $token,
            'user' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'is_admin' => $user->is_admin,
            ],
        ]);
    }

    public function user()
    {
        return response()->json(auth()->user());
    }

    public function updateProfile(Request $request)
{   
    try {
        $user = auth()->user();
        
        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name'  => 'nullable|string|max:255',
            'password'   => ['nullable', Password::min(8)
            ]
        ]);

        $updates = array_filter($request->only([
            'first_name',
            'last_name',
        ]));

        if ($request->filled('password')) {
            $updates['password'] = Hash::make($request->password);
        }

        $user->update($updates);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user->only(['first_name', 'last_name', 'email'])
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error updating profile',
            'error' => $e->getMessage()
        ], 500);
    }
}




public function getAllUsers()
{
    // Ensure only admin can access this
    $adminUser = auth()->user();
    if (!$adminUser || !$adminUser->is_admin) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    $users = User::select('id', 'first_name', 'last_name', 'email')->get();
    return response()->json($users);
}

public function adminUpdateUser(Request $request, $id)
{
    // Ensure only admin can update users
    $adminUser = auth()->user();
    if (!$adminUser || !$adminUser->is_admin) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    $user = User::findOrFail($id);

    $request->validate([
        'first_name' => 'sometimes|string|max:255',
        'last_name' => 'sometimes|string|max:255',
        'email' => 'sometimes|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6',
        'is_active' => 'sometimes|boolean'
    ]);

    // Prepare update data
    $updateData = $request->only(['first_name', 'last_name', 'email', 'is_active']);

    // Update password if provided
    if ($request->filled('password')) {
        $updateData['password'] = Hash::make($request->password);
    }

    $user->update($updateData);

    return response()->json([
        'message' => 'User updated successfully',
        'user' => $user
    ]);
}

public function deleteUser($id)
{
    // Ensure only admin can delete users
    $adminUser = auth()->user();
    if (!$adminUser || !$adminUser->is_admin) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    $user = User::findOrFail($id);
    $user->delete();

    return response()->json(['message' => 'User deleted successfully']);
}
}
