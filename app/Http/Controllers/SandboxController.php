<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SandboxController extends Controller
{
    public function randomCustomer()
    {
        $user = User::whereIsAdmin(0)->inRandomOrder()->first();
        return response()->json($user);
    }
}
