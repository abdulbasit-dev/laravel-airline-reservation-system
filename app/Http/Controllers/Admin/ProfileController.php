<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ProfileController 
{
    public function profile()
    {
        return view('admin.profile.index');
    }

    public function editProfile()
    {
        return view('admin.profile.edit');
    }

    public function updateProfile()
    {
        return "done";
    }
}
