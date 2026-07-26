<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:list-faq')->only('index');
        $this->middleware('can:create-faq')->only('create', 'store');
        $this->middleware('can:edit-faq')->only('edit', 'update');
        $this->middleware('can:delete-faq')->only('destroy');
    }

    public function index(Request $request)
    {
        $faqs = Faq::query();
        if ($request->search) {
            $faqs = $faqs->where('question', 'like', '%' . $request->search . '%');
        }
        $faqs = $faqs->orderBy('id', 'desc')->paginate(20);
        return view('backend.pages.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('backend.pages.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|max:255',
            'question_bn' => 'nullable|max:255',
            'answer' => 'required',
            'answer_bn' => 'nullable'
        ]);
        try {
            $data = $request->all();
            $data['created_by'] = Auth::id();
            
            Faq::create($data);
            toast('Faq Created Successfully!', 'success');
            return redirect()->route('faqs.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function edit(string $id)
    {
        $faq = Faq::findOrFail($id);
        return view('backend.pages.faqs.edit', compact('faq'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'question' => 'required|max:255',
            'question_bn' => 'nullable|max:255',
            'answer' => 'required',
            'answer_bn' => 'nullable'
        ]);
        try {
            $faq = Faq::findOrFail($id);
            $data = $request->all();
            $data['updated_by'] = Auth::id();
            
            $faq->update($data);
            toast('Faq Updated Successfully!', 'success');
            return redirect()->route('faqs.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $faq = Faq::findOrFail($id);
            
            $faq->delete();
            toast('Faq Deleted Successfully!', 'success');
            return redirect()->route('faqs.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back();
        }
    }
}
