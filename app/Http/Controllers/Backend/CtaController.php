<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Cta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CtaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:list-cta')->only('index');
        $this->middleware('can:create-cta')->only('create', 'store');
        $this->middleware('can:edit-cta')->only('edit', 'update');
        $this->middleware('can:delete-cta')->only('destroy');
    }

    public function index(Request $request)
    {
        $ctas = Cta::query();
        if ($request->search) {
            $ctas = $ctas->where('title', 'like', '%' . $request->search . '%');
        }
        $ctas = $ctas->orderBy('id', 'desc')->paginate(20);
        return view('backend.pages.ctas.index', compact('ctas'));
    }

    public function create()
    {
        return view('backend.pages.ctas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'title_bn' => 'nullable|max:150',
            'subtitle' => 'nullable',
            'subtitle_bn' => 'nullable',
            'button_text' => 'nullable|max:30',
            'button_text_bn' => 'nullable|max:30',
            'button_link' => 'nullable|max:255',
            'image' => 'nullable|image|max:2048'
        ]);
        try {
            $data = $request->all();
            $data['created_by'] = Auth::id();
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_image_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/ctas/'), $filename);
                $data['image'] = $filename;
            }
            Cta::create($data);
            toast('Cta Created Successfully!', 'success');
            return redirect()->route('ctas.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function edit(string $id)
    {
        $cta = Cta::findOrFail($id);
        return view('backend.pages.ctas.edit', compact('cta'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:150',
            'title_bn' => 'nullable|max:150',
            'subtitle' => 'nullable',
            'subtitle_bn' => 'nullable',
            'button_text' => 'nullable|max:30',
            'button_text_bn' => 'nullable|max:30',
            'button_link' => 'nullable|max:255',
            'image' => 'nullable|image|max:2048'
        ]);
        try {
            $cta = Cta::findOrFail($id);
            $data = $request->all();
            $data['updated_by'] = Auth::id();
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_image_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/ctas/'), $filename);
                $data['image'] = $filename;
                if ($cta->image && file_exists(public_path('uploads/ctas/' . $cta->image))) {
                    unlink(public_path('uploads/ctas/' . $cta->image));
                }
            }
            $cta->update($data);
            toast('Cta Updated Successfully!', 'success');
            return redirect()->route('ctas.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $cta = Cta::findOrFail($id);
            
            if ($cta->image && file_exists(public_path('uploads/ctas/' . $cta->image))) {
                unlink(public_path('uploads/ctas/' . $cta->image));
            }
            $cta->delete();
            toast('Cta Deleted Successfully!', 'success');
            return redirect()->route('ctas.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back();
        }
    }
}
