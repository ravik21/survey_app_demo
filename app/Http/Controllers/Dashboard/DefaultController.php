<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class DefaultController extends Controller
{
    public function index()
    {
        return view('dashboard.index', ['title' => 'Dashboard']);
    }
}
