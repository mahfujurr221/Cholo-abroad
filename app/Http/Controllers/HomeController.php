<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Country;
use App\Models\Service;
use App\Models\Process;
use App\Models\Testimonial;
use App\Models\Cta;
use App\Models\AboutUs;
use App\Models\Faq;
use App\Models\Application;

class HomeController extends Controller
{
    public function index()
    {
        $heroes      = Hero::where('active_status', 1)->get();
        $countries   = Country::where('active_status', 1)->get();
        $services    = Service::where('active_status', 1)->get();
        $processes   = Process::where('active_status', 1)->orderBy('step_number')->get();
        $testimonials = Testimonial::where('active_status', 1)->get();
        $cta         = Cta::where('active_status', 1)->first();
        $about       = AboutUs::where('active_status', 1)->first();
        $faqs        = Faq::where('active_status', 1)->get();

        return view('frontend.home', compact('heroes', 'countries', 'services', 'processes', 'testimonials', 'cta', 'about', 'faqs'));
    }

    public function about()
    {
        $about = AboutUs::where('active_status', 1)->first();
        $faqs = Faq::where('active_status', 1)->get();
        return view('frontend.pages.about', compact('about', 'faqs'));
    }

    public function services()
    {
        $services = Service::where('active_status', 1)->get();
        return view('frontend.pages.service', compact('services'));
    }

    public function countries()
    {
        $countries = Country::where('active_status', 1)->get();
        return view('frontend.pages.countries', compact('countries'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function faq()
    {
        $faqs = Faq::where('active_status', 1)->get();
        $cta  = Cta::where('active_status', 1)->first();
        return view('frontend.pages.faq', compact('faqs', 'cta'));
    }

    public function apply()
    {
        return view('frontend.pages.apply');
    }

    public function submitApply(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'dob' => 'required|date',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:100',
            'city' => 'required|string|max:100',
            'preferred_country' => 'required|string|max:50',
            'visa_type' => 'required|string|max:50',
            'highest_education' => 'required|string|max:50',
            'target_intake' => 'required|string|max:50',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }

        try {
            Application::create($validator->validated());
            return response()->json(['status' => 'success', 'message' => 'Application submitted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while submitting your application.']);
        }
    }

    public function submitContact(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'topic' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }

        try {
            \App\Models\Contact::create($validator->validated());
            return response()->json(['status' => 'success', 'message' => 'Message submitted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while submitting your message.']);
        }
    }
}
