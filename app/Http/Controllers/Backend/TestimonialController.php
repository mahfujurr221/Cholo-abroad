<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:list-testimonial')->only('index');
        $this->middleware('can:create-testimonial')->only('create', 'store');
        $this->middleware('can:edit-testimonial')->only('edit', 'update');
        $this->middleware('can:delete-testimonial')->only('destroy');
    }

    public function index(Request $request)
    {
        $testimonials = Testimonial::query();
        if ($request->search) {
            $testimonials = $testimonials->where('name', 'like', '%' . $request->search . '%');
        }
        $testimonials = $testimonials->orderBy('id', 'desc')->paginate(20);
        return view('backend.pages.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('backend.pages.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:60',
            'name_bn' => 'nullable|max:60',
            'designation' => 'nullable|max:60',
            'designation_bn' => 'nullable|max:60',
            'country_name' => 'nullable|max:100',
            'past_school' => 'nullable|max:200',
            'program' => 'nullable|max:200',
            'university' => 'nullable|max:200',
            'quote' => 'required',
            'quote_bn' => 'nullable',
            'rating' => 'required|integer|min:1|max:5',
            'avatar' => 'nullable|image|max:2048'
        ]);
        try {
            $data = $request->all();
            $data['created_by'] = Auth::id();
            
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = time() . '_avatar_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/testimonials/'), $filename);
                $data['avatar'] = $filename;
            }
            Testimonial::create($data);
            toast('Testimonial Created Successfully!', 'success');
            return redirect()->route('testimonials.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.pages.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:60',
            'name_bn' => 'nullable|max:60',
            'designation' => 'nullable|max:60',
            'designation_bn' => 'nullable|max:60',
            'country_name' => 'nullable|max:100',
            'past_school' => 'nullable|max:200',
            'program' => 'nullable|max:200',
            'university' => 'nullable|max:200',
            'quote' => 'required',
            'quote_bn' => 'nullable',
            'rating' => 'required|integer|min:1|max:5',
            'avatar' => 'nullable|image|max:2048'
        ]);
        try {
            $testimonial = Testimonial::findOrFail($id);
            $data = $request->all();
            $data['updated_by'] = Auth::id();
            
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = time() . '_avatar_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/testimonials/'), $filename);
                $data['avatar'] = $filename;
                if ($testimonial->avatar && file_exists(public_path('uploads/testimonials/' . $testimonial->avatar))) {
                    unlink(public_path('uploads/testimonials/' . $testimonial->avatar));
                }
            }
            $testimonial->update($data);
            toast('Testimonial Updated Successfully!', 'success');
            return redirect()->route('testimonials.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            
            if ($testimonial->avatar && file_exists(public_path('uploads/testimonials/' . $testimonial->avatar))) {
                unlink(public_path('uploads/testimonials/' . $testimonial->avatar));
            }
            $testimonial->delete();
            toast('Testimonial Deleted Successfully!', 'success');
            return redirect()->route('testimonials.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back();
        }
    }
}
