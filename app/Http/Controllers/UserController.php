<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Handle create or update requests
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
                'password' => 'nullable|string|min:8|confirmed',
            ]);

            if ($request->id) { // Update user
                $user = User::findOrFail($request->id);
                $user->name = $request->name;
                $user->email = $request->email;

                if ($request->filled('password')) {
                    $user->password = Hash::make($request->password);
                }

                $user->save();
                return redirect()->route('dashboard')->with('success', 'User  updated successfully.');
            } else { // Create user
                $request->validate([
                    'password' => 'required|string|min:8|confirmed',
                ]);

                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                return redirect()->route('dashboard')->with('success', 'User  created successfully.');
            }
        }

        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'User  deleted successfully.');
    }
}
