<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;


class ControlController extends Controller
{
    public function index(Request $request)
    {
      $search_name = $request->input('search_name');
      $search_gender = $request->input('search_gender');
      $search_email = $request->input('search_email');

      $query = Contact::query();

      if (!empty($search_name)) {
        $query->where('fullname', 'like', '%'. $search_name. '%');
      }

      if (!empty($request['from']) && !empty($request['until'])) {
        $contact = Contact::getDate($request['from'], $request['until']);
      } else {
        $contact = Contact::get();
      }

      if (!empty($search_email)) {
        $query->where('email', 'like', '%'. $search_email. '%');
      }

      $items = $query->paginate(10);


      return view('index', compact('items', 'search_name', 'search_gender', 'contact', 'search_email'));
    }

    public function remove($id)
    {
      $contact = Contact::find($id);
      $contact->delete();
      return redirect('/');
    }

}
