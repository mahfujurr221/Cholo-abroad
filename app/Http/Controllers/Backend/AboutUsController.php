<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:list-aboutus')->only('index');
        $this->middleware('can:create-aboutus')->only('create', 'store');
        $this->middleware('can:edit-aboutus')->only('edit', 'update');
        $this->middleware('can:delete-aboutus')->only('destroy');
    }

    public function index(Request $request)
    {
        $about_us = AboutUs::query();
        if ($request->search) {
            $about_us = $about_us->where('title', 'like', '%' . $request->search . '%');
        }
        $about_us = $about_us->orderBy('id', 'desc')->paginate(20);
        return view('backend.pages.about_us.index', compact('about_us'));
    }

    public function create()
    {
        return view('backend.pages.about_us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'title_bn' => 'nullable|max:100',
            'description' => 'nullable',
            'description_bn' => 'nullable',
            'mission' => 'nullable|max:255',
            'mission_bn' => 'nullable|max:255',
            'vision' => 'nullable|max:255',
            'vision_bn' => 'nullable|max:255',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'video_url' => 'nullable|max:255'
        ]);
        try {
            $data = $request->all();
            $data['created_by'] = Auth::id();
            
            if ($request->hasFile('image1')) {
                $file = $request->file('image1');
                $filename = time() . '_image1_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/about_us/'), $filename);
                $data['image1'] = $filename;
            }
            if ($request->hasFile('image2')) {
                $file = $request->file('image2');
                $filename = time() . '_image2_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/about_us/'), $filename);
                $data['image2'] = $filename;
            }
            AboutUs::create($data);
            toast('AboutUs Created Successfully!', 'success');
            return redirect()->route('about-us.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function edit(string $id)
    {
        $aboutus = AboutUs::findOrFail($id);
        return view('backend.pages.about_us.edit', compact('aboutus'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'title_bn' => 'nullable|max:100',
            'description' => 'nullable',
            'description_bn' => 'nullable',
            'mission' => 'nullable|max:255',
            'mission_bn' => 'nullable|max:255',
            'vision' => 'nullable|max:255',
            'vision_bn' => 'nullable|max:255',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'video_url' => 'nullable|max:255'
        ]);
        try {
            $aboutus = AboutUs::findOrFail($id);
            $data = $request->all();
            $data['updated_by'] = Auth::id();
            
            if ($request->hasFile('image1')) {
                $file = $request->file('image1');
                $filename = time() . '_image1_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/about_us/'), $filename);
                $data['image1'] = $filename;
                if ($aboutus->image1 && file_exists(public_path('uploads/about_us/' . $aboutus->image1))) {
                    unlink(public_path('uploads/about_us/' . $aboutus->image1));
                }
            }
            if ($request->hasFile('image2')) {
                $file = $request->file('image2');
                $filename = time() . '_image2_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/about_us/'), $filename);
                $data['image2'] = $filename;
                if ($aboutus->image2 && file_exists(public_path('uploads/about_us/' . $aboutus->image2))) {
                    unlink(public_path('uploads/about_us/' . $aboutus->image2));
                }
            }
            $aboutus->update($data);
            toast('AboutUs Updated Successfully!', 'success');
            return redirect()->route('about-us.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $aboutus = AboutUs::findOrFail($id);
            
            if ($aboutus->image1 && file_exists(public_path('uploads/about_us/' . $aboutus->image1))) {
                unlink(public_path('uploads/about_us/' . $aboutus->image1));
            }
            if ($aboutus->image2 && file_exists(public_path('uploads/about_us/' . $aboutus->image2))) {
                unlink(public_path('uploads/about_us/' . $aboutus->image2));
            }
            $aboutus->delete();
            toast('AboutUs Deleted Successfully!', 'success');
            return redirect()->route('about-us.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back();
        }
    }
}
