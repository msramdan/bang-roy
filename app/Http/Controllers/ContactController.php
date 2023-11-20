<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\{StoreContactRequest, UpdateContactRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contact view')->only('index', 'show');
        $this->middleware('permission:contact create')->only('create', 'store');
        $this->middleware('permission:contact edit')->only('edit', 'update');
        $this->middleware('permission:contact delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $contacts = Contact::query();

            return DataTables::of($contacts)
                ->addColumn('message', function($row){
                    return str($row->message)->limit(100);
                })
				->addColumn('action', 'contacts.include.action')
                ->toJson();
        }

        return view('contacts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        
        Contact::create($request->validated());
        Alert::toast('The contact was created successfully.', 'success');
        return redirect()->route('contacts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        
        $contact->update($request->validated());
        Alert::toast('The contact was updated successfully.', 'success');
        return redirect()
            ->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            Alert::toast('The contact was deleted successfully.', 'success');
            return redirect()->route('contacts.index');
        } catch (\Throwable $th) {
            Alert::toast('The contact cant be deleted because its related to another table.', 'error');
            return redirect()->route('contacts.index');
        }
    }
}
