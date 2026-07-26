<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:list-process')->only('index');
        $this->middleware('can:create-process')->only('create', 'store');
        $this->middleware('can:edit-process')->only('edit', 'update');
        $this->middleware('can:delete-process')->only('destroy');
    }

    public function index(Request $request)
    {
        $processes = Process::query();
        if ($request->search) {
            $processes = $processes->where('step_number', 'like', '%' . $request->search . '%');
        }
        $processes = $processes->orderBy('id', 'desc')->paginate(20);
        return view('backend.pages.processes.index', compact('processes'));
    }

    public function create()
    {
        return view('backend.pages.processes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'step_number' => 'required|integer',
            'title' => 'required|max:100',
            'title_bn' => 'nullable|max:100',
            'description' => 'nullable',
            'description_bn' => 'nullable',
            'icon' => 'nullable|max:100'
        ]);
        try {
            $data = $request->all();
            $data['created_by'] = Auth::id();
            
            Process::create($data);
            toast('Process Created Successfully!', 'success');
            return redirect()->route('processes.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function edit(string $id)
    {
        $process = Process::findOrFail($id);
        return view('backend.pages.processes.edit', compact('process'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'step_number' => 'required|integer',
            'title' => 'required|max:100',
            'title_bn' => 'nullable|max:100',
            'description' => 'nullable',
            'description_bn' => 'nullable',
            'icon' => 'nullable|max:100'
        ]);
        try {
            $process = Process::findOrFail($id);
            $data = $request->all();
            $data['updated_by'] = Auth::id();
            
            $process->update($data);
            toast('Process Updated Successfully!', 'success');
            return redirect()->route('processes.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $process = Process::findOrFail($id);
            
            $process->delete();
            toast('Process Deleted Successfully!', 'success');
            return redirect()->route('processes.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back();
        }
    }
}
