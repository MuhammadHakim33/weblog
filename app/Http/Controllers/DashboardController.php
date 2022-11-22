<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('operator.dashboard.index', ['title' => 'Dashboard']);
    }
}
