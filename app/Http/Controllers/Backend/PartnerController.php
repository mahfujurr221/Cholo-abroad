<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:list-partner')->only('index');
        $this->middleware('can:create-partner')->only('create', 'store');
        $this->middleware('can:edit-partner')->only('edit', 'update');
        $this->middleware('can:delete-partner')->only('destroy');
    }

    public function index(Request $request)
    {
        $partners = Partner::query();
        if ($request->search) {
            $partners = $partners->where('name', 'like', '%' . $request->search . '%');
        }
        $partners = $partners->orderBy('id', 'desc')->paginate(20);
        return view('backend.pages.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('backend.pages.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'logo' => 'required|image|max:2048',
        ]);
        try {
            $data = $request->all();
            $data['created_by'] = Auth::id();
            
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = time() . '_logo_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/partners/'), $filename);
                $data['logo'] = $filename;
            }
            Partner::create($data);
            Cache::forget('frontend_partners');
            toast('Partner Created Successfully!', 'success');
            return redirect()->route('partners.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view('backend.pages.partners.edit', compact('partner'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);
        try {
            $partner = Partner::findOrFail($id);
            $data = $request->all();
            $data['updated_by'] = Auth::id();
            
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = time() . '_logo_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/partners/'), $filename);
                $data['logo'] = $filename;
                if ($partner->logo && file_exists(public_path('uploads/partners/' . $partner->logo))) {
                    unlink(public_path('uploads/partners/' . $partner->logo));
                }
            }
            $partner->update($data);
            Cache::forget('frontend_partners');
            toast('Partner Updated Successfully!', 'success');
            return redirect()->route('partners.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $partner = Partner::findOrFail($id);
            if ($partner->logo && file_exists(public_path('uploads/partners/' . $partner->logo))) {
                unlink(public_path('uploads/partners/' . $partner->logo));
            }
            $partner->delete();
            Cache::forget('frontend_partners');
            toast('Partner Deleted Successfully!', 'success');
            return redirect()->route('partners.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back();
        }
    }
}
