<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:list-service')->only('index');
        $this->middleware('can:create-service')->only('create', 'store');
        $this->middleware('can:edit-service')->only('edit', 'update');
        $this->middleware('can:delete-service')->only('destroy');
    }

    public function index(Request $request)
    {
        $services = Service::query();
        if ($request->search) {
            $services = $services->where('title', 'like', '%' . $request->search . '%');
        }
        $services = $services->orderBy('id', 'desc')->paginate(20);
        return view('backend.pages.services.index', compact('services'));
    }

    public function create()
    {
        return view('backend.pages.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'title_bn' => 'nullable|max:100',
            'slug' => 'required|max:120|unique:services',
            'short_description' => 'nullable|max:255',
            'short_description_bn' => 'nullable|max:255',
            'description' => 'nullable',
            'description_bn' => 'nullable',
            'icon' => 'nullable|max:100',
            'image' => 'nullable|image|max:2048'
        ]);
        try {
            $data = $request->all();
            $data['created_by'] = Auth::id();
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_image_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/services/'), $filename);
                $data['image'] = $filename;
            }
            Service::create($data);
            toast('Service Created Successfully!', 'success');
            return redirect()->route('services.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('backend.pages.services.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'title_bn' => 'nullable|max:100',
            'slug' => 'required|max:120|unique:services,slug,$id',
            'short_description' => 'nullable|max:255',
            'short_description_bn' => 'nullable|max:255',
            'description' => 'nullable',
            'description_bn' => 'nullable',
            'icon' => 'nullable|max:100',
            'image' => 'nullable|image|max:2048'
        ]);
        try {
            $service = Service::findOrFail($id);
            $data = $request->all();
            $data['updated_by'] = Auth::id();
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_image_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/services/'), $filename);
                $data['image'] = $filename;
                if ($service->image && file_exists(public_path('uploads/services/' . $service->image))) {
                    unlink(public_path('uploads/services/' . $service->image));
                }
            }
            $service->update($data);
            toast('Service Updated Successfully!', 'success');
            return redirect()->route('services.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $service = Service::findOrFail($id);
            
            if ($service->image && file_exists(public_path('uploads/services/' . $service->image))) {
                unlink(public_path('uploads/services/' . $service->image));
            }
            $service->delete();
            toast('Service Deleted Successfully!', 'success');
            return redirect()->route('services.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back();
        }
    }
}
