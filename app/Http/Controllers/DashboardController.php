<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\IntangibleCultureHeritage;
use App\Models\Library;
use App\Models\TangibleCultureHeritage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class DashboardController extends Controller
{
    function index()
    {
        $data['title'] = Lang::get('admin/dashboard.head-title');
        $data['tangible_cultural_heritages_count'] = TangibleCultureHeritage::count();
        $data['intangible_cultural_heritages_count'] = IntangibleCultureHeritage::count();
        $data['events_count'] = Event::count();
        $data['libraries_count'] = Library::count();

        return view('admin.index', $data);
    }
}
