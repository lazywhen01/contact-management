<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index(Request $request)
	{

		// search input
		$searchVal = $request->search ?? null;

		// paginate with query
		$contacts = Contact::where('firstname', 'LIKE', '%'.$searchVal.'%')->paginate(5)->withQueryString();

		return view('contact.index', compact('contacts', 'searchVal'));
	}

	public function create()
	{
		return view('contact.create');
	}

	public function store(StoreContactRequest $request)
	{

		// Retrieve the validated input...
		$validated = $request->validated();

		// store new Contact to database
		$contact 							= new Contact;
		$contact->firstname 	= $validated['first_name'];
		$contact->lastname 		= $validated['last_name'];
		$contact->sex 				= $validated['sex'];
		$contact->age 				= $validated['age'];
		$contact->email 			= $validated['email'];
		$contact->save();

		// redirect to current page
		return redirect()->route('contacts.index')->with('status', 'Contact has been successfully added.');

	}

	public function show(Contact $contact)
	{
		return view('contact.show', compact('contact'));
	}

	public function update(UpdateContactRequest $request, Contact $contact)
	{

		// Retrieve the validated input...
		$validated = $request->validated();

		// update Contact model
		$contact->firstname 	= $validated['first_name'];
		$contact->lastname 		= $validated['last_name'];
		$contact->sex 				= $validated['sex'];
		$contact->age 				= $validated['age'];
		$contact->email 			= $validated['email'];
		$contact->update();

		// redirect to current page
		return redirect()->route('contacts.index')->with('status', 'Contact has been successfully updated.');

	}

	public function destroy(Contact $contact)
	{
		// delete Contact model
		$contact->delete();

		// redirect to current page
		return redirect()->route('contacts.index')->with('status', 'Contact has been successfully deleted.');

	}

}
