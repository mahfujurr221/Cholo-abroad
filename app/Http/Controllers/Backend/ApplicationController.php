<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:list-application')->only('index', 'show');
        $this->middleware('can:edit-application')->only('updateStatus');
    }

    public function index()
    {
        $applications = Application::orderBy('id', 'desc')->get();
        return view('backend.pages.applications.index', compact('applications'));
    }

    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('backend.pages.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Reviewed,In Progress,Completed,Rejected'
        ]);

        $application = Application::findOrFail($id);
        $application->update(['status' => $request->status]);

        return redirect()->route('applications.show', $id)->with('success', 'Status updated successfully.');
    }
}
