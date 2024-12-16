<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Package;
use App\Models\User;
use App\Models\Visit;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
