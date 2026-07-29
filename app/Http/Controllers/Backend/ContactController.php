<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:list-contact')->only('index', 'show');
        $this->middleware('can:delete-contact')->only('destroy');
    }

    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('backend.pages.contacts.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        if ($contact->status == 0) {
            $contact->update(['status' => 1]); // Mark as read
        }
        return view('backend.pages.contacts.show', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Message deleted successfully.');
    }
}
