<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:list-hero')->only('index');
        $this->middleware('can:create-hero')->only('create', 'store');
        $this->middleware('can:edit-hero')->only('edit', 'update');
        $this->middleware('can:delete-hero')->only('destroy');
    }

    public function index(Request $request)
    {
        $heroes = Hero::query();
        if ($request->search) {
            $heroes = $heroes->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('title_bn', 'like', '%' . $request->search . '%');
        }
        $heroes = $heroes->orderBy('id', 'desc')->paginate(20);
        return view('backend.pages.heroes.index', compact('heroes'));
    }

    public function create()
    {
        return view('backend.pages.heroes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'title_bn' => 'nullable|max:100',
            'subtitle' => 'nullable|max:150',
            'subtitle_bn' => 'nullable|max:150',
            'button_text' => 'nullable|max:30',
            'button_text_bn' => 'nullable|max:30',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        try {
            $data = $request->all();
            $data['created_by'] = Auth::id();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/heroes/'), $filename);
                $data['image'] = $filename;
            }

            Hero::create($data);
            toast('Hero Created Successfully!', 'success');
            return redirect()->route('heroes.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function edit(string $id)
    {
        $hero = Hero::findOrFail($id);
        return view('backend.pages.heroes.edit', compact('hero'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'title_bn' => 'nullable|max:100',
            'subtitle' => 'nullable|max:150',
            'subtitle_bn' => 'nullable|max:150',
            'button_text' => 'nullable|max:30',
            'button_text_bn' => 'nullable|max:30',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        try {
            $hero = Hero::findOrFail($id);
            $data = $request->all();
            $data['updated_by'] = Auth::id();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/heroes/'), $filename);
                $data['image'] = $filename;
                
                if ($hero->image && file_exists(public_path('uploads/heroes/' . $hero->image))) {
                    unlink(public_path('uploads/heroes/' . $hero->image));
                }
            }

            $hero->update($data);
            toast('Hero Updated Successfully!', 'success');
            return redirect()->route('heroes.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $hero = Hero::findOrFail($id);
            if ($hero->image && file_exists(public_path('uploads/heroes/' . $hero->image))) {
                unlink(public_path('uploads/heroes/' . $hero->image));
            }
            $hero->delete();
            toast('Hero Deleted Successfully!', 'success');
            return redirect()->route('heroes.index');
        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return back();
        }
    }
}
