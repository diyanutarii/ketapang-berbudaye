<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class DashboardController extends Controller
{
    function index()
    {
        $data['title'] = Lang::get('admin/dashboard.head-title');
        return view('admin.dashboard', $data);
    }
}
