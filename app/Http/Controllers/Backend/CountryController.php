<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:list-country')->only('index');
        $this->middleware('can:create-country')->only('create', 'store');
        $this->middleware('can:edit-country')->only('edit', 'update');
        $this->middleware('can:delete-country')->only('destroy');
    }

    public function index(Request $request)
    {
        $countries = Country::query();
        if ($request->search) {
            $countries = $countries->where('name', 'like', '%' . $request->search . '%');
        }
        $countries = $countries->orderBy('id', 'desc')->paginate(20);
        return view('backend.pages.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('backend.pages.countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'name_bn' => 'nullable|max:50',
            'slug' => 'required|max:60|unique:countries',
            'description' => 'nullable',
            'description_bn' => 'nullable',
            'approval_rate' => 'nullable|max:20',
            'image' => 'nullable|image|max:2048',
            'flag_icon' => 'nullable|image|max:2048'
        ]);
        try {
            $data = $request->all();
            $data['created_by'] = Auth::id();
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_image_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/countries/'), $filename);
                $data['image'] = $filename;
            }
            if ($request->hasFile('flag_icon')) {
                $file = $request->file('flag_icon');
                $filename = time() . '_flag_icon_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/countries/'), $filename);
                $data['flag_icon'] = $filename;
            }
            Country::create($data);
            toast('Country Created Successfully!', 'success');
            return redirect()->route('countries.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function edit(string $id)
    {
        $country = Country::findOrFail($id);
        return view('backend.pages.countries.edit', compact('country'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'name_bn' => 'nullable|max:50',
            'slug' => 'required|max:60|unique:countries,slug,' . $id,
            'description' => 'nullable',
            'description_bn' => 'nullable',
            'approval_rate' => 'nullable|max:20',
            'image' => 'nullable|image|max:2048',
            'flag_icon' => 'nullable|image|max:2048'
        ]);
        try {
            $country = Country::findOrFail($id);
            $data = $request->all();
            $data['updated_by'] = Auth::id();
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_image_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/countries/'), $filename);
                $data['image'] = $filename;
                if ($country->image && file_exists(public_path('uploads/countries/' . $country->image))) {
                    unlink(public_path('uploads/countries/' . $country->image));
                }
            }
            if ($request->hasFile('flag_icon')) {
                $file = $request->file('flag_icon');
                $filename = time() . '_flag_icon_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/countries/'), $filename);
                $data['flag_icon'] = $filename;
                if ($country->flag_icon && file_exists(public_path('uploads/countries/' . $country->flag_icon))) {
                    unlink(public_path('uploads/countries/' . $country->flag_icon));
                }
            }
            $country->update($data);
            toast('Country Updated Successfully!', 'success');
            return redirect()->route('countries.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $country = Country::findOrFail($id);
            
            if ($country->image && file_exists(public_path('uploads/countries/' . $country->image))) {
                unlink(public_path('uploads/countries/' . $country->image));
            }
            if ($country->flag_icon && file_exists(public_path('uploads/countries/' . $country->flag_icon))) {
                unlink(public_path('uploads/countries/' . $country->flag_icon));
            }
            $country->delete();
            toast('Country Deleted Successfully!', 'success');
            return redirect()->route('countries.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back();
        }
    }

    // ─── Country FAQ Management ─────────────────────────────────────────

    public function faqs(string $id)
    {
        $country = Country::findOrFail($id);
        $faqs    = Faq::forCountry($id)->orderBy('id', 'desc')->get();
        return view('backend.pages.countries.faqs', compact('country', 'faqs'));
    }

    public function faqStore(Request $request, string $id)
    {
        $request->validate([
            'question'  => 'required|max:500',
            'answer'    => 'required',
        ]);
        try {
            $country = Country::findOrFail($id);
            Faq::create([
                'country_id'    => $country->id,
                'question'      => $request->question,
                'answer'        => $request->answer,
                'active_status' => 1,
                'created_by'    => Auth::id(),
            ]);
            \Illuminate\Support\Facades\Cache::forget('frontend_countries');
            toast('FAQ Added Successfully!', 'success');
            return redirect()->route('countries.faqs', $id);
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function faqDestroy(string $id, string $faqId)
    {
        try {
            $faq = Faq::where('id', $faqId)->where('country_id', $id)->firstOrFail();
            $faq->delete();
            \Illuminate\Support\Facades\Cache::forget('frontend_countries');
            toast('FAQ Deleted Successfully!', 'success');
            return redirect()->route('countries.faqs', $id);
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back();
        }
    }
}
