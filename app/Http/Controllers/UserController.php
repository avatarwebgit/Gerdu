<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->listUsers();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'cellphone' => 'required|string|max:20',
            'address' => 'required|string',
            'national_code' => 'required|numeric|digits:10',
            'status' => 'required|in:active,inactive',
        ]);

        $this->userService->createUser($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = $this->userService->getUser($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'cellphone' => 'required|string|max:20',
            'address' => 'required|string',
            'national_code' => 'required|numeric|digits:10',
            'status' => 'required|in:active,inactive',
        ]);
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password); // رمز عبور را رمزگذاری کنید
        } else {
            // اگر کلمه عبور وارد نشده باشد، آن را از آرایه حذف کنید
            unset($validated['password']);
        }


        $this->userService->updateUser($id, $validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
