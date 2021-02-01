<?php

namespace App\Http\Controllers\api\v1\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['receipts'])->orderBy('name');
        return UserResource::collection($users->paginate(20))->response();
    }

    public function show(User $user)
    {
        return (new UserResource($user->loadMissing(['receipts'])))->response();
    }
}
