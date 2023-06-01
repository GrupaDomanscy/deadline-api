<?php

namespace App\Http\Controllers;

use App\Http\Requests\LuginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function getUser()
    {
        return auth()->user();
    }

    public function login(LuginRequest $request)
    {
        $data = $request->validated();

        $user = $this->userRepository->findByUsername($data['username']);

        if ($user === null) {
            throw ValidationException::withMessages(['data' => ["Dane są niepoprawne"]]);
        }

        if (!Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages(['data' => ["Dane są niepoprawne"]]);
        }

        auth()->setUser($user);

        return [
            'token' => Crypt::encryptString("authorization_token:" . auth()->id()),
            'user' => auth()->user()
        ];
    }

    public function logout()
    {
        auth()->logout();
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = new User();
        $user->username = $data['username'];
        $data['password'] = Hash::make($data['password']);
        $user->password = $data['password'];
        $user->save();
        event(new Registered($user));
        return $user;
    }

    public function delete()
    {
        $this->userRepository->delete(auth()->id());
    }
}
