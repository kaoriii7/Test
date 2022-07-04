<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
      return view('contacts.index');
    }

    public function confirm(ContactRequest $request)
    {
      $contact = new Contact($request->all());

      return view('contacts.confirm', compact('contact'));
    }

    public function thanks(Request $request)
    {
      $action = $request->input('action');

      $inputs = $request->except('action');

      if ($request->action === '修正する') {
        return redirect('/contacts')->withInput();
      }

      Contact::create($request->all());

      $request->session()->regenerateToken();

      return view('contacts.thanks');
    }

}
