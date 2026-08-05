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
        $heroes      = \Illuminate\Support\Facades\Cache::rememberForever('frontend_heroes', fn() => Hero::where('active_status', 1)->get());
        $countries   = \Illuminate\Support\Facades\Cache::rememberForever('frontend_countries', fn() => Country::where('active_status', 1)->get());
        $services    = \Illuminate\Support\Facades\Cache::rememberForever('frontend_services', fn() => Service::where('active_status', 1)->get());
        $processes   = \Illuminate\Support\Facades\Cache::rememberForever('frontend_processes', fn() => Process::where('active_status', 1)->orderBy('step_number')->get());
        $testimonials = \Illuminate\Support\Facades\Cache::rememberForever('frontend_testimonials', fn() => Testimonial::where('active_status', 1)->get());
        $cta         = \Illuminate\Support\Facades\Cache::rememberForever('frontend_cta', fn() => Cta::where('active_status', 1)->first());
        $about       = \Illuminate\Support\Facades\Cache::rememberForever('frontend_about', fn() => AboutUs::where('active_status', 1)->first());
        $faqs        = \Illuminate\Support\Facades\Cache::rememberForever('frontend_faqs', fn() => Faq::where('active_status', 1)->get());

        return view('frontend.home', compact('heroes', 'countries', 'services', 'processes', 'testimonials', 'cta', 'about', 'faqs'));
    }

    public function about()
    {
        $about = \Illuminate\Support\Facades\Cache::rememberForever('frontend_about', fn() => AboutUs::where('active_status', 1)->first());
        $faqs = \Illuminate\Support\Facades\Cache::rememberForever('frontend_faqs', fn() => Faq::where('active_status', 1)->get());
        return view('frontend.pages.about', compact('about', 'faqs'));
    }

    public function services()
    {
        $services = \Illuminate\Support\Facades\Cache::rememberForever('frontend_services', fn() => Service::where('active_status', 1)->get());
        return view('frontend.pages.service', compact('services'));
    }

    public function countries()
    {
        $countries = \Illuminate\Support\Facades\Cache::rememberForever('frontend_countries', fn() => Country::where('active_status', 1)->get());
        return view('frontend.pages.countries', compact('countries'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function faq()
    {
        $faqs = \Illuminate\Support\Facades\Cache::rememberForever('frontend_faqs', fn() => Faq::where('active_status', 1)->get());
        $cta  = \Illuminate\Support\Facades\Cache::rememberForever('frontend_cta', fn() => Cta::where('active_status', 1)->first());
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
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:100',
            'preferred_country' => 'required|string|max:50',
            'highest_education' => 'required|string|max:50',
            'english_proficiency' => 'required|string|max:100',
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
