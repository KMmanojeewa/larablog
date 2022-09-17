<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{

    public function index()
    {
//        dd(Auth::check());
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        //$formFields
        $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listing', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);



//        Listing::create($formFields);

        $listing = new Listing;
        $listing->title = $request->title;
        $listing->company = $request->company;
        $listing->location = $request->location;
        $listing->website = $request->website;
        $listing->email = $request->email;
        $listing->tags = $request->tags;
        $listing->description = $request->description;

        if($request->hasFile('logo')) {
            $listing->logo = $request->file('logo')->store('logos', 'public');
        }

        $listing->save();

//        Session::flash('message', 'Listing Created');

        return redirect('/')->with('message', 'Listing Created');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')) {
            $request['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update([
            'title' => $request->title,
            'company' => $request->company,
            'location' => $request->location,
            'website' => $request->website,
            'email' => $request->email,
            'tags' => $request->tags,
            'description' => $request->description,
        ]);
        return back()->with('message', 'Listing updated');

    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Deleted');
    }
}
