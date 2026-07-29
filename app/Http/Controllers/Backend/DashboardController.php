<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $totalApplications = Application::count();
        $pendingApplications = Application::where('status', 'Pending')->count();
        $totalContacts = Contact::count();
        $activeCountries = Country::where('active_status', 1)->count();
        $activeServices = Service::where('active_status', 1)->count();

        $recentApplications = Application::orderBy('id', 'desc')->take(5)->get();

        return view('backend.dashboard', compact(
            'totalApplications',
            'pendingApplications',
            'totalContacts',
            'activeCountries',
            'activeServices',
            'recentApplications'
        ));
    }
}
