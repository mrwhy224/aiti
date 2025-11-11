<?php

namespace App\Http\Controllers;

use App\Models\Role;

class HomeController
{
    public function register()
    {
        return view('layouts.vuexy.pages.register', ['roles'=>Role::where('role_group','company_member')->get()]);
    }
}
