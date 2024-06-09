<?php

namespace App\Http\Controllers;


use App\Models\User;

class DashboardPageController extends Controller
{
    public function __invoke()
    {
        return view('dashboard')->with([
            'users_count' => User::count()
        ]);
    }
}
