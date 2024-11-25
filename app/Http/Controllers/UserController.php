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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'cellphone' => 'required|numeric',
            'address' => 'nullable|string',
            'national_code' => 'nullable|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = $this->userService->registerUser($data);

        return response()->json($user, 201);
    }
}
